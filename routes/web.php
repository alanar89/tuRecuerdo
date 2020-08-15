<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','InicioController@inicio');

Route::get('/ingresar','HomeController@login');
/*Route::get('/usuarios/{id}', function ($id) {
    return "usuario:{$id}";
});*/
Route::get('/eventos','InicioController@eventos');
Route::post('/nuevoEvento','InicioController@crearEventos');
Route::get('/tareas/{id}','InicioController@tareas');
Route::get('/empleados','InicioController@empleados');
Route::post('/nuevoEmpleado','InicioController@crearEmpleado');
Route::get('/mensajes','InicioController@contacto');
Route::post('/contacto','InicioController@mensaje');
Route::get('/emplea', function () {
    return view('empleados');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
