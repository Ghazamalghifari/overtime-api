<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SettingControllerTest extends TestCase
{
    /**
     * A basic feature test update setting.
     *
     * @return void
     */
    public function test_update_setting()
    {
        $response = $this->patch('/api/v1/settings', [
            'key'   => 'overtime_method',
            'value' => 1,
        ]);

        $response->assertStatus(200);
    }
}
