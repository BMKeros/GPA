<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referred extends Model
{
    protected $fillable = ['user_id','name','last_name','telephone_number','relationship'];
}