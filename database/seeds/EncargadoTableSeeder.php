<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EncargadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('encargados')->insert([
            'empresa_id' => '1',
            'nombre_encargado' => 'Encargado por seeders',
            'numero_celular' => '3223009929',
            'email' => 'Encargado@gmail.com',
            'direccion' => 'Calle 53a',
            'numero_serial' => '09222',
        ]);
    }
}
