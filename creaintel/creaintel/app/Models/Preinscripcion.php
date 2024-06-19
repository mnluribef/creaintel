<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Preinscripcion extends Model
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

    protected $fillable = [
        'estudiante_ci',
        'estudiante2_ci',
        'estudiante3_ci',
        'tipo_estudio_id',
        'PNF_id',
        'sede_id',
        'trayecto_id',
        'seccion_id',
        'estado_id',
        'municipio_id',
        'parroquia_id',
        'turno_id',
        'asesor_ci',
        'tutor_ci',
        'sector_id',
        'titulo_Tentativo',
        'objetivo',
        'alcance',
        'limitacion',
        'lineaInves_id',
        'aportes_comu',
        'acciones_integra',
        'plan_patria',
        'observaciones',
        'especialista1_ci',
        'especialista2_ci',
        'especialista3_ci',
    ];

    public function PNFs()
    {
        return $this->belongsTo(PNF::class, 'PNF_id');
    }

    public function sedes()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function tipo_estudios()
    {
        return $this->belongsTo(Tipo_Estudio::class, 'tipo_estudio_id');
    }

    public function lineainves()
    {
        return $this->belongsTo(Linea_Inves::class, 'lineaInves_id');
    }

    public function trayectos()
    {
        return $this->belongsTo(Trayecto::class, 'trayecto_id');
    }

    public function turnos()
    {
        return $this->belongsTo(Turno::class, 'turno_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function secciones()
    {
        return $this->belongsTo(Seccion::class, 'seccion_id');
    }

    public function estados()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function municipios()
    {
        return $this->belongsTo(Municipio::class, 'municipio_id');
    }

    public function parroquias()
    {
        return $this->belongsTo(Parroquia::class, 'parroquia_id');
    }

    public function sectores()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }

    public function Estudiantes()
    {
        return $this->hasOne(Estudiante::class, 'estudiante_ci', 'estudiante_ci');
    }

    public function Estudiante2()
    {
        return $this->hasOne(Estudiante::class, 'estudiante_ci', 'estudiante2_ci');
    }

    public function Estudiante3()
    {
        return $this->hasOne(Estudiante::class, 'estudiante_ci', 'estudiante3_ci');
    }

    public function asesores()
    {
        return $this->hasMany(Docente::class, 'docente_ci', 'asesor_ci');
    }

    public function tutores()
    {
        return $this->hasMany(Docente::class, 'docente_ci', 'tutor_ci');
    }

    public function coordinadorespnf()
    {
        return $this->hasOne(Docente::class, 'docente_ci', 'coordinadorpnf_ci');
    }

    public function especialistas1()
    {
        return $this->hasOne(Docente::class, 'docente_ci', 'especialista1_ci');
    }
}
