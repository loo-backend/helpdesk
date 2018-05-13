<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketsSupportControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUrlApiTicketSupportAll()
    {
        $response = $this->get('/support/tickets');

        $response->assertStatus(200);
    }

    public function testUrlApiTicketSupportStatusOpen()
    {
        $response = $this->get('/support/tickets/status/open');

        $response->assertStatus(200);
    }

    public function testUrlApiTicketSupportStatusClosed()
    {
        $response = $this->get('/support/tickets/status/closed');

        $response->assertStatus(200);
    }
}
