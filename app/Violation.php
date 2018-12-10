<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Violation extends Model
{
    protected $fillable = [
        'dateReported', 'dateCommitted', 'dateFinished', 'reportedBy', 'desc', 'details',
        'fine', 'actionTaken', 'room_id', 'resident_id','name'
    ];

    public function resident(){
        return $this->belongsTo(Resident::class);
    }
}
