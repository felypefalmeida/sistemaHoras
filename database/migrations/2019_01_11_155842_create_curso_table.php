<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome',100);
            $table->string('horas',100);

            $table->integer('coordenador_id')->unsigned();
            $table->foreign('coordenador_id')->references('id')->on('coordenador'); 

            $table->integer('instituicao_id')->unsigned();
            $table->foreign('instituicao_id')->references('id')->on('instituicao'); 

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
        Schema::dropIfExists('curso');
    }
}
