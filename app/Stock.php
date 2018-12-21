<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable=[
        'stock_date', 'supply_id', 'stock_category', 'stock_brand', 'stock_desc', 'stock_serialNumber', 'stock_qty', 'stock_action'
    ];
}
