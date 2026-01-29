<?php

namespace App\Services;

use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;
use Google_Service_Drive_Permission;
use Illuminate\Support\Facades\Auth;

class ImagesServices
{

    protected $client;
    protected $service;
    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $this->client->setAccessType('offline');
        $this->client->setPrompt('consent');
        $this->client->setScopes([Google_Service_Drive::DRIVE]);
    }

    public function setAccessToken(array $token)
    {
        $this->client->setAccessToken($token);
        $this->service = new Google_Service_Drive($this->client);
    }
    public function refreshToken(){
        $refreshToken = decrypt(Auth::user()->refresh_token);

        $this->client->refreshToken($refreshToken);
        $newAccessToken = $this->client->getAccessToken();

        session(['google_token' => $newAccessToken]);
    }


    public function uploadFile($filePath, $fileName)
    {
        if (!$this->service) {
            throw new \Exception("Google Drive no está autenticado. Autoriza primero.");
        }

        $fileMetadata = new Google_Service_Drive_DriveFile([
            'name' => $fileName,
            'parents' => [env('GOOGLE_DRIVE_FOLDER_ID')]
        ]);

        $content = file_get_contents($filePath);

        $file = $this->service->files->create($fileMetadata, [
            'data' => $content,
            'mimeType' => mime_content_type($filePath),
            'uploadType' => 'multipart',
            'fields' => 'id'
        ]);

        $this->service->permissions->create($file->id, new Google_Service_Drive_Permission([
            'role' => 'reader',
            'type' => 'anyone',
        ]));

        return "https://drive.google.com/uc?id={$file->id}";
        
    }
    public function deleteFile($fileId)
    {
        if (!$this->service) {
            throw new \Exception("Google Drive no está autenticado. Autoriza primero.");
        }

        try {
            $this->service->files->delete($fileId);
            return true; // eliminado con éxito
        } catch (\Exception $e) {
            // Manejo de errores
            throw new \Exception("Error al eliminar el archivo: " . $e->getMessage());
        }
    }
}
