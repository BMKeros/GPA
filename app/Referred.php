<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Referred extends Model
{
    protected $fillable = ['user_id','name','last_name','phone_number','relationship_id'];

    public function relationship()
    {
        return $this->belongsTo('App\Relationship');
    }
}
