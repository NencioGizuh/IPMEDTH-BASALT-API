<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionPlan extends Model
{
    protected $fillable = [
        'user_id',
        'zone_green_peakflow_before_medicines', 
        'zone_green_peakflow_after_medicines', 
        'zone_green_explanation',
        'zone_yellow_peakflow_below', 
        'zone_yellow_peakflow_above', 
        'zone_yellow_medicines', 
        'zone_yellow_explanation', 
        'phonenumber_gp',
        'phonenumber_lung_specialist',
        'zone_orange_explanation',
        'zone_red_peakflow',
        'zone_red_medicines',
        'zone_red_explanation',
    ];
}
