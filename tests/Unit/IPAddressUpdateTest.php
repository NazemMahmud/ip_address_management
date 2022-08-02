<?php

namespace Tests\Unit;

use App\Helpers\Constants;
use Tests\TestCase;

class IPAddressUpdateTest extends TestCase
{

    /** API URL for store a new IP address */
    private string $baseUrl;

    /** Authentication token */
    private string $token;

    /** Test data for: validation error for incorrect request data */
    private array $invalidData;


    /** Test data for: successfully store a new IP address */
    private array $successRequestData;

    /**
     * Pre-set test data before test methods call
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjU5NDMxODYzLCJleHAiOjE2NTk0MzU0NjMsIm5iZiI6MTY1OTQzMTg2MywianRpIjoiUXVsODJ0YTgxUTdQV1dtNiIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3IiwicGF5bG9hZCI6eyJpZCI6MSwibmFtZSI6IlVuaXQgVGVzdCBVc2VyIDEifX0.sNV-eKSVwN4L5ZUFF_InnD4b6a3M6UUkM603_vPKg-A';

        $this->baseUrl = env('APP_URL') . '/api/ip';

        $this->invalidData = [
            'label' => ''
        ];

        $this->successRequestData = [
            'label' => 'test.site.1'
        ];
    }

    /**
     * Test 1: If not logged in, will give error
     * @return void
     */
    public function test_token_error(): void
    {
        $response = $this->patchJson($this->baseUrl . '/5', $this->successRequestData);

        $response->assertStatus(403)
            ->assertJsonStructure([
                'error',
                'status'
            ])->assertJsonPath('status', Constants::FAILED)
            ->assertJsonPath('error',  Constants::INVALID_TOKEN);
    }

    /**
     * Test 2: validation error for incorrect data
     * @return void
     */
    public function test_data_not_validated(): void
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->patchJson($this->baseUrl . '/5', $this->invalidData);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'error',
                'status'
            ])->assertJsonPath('status', Constants::FAILED)
            ->assertJsonPath('error', [
                'The label field is required.'
            ]);
    }

    /**
     * Test 3: error if data not exist for that id
     * @return void
     */
    public function test_data_not_exist(): void
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->patchJson($this->baseUrl . '/22', $this->successRequestData);

        $response->assertStatus(400)
            ->assertJsonStructure([
                'error',
                'status'
            ])->assertJsonPath('status', Constants::FAILED)
            ->assertJsonPath('error', Constants::SOMETHING_WENT_WRONG);
    }

    /**
     * Test 4: successfully update an IP address
     * @return void
     */
    public function test_success(): void
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->patchJson($this->baseUrl . '/5', $this->successRequestData);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [ 'message'],
                'status'
            ])->assertJsonPath('status', Constants::SUCCESS)
            ->assertJsonPath('data.message', Constants::UPDATE_SUCCESS);
    }
}
