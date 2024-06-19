<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Logs
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Docente extends Model
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

    public $table = "docente";
    use HasFactory;

    protected $primaryKey = 'docente_ci';

    public function docente_pnf()
    {
        return $this->belongsTo(PNF::class, 'PNF_id');
    }

    public function asesor()
    {
        return $this->belongsTo(Preinscripcion::class, 'docente_ci', 'asesor_ci');
    }

    public function tutor()
    {
        return $this->belongsTo(Preinscripcion::class, 'docente_ci', 'tutor_ci');
    }

    public function coordinadorpnf()
    {
        return $this->hasOne(Docente::class, 'docente_ci', 'coordinadorpnf_ci');
    }

    public function especialista1()
    {
        return $this->hasOne(Docente::class, 'docente_ci', 'especialista1_ci');
    }

    public function prefijo()
    {
        return $this->belongsTo(Prefijo::class);
    }

    public function sedes()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }
}
