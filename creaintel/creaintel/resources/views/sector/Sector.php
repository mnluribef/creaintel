<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public $table = "sector";
    use HasFactory;

    public function sector()
    {
        return $this->hasMany(Sector::class, 'id');     
    }
}
