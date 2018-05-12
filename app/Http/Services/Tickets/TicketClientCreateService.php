<?php

namespace Helpdesk\Http\Services\Tickets;


use Helpdesk\Ticket;
use Illuminate\Http\Request;

class TicketClientCreateService
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

        $data = [
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
            'departament_id' => $request->input('departament_id'),
            'priority_id' => $request->input('priority_id'),
            'status_id' => $request->input('status_id'),
            'active' => true,
            'read_support' => false,
            'read_client' => true,
            'last_action' => 'client',
            'ip' => $request->ip(),
            'answered_at' => date('Y-d-m H:i:s'),
        ];

        if(!$create = Ticket::create($data) ) {
            return false;
        }

        return $create;
    }
}
