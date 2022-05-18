<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OvertimeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_overtime()
    {
        $response = $this->post('/api/v1/overtimes', [
            'employee_id'   => '1',
            'date' => '2022-05-20',
            'time_started' => '15:00',
            'time_ended' => '17:00',
        ]);

        $response->assertStatus(200);
    }
}
