<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Linea_Inves extends Model
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

    public $table = "lineainve";
    use HasFactory;

    public function linea_inves()
    {
        return $this->hasMany(Preinscripcion::class, 'id');
    }

    public function pnf_lineainves()
    {
        return $this->belongsTo(PNF::class, 'PNF_id');
    }
}
