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

        return $this->getPropertiesView($response);
    }

    public function show($id) {
        $response = $this->ebApi->getProperty($id);
        $statusCode = $response['status_code'];

        if ($statusCode != 200) abort($statusCode);

        return $this->getPropertyView($response);
    }

    public function store(Request $request) {
        $data = $this->getContactRequestData($request);
        $propertyId = $data['property_id'];

        $response = $this->ebApi->postContactRequest($data);

        return $this->redirectToPropertyView($request, $response, $propertyId);
    }

    // Private 

    private function getPropertiesView($response) {
        $properties = $response['body']['content'];
        $pages = intdiv($response['body']['pagination']['total'], self::PROPERTIES_PER_PAGE) + 1;
        
        return view('properties.properties', [
            'properties' => $properties,
            'pages' => $pages,
            'currentPage' => $response['body']['pagination']['page']
        ]);
    }

    private function getPropertyView($response) {
        $property = $response['body'];

        return view('property.property', ['property' => $property]);
    }

    private function getContactRequestData($request) {
        $data = (array) $request->all();
        unset($data['_token']);

        return $data;
    }

    private function redirectToPropertyView($request, $response, $propertyId) {
        $status = $response['status_code'] == 200 ? 'success' : 'danger'; 
        $request->session()->flash('status', $status);

        return redirect()->route('property', $propertyId);
    }
}
