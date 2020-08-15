
@extends('layouts.app')
@section('content')
<div class="container justify-content-center ">
<h3 style="text-align: center;">Eventos</h3>

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
      <th scope="col">Evento</th>
      <th scope="col">Fecha</th>
        <th scope="col">Invitados</th>
      <th scope="col">Empleados</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($datos as $valor)
    <tr>
      <th scope="row">{{$valor->nombre}}</th>
      <td>{{$valor->fecha}}</td>
       <td>{{$valor->cantidad_invitados}}</td>
      <td>{{$valor->cantidad_empleados}}</td>
     
		 <td><button  class="btn btn-warning" data-toggle="modal" data-target="#{{$valor->id}}" > asignar tarea </button></td>
	
    </tr>
    @endforeach
  </tbody>
</table>
<button class="btn btn-warning" data-toggle="modal" data-target="#modal4">crear evento</button>
</div>

</div>

</div>
<!-- crear evento-->
  <div class="modal fade" id="modal4" tabindex="-1" role="dialog" 
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
      <div class="modal-body">
      <h4 style="text-align: center;" class="font-weight-bold">Nuevo Evento</h4>
      @if(count($errors)>0)
      <div class="alert alert-danger" role="alert">
      	@foreach($errors->all() as $error)
      	{{$error}}
      	@endforeach
      </div>
      @endif
        <form  action="nuevoEvento" method="POST" name="nevento" role="form">
        {{csrf_field()}}
        		<div class="form-group">
				<label for="nom" class="font-weight-bold">Nombre</label>
					<input class="form-control" type="text"  name="nombre" id="nombre" value="{{old('nombre')}}">
					</div> 
				
					<div class="form-group">
				<label for="fecha" class="font-weight-bold" required>Fecha</label>
					<input class="form-control" type="date"  name="fecha" id="fecha" class="file">
				</div>
				<div class="form-group">
				<label for="titulo" class="font-weight-bold">Servicios</label>
				  <div class="custom-control custom-checkbox">
  					<input class="custom-control-input" id="customCheck1" name=servicios[] type="checkbox" checked  value="coordinacion general">
 					 <label class="custom-control-label" for="customCheck1">Coordinación General
					</label>
					</div>
					<div class="custom-control custom-checkbox">
  					<input class="custom-control-input" id="customCheck2"  name=servicios[] type="checkbox" value="catering">
 					 <label class="custom-control-label" for="customCheck2">Catering</label>
					</div>
					<div class="custom-control custom-checkbox">
  					<input class="custom-control-input" id="customCheck3" name=servicios[] type="checkbox" value="dj">
 					 <label class="custom-control-label" for="customCheck3">Disc Jockey</label>
					</div>
					<div class="custom-control custom-checkbox" >
  					<input class="custom-control-input" id="customCheck4" name=servicios[] type="checkbox" value="barra de cocktails">
 					 <label class="custom-control-label" for="customCheck4">Barra de Cocktails</label>
					</div>
					<div class="custom-control custom-checkbox">
  					<input class="custom-control-input" id="customCheck5" name=servicios[] type="checkbox" value="ambientacion">
 					 <label class="custom-control-label" for="customCheck5">Ambientación</label>
					</div>
					<div class="custom-control custom-checkbox">
  					<input class="custom-control-input" id="customCheck6" name=servicios[] type="checkbox" value="foto y video">
 					 <label class="custom-control-label" for="customCheck6">Foto y Video</label>
					</div>
			     </div>
			     <div class="form-group">
				<label for="canti" class="font-weight-bold">Cantidad de invitados</label>
					<input class="form-control" type="number"  name="cantidad_invitados" id="cantidad_invitados" min="0" value="1" >
				</div>
        		<div class="form-group">
				<label for="cante" class="font-weight-bold">Cantidad de empleados</label>
					<input class="form-control" type="number"  name="cantidad_empleados" id="cantidad_empleados" min="0" value="1">
				</div>
				
				<div class="form-group">
		  <input type="submit" value="Guardar" class="btn btn-warning btn-block" onclick="very()">
		  </div>
		</form>
        </div>
    </div>
  </div>
</div>
 @foreach($datos as $valor)
<!-- asignar empleados-->
 <div class="modal fade" id="{{$valor->id}}" tabindex="-1" role="dialog" 
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header"><h4>{{$valor->nombre}}</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
      <div class="modal-body ">
      
       <form  action="" method="POST" name="nevento" >	
      <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Cantidad</th>
      <th scope="col">Tarea</th>
      <th scope="col">Empleado</th>
    </tr>
  </thead>
  <tbody>
 <?php $j=$valor['cantidad_empleados'];?>
  @for($i=1;$i<=$j;$i++)
        <tr>
        <td>{{$i}}</td>
		<td>
		<div class="form-group">
		<select  class="custom-select" id="tareas" ><option value="cocinero">Cocinero</option><option value="mozo"> Mozo</option><option value="seguridad"> Seguridad</option><option value="dj">Dj</option ><option valeu="barman">Barman</option><option value="recepcionista"> Recepcionista</option></select> 
		</div>
		</td>
        <td>
        <div class="form-group">
		<select  class="custom-select" id="cante" >
		 @foreach($empleados as $emp)
		<option value="{{$emp->nombre.' '.$emp->apellido}}">{{$emp->nombre.' '.$emp->apellido}}</option>
		@endforeach
		</select>
		</div>
		</td>
		</tr>		
		 @endfor
		</tbody>
		</table>
		<div class="form-group">
		  <input type="button" value="Guardar" class="btn btn-warning btn-block" onclick="very()">
		  </div>
		</form>
        </div>
    </div>
  </div>
</div>
@endforeach

@endsection


			
             
             
           
             
         
             
           
             