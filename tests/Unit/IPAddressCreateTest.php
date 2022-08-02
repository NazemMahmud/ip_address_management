<?php

namespace Tests\Unit;

use App\Helpers\Constants;
use Tests\TestCase;

class IPAddressCreateTest extends TestCase
{

    /** API URL for registration */
    private string $baseUrl;

    private string $token;

    /** Test data for: validation error for incorrect IP address */
    private array $invalidIpData;

    /** Test data for: validation error for incorrect label */
    private array $invalidLabelData;

    /** Test data for: validation error for multiple incorrect data */
    private array $invalidMultipleData;

    /** Test data for: successfully store a new IP address */
    private array $successRequestData;

    /**
     * Pre-set test data before test methods call
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjU5NDAwMjA1LCJleHAiOjE2NTk0MDM4MDUsIm5iZiI6MTY1OTQwMDIwNSwianRpIjoicFVxYUtJZXFsdjFiZWJYQyIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3IiwicGF5bG9hZCI6eyJpZCI6MSwibmFtZSI6IlVuaXQgVGVzdCBVc2VyIDEifX0.85t5MacEnIqpimbRQ-jnBO-xoh7XtafvYKI7ASmMuEw';

        $this->baseUrl = env('APP_URL') . '/api/ip';

        $this->invalidIpData = [
            'ip' => '202.92.249',
            'label' => 'Test IP 1'
        ];

        $this->invalidLabelData = [
            'ip' => '202.92.249.111',
            'label' => ''
        ];

        $this->invalidMultipleData = [
            'ip' => '',
            'label' => ''
        ];

        $this->successRequestData = [
            'ip' => '202.92.249.111',
            'label' => 'Test IP 1'
        ];
    }

    /**
     * Test 1: validation error for incorrect IP address
     * @return void
     */
    public function test_ip_not_validated(): void
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->postJson($this->baseUrl, $this->invalidIpData);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'error',
                'status'
            ])->assertJsonPath('status', Constants::FAILED)
            ->assertJsonPath('error', [
                'The ip must be a valid IP address.'
            ]);
    }

    /**
     * Test 2: validation error for incorrect label
     * @return void
     */
    public function test_label_not_validated(): void
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->postJson($this->baseUrl, $this->invalidLabelData);

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
     * Test 3: validation error for incorrect label
     * @return void
     */
    public function test_multi_validation_error(): void
    {

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->postJson($this->baseUrl, $this->invalidMultipleData);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'error',
                'status'
            ])->assertJsonPath('status', Constants::FAILED)
            ->assertJsonPath('error', [
                'The ip field is required.',
                'The label field is required.'
            ]);
    }

    /**
     * Test 4: successfully store a new IP address
     * @return void
     */
    public function test_success(): void
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->postJson($this->baseUrl, $this->successRequestData);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [ 'id', 'ip', 'label', 'created_at'],
                'status'
            ])->assertJsonPath('status', Constants::SUCCESS)
            ->assertJsonPath('data.ip', $this->successRequestData['ip'])
            ->assertJsonPath('data.label', $this->successRequestData['label']);
    }

    /**
     * Test 5: duplicate email error test
     * @return void
     */
    public function test_duplicate_email_error(): void
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->postJson($this->baseUrl, $this->successRequestData);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'error',
                'status'
            ])->assertJsonPath('status', Constants::FAILED)
            ->assertJsonPath('error', [
                "The ip has already been taken."
            ]);
    }
}
