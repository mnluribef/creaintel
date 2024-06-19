<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lider;
use App\Models\Prefijo;

// Logs
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Estudiante extends Model
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

    public $table = "estudiante";
    use HasFactory;

    protected $primaryKey = 'estudiante_ci';

    public function preins_Estudiante()
    {
        return $this->belongsTo(Preinscripcion::class, 'estudiante_ci', 'estudiante_ci');
    }

    public function estudiante_2()
    {
        return $this->belongsTo(Preinscripcion::class, 'estudiante_ci', 'estudiante2_ci');
    }

    public function estudiante_3()
    {
        return $this->belongsTo(Preinscripcion::class, 'estudiante_ci', 'estudiante3_ci');
    }

    public function lider()
    {
        return $this->belongsTo(Lider::class);
    }

    /*     public function prefijo()
    {
        return $this->belongsTo(Prefijo::class, 'id');
    } */

    public function prefijo()
    {
        return $this->belongsTo(Prefijo::class);
    }

    public function prefijos_doce()
    {
        return $this->belongsTo(Prefijo::class);
    }

    public function sedes()
    {
        return $this->belongsTo(Sede::class, 'sede_id');
    }

    public function estudiante_pnf()
    {
        return $this->belongsTo(PNF::class, 'PNF_id');
    }
}
