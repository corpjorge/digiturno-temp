<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $dato = new Estado();
      $dato->nombre="Activado";
      $dato->save();

      $dato = new Estado();
      $dato->nombre="Desactivado";
      $dato->save();

    }
}
