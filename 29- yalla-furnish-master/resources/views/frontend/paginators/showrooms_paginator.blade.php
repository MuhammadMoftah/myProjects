{{-- <div class="col-md-12 text-center my-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ ($showrooms->currentPage() == 1) ? ' disabled' : '' }}"><a class="page-link"
                    href="{{ $showrooms->url($showrooms->currentPage()-1)}}">Previous</a></li>
            @for ($i = 1; $i <= $showrooms->lastPage(); $i++)
                <li class="page-item {{ ($showrooms->currentPage() == $i) ? 'active disabled' : '' }}"><a class="page-link"
                        style="{{ ($showrooms->currentPage() == $i) ? 'color:white' : ''}}"  href="{{ $showrooms->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li class="page-item {{ ($showrooms->currentPage() == $showrooms->lastPage()) ? ' disabled' : '' }}"><a
                        class="page-link" href="{{ $showrooms->url($showrooms->currentPage()+1) }}">Next</a></li>

                </li>
        </ul>
    </nav>
</div> --}}

@component('frontend.paginators.CutomPagnation',["pagantion"=>$showrooms, "num" => 6])

@endComponent