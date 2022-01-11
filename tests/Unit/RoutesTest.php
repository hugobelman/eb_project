<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Services\EasyBrokerApiService;

class RoutesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_properties_page_working()
    {
        $response = $this->call('GET', 'properties');
        $this->assertEquals(200, $response->status());
    }

    public function test_redirect_home_to_properties_working() {
        $this->call('GET', '/')->assertRedirect('properties');
    }

    public function test_property_page_working() {
        $ebApi = new EasyBrokerApiService;

        $response = $ebApi->getPublishedProperties(limit:1);
        $somePropertyId = $response['body']['content'][0]['public_id'];

        $response = $this->call('GET', 'properties/'.$somePropertyId);
        $this->assertEquals(200, $response->status());
    }
}
