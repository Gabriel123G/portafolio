<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'idProject';

    protected $fillable = [
        'name',
        'details'
    ];
    public function skills() {
    return $this->hasMany(Skill::class, 'idProject');
}

public function images_urls() {
    return $this->hasMany(ImageUrl::class, 'idProject');
}

}