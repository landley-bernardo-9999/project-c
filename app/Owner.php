<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'room_id','roomNo','firstName', 'middleName' ,'lastName', 'birthDate', 'emailAddress', 'mobileNumber','houseNumber', 'barangay', 'municipality', 'province',
        'zip','rep', 'repPhoneNumber' 
];

}
