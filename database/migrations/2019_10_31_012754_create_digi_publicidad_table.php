<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDigiPublicidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digi_publicidad', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->dateTime('fecha_cierre')->index()->nullable();
            $table->string('titulo');
            $table->string('img');
            $table->string('Descripcion');
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
        Schema::dropIfExists('digi_publicidad');
    }
}
