<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PartidaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('partida_usuario', function (Blueprint $table) {
            
            /* 
            $table->engine="InnoDB";
            $table->bigIncrements('id_partida')->unsigned();
            $table->bigInteger('id_usuario')->unsigned();
            $table->timestamps();

            //Claves Ajenas
            $table->foreign('id_partida')->references('id_partida')->on('partida')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('id_usuario')->references('id_usuario')->on('usuario')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['id_partida','id_usuario']);
            */


            $table->integer('id_partida')->unsigned();
            $table->integer('id_usuario')->unsigned();
        
            $table->foreign('id_partida')->references('id_partida')->on('partida')
                        ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuario')
                        ->onUpdate('cascade')->onDelete('cascade');
        
            $table->primary(['id_partida', 'id_usuario']);


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
