<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    protected $fillable = [
        'room_id', 'resident_id', 'name', 'dateReported', 'dateStarted',
        'dateFinished','desc', 'endorsedTo','totalCost','status','rating'
    ];

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function resident(){
        return $this->belongsTo(Resident::class);
    }
}
