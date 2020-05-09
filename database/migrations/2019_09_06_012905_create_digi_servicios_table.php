<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDigiServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digi_servicios', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->biginteger('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('digi_servicio_categorias');
            $table->biginteger('prioridad_id')->unsigned();
            $table->foreign('prioridad_id')->references('id')->on('prioridades');
            $table->biginteger('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->string('nombre')->nullable();
            $table->string('sigla')->nullable();
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
        Schema::dropIfExists('digi_servicios');
    }
}
