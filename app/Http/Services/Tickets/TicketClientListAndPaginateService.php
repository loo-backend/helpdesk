<?php

namespace Helpdesk\Http\Services\Tickets;

use Helpdesk\Ticket;
use Illuminate\Http\Request;

class TicketClientListAndPaginateService
{

    private $select = [
        '_id',
        'subject',
        'description',
        'credentials_open_ticket_client',
        'departament_id',
        'priority_id',
        'status_id',
        'read_departament',
        'read_staff',
        'last_action',
        'answered_at',
        'updated_at',
        'created_at'
    ];

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
     * Return All Ticket
     *
     * @param Request $request
     * @return mixed
     */
    public function all(Request $request)
    {

        return $this->ticket
            ->select($this->select)
            ->where([
                'credentials_open_ticket_client.client_uuid' => $request->get('client_uuid')
            ])
            ->where('active', true)
            ->where('status_id', '!=', 4)
            ->orderBy('answered_at', 'ASC')
            ->orderBy('priority_id', 'ASC')
            ->orderBy('created_at', 'ASC')
            ->paginate();
    }

    /**
     * Return Tickets Open
     *
     * @param Request $request
     * @return mixed
     */
    public function open(Request $request)
    {

        return $this->ticket
            ->select($this->select)
            ->where([
                'credentials_open_ticket_client.client_uuid' => $request->get('client_uuid')
            ])
            ->where('active', true)
            ->where('status_id', '!=', 4)
            ->orderBy('answered_at', 'ASC')
            ->orderBy('priority_id', 'ASC')
            ->orderBy('created_at', 'ASC')
            ->paginate();
    }

    /**
     * Return Tickets Closed
     *
     * @param Request $request
     * @return mixed
     */
    public function closed(Request $request)
    {

        return $this->ticket
            ->select($this->select)
            ->where([
                'credentials_open_ticket_client.client_uuid' => $request->get('client_uuid')
            ])
            ->where('active', true)
            ->where('status_id', '=', 4)
            ->orderBy('answered_at', 'ASC')
            ->orderBy('priority_id', 'ASC')
            ->orderBy('created_at', 'ASC')
            ->paginate();
    }
}
