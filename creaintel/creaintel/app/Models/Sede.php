<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Preinscripcion;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Sede extends Model
{
    use LogsActivity;

    protected $guard_name = 'web';


    protected static $logAttributes = ["*"];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            // ->logOnly(['*'])
            ->logFillable()
            ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public $table = "sede";
    use HasFactory;

    public function pres()
    {
        return $this->hasMany(Preinscripcion::class, 'id');
    }

    public function sede_docente()
    {
        return $this->HasMany(Docente::class);
    }

    public function sede_estudiante()
    {
        return $this->HasMany(Estudiante::class);
    }
}
