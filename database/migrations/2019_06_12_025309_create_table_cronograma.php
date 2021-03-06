<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCronograma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronogramas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('uuid')->primary();
            $table->string('titulo');
            $table->string('descricao');
            $table->dateTime('inicio');
            $table->dateTime('fim');
            $table->boolean('synced')->default(false);
            $table->timestamps();

            $table->uuid('user_uuid');
            $table->foreign('user_uuid')->references('uuid')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cronogramas');
    }
}
