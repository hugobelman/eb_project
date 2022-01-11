<?php

namespace App\Http\Controllers;

use App\Http\Services\EasyBrokerApiService;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    private const PROPERTIES_PER_PAGE = 15;
    private $ebApi;

    function __construct() {
        $this->ebApi = new EasyBrokerApiService;
    }

    public function index(Request $request) {
        $currentPage = $request->query('page', 1);

        $response = $this->ebApi->getPublishedProperties(page:$currentPage, limit:self::PROPERTIES_PER_PAGE);
        $properties = $response['body']['content'];
        
        $pages = intdiv($response['body']['pagination']['total'], self::PROPERTIES_PER_PAGE);
        
        return view('properties.home', [
            'properties' => $properties,
            'pages' => $pages,
            'currentPage' => $currentPage
        ]);
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
