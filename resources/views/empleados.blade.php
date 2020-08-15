
@extends('layouts.app')
@section('content')
<div class="container justify-content-center ">
<h3 style="text-align: center;">Empleados</h3>
<div class="row justify-content-center">
<div class="col-8">
@if(Session::has('mensaje'))
  <div class="alert alert-success alert-dismissible fade show" role="alert"  style="text-align: center;">{{Session::get('mensaje')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
@endif    
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Telefono</th>
      <th scope="col">email</th>
       <th scope="col">hablilidades</th>
       <th> </th>
    </tr>
  </thead>
  <tbody>
   @foreach($datos as $valor)
    <tr>
     
      <td>{{$valor->nombre}}</td>
      <td>{{$valor->apellido}}</td>
       <td>{{$valor->telefono}}</td>
        <td>{{$valor->email}}</td>
         <td>{{$valor->habilidades}}</td>

		 <!--td><button  class="btn btn-warning" title="eliminar" value="{{$valor->id}}"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></button></td-->
    </tr>
    <tr>
    @endforeach
  </tbody>
</table>
<button class="btn btn-warning" data-toggle="modal" data-target="#modal4">Alta empleado</button>
</div>

</div>    
</div>

  <div class="modal fade"  id="modal4" tabindex="-1" role="dialog" 
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
      <div class="modal-body">
      <h4 style="text-align: center;" class="font-weight-bold">Alta Empleado</h4>
       @if(count($errors)>0)
      <div class="alert alert-danger" role="alert">
        @foreach($errors->all() as $error)
        {{$error}}
        @endforeach
      </div>
      @endif
        <form class="" action="nuevoEmpleado" method="POST" name="nuevoEmpleado" >
         {{csrf_field()}}
        		<div class="form-group ">
				<label for="nom" class="font-weight-bold">Nombre</label>
					<input class="form-control" type="text"  name="nombre" id="nom"  value="
{{old('nombre')}}">
					<div class="alert alert-danger p-1 text-center" id="imgp" role="alert" style="display: none;"></div> 
				</div>
        <div class="form-group">
        <label for="ape" class="font-weight-bold"> Apellido</label>
          <input class="form-control" type="text"  name="apellido" id="ape" value="
{{old('apellido')}}">
          <div class="alert alert-danger p-1 text-center" id="imgp" role="alert" style="display: none;"></div> 
        </div>
        <div class="form-group">
        <label for="mail " class="font-weight-bold">Email</label>
          <input class="form-control"  type="mail"  name="email" id="mail" class="file" value="
{{old('email')}}">
        </div>
					<div class="form-group">
				<label for="tel" class="font-weight-bold">Telefono</label>
					<input class="form-control"  type="number"  name="telefono" id="tel" class="file"
          value="
{{old('telefono')}}">
				</div>
        <div class="form-group">
        <label for="tel" class="font-weight-bold">Contraseña</label>
          <input class="form-control"  type="password"  name="password" id="tel" class="file">
        </div>
				<div class="form-group">
				<label for="titulo" class="font-weight-bold">Habilidades</label>
				  <div class="custom-control custom-checkbox">
  					<input class="custom-control-input" id="customCheck1" type="checkbox" value="recepcionista" name="habilidades[]" checked>
 					 <label class="custom-control-label" for="customCheck1">Recepcionista
					</label>
					</div>
					<div class="custom-control custom-checkbox">
  					<input class="custom-control-input" id="customCheck2" type="checkbox" value="cocinero" name="habilidades[]">
 					 <label class="custom-control-label" for="customCheck2">Cocinero</label>
					</div>
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" id="customCheck6" type="checkbox" value="mozo" name="habilidades[]">
           <label class="custom-control-label" for="customCheck6">Mozo</label>
          </div>
					<div class="custom-control custom-checkbox">
  					<input class="custom-control-input" id="customCheck3" type="checkbox" value="dj" name="habilidades[]">
 					 <label class="custom-control-label" for="customCheck3">Dj</label>
					</div>
					<div class="custom-control custom-checkbox">
  					<input class="custom-control-input" id="customCheck4" type="checkbox" value="barman" name="habilidades[]">
 					 <label class="custom-control-label" for="customCheck4">Barman</label>
					</div>
					<div class="custom-control custom-checkbox">
  					<input class="custom-control-input" id="customCheck5" type="checkbox" value="seguridad" name="habilidades[]">
 					 <label class="custom-control-label" for="customCheck5">Seguridad</label>
					</div>
					<div class="custom-control custom-checkbox">
  					<input class="custom-control-input" id="customCheck7" type="checkbox" value="foto y video" name="habilidades[]">
 					 <label class="custom-control-label" for="customCheck7">Foto y video</label>
					</div>
			     </div>
        	
				
				<div class="form-group">
		  <input type="submit" value="Guardar" class="btn btn-warning btn-block">
		  </div>
		</form>
        </div>
    </div>
  </div>
</div>

@endsection


			
             
             
           
             
         
             
           
             