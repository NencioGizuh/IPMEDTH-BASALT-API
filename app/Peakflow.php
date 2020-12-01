<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peakflow extends Model
{
    protected $fillable = [
        'date', 
        'time', 
        'measurement_one', 
        'measurement_two', 
        'measurement_three', 
        'taken_medicines', 
        'explanation'
    ];
}
