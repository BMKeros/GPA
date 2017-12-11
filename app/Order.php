<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['purchase_request_id', 'product_id', 'status_id', 'quantity', 'price'];

    public function purchase_request()
    {
        return $this->belongsTo('App\PurchaseRequest');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    public function get_unit_price()
    {
        return $this->price * $this->quantity;
    }

    public function get_percentage_unit_price()
    {
        if (\Auth::user()->hasRole('SOCIO')) {
            return ($this->get_unit_price() * ($this->product->get_associated_percentage()));
        } else {
            return ($this->get_unit_price() * ($this->product->get_street_percentage()));
        }
    }
}
