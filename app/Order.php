<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['purchase_request_id', 'product_id','status_id','quantity', 'price'];

	public function request(){
        return $this->belongsTo('App\PurchaseRequest');

	}
	public function product(){
        return $this->belongsTo('App\Product');

	}

	public function status(){
        return $this->belongsTo('App\Status');

	}
	public function getPrecioUnitario(){
		return $this->price * $this->quantity;
	}

	public function getPorcentajePrecio(){
		if (\Auth::user()->hasRole('SOCIO')) {
            return ($this->getPrecioUnitario())*($this->product->associated_percentage/100);
        } else {
            return ($this->getPrecioUnitario())*($this->product->street_percentage/100);
        }
	}
}
