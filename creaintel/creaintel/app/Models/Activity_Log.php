<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_Log extends Model
{
    public $table = 'activity_log';

    use HasFactory;

        public function user()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }
}
