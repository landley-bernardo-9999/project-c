<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'roomNo', 'building', 'longTermRent', 'shortTermRent', 'status', 'size', 'capacity'
    ];

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

     public function residents(){
         return $this->hasMany(Resident::class);
     }

     public function repairs(){
         return $this->hasMany(Repair::class);
     }

     public function owners(){
        return $this->hasMany(Owner::class);
    }
}
