<?php
//https://restpatterns.mindtouch.us/HTTP_Status_Codes/422_-_Unprocessable_Entity

$this->name('tickets.open')->get('/tickets/status/open', 'Api\TicketsSupportController@open');
$this->name('tickets.closed')->get('/tickets/status/closed', 'Api\TicketsSupportController@closed');

$this->apiResources([
	'departments' => 'Api\DepartmentsController',
    'tickets' => 'Api\TicketsSupportController',
	'priorities' => 'Api\PrioritiesController',
	'status' => 'Api\StatusController',
]);
