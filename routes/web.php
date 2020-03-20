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

Route::get('/','MessagesController@DiezNuevos');


Route::get('/acerca', function () {
    return view('acerca');
});

Route::get('/categorias', function () {
    return view('categorias');
});

//mostrar todos los mensajes grabados
Route::get('/mensajes','MessagesController@verMensaje');

//mostrar detalles del mensaje seleccionado
Route::get('/mensaje_post/{id}','MessagesController@verDetalles');

//mostrar mensajes por compania
Route::get('/compania_post/{compania}','MessagesController@porCompania');

//llama a formulario y llama a funcion para popular drop list
Route::get('dilo','CallCategoriesController@verCategorias');

//grabar mensaje
Route::post('mensajes/enviar','MessagesController@GrabarPost');
