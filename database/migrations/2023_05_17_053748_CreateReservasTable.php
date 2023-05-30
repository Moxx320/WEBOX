<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->increments('folio');
            $table->string('username')->unique();
            $table->time('tiempo_tolerancia');
            $table->tinyInteger('cancelacion');
            $table->time('inicio_apartado');
            $table->time('fin_apartado');
            $table->date('fecha');
            $table->char('estatus', 2)->default('DI');
            $table->timestamps();
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
    }
}
