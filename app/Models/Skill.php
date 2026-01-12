<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'idProject',
        'skill',
        'details',
    ];
    
    public function project() {
    return $this->belongsTo(Project::class, 'idProject');
}

}
