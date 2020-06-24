{{-- <div class="col-md-12 text-center my-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ ($offers->currentPage() == 1) ? ' disabled' : '' }}"><a class="page-link" href="{{ $offers->url($offers->currentPage()-1)}}">Previous</a></li>
                @for ($i = 1; $i <= $offers->lastPage(); $i++)
                    <li class="page-item {{ ($offers->currentPage() == $i) ? 'active disabled' : '' }}"><a class="page-link" style="{{ ($offers->currentPage() == $i) ? 'color:white' : ''}}" href="{{ $offers->url($i) }}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item {{ ($offers->currentPage() == $offers->lastPage()) ? ' disabled' : '' }}"><a class="page-link" href="{{ $offers->url($offers->currentPage()+1) }}">Next</a></li>
                    </li>
            </ul>
        </nav>
    </div> --}}

@component('frontend.paginators.CutomPagnation',["pagantion"=>$offers, "num" => 6])

@endComponent