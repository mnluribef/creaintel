<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Logs
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Estado extends Model
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

    public $table = "estado";
    use HasFactory;

    public function preins_Estado()
    {
        return $this->hasMany(Preinscripcion::class, 'id');
    }

    public function estado_ts()
    {
        return $this->hasMany(Municipio::class, 'id');
    }


}
