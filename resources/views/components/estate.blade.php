<div class="card mb-4 box-shadow">
    <img class="card-img-top home-img" src="{{$imageUrl == NULL ? asset('img/placeholder.svg') : $imageUrl }}" data-holder-rendered="true">
    <div class="card-body">
        <h5 class="card-title">{{$title}}</h5>
        <p class="card-text">{{$type}}</p>
        <p class="card-text"><strong>Lugar:</strong> {{$location}}</p>
        <a href="{{url('/properties/'.$publicId)}}" class="btn btn-primary">Detalles</a>
    </div>
</div>