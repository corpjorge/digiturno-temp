<?php

use Illuminate\Database\Seeder;
use App\Model\Digiturno\Servicio;

class DigiServiciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dato = new Servicio();
      $dato->nombre="Preguntas";
      $dato->sigla="P";
      $dato->categoria_id=1;
      $dato->prioridad_id=1;
      $dato->estado_id=1;
      $dato->save();

      $dato = new Servicio();
      $dato->nombre="Caja";
      $dato->sigla="CJ";
      $dato->categoria_id=2;
      $dato->prioridad_id=1;
      $dato->estado_id=1;
      $dato->save();

      $dato = new Servicio();
      $dato->nombre="Credito";
      $dato->sigla="C";
      $dato->categoria_id=2;
      $dato->prioridad_id=1;
      $dato->estado_id=1;
      $dato->save();


    }
}
