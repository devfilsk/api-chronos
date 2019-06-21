<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExercicios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exercicios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('uuid')->primary();
            $table->string('descricao');
            $table->integer('quantidade')->default(0);
            $table->integer('acertos')->default(0);
            $table->dateTime('data');
            $table->integer('escopo');
            $table->timestamps();

            $table->uuid('assunto_uuid');
            $table->foreign('assunto_uuid')->references('uuid')->on('assuntos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exercicios');
    }
}
