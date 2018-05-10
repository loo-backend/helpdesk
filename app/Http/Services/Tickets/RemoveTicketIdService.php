<?php

namespace Helpdesk\Http\Services\Tickets;


use Helpdesk\Ticket;

class RemoveTicketIdService
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

    public function remove($id)
    {

        $ticket = $this->ticket->find($id);

        if ($ticket) {
            return $ticket->delete();
        }

        return false;
    }
}