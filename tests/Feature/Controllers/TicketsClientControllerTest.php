<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketsClientControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUrlApiTicketClientAll()
    {
        $response = $this->get('/clients/tickets');

        $response->assertStatus(200);
    }

    public function testUrlApiTicketClientStatusOpen()
    {
        $response = $this->get('/clients/tickets/status/open');

        $response->assertStatus(200);
    }

    public function testUrlApiTicketClientStatusClosed()
    {
        $response = $this->get('/clients/tickets/status/closed');

        $response->assertStatus(200);
    }
}
