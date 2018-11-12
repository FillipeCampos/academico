<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfAvaliacaoFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confAvaliacaoFinal', function (Blueprint $table) {
            $table->increments('id');
            $table->double('peso_nota_final');
            $table->double('peso_nota_regular');
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
        Schema::dropIfExists('confAvaliacaoFinal');
    }
}
