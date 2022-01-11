@extends('layout.layout')

@section('content')

<div class="container mt-4">
    @if (Session::has('status'))

    <div class="row">
        <div class="col">
            <div class="alert alert-{{Session::get('status')}}" role="alert">
                {{ Session::get('status') == 'success' ? '¡Pronto te contactaremos!' : 'Error'}}
            </div>
        </div>
    </div>

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

    <div id="slideshow" class="carousel slide max-h" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($property['property_images'] as $image)
            <div @class(['carousel-item', 'active' => $loop->index==0]) >
                <img src="{{$image['url']}}" class="d-block" alt="{{$image['title']}}">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#slideshow" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#slideshow" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <hr>

    <div class="row">
        <div class="col">
            <h3>Form de contacto</h3>
        </div>
    </div>

    @include('properties.elements.form')

</div>

@endsection