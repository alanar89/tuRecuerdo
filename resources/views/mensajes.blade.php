@extends('layouts.app')
@section('content')
<div class="container ">
<h3 style="text-align: center;">Mensajes</h3>
<div class="row justify-content-center">
<div class="col-8">
<table class="table ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Fecha</th>
       <th scope="col">Mensaje</th>
    </tr>
  </thead>
  <tbody>
  @foreach($datos as $valor)
    <tr>
      <td>{{$valor->nombre}}</td>
       <td>{{$valor->email}}</td>
      <td>{{$valor->fecha}}</td>
      <td>{{$valor->mensaje}}</td>

    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>    
</div>
@endsection