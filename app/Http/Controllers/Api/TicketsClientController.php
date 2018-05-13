<?php

namespace Helpdesk\Http\Controllers\Api;

use Helpdesk\Http\Services\Tickets\TicketClientCreateService;
use Helpdesk\Http\Services\Tickets\TicketClientListAndPaginateService;
use Helpdesk\Http\Services\Tickets\TicketClientFindService;
use Helpdesk\Http\Services\Tickets\TicketClientUpdateService;
use Illuminate\Http\Request;
use Helpdesk\Http\Controllers\Controller;

class TicketsClientController extends Controller
{

    /**
     * Display a listing tickets Open.
     *
     * @param Request $request
     * @param TicketClientListAndPaginateService $service
     * @return \Illuminate\Http\Response
     */
    public function open(Request $request, TicketClientListAndPaginateService $service)
    {

        if (!$result = $service->open($request)) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }

    /**
     *  Display a listing tickets Closed.
     *
     * @param Request $request
     * @param TicketClientListAndPaginateService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function closed(Request $request, TicketClientListAndPaginateService $service)
    {

        if (!$result = $service->closed($request)) {

            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param TicketClientListAndPaginateService $service
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TicketClientListAndPaginateService $service)
    {

        if (!$result = $service->all($request)) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param TicketClientCreateService $service
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request, TicketClientCreateService $service)
    {

        if (!$result = $service->create($request)) {

            return response()->json(['error' => 'ticket_not_created'], 500);
        }

        return response()->json(['response' => $result], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @param Request $request
     * @param TicketClientFindService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id, Request $request, TicketClientFindService $service)
    {

        if (!$result = $service->findByAndCredentialsClient($id, $request)) {

            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @param TicketClientUpdateService $ticketClientUpdateService
     * @param TicketClientFindService $ticketClientFindService
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id,
        TicketClientUpdateService $ticketClientUpdateService,
        TicketClientFindService $ticketClientFindService)
    {

        if(!$ticketClientFindService->findBy($id)) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        if (!$ticket = $ticketClientUpdateService->update($request, $id)) {
            return response()->json(['error' => 'ticket_not_update'], 500);
        }

        return response()->json(['response' => $ticket], 200);

    }

}
