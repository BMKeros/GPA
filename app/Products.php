<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['categories_id', 'units_id','name', 'slug', 'brand', 'description','price', 'associated_percentage', 'street_percentage', 'product_limit', 'quantity_available', 'quantity' , 'image'];
}
