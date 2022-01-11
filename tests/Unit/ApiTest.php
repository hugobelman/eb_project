<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Services\EasyBrokerApiService;

class ApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_get_properties_api_request_is_valid_and_not_empty() {
        $ebApi = new EasyBrokerApiService;

        $response = $ebApi->getPublishedProperties();

        $this->assertEquals(200, $response['status_code']);
        $properties = $response['body']['content'];
        $this->assertNotEmpty($properties);
    }

    public function test_get_property_api_request_is_valid() {
        $ebApi = new EasyBrokerApiService;

        $response = $ebApi->getPublishedProperties(limit:1);
        $somePropertyId = $response['body']['content'][0]['public_id'];

        $response = $ebApi->getProperty($somePropertyId);
        $this->assertEquals(200, $response['status_code']);
    }

    public function test_post_contact_request_is_valid() {
        $ebApi = new EasyBrokerApiService;

        $response = $ebApi->getPublishedProperties(limit:1);
        $somePropertyId = $response['body']['content'][0]['public_id'];

        $response = $ebApi->postContactRequest([
            'name' => 'Testing',
            'phone' => '462-123-4567',
            'email' => "test@eb.com",
            "property_id" => $somePropertyId,
            "message" => "Esto se puede borrar",
            "source" => "Intern",
        ]);
        
        $this->assertEquals(200, $response['status_code']);
    }
}
