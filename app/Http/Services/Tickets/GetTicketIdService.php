<?php

namespace Helpdesk\Http\Services\Tickets;


use Helpdesk\Ticket;

class GetTicketIdService
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
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->ticket->find($id);
    }

}