<?php

use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;

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
            'credentials_ticket_client' => [
                'staff_client_uuid' => $faker->uuid,
                'name' => $faker->name,
                'email' => $faker->email,
            ],
            'credentials_department' => [
                'staff_uuid' => $faker->uuid,
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
        'credentials_open_ticket_client' => [
            'client_name' => $faker->company,
            'client_url' => $faker->url,
            'client_uuid' => $faker->uuid,
            'client_staff_uuid' => $faker->uuid,
        ],
        'subject' => $faker->sentence,
        'description' => implode(' ', $faker->paragraphs),
        'replies' => replies($faker),
        'departament_id' => rand(1,3),
        'priority_id' => rand(1,3),
        'status_id' => rand(1,5),
        'attachments' => [
            'attachment' => rand(1,5),
            'ext' => 'jpg'
        ],
        'active' => rand(0,5) > 0 ? true : false,
        'read_departament' => rand(0,1),
        'read_staff' => rand(0,1),
        'last_action' => array_random(['department', 'staff']),
        'ip' => $faker->ipv4,
        'answered_at' => date('Y-d-m H:i:s'),

    ];

});
