<?php

use Illuminate\Database\Seeder;
use Helpdesk\Ticket;

class TicketCollectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ticket::class, 50)->create();
    }
}
