<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicationUserTaken extends Model
{
    protected $fillable = [
        'user_id', 
        'time',
        'date',
        'medicine_id',
    ];

    protected $visible = [
        'id',
        'user_id', 
        'date',
        'time',
        'medicine_id',
        'medication',
    ];

    public function medication() {
        return $this->belongsTo('App\Medication','medicine_id');
    }
}
