<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BreathingExercise extends Model
{
    protected $fillable = [
        'user_id',
        'date',
        'cp_measurement_one', 
        'cp_measurement_two', 
        'interval', 
        'buteyko', 
        'papworth',
        'middenrifspier',
        'wim_hof',
    ];
}
