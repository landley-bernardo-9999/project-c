<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
            'firstName', 'middleName' ,'lastName', 'birthDate', 'emailAddress', 'mobileNumber', 'roomNo' ,'houseNumber', 'barangay', 'municipality', 'province',
            'zip', 'school', 'course', 'yearLevel', 'img' 
    ];
}
