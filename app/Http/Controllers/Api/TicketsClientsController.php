<?php

namespace Helpdesk\Http\Controllers\Api;

use Helpdesk\Http\Services\Tickets\CreateTicketClientService;
use Helpdesk\Http\Services\Tickets\GetAllTicketClientService;
use Helpdesk\Http\Services\Tickets\GetTicketClientIdService;
use Helpdesk\Http\Services\Tickets\GetTicketIdService;
use Helpdesk\Http\Services\Tickets\UpdateTicketIdService;
use Illuminate\Http\Request;
use Helpdesk\Http\Controllers\Controller;

class TicketsClientsController extends Controller
{

    /**
     * Display a listing tickets Open.
     *
     * @param Request $request
     * @param GetAllTicketClientService $service
     * @return \Illuminate\Http\Response
     */
    public function open(Request $request, GetAllTicketClientService $service)
    {

        if (!$result = $service->getAllOpen($request)) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }

    /**
     *  Display a listing tickets Closed.
     *
     * @param Request $request
     * @param GetAllTicketClientService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function closed(Request $request, GetAllTicketClientService $service)
    {

        if (!$result = $service->getAllClosed($request)) {

            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param GetAllTicketClientService $service
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, GetAllTicketClientService $service)
    {

        if (!$result = $service->getAll($request)) {
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
     * @param CreateTicketClientService $service
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request, CreateTicketClientService $service)
    {

        if (!$result = $service->make($request)) {

            return response()->json(['error' => 'ticket_not_created'], 500);
        }

        return response()->json(['response' => $result], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @param Request $request
     * @param GetTicketClientIdService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id, Request $request, GetTicketClientIdService $service)
    {

        if (!$result = $service->getByIdAndCredentialsOpenTicket($id, $request)) {

            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @param UpdateTicketIdService $updateTicketIdService
     * @param GetTicketIdService $getTicketIdService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,
        UpdateTicketIdService $updateTicketIdService,
        GetTicketIdService $getTicketIdService)
    {

        if(!$getTicketIdService->getById($id)) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        if (!$ticket = $updateTicketIdService->update($request, $id)) {
            return response()->json(['error' => 'ticket_not_update'], 500);
        }

        return response()->json(['response' => $ticket], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     */
    public function destroy($id)
    {
        //
    }

}
