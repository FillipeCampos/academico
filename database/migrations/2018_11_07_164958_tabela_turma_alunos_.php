<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaTurmaAlunos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma_alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turma_id')->unsigned();
            $table->integer('usuario_id')->unsigned();

          
            $table->foreign('turma_id')->references('id')->on('turma');
            $table->foreign('usuario_id')->references('id')->on('usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma_alunos');
    }
}
