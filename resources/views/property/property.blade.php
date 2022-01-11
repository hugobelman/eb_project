@extends('layout.layout')

@section('pageTitle', $property['public_id'])

@section('content')

<div class="container mt-4">
    
    @if (Session::has('status'))
        @include('property.elements.alert')
    @endif

    <div class="row">
        <div class="col align-self-end">
            <h1>{{$property['title']}}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>{{$property['property_type']}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h5>En {{$property['location']['name']}}</h5>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <small><strong>ID:</strong> {{$property['public_id']}}</small>
        </div>
    </div>
    
    @if(count($property['property_images']) > 0)
        @include('property.elements.slideshow')
    @endif

    <hr>

    <div class="row">
        <div class="col">
            <h3>Contactanos...</h3>
        </div>
    </div>

    @include('property.elements.form')

</div>

@endsection