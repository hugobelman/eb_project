<div class="card mb-4 box-shadow">
    <img class="card-img-top" src="{{$imageUrl == NULL ? asset('img/placeholder.svg') : $imageUrl }}" data-holder-rendered="true">
    <div class="card-body">
        <h5 class="card-title">{{$title}}</h5>
        <p class="card-text">{{$location}}</p>
        <p class="card-text">{{$type}}</p>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
            </div>
            <small class="text-muted">{{$publicId}}</small>
        </div>
    </div>
</div>