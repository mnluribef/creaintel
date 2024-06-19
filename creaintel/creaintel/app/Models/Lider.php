<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Estudiante;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Lider extends Model
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
    public $table = "lider";

    public function lideres()
    {
        return $this->hasMany(Estudiante::class, 'lider_id');
    }

}
