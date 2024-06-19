<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    public $table = "municipio";
    use HasFactory;

    public function municipio()
    {
        return $this->hasMany(Preinscripcion::class, 'id');
    }
}
