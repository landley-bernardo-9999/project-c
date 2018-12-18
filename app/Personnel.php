<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    protected $fillable = [
        'room_id','roomNo','firstName', 'middleName' ,'lastName', 'birthDate','empStatus', 'emailAddress', 'mobileNumber','houseNumber', 'barangay', 'municipality', 'province',
        'zip' 
];
}
