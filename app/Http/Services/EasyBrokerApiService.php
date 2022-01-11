<?php

namespace App\Http\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class EasyBrokerApiService {

    protected $url;
    protected $headers;

    public function __construct() {
        $this->headers = [
            'X-Authorization' => $_ENV['EB_API_KEY']
        ];

        $this->url = $_ENV['EB_API_URL'];
    }

    public function getPublishedProperties($page = 1, $limit = 20) {
        return $this->getResourceList('properties', [
            'page' => $page,
            'limit' => $limit,
            'search[statuses][]' => 'published'
        ]);
    }

    public function getProperty($id) {
        return $this->getResource('properties', $id);
    }

    public function postContactRequest($data) {
        return $this->postResource('contact_requests', $data);
    }

    // Private

    private function getResourceList($resource, $query) {
        return $this->get($this->url.'/'.$resource, $query);
    }

    private function getResource($resource, $id) {
        return $this->get($this->url.'/'.$resource.'/'.$id);
    }

    private function postResource($resource, $data) {
        return $this->post($this->url.'/'.$resource, $data); 
    }

    private function post($url, $body) {
        try {
            $response = Http::withHeaders($this->headers)->post($url, $body);

            return $this->getFormatedResponse($response);
        } catch (Exception $e) {
            return $this->getFormatedException($e);
        }
    }

    private function get($url, $query = []) {
        try {
            $response = Http::withHeaders($this->headers)->get($url, $query);

            return $this->getFormatedResponse($response);
        } catch (Exception $e) {
            return $this->getFormatedException($e);
        }
    }

    private function getFormatedResponse($response) {
        return [
            'status_code' => $response->getStatusCode(),
            'body' => $response->json()
        ];
    }

    private function getFormatedException($exception) {
        return [
            'status_code' => 500,
            'body' => ['error' => $exception->getMessage()]
        ];
    }
}
