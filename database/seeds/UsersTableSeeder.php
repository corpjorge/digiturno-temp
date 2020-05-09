<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'john.moreno@fyclsingenieria.com',
            'email_verified_at' => now(),
            'password' => Hash::make('111111'),
            'rol_id' => 1,
            'estado_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Guzman',
            'email' => 'corpjorge@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('111111'),
            'rol_id' => 6,
            'estado_id' => 1,
            'documento' => 1014205146,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'name' => 'Peralta',
            'email' => 'corpjorge@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('111111'),
            'rol_id' => 7,
            'estado_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
