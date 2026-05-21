<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    protected $fillable = [
        'name',
        'category',
        'goal',
        'progress',
        'start_date',
        
    ];
}