<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
   protected $fillable=['nombre','fecha','cantidad_invitados','cantidad_empleados'];

   
     public function usuarios()
    {
        return $this->belongsToMany('App\Usuario','eventos_usuarios');
    }
}
