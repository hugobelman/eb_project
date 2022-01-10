<?php

namespace App\Http\Controllers;

use App\Http\Services\EasyBrokerApiService;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    private $ebApi;

    function __construct() {
        $this->ebApi = new EasyBrokerApiService;
    }

    public function index() {
        $response = $this->ebApi->getPublishedProperties(limit:15);
        $properties = $response['body']['content'];

        return view('properties.home', ['properties' => $properties]);
    }

    public function show($id) {
        $response = $this->ebApi->getProperty($id);
        $statusCode = $response['status_code'];

        if ($statusCode != 200) abort($statusCode);

        $property = $response['body'];
        return view('properties.property', ['property' => $property]);
    }

    public function store(Request $request) {
        $data = (array) $request->all();
        unset($data['_token']);
        $response = $this->ebApi->postContactRequest($data);

        $status = $response['status_code'] == 200 ? 'success' : 'danger'; 
        $request->session()->flash('status', $status);
        return redirect()->route('property', $data['property_id']);
    }
}
