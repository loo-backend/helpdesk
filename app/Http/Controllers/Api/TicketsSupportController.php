<?php

namespace Helpdesk\Http\Controllers\Api;

use Helpdesk\Http\Services\Tickets\GetAllTicketSupportService;
use Helpdesk\Http\Services\Tickets\GetTicketIdService;
use Helpdesk\Http\Services\Tickets\RemoveTicketIdService;
use Helpdesk\Http\Services\Tickets\UpdateTicketIdService;
use Illuminate\Http\Request;
use Helpdesk\Http\Controllers\Controller;

class TicketsSupportController extends Controller
{

    /**
     * Display a listing tickets Open.
     *
     * @param GetAllTicketSupportService $service
     * @return \Illuminate\Http\Response
     */
    public function open(GetAllTicketSupportService $service)
    {

        if (!$result = $service->getAllOpen()) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }

    /**
     *  Display a listing tickets Closed.
     *
     * @param GetAllTicketSupportService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function closed(GetAllTicketSupportService $service)
    {

        if (!$result = $service->getAllClosed()) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }


    /**
     * Display a listing of the resource.
     *
     * @param GetAllTicketSupportService $service
     * @return \Illuminate\Http\Response
     */
    public function index(GetAllTicketSupportService $service)
    {

        if (!$result = $service->getAll()) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param GetTicketIdService $service
     * @return \Illuminate\Http\Response
     */
    public function show($id, GetTicketIdService $service)
    {

        if ($result = $service->getById($id)) {
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
     * @param RemoveTicketIdService $removeTicketIdService
     * @param GetTicketIdService $getTicketIdService
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, RemoveTicketIdService $removeTicketIdService,
                                 GetTicketIdService $getTicketIdService)
    {

        if(!$getTicketIdService->getById($id)) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        if (!$ticket = $removeTicketIdService->remove($id)) {
            return response()->json(['error' => 'ticket_not_delete'], 500);
        }

        return response()->json(['response' => $ticket], 200);

    }

}
