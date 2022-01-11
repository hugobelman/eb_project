<div class="row">
    <div class="col">
        <nav>
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="{{route('properties', ['page' => 1])}}"><<</a>
                </li>
                @for($i = ($currentPage > 4 ? $currentPage-4 : 1); $i <= ($currentPage+4 <= $pages ? $currentPage+4 : $pages); $i++) 
                    <li @class(['page-item', 'active'=> $currentPage == $i])><a class="page-link" href="{{route('properties', ['page' => $i])}}">{{$i}}</a></li>
                @endfor
                <li class="page-item"><a class="page-link" href="{{route('properties', ['page' => $pages])}}">>></a></li>
            </ul>
        </nav>
    </div>
</div>