<?php

namespace App;

use Illuminate\Database\Eloquent\Model;




class Profile extends Model
{
   protected $fillable = ['user_id','first_name','second_name','first_surname','second_surname','cedula','number_phone','number_cellphone','hobby'];
   public function user()
    {
        return $this->belongsTo('App\User');
    }
}
