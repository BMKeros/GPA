<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
	protected $table = 'inventory';

    protected $fillable = ['product_id', 'status_id', 'slug',
     'quantity_available', 'unit_id' ];

	public function product(){
        return $this->belongsTo('App\Product');

	}
	public function status(){
        return $this->belongsTo('App\Status');

	}
	public function unit(){
        return $this->belongsTo('App\Unit');

	}
}
