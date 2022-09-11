<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Partida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('partida', function (Blueprint $table) {
            
            $table->engine="InnoDB";
            $table->increments('id_partida');
            $table->bigInteger('id_pista')->unsigned();
            $table->string('fecha_partida');
            $table->timestamps();




            /* 
            $table->engine="InnoDB";
            $table->bigIncrements('id_partida');
            $table->bigInteger('id_pista')->unsigned();
            $table->string('fecha_partida');
            $table->timestamps();
            */

            //Claves Ajenas
            $table->foreign('id_pista')->references('id_pista')->on('pista')->onDelete("cascade");
            
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
