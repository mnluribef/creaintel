<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

// Logs
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Roles extends Model
{
    use HasFactory;
    use HasPermissions;
    use HasRoles;

    use LogsActivity;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        // ->logOnly(['*'])
        ->logFillable()
        ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public $table = 'roles';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'guard_name',
    ];
}
