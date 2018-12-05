<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'roomNo', 'building', 'longTermRent', 'shortTermRent', 'status', 'size', 'capacity'
    ];
}
