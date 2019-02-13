<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if ( Schema::hasTable('usuario') ){

        }else{
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login', 100)->unique();
            $table->string('senha',100);
            $table->boolean('nivelAcesso',100);  
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
