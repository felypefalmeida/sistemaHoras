<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricula', 100);
            $table->string('nome',100);
            $table->string('email',100);
            $table->string('senha',100);
            $table->string('situacao',100);

           
             $table->integer('curso_id')->unsigned();
             $table->foreign('curso_id')->references('id')->on('curso'); 

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
        Schema::dropIfExists('aluno');
    }
}
