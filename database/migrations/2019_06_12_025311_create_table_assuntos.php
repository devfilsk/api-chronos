<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAssuntos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assuntos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('uuid')->primary();
            $table->string('descricao');
            $table->string('anotacao');
            $table->timestamps();

            // foreing key to disciplina
            $table->uuid('user_uuid');
            $table->uuid('disciplina_uuid');
            $table->foreign('user_uuid')->references('uuid')->on('users');
            $table->foreign('disciplina_uuid')->references('uuid')->on('disciplinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assuntos');
    }
}
