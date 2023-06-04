<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('usuario_id')->default(0);
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            
            $table->timestamps();

            $table->foreign('equipo_id')->references('id')->on('equipos');
            // Agrega si tienes una tabla de usuarios
            $table->foreign('usuario_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservas');

        Schema::table('reservas', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id')->change();
        });
        
    }
}
