@extends('layout.layout')

@section('content')

<div class="container-fluid album p-4 bg-light">
    <div class="row">
      @foreach ($properties as $estate)
        <div class="col-md-4">
          <x-estate id="{{$estate['public_id']}}" title="{{$estate['title']}}" type="{{$estate['property_type']}}" location="{{$estate['location']}}" image="{{$estate['title_image_full']}}"/>
        </div>
      @endforeach
    </div>
  </div>

@endsection