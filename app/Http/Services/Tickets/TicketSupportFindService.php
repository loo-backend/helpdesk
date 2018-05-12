<?php

namespace Helpdesk\Http\Services\Tickets;


use Helpdesk\Ticket;

class TicketSupportFindService
{

    /**
     * @param $id
     * @return mixed
     */
    public function findBy($id)
    {
        return Ticket::find($id);
    }

}
