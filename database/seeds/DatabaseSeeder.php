<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([RolTableSeeder::class]);
      $this->call([EstadosTableSeeder::class]);
      $this->call([PrioridadesTableSeeder::class]);
      $this->call([UsersTableSeeder::class]);
      $this->call([DigiServicioCategoriasTableSeeder::class]);
      $this->call([DigiServiciosTableSeeder::class]);





    }
}
