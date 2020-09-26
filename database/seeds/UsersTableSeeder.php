<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'nombre' => 'Admin Admin',
            'apellido' => 'apellido apellido',
            'cargo' => 'tecnico',
            'email' => 'admin@material.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'nombre' => 'Hector fabio',
            'apellido' => 'Tamayo',
            'cargo' => 'tecnico',
            'email' => 'hf@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
