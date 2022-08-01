<?php

namespace Tests\Unit;

use App\Helpers\Constants;
use Tests\TestCase;

class IPAddressCreateTest extends TestCase
{

    /** API URL for registration */
    private string $baseUrl;

    /** Test data for: validation error for incorrect IP address */
    private array $invalidIpData;

    /** Test data for: validation error for incorrect label */
    private array $invalidLabelData;

    /** Test data for: successfully store a new IP address */
    private array $successRequestData;

    /**
     * Pre-set test data before test methods call
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->baseUrl = env('APP_URL') . '/api/ip';

        $this->invalidIpData = [];

        $this->invalidLabelData = [ ];

        $this->successRequestData = [];
    }

    /**
     * Test 1: validation error for incorrect IP address
     * @return void
     */
    public function test_ip_not_validated(): void
    {
        // TODO
    }

    /**
     * Test 2: validation error for incorrect label
     * @return void
     */
    public function test_label_not_validated(): void
    {
        // TODO
    }


    /**
     * Test 3: successfully store a new IP address
     * @return void
     */
    public function test_success(): void
    {
        // TODO
    }
}
