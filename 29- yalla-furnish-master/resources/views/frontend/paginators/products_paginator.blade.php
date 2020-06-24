{{--<div class="col-md-12 text-center my-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ ($products->currentPage() == 1) ? ' disabled' : '' }}"><a class="page-link" href="{{ $products->url($products->currentPage()-1)}}">Previous</a></li>
            @for ($i = 1; $i <= $products->lastPage(); $i++)
                <li class="page-item {{ ($products->currentPage() == $i) ? 'active disabled' : '' }}"><a class="page-link" style="{{ ($products->currentPage() == $i) ? 'color:white' : ''}}" href="{{ $products->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li class="page-item {{ ($products->currentPage() == $products->lastPage()) ? ' disabled' : '' }}"><a class="page-link" href="{{ $products->url($products->currentPage()+1) }}">Next</a></li>
                </li>
        </ul>
    </nav>
</div>--}}

@component('frontend.paginators.CutomPagnation',["pagantion"=>$products, "num" => 6])

@endComponent