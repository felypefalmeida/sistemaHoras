<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtividadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao', 100);
            $table->string('qtdhoras',100);
            $table->string('situacao',100);
            $table->string('arquivo',100);
           
            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupo');
            
            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')->on('aluno');
           
            $table->integer('curso_id')->unsigned();
            $table->foreign('curso_id')->references('id')->on('curso'); 
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
        Schema::dropIfExists('atividade');
    }
}
