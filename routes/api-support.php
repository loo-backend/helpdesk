<?php
//https://restpatterns.mindtouch.us/HTTP_Status_Codes/422_-_Unprocessable_Entity

$this->name('tickets.open')->get('/tickets/status/open', 'Api\TicketsSupportController@open');
$this->name('tickets.closed')->get('/tickets/status/closed', 'Api\TicketsSupportController@closed');


Route::resource('tickets', 'Api\TicketsSupportController')->except([
    'create', 'edit', 'store'
]);
