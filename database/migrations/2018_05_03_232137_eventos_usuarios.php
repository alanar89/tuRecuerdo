<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventosUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos_usuarios', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('evento_id')->unsigned();
              $table->foreign('evento_id')->references('id')->on('eventos');
               $table->integer('usuario_id')->unsigned();
              $table->foreign('usuario_id')->references('id')->on('usuarios');
              $table->string('tarea');
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
        Schema::dropIfExists('eventos_usuarios');
    }
}
