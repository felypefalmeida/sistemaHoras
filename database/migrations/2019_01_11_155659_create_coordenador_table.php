<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordenadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordenador', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf', 100);
            $table->string('nome',100);
            $table->string('email',100);
            $table->string('senha',100);

             $table->integer('usuario_id')->unsigned();
             $table->foreign('usuario_id')->references('id')->on('usuario');  

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
        Schema::dropIfExists('coordenador');
    }
}
