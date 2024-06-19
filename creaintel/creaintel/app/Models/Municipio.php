<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Municipio extends Model
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

    public $table = "municipio";
    use HasFactory;

    public function municipio()
    {
        return $this->hasMany(Preinscripcion::class, 'id');
    }

        public function municipio_estado()
    {
        return $this->belongsTo(Estado::class, 'municipio_id');
    }

}
