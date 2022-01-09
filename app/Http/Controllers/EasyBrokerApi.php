<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class EasyBrokerApi {

    protected $url = "https://api.stagingeb.com/v1";
    protected $headers = [
        'X-Authorization' => 'l7u502p8v46ba3ppgvj5y2aad50lb9'
    ];

    public function getResource($resource, $page = 1)
    {
        $response = Http::withHeaders($this->headers)->get($this->url.'/'.$resource,[
            'page' => $page,
        ]);

        return [
            'status_code' => $response->getStatusCode(),
            'body' => $response->json()
        ];
    }

}