<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionaCampoQtdAvaliacaoVar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('confAvaliacaoRegular', function($table) { 
            $table->boolean('qtd_avaliacao_variavel');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('confAvaliacaoRegular', function($table) { 
            $table->dropColumn('qtd_avaliacao_variavel');
        });    
    }
}
