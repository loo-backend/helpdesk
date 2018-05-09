<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/



$factory->define(Helpdesk\Ticket::class, function (Faker $faker) {


    return [

        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), // secret
        'uuid' => Uuid::generate()->string,
        'roles' => matrizRoles(),

    ];

});

$factory->define(Helpdesk\Produto::class, function (Faker $faker) {

    return [
        '_id' => $faker->uuid,
        'titulo' => $faker->name,
        'fabricante' => $faker->company,
        'preco' => $faker->randomNumber(3)

    ];

});

$factory->define(Helpdesk\Pedido::class, function (Faker $faker) {

    return [
        '_id' => $faker->uuid,
        'usuario' => rand(1,3),
        'produto_id' => function () {
            return factory(Helpdesk\Produto::class)->create()->id;
        },
        'quantidade' => $faker->randomNumber(2)

    ];

});
