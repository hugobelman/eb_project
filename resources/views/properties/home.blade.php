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

    <div class="row">
      <div class="col">
        <nav>
          <ul class="pagination">
            <li class="page-item"><a class="page-link" href="{{route('properties', ['page' => 1])}}"><<</a></li>
            @for($i = ($currentPage > 4 ? $currentPage-4 : 1); $i <= ($currentPage+4 <= $pages ? $currentPage+4 : $pages+1); $i++)
              <li @class(['page-item', 'active' => $currentPage == $i])><a class="page-link" href="{{route('properties', ['page' => $i])}}">{{$i}}</a></li>
            @endfor
            <li class="page-item"><a class="page-link" href="{{route('properties', ['page' => $pages+1])}}">>></a></li>
          </ul>
        </nav>
      </div>
  </div>

@endsection