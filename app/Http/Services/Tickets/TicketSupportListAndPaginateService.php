<?php

namespace Helpdesk\Http\Services\Tickets;

use Helpdesk\Ticket;

class TicketSupportListAndPaginateService
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
     *  Return All Ticket
     *
     * @return mixed
     */
    public function all()
    {

        return $this->ticket
            ->select($this->select)
            ->where('active', true)
            ->where('status_id', '!=', 4)
            ->orderBy('answered_at', 'ASC')
            ->orderBy('priority_id', 'ASC')
            ->orderBy('created_at', 'ASC')
            ->paginate();
    }

    /**
     * Return Ticket Open
     *
     * @return mixed
     */
    public function open()
    {

        return $this->ticket
            ->select($this->select)
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
     * @return mixed
     */
    public function closed()
    {

        return $this->ticket
            ->select($this->select)
            ->where('active', true)
            ->where('status_id', '=', 4)
            ->orderBy('answered_at', 'ASC')
            ->orderBy('priority_id', 'ASC')
            ->orderBy('created_at', 'ASC')
            ->paginate();
    }

}
