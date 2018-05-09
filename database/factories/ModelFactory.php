<?php

use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;

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

$factory->define(Helpdesk\Department::class, function (Faker $faker) {

    return [
        'active' => true
    ];

});


$factory->define(Helpdesk\Priority::class, function (Faker $faker) {

    return [
        'active' => true
    ];

});

$factory->define(Helpdesk\Status::class, function (Faker $faker) {

    return [
        'active' => true
    ];

});

function replies(Faker $faker)
{

    $array_data = [];

    for ($i=0; $i < rand(3,10) ; $i++) {

        $reply =  [
            'description'  => implode(' ', $faker->paragraphs),
            'attachments' => [
                'attachment' => rand(1,5),
                'ext' => 'jpg'
            ],
            'credentialsTicketShop' => [
                'staffShopUuid' => $faker->uuid,
                'name' => $faker->name,
                'email' => $faker->email,
            ],
            'credentialsDepartment' => [
                'staffUuid' => $faker->uuid,
                'name' => $faker->name,
                'email' => $faker->email,
            ],
            'ip' => $faker->ipv4,
        ];

        array_push($array_data, $reply);

    }

    return $array_data;
}


$factory->define(Helpdesk\Ticket::class, function (Faker $faker) {


    return [
        '_id' => Uuid::generate(4)->string,
        'credentialsOpenTicketShop' => [
            'shopName' => $faker->company,
            'shopUrl' => $faker->url,
            'shopUuid' => $faker->uuid,
            'staffShopUuid' => $faker->uuid,
        ],
        'subject' => $faker->sentence,
        'description' => implode(' ', $faker->paragraphs),
        'replies' => replies($faker),
        'departamentId' => rand(1,3),
        'priorityId' => rand(1,3),
        'statusId' => rand(1,5),
        'attachments' => [
            'attachment' => rand(1,5),
            'ext' => 'jpg'
        ],
        'active' => rand(0,5) > 0 ? true : false,
        'readDepartament' => rand(0,1),
        'readStaff' => rand(0,1),
        'lastAction' => array_random(['DEPARTAMENT', 'STAFF']),
        'ip' => $faker->ipv4,

    ];

});

// $factory->define(Helpdesk\Ticket::class, function (Faker $faker) {

//     return [
//         '_id' => $faker->uuid,
//         'usuario' => rand(1,3),
//         'produto_id' => function () {
//             return factory(Helpdesk\Produto::class)->create()->id;
//         },
//         'quantidade' => $faker->randomNumber(2)

//     ];

// });
