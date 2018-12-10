<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'transDate', 'room_id', 'resident_id' ,'transStatus', 'moveInDate', 'moveOutDate', 'term', 'initialSecDep'
    ];

    public function resident(){
        return $this->belongsTo(Resident::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }
}
