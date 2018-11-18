<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigurarAvaliacaoRegular extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confAvaliacaoRegular', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qtd_provas_max');
            $table->integer('qtd_provas_min');
            $table->boolean('peso_modificavel');

    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {    
        Schema::dropIfExists('confAvaliacaoRegular');
    }
}
