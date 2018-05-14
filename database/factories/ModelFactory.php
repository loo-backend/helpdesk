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

$factory->define(Helpdesk\Ticket::class, function (Faker $faker) {

    $img = rand(0,5);

    return [
        'submitted_by' => array_random(['support', 'client']),
        'credentials' => [
            'client_name' => $faker->company,
            'client_url' => $faker->url,
            'client_uuid' => $faker->uuid,
            'client_staff_uuid' => $faker->uuid,
        ],
        'subject' => $faker->sentence,
        'description' => implode(' ', $faker->paragraphs),
        'attachments' => [
            'attachment' => $img > 0 ? $img : '',
            'ext' => $img > 0 ? 'jpg' : ''
        ],
        'departament_id' => rand(1,3),
        'priority_id' => rand(1,3),
        'status_id' => rand(1,5),
        'active' => rand(0,5) > 0 ? true : false,
        'read_support' => rand(0,1),
        'read_client' => rand(0,1),
        'ip' => $faker->ipv4,
        'answered_at' => date('Y-d-m H:i:s'),

    ];

});
