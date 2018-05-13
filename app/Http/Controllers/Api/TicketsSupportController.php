<?php

namespace Helpdesk\Http\Controllers\Api;

use Helpdesk\Http\Services\Tickets\TicketSupportListAndPaginateService;
use Helpdesk\Http\Services\Tickets\TicketSupportFindService;
use Helpdesk\Http\Services\Tickets\TicketSupportRemoveService;
use Helpdesk\Http\Services\Tickets\TicketSupportUpdateService;
use Illuminate\Http\Request;
use Helpdesk\Http\Controllers\Controller;

class TicketsSupportController extends Controller
{

    /**
     * Display a listing tickets Open.
     *
     * @param TicketSupportListAndPaginateService $service
     * @return \Illuminate\Http\Response
     */
    public function open(TicketSupportListAndPaginateService $service)
    {

        if (!$result = $service->open()) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }

    /**
     *  Display a listing tickets Closed.
     *
     * @param TicketSupportListAndPaginateService $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function closed(TicketSupportListAndPaginateService $service)
    {

        if (!$result = $service->closed()) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }


    /**
     * Display a listing of the resource.
     *
     * @param TicketSupportListAndPaginateService $service
     * @return \Illuminate\Http\Response
     */
    public function index(TicketSupportListAndPaginateService $service)
    {

        if (!$result = $service->all()) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param TicketSupportFindService $service
     * @return \Illuminate\Http\Response
     */
    public function show($id, TicketSupportFindService $service)
    {

        if (!$result = $service->findBy($id)) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        return response()->json($result, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @param TicketSupportUpdateService $ticketSupportUpdateService
     * @param TicketSupportFindService $ticketSupportFindService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,
        TicketSupportUpdateService $ticketSupportUpdateService,
        TicketSupportFindService $ticketSupportFindService)
    {

        if(!$ticketSupportFindService->findBy($id)) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        if (!$ticket = $ticketSupportUpdateService->update($request, $id)) {
            return response()->json(['error' => 'ticket_not_update'], 500);
        }

        return response()->json(['response' => $ticket], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param TicketSupportRemoveService $ticketSupportRemoveService
     * @param TicketSupportFindService $ticketSupportFindService
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id, TicketSupportRemoveService $ticketSupportRemoveService,
                                 TicketSupportFindService $ticketSupportFindService)
    {

        if(!$ticketSupportFindService->findBy($id)) {
            return response()->json(['error' => 'ticket_not_found'], 422);
        }

        if (!$ticket = $ticketSupportRemoveService->remove($id)) {
            return response()->json(['error' => 'ticket_not_delete'], 500);
        }

        return response()->json(['response' => $ticket], 200);

    }

}
