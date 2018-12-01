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
Route::get('logar', 'Academico_Controller@login');
Route::get('cadastroNota', 'Academico_Controller@cadastrar_avaliacao');

Route::prefix('funcionario')->group(function () {
    Route::get('','funcionarioController@index')->name('funcionario');
    Route::prefix('/configuracao')->group(function(){
        Route::post('avaliacaoRegular/salvar', 'funcionarioController@saveConfiguracaoAvalRegular')->name('saveAvalRegularConf');
        Route::post('avaliacaoRegularFixa/salvar','funcionarioController@saveConfiguracaoAvalRegularFixa')->name('saveAvalRegularConfFixa');
        Route::post('avaliacaoFinal/salvar', 'funcionarioController@saveConfiguracaoAvalFinal')->name('saveAvalFinalConf');
    });
    Route::post('Disciplinas/Add','funcionarioController@addDisciplina')->name('addDisciplina');
    Route::get('Disciplinas/Del/{id}','funcionarioController@delDisciplina')->name('delDisciplina');
});
Route::get('professor', 'Professor@index');
Route::get('gerenciarTurmas/{id}', 'Professor@gerenciarTurma');
Route::get('listarDisiciplinas', 'Professor@listarDisciplinas');
Route::get('planoEnsino', 'Professor@definirPlanoEnsino');
