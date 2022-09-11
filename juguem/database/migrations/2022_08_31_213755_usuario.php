<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('usuario', function (Blueprint $table) {
            
            $table->engine="InnoDB";
            $table->increments('id_usuario');
            $table->bigInteger('id_localidad')->unsigned();
            $table->string('nombre');
            $table->string('apellidos');
            $table->timestamps();

            //Claves Ajenas
            $table->foreign('id_localidad')->references('id_localidad')->on('localidad')->onDelete("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
