<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseRequest extends Model
{
    protected $fillable = ['user_id', 'referred_id','status_id','description'];

	public function user(){
        return $this->belongsTo('App\User');
	}

	public function referred(){
        return $this->belongsTo('App\Referred');
	}

	public function status(){
        return $this->belongsTo('App\Status');
	}

	public function orders(){
		return $this->belongsToMany('App\Order');
	}

	public function status(){
        return $this->belongsTo('App\Status');
	}

	public function get_total_amount(){
		foreach ($this->orders() as $order) {
			# code...
		}
	}
}
