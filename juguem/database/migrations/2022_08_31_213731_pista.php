<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pista', function (Blueprint $table) {
            
            $table->engine="InnoDB";
            $table->bigIncrements('id_pista');
            $table->bigInteger('id_localidad')->unsigned();
            $table->bigInteger('id_deporte')->unsigned();
            $table->string('direccion');
            $table->timestamps();

            //Claves Ajenas
            $table->foreign('id_deporte')->references('id_deporte')->on('deporte')->onDelete("cascade");
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
