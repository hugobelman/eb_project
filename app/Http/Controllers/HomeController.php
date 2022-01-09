<?php

namespace App\Http\Controllers;

use App\Http\Controllers\EasyBrokerApi;

class HomeController extends Controller
{
    private $ebApi;

    function __construct() {
        $this->ebApi = new EasyBrokerApi;
    }

    public function index()
    {
        $response = $this->ebApi->getResource("properties");
        $properties = $response['body']['content'];

        // Published properties

        return view('home.home',['properties' => $properties]);
    }
}
