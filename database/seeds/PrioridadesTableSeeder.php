<?php

use Illuminate\Database\Seeder;
use App\Prioridades;
class PrioridadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dato = new Prioridades();
      $dato->prioridad='Prioritario';
      $dato->save();

      $dato = new Prioridades();
      $dato->prioridad='Alta';
      $dato->save();

      $dato = new Prioridades();
      $dato->prioridad='Media';
      $dato->save();

      $dato = new Prioridades();
      $dato->prioridad='Baja';
      $dato->save();      

    }
}
