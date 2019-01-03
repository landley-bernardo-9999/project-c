<?php

namespace App;

use App\Mail\RoomCreated; //Added
use Illuminate\Support\Facades\Mail; //Added
use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    protected $fillable = [
        'roomNo', 'building', 'project','longTermRent', 'shortTermRent', 'status', 'size', 'capacity'
    ];

    //Hooks and Seesaws
    
    public static function boot(){

        parent::boot();

        static::created(function ($room){
            Mail::to('webmaster@marthaservices.com')->send(
                new RoomCreated($room)
            );
        });
    }

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
