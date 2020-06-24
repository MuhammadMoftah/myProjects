@php

$num = isset($num) ? $num : 4;
$start = $pagantion->currentPage() - $num;
$endLoop = $pagantion->currentPage() + $num;
if($start <= 0 ){ $start=1; } if($endLoop> $pagantion->lastPage() ){
    $dif = $endLoop - $pagantion->lastPage() ;
    if( ($start - $dif) > 0 )
    {
    $start -= $dif;
    }
    $endLoop = $pagantion->lastPage();
    }

    @endphp
    <div class="col-md-12 text-center my-4">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item {{ ($pagantion->currentPage() == 1) ? ' disabled' : '' }}"><a class="page-link" href="{{ $pagantion->url($pagantion->currentPage()-1)}}">Previous</a></li>
                @if( $start >= $num )
                <li class="page-item {{ ($pagantion->currentPage() == 1) ? ' disabled' : '' }}">

                    <a class="page-link" disabled>...</a>

                </li>
                @endif
                @for ($i = $start; $i <= $endLoop; $i++) <li class="page-item {{ ($pagantion->currentPage() == $i) ? 'active disabled' : '' }}"><a class="page-link" style="{{ ($pagantion->currentPage() == $i) ? 'color:white' : ''}}" href="{{ $pagantion->url($i) }}">{{ $i }}</a></li>
                    @endfor
                    @if( $endLoop != $pagantion->lastPage() )
                    <li class="page-item {{ ($pagantion->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" disabled>...</a>
                    </li>
                    @endif
                    <li class="page-item {{ ($pagantion->currentPage() == $pagantion->lastPage()) ? ' disabled' : '' }}"><a class="page-link" href="{{ $pagantion->url($pagantion->currentPage()+1) }}">Next</a></li>
                    </li>
            </ul>
        </nav>
    </div>