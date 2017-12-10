<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

	protected $table = 'payment';

    protected $fillable = ['id', 'user_id', 'purchase_request_id', 'payment_method_id','status_id', 'image', 'description', 'quantity', 'reason_rejected'];


	public function user(){
        return $this->belongsTo('App\User');
	}

	public function purchase_request(){
        return $this->belongsTo('App\PurchaseRequest');

	}

	public function status(){
        return $this->belongsTo('App\Status');

	}

	public function payment_method(){
		return $this->belongsTo('App\PaymentMethod');
	}

}
