<?php

namespace Helpdesk\Http\Services\Tickets;

use Helpdesk\Ticket;

class TicketSupportRemoveService
{

    /**
     * Remove Ticket
     *
     * @param $id
     * @return bool
     */
    public function remove($id)
    {

        $ticket = Ticket::find($id);

        if ($ticket) {
            return $ticket->delete();
        }

        return false;
    }

}
