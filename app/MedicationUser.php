<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicationUser extends Model
{
    protected $fillable = [
        'user_id', 
        'time',
        'medicine_id',
    ];

    protected $visible = [
        'id',
        'user_id', 
        'time',
        'medicine_id',
        'medication',
    ];

    public function medication() {
        return $this->belongsTo('App\Medication','medicine_id');
    }
}
