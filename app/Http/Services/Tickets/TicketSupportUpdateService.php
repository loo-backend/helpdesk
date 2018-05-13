<?php

namespace Helpdesk\Http\Services\Tickets;

use Helpdesk\Ticket;
use Illuminate\Http\Request;

class TicketSupportUpdateService
{

    /**
     * @param Request $request
     * @param $id
     * @return bool
     */
    public function update(Request $request, $id)
    {

        $ticket = Ticket::find($id);

        if ($ticket) {

            $request = $request->all();
            $request['answered_at'] = date('Y-m-d H:i:s');

            return $ticket->update($request);
        }

        return false;
    }

}
