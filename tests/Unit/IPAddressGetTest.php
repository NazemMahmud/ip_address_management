<?php

namespace Tests\Unit;

use App\Helpers\Constants;
use Tests\TestCase;

class IPAddressGetTest extends TestCase
{
    /** API URL for IP address index route */
    private string $baseUrl;

    /** Authentication token */
    private string $token;

    public function setUp(): void
    {
        parent::setUp();
        $this->token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjU5NDIxNTA4LCJleHAiOjE2NTk0MjUxMDgsIm5iZiI6MTY1OTQyMTUwOCwianRpIjoiSzFqWDJ6VjlZZU8xRk1DWCIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3IiwicGF5bG9hZCI6eyJpZCI6MSwibmFtZSI6IlVuaXQgVGVzdCBVc2VyIDEifX0.w9qj5Wcz5v9iT1_xlAjoEtem121xuejkX9Qnx3E9NbU';

        $this->baseUrl = env('APP_URL') . '/api/ip';

    }

    /**************************************** GET All / Paginated: api/ip  ***********************************/

    /**
     * Test 1: If not logged in, will give error
     * @return void
     */
    public function test_token_error(): void
    {
        $response = $this->get($this->baseUrl);

        $response->assertStatus(403)
            ->assertJsonStructure([
                'error',
                'status'
            ])->assertJsonPath('status', Constants::FAILED)
            ->assertJsonPath('error', Constants::INVALID_TOKEN);
    }

    /**
     * Test 2: get all
     * @return void
     */
    public function test_get_all(): void
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->get($this->baseUrl);
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'ip', 'label', 'created_at']
                ],
                'status'
            ])->assertJsonPath('status', Constants::SUCCESS);
    }

    /**
     * Test 3: get paginated: will get latest <=10 data
     * @return void
     */
    public function test_get_paginated(): void
    {
        $offset = 10;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->get($this->baseUrl . '?pageOffset=' . $offset);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'ip', 'label', 'created_at']
                ],
                'status',
                'links' => ['first', 'last', 'prev', 'next']
            ])->assertJsonPath('status', Constants::SUCCESS);
    }

    /************************ GET single row data: api/ip/{id}  *********************/
    /**
     * Test 4: get single IP address from DB using an id: Correct
     * @return void
     */
    public function test_get_single_data_success(): void
    {
        // you have to store at least 2 data in the DB for this
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->get($this->baseUrl . '/2');
        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => ['id', 'ip', 'label', 'created_at'],
                'status'
            ])->assertJsonPath('status', Constants::SUCCESS);
    }

    /**
     * Test 5: get single IP address from DB using an id: Not found / exist in DB
     * @return void
     */
    public function test_get_single_data_not_found(): void
    {
        // you have to store less than 22 data in the DB for this
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->get($this->baseUrl . '/22');
        $response->assertStatus(404)
            ->assertJsonStructure([
                'error',
                'status'
            ])->assertJsonPath('status', Constants::FAILED)
            ->assertJsonPath('error', Constants::NOT_FOUND);
    }
}
