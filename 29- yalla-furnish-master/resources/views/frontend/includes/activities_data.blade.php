<div class="col-12 py-3 px-2">
    @if(count($activities)>0)
    @foreach ($activities as $activity)
    <div class="py-1 my-1 border-bottom d-flex justify-content-between">
        <p>{{ $activity->users[0]->first_name }} {!! $activity->activity !!}</p>
    </div>
    @endforeach
    <div class="col-md-12 text-center my-4">
        <nav aria-label="Page navigation example">
            @include('frontend.paginators.activities_paginator', ['activities' => $activities])
        </nav>
    </div>
    @else
    <h5 class="w-100 text-center text-danger mt-5">
        No Activites Found
    </h5>
    @endif
</div>