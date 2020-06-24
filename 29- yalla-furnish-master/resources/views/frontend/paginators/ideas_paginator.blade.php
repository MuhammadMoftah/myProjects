{{-- <div class="col-md-12 text-center my-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ ($ideas->currentPage() == 1) ? ' disabled' : '' }}"><a class="page-link"
                    href="{{ $ideas->url($ideas->currentPage()-1)}}">Previous</a></li>
            @for ($i = 1; $i <= $ideas->lastPage(); $i++)
                <li class="page-item {{ ($ideas->currentPage() == $i) ? 'active disabled' : '' }}"><a class="page-link"
                        style="{{ ($ideas->currentPage() == $i) ? 'color:white' : ''}}"  href="{{ $ideas->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li class="page-item {{ ($ideas->currentPage() == $ideas->lastPage()) ? ' disabled' : '' }}"><a
                        class="page-link" href="{{ $ideas->url($ideas->currentPage()+1) }}">Next</a></li>
                </li>
        </ul>
    </nav>
</div> --}}

@component('frontend.paginators.CutomPagnation',["pagantion"=>$ideas, "num" => 6])

@endComponent