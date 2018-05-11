<?php

namespace Helpdesk\Http\Services\Tickets;


use Helpdesk\Ticket;
use Illuminate\Http\Request;

class CreateTicketClientService
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
     * Create Ticket Client
     *
     * @param Request $request
     * @return bool
     * @throws \Exception
     */
    public function make(Request $request)
    {

        $data = [
//            'credentials_open_ticket_client' => [
//                'client_name' => $faker->company,
//                'client_url' => $faker->url,
//                'client_uuid' => $faker->uuid,
//                'client_staff_uuid' => $faker->uuid,
//            ],
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
            'departament_id' => $request->input('departament_id'),
            'priority_id' => $request->input('priority_id'),
            'status_id' => $request->input('status_id'),
//            'attachments' => [
//                'attachment' => rand(1,5),
//                'ext' => 'jpg'
//            ],
            'active' => true,
            'read_support' => false,
            'read_client' => true,
            'last_action' => 'client',
            'ip' => $request->ip(),
            'answered_at' => date('Y-d-m H:i:s'),

        ];


        if(!$create = $this->ticket->create($data) ) {
            return false;
        }

        return $create;
    }
}
