<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    protected $fillable = [
        'category_name',
        'category_thumbnail',
        'publication_status',
    ];

    public function items(){
        return $this->hasMany(Item::class);
    }

}
