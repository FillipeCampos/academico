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

Route::get('/', function () {
    return view('welcome');
});

Route::get('cadastrar', 'Academico_Controller@cadastrar');
Route::get('login', 'Academico_Controller@login');
Route::get('cadastroNota', 'Academico_Controller@cadastrar_avaliacao');
