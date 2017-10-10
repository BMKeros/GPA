<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'product';

    protected $fillable = ['category_id', 'unit_id','name', 'slug', 'brand', 'description','price', 'associated_percentage', 'street_percentage', 'product_limit', 'quantity_available', 'quantity' , 'image'];

	public function category(){
        return $this->belongsTo('App\Category');

	}
	public function unit(){
        return $this->belongsTo('App\Unit');

	}
}

