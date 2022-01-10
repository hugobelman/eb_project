<div class="card mb-4 box-shadow">
    <img class="card-img-top" src="{{$imageUrl == NULL ? asset('img/placeholder.svg') : $imageUrl }}" data-holder-rendered="true">
    <div class="card-body">
        <h5 class="card-title">{{$title}}</h5>
        <p class="card-text">{{$location}}</p>
        <p class="card-text">{{$type}}</p>
        <a href="{{url('/properties/'.$publicId)}}" class="btn btn-primary">Detalles</a>
    </div>
</div>