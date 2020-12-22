<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable = [
        'name', 
        'type',
    ];

    protected $visible = [
        'id',
        'name', 
        'type',
    ];
}
