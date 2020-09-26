<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'nombre_empresa' => 'Empresa de seeders',
            'nit' => '092921',
            'direccion' => 'Calle de prueba',
        ]);
    }
}
