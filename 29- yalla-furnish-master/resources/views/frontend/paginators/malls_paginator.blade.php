{{-- <div class="col-md-12 text-center my-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ ($malls->currentPage() == 1) ? ' disabled' : '' }}"><a class="page-link"
                    href="{{ $malls->url($malls->currentPage()-1)}}">Previous</a></li>
            @for ($i = 1; $i <= $malls->lastPage(); $i++)
                <li class="page-item {{ ($malls->currentPage() == $i) ? 'active disabled' : '' }}"><a class="page-link"
                style="{{ ($malls->currentPage() == $i) ? 'color:white' : ''}}"  href="{{ $malls->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li class="page-item {{ ($malls->currentPage() == $malls->lastPage()) ? ' disabled' : '' }}"><a
                        class="page-link" href="{{ $malls->url($malls->currentPage()+1) }}">Next</a></li>

                </li>
        </ul>
    </nav>
</div> --}}

@component('frontend.paginators.CutomPagnation',["pagantion"=>$malls, "num" => 6])

@endComponent