<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
        'customer_id',
        'item_id',
        'sale_price',
        'unit',
        'status',
    ];

    function customerDetail(){
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }

    function itemDetail(){
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
