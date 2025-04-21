<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "items";

    protected $fillable = [
        'category_id',
        'item_name',
        'slug',
        'sale_price',
        'unit',
        'description',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
