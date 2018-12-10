<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    protected $fillable = [
            'room_id','roomNo','firstName', 'middleName' ,'lastName', 'birthDate', 'emailAddress', 'mobileNumber','houseNumber', 'barangay', 'municipality', 'province',
            'zip', 'school', 'course', 'yearLevel','guardian', 'guardianPhoneNumber','img' 
    ];

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function room(){
         return $this->belongsTo(Room::class);
     }

     public function repairs(){
         return $this->hasMany(Repair::class);
     }

     public function violations(){
        return $this->hasMany(Violation::class);
    }
}


