<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\UserRol\Models\Rol;
use App\Mail\CorreoSubscriptor;


Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/articulos', 'LibroController')->except(['index', 'create']);

Route::post('/nuevosub', 'EnviarCorreosController@nuevoSubscritor') -> name('nuevosub');

Route::get('/autor/{id}', 'WelcomeController@autores')->name('autores');
Route::get('/dar_permisos', 'WelcomeController@permisos')->name('permisos');
Route::get('/revocar_permisos', 'WelcomeController@revocar')->name('revocar');

Route::post('/nuevacat', 'WelcomeController@nuevacat')->name('nuevacat');

