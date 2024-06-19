<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
    public $table = "parroquia";
    use HasFactory;

    public function parroquia()
    {
        return $this->hasMany(Preinscripcion::class, 'id');
    }
}
