<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDigiServicioCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('digi_servicio_categorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->string('nombre')->nullable();
            $table->string('descripcion')->nullable();      
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
        Schema::dropIfExists('digi_servicio_categorias');
    }
}
