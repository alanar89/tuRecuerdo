<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
     protected $fillable=['nombre','apellido','telefono','email','password','habilidades'];

     public function eventos()
    {
        return $this->belongsToMany('App\Evento','eventos_usuarios')->withPivot('tarea');
    }

 

}
