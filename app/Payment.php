<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

	protected $table = 'payment';

    protected $fillable = ['id', 'user_id', 'request_id', 'payment_method_id','status_id', 'image', 'description', 'quantity'];


	public function user(){
        return $this->belongsTo('App\User');
	}

	public function request(){
        return $this->belongsTo('App\Request');

	}

	public function status(){
        return $this->belongsTo('App\Status');

	}

	public function payment_method(){
		return $this->belongsTo('App\PaymentMethod');
	}

}
