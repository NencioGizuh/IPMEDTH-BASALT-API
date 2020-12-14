<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trigger extends Model
{
    protected $fillable = [
        'user_id',
        'tabacco_smoke',
        'dust_mites', 
        'air_pollution', 
        'pets', 
        'fungi', 
        'fire_smoke',
        'infections',
        'effort',
        'weather_conditions',
        'hyperventilation',
        'pollen'
    ];
}
