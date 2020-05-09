<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigiTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digi_turnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->biginteger('servicio_id')->unsigned();
            $table->foreign('servicio_id')->references('id')->on('digi_servicios');
            $table->biginteger('modulo_id')->unsigned()->nullable();
            $table->foreign('modulo_id')->references('id')->on('digi_modulos');
            $table->string('numero')->nullable();
            $table->dateTime('fecha_solicitud')->index()->nullable();            
            $table->dateTime('fecha_atencion')->index()->nullable();            
            $table->dateTime('fecha_cierre')->index()->nullable();
            $table->string('estado')->nullable();            
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
        Schema::dropIfExists('digi_turnos');
    }
}
