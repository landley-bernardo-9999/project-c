<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
            'firstName', 'middleName' ,'lastName', 'birthDate', 'emailAddress', 'mobileNumber', 'roomNo' ,'houseNumber', 'barangay', 'municipality', 'province',
            'zip', 'school', 'course', 'yearLevel','guardian', 'guardianPhoneNumber','img' 
    ];

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
