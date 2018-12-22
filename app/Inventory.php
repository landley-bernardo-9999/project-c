<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
        'inventory_date', 'inventory_roomId', 'inventory_residentId', 'furn', 'category', 'category', 'moveInInventory', 'moveInRemarks', 'moveOutInventory','moveOutRemarks'
    ];
}
