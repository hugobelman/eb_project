<div id="slideshow" class="carousel slide max-h" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($property['property_images'] as $image)
        <div @class(['carousel-item', 'active'=> $loop->index==0]) >
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