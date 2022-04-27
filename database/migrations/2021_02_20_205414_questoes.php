<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Questoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questoes', function (Blueprint $table){
            $table->integerIncrements('id_questao');
            $table->integer('id_conteudo');
            $table->integer('id_dificuldade');
            $table->string('questao');
            $table->integer('qtd_numeros');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questoes');
    }
}
