<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InhalatorInformation extends Model
{
    protected $fillable = [
        'inhalatorName',
        'fabrikant',
        'afbeelding',
        'gebruikMedicijn',
        'type',
        'color',
        'state'
    ];

    protected $visible = [
        'inhalatorName',
        'fabrikant',
        'afbeelding',
        'gebruikMedicijn',
        'type',
        'color',
        'state'
    ];
}
