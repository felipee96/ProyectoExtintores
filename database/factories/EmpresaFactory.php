<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        'nombre_empresa' => $faker->text($maxNbChars = 20),
        'nit' => $faker->unixTime($max = 'now'),
        'direccion' => $faker->streetAddress(),
        'numero_contacto' => $faker->phoneNumber(),
    ];
});
