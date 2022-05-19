<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date',
        'time_started',
        'time_ended' 
    ];

    protected $hidden = [
        'employee_id',
        'created_at',
        'updated_at',
    ];
}
