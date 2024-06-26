<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public $table = "estado";
    use HasFactory;

    public function estado()
    {
        return $this->hasMany(Preinscripcion::class, 'id');
    }
}
