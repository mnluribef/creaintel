<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PNF extends Model
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

    use HasFactory;
    protected $table = 'pnf';

    public function pnfs()
    {
        return $this->hasMany(Preinscripcion::class, 'id', 'PNF_id');
    }

    public function pnf_docente()
    {
        return $this->hasMany(Docente::class, 'PNF_id');
    }

    public function pnf_estudiante()
    {
        return $this->hasMany(Estudiante::class, 'PNF_id');
    }

    public function pnf_linea_inves()
    {
        return $this->hasMany(Linea_Inves::class, 'id');
    }
    
}
