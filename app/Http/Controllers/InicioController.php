<?php

namespace App\Http\Controllers;
Use App\Evento;
Use App\EventoUsuario;
Use App\Usuario;
Use App\Contacto;
use Illuminate\Session\SessionManager;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarEvento;
use App\Http\Requests\ValidarEmpleado;
use App\Http\Requests\ValidarContacto;
class InicioController extends Controller
{
    public function inicio(){
    	return view('inicio');
    }

    public function tareas($id){
    	$datos=Usuario::find($id)->eventos;
    	//return $datos;

    	return view('emp',compact('datos'));
    }

     public function eventos(){
     	$datos=Evento::all();
     	$empleados=Usuario::all();
     	//$datos=EventoUsuario::with('evento','usuario')->get();
     	//return $datos;
  return view('admin',compact('datos','empleados'));
    }

    public function crearEventos(ValidarEvento $request,SessionManager $sessionManager){

     	//Evento::create($request->all());
     	$evento=new Evento;
     	$evento->nombre=$request->input('nombre');
     	$evento->fecha=$request->input('fecha');
    	$ser=$request->input('servicios');
    	$evento->cantidad_invitados=$request->input('cantidad_invitados');
    	$evento->cantidad_empleados=$request->input('cantidad_empleados');
    	$s=implode(',',$ser);
    	$evento->servicios=$s;
    	$evento->save();
    	$sessionManager->flash('mensaje', 'evento creado exitosamente');
     	return redirect('eventos');
    }

     public function empleados(){
     	$datos=Usuario::all();
    	return view('empleados',compact('datos'));
    }

    public function crearEmpleado(ValidarEmpleado $request,SessionManager $sessionManager){

     	//Evento::create($request->all());
     	$empleado=new Usuario;
     	$empleado->nombre=$request->input('nombre');
     	$empleado->apellido=$request->input('apellido');
     	$empleado->telefono=$request->input('telefono');
     	$empleado->email=$request->input('email');
     	$empleado->password=encrypt($request->input('password'));
    	$ser=$request->input('habilidades');
    	$s=implode(',',$ser);
    	$empleado->habilidades=$s;
    	$empleado->save();
    	$sessionManager->flash('mensaje', 'empleado registrado exitosamente');
     	return redirect('empleados');
    }

     public function contacto(){
     	$datos=Contacto::all();
     	//$datos=Usuario::tareaEvento();
    	return view('mensajes',compact('datos'));
    }

     public function mensaje(ValidarContacto $request){

     	Contacto::create($request->all());
     	
     	return redirect('/');
    }
}
