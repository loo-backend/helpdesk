<?php

namespace Helpdesk\Http\Services\Tickets;

use Helpdesk\Ticket;
use Illuminate\Http\Request;

class TicketClientFindService
{

    /**
     * Return Ticket Specific Client
     *
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function findByAndCredentialsClient($id, Request $request)
    {
        return Ticket::where('_id', $id)
            ->where([
                'credentials_open_ticket_client.client_uuid' => $request->get('client_uuid')
            ])->first();
    }

}
