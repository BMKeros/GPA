<?php

namespace App;

use Illuminate\Database\Eloquent\Model;




class Profile extends Model
{
   protected $fillable = ['primer_nombre','segundo_nombre','primer_apellido','segundo_apellido','cedula','numero_telefono','numero_celular','hobby'];
}
