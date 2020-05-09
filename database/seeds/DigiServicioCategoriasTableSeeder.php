<?php

use Illuminate\Database\Seeder;
use App\Model\Digiturno\ServicioCategoria;

class DigiServicioCategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dato = new ServicioCategoria();
      $dato->estado_id=1;
      $dato->nombre="Servicio";
      $dato->descripcion="Consulte los servicios disponibles";
      $dato->save();

      $dato = new ServicioCategoria();
      $dato->estado_id=1;
      $dato->nombre="Pagos";
      $dato->descripcion="Realiza tus pagos";
      $dato->save();

      $dato = new ServicioCategoria();
      $dato->estado_id=1;
      $dato->nombre="Solicitudes";
      $dato->descripcion="Solicita un crédito";
      $dato->save();

    }
}
