<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'transDate', 'roomNo_id', 'resident_id' ,'transStatus', 'moveInDate', 'moveOutDate', 'term', 'initialSecDep'
    ];

    public function resident(){
        return $this->belongsTo(Resident::class);
    }
}
