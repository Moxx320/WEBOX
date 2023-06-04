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
            $table->string('username');
            $table->date('fecha');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->time('tiempo_tolerancia');
            $table->timestamps();
            $table->foreign('equipo_id')->references('id')->on('equipos');
            $table->foreign('username')->references('username')->on('users');
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
