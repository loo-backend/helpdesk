<?php

namespace Helpdesk\Http\Services\Tickets;

use Helpdesk\CredentialsOpenTicket;
use Helpdesk\Ticket;
use Illuminate\Http\Request;

use Faker\Generator as Faker;

class TicketClientCreateReplyService
{

    /**
     * Create Ticket Client
     *
     * @param Request $request
     * @return bool
     * @throws \Exception
     */

    public function create(Request $request)
    {

        $ticket = Ticket::find($request->input('_id'));

        if (!$create = $ticket->credentials()->create($request->all())) {
            return false;
        }

        return $create;
    }


    private function credentials() {

        return [
            'credentials' => [
                'client_name' => '$faker->company',
                'client_url' => '$faker->url',
                'client_uuid' => '$faker->uuid',
                'client_staff_uuid' => '$faker->uuid',
            ]
        ];

    }

}
