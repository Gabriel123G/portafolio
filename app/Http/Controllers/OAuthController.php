<?php

namespace App\Http\Controllers;

use Google_Client;
use Illuminate\Http\Request;

class OAuthController extends Controller
{
    public function redirect()
    {
        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->setAccessType('offline');
        $client->setPrompt('consent');
        $client->setScopes([\Google_Service_Drive::DRIVE]);

        $authUrl = $client->createAuthUrl();
        return redirect()->away($authUrl);
    }

    public function callback(Request $request)
    {
        if (!$request->has('code')) {
            return redirect()->route('admin')
                ->with('error', 'No se recibió el código de autorización de Google.');
        }

        $client = new Google_Client();
        $client->setClientId(env('GOOGLE_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $client->setAccessType('offline');
        $client->setPrompt('consent');
        $client->setScopes([\Google_Service_Drive::DRIVE]);

        $token = $client->fetchAccessTokenWithAuthCode($request->input('code'));

        if (isset($token['error'])) {
            return redirect()->route('admin')
                ->with('error', 'Error al obtener el token: ' . $token['error_description']);
        }

        // Guardar token en sesión
        session(['google_token' => $token]);

        return redirect()->route('admin')->with('success', 'Google Drive conectado');
    }
}
