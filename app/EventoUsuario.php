<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoUsuario extends Model
{
  // protected $fillable=['nombre','fecha','cantidad_invitados','cantidad_empleados'];
protected $table='eventos_usuarios';
   
     public function usuario()
    {
        return $this->belongsToMany('App\Usuario','eventos_usuarios','usuario_id');
    }
    public function evento()
    {
        return $this->belongsToMany('App\Evento','eventos_usuarios','evento_id');
    }
}
