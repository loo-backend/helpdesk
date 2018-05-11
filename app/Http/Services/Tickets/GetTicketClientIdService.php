<?php

namespace Helpdesk\Http\Services\Tickets;


use Helpdesk\Ticket;
use Illuminate\Http\Request;

class GetTicketClientIdService
{

    /**
     * @var Ticket
     */
    private $ticket;

    /**
     * GetAllTicketsStaffService constructor.
     * @param Ticket $ticket
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Return Ticket Specific Client
     *
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function getByIdAndCredentialsOpenTicket($id, Request $request)
    {
        return $this->ticket
            ->where('_id', $id)
            ->where([
                'credentials_open_ticket_client.client_uuid' => $request->get('client_uuid')
            ])->first();
    }

}
