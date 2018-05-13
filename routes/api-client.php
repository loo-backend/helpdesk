<?php

$this->name('tickets.open')->get('/tickets/status/open', 'Api\TicketsClientController@open');
$this->name('tickets.closed')->get('/tickets/status/closed', 'Api\TicketsClientController@closed');
$this->name('tickets.reply')->post('/tickets/reply', 'Api\TicketsClientController@reply');

// $this->apiResources([
//     'tickets' => 'Api\TicketsClientController',
//     //'departments' => 'Api\DepartmentsController',
//     //'priorities' => 'Api\PrioritiesController',
//     //'status' => 'Api\StatusController',
// ]);

Route::resource('tickets', 'Api\TicketsClientController')->except([
    'destroy', 'edit', 'create'
]);
