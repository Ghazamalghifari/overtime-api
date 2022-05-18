<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_employee()
    {
        $response = $this->post('/api/v1/employees', [
            'name'   => 'ramapratama',
            'salary' => '2000000',
        ]);

        $response->assertStatus(200);
    }
}
