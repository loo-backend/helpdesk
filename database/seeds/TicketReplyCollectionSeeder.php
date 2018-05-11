<?php

use Illuminate\Database\Seeder;
use Helpdesk\Ticket;
use Helpdesk\TicketReply;
use Faker\Generator as Faker;

class TicketReplyCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $tickets = Ticket::all();

        foreach ($tickets as $key => $ticket) {

            for ($i=0; $i < rand(3,10) ; $i++) {

                $reply = new TicketReply( $this->replies( $faker ) );
                $reply = $ticket->replies()->save($reply);

            }

        }

    }

    private function replies(Faker $faker)
    {      

        return [
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

    }
}
