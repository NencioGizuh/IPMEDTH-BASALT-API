<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $fillable = [
        'name', 
        'type',
        'subType'
    ];

    protected $visible = [
        'id',
        'name', 
        'type',
        'subType'
    ];
}
