<?php

use Illuminate\Database\Seeder;
use App\Rol;

class RolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $dato = new Rol();
      $dato->tipo="Super Administrator";
      $dato->save();

      $dato = new Rol();
      $dato->tipo="Administrador";
      $dato->save();

      $dato = new Rol();
      $dato->tipo="gestor";
      $dato->save();

      $dato = new Rol();
      $dato->tipo="coordinador";
      $dato->save();

      $dato = new Rol();
      $dato->tipo="reportes";
      $dato->save();

      $dato = new Rol();
      $dato->tipo="cliente";
      $dato->save();

      $dato = new Rol();
      $dato->tipo="visitante";
      $dato->save();


    }
}
