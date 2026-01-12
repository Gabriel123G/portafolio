<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageUrl extends Model
{
    protected $primaryKey = 'idImageUrl';
    protected $fillable = [
        'idProject',
        'url'
    ];
    public function project() {
    return $this->belongsTo(Project::class, 'idProject');
}

}
