<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TabelaNotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('nota');
            $table->integer('turma_aluno_id')->unsigned(); 
            $table->integer('avaliacao_id')->unsigned(); 
            $table->timestamps();

            $table->foreign('turma_aluno_id')->references('id')->on('turma_alunos');
            $table->foreign('avaliacao_id')->references('id')->on('avaliacao');


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
