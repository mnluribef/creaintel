<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Prefijo extends Model
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
    public $table = "prefijo_tlf";

    public function prefijos_estu()
    {
        return $this->hasMany(Estudiante::class, 'prefijo_id');
    }

    public function prefijos_doce()
    {
        return $this->hasMany(Docente::class, 'prefijo_id');
    }
}
