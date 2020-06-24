{{-- <div class="col-md-12 text-center my-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ ($activities->currentPage() == 1) ? ' disabled' : '' }}"><a class="page-link"
                    href="{{ $activities->url($activities->currentPage()-1)}}">Previous</a></li>
            @for ($i = 1; $i <= $activities->lastPage(); $i++)
                <li class="page-item {{ ($activities->currentPage() == $i) ? 'active disabled' : '' }}"><a class="page-link"
                        style="{{ ($activities->currentPage() == $i) ? 'color:white' : ''}}"  href="{{ $activities->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li class="page-item {{ ($activities->currentPage() == $activities->lastPage()) ? ' disabled' : '' }}"><a
                        class="page-link" href="{{ $activities->url($activities->currentPage()+1) }}">Next</a></li>
                </li>
        </ul>
    </nav>
</div> --}}
@component('frontend.paginators.CutomPagnation',["pagantion"=>$activities, "num" => 6])

@endComponent