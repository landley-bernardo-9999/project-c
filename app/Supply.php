<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = [
        'category', 'brand', 'desc', 'serialNumber', 'stock'
    ];
}
