<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=[
      'title',
        'slug',
        'description',
        'imgs',
        'cat_id',
        'brand_id',
        'price',
        'stock',
    ];



}
