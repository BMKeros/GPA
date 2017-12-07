<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['request_id', 'product_id','status_id','quantity', 'price'];

	public function request(){
        return $this->belongsTo('App\Request');

	}
	public function product(){
        return $this->belongsTo('App\Product');

	}

	public function status(){
        return $this->belongsTo('App\Status');

	}
}
