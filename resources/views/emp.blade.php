
@extends('layouts.app')
@section('content')
<div class="container ">
<h3 style="text-align: center;">Tareas</h3>
<div class="row justify-content-center">
<div class="col-8">
<table class="table ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Evento</th>
      <th scope="col">Fecha</th>
      <th scope="col">Tarea a realizar</th>
    </tr>
  </thead>
  <tbody>
  @foreach($datos as $valor)
    <tr>
      <th>{{$valor->nombre}}</th>
      <th>{{$valor->fecha}}</th>
      <td>{{$valor->pivot->tarea}}</td>

    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>    
</div>
@endsection