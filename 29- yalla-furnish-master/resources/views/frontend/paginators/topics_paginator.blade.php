<div class="col-md-12 text-center my-4">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item {{ ($topics->currentPage() == 1) ? ' disabled' : '' }}"><a class="page-link" href="{{ $topics->url($topics->currentPage()-1)}}">Previous</a></li>
            @for ($i = 1; $i <= $topics->lastPage(); $i++)
                <li class="page-item {{ ($topics->currentPage() == $i) ? 'active disabled' : '' }}"><a class="page-link" style="{{ ($topics->currentPage() == $i) ? 'color:white' : ''}}" href="{{ $topics->url($i) }}">{{ $i }}</a></li>
                @endfor
                <li class="page-item {{ ($topics->currentPage() == $topics->lastPage()) ? ' disabled' : '' }}"><a class="page-link" href="{{ $topics->url($topics->currentPage()+1) }}">Next</a></li>
                </li>
        </ul>
    </nav>
</div>