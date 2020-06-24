@if(count($ideas) > 0)
@foreach ($ideas as $key=>$idea )
<div class="col-xl-6 col-md-4 col-sm-6 px-2">
    <div class="part card" id="{{$idea->id}}">
        <a href="{{route('user.get.idea',$idea->id)}}" class="img" style="background-image:url('{{$idea->idea_image}}');"></a>
        <div class="card-body d-flex flex-column justify-content-between">
            <h5 class="card-title">{!! $idea->name_en !!}</h5>
            <p class="small text-muted">Posted {{$idea->created_at->format('M Y')}}</p>
            <div class="social">
                <div>
                    <div class="likes d-inline-block">
                        <i class="fas fa-heart"></i>
                        <span class="small">{{$idea->saves->count()}}</span>
                    </div>
                    <div class="comments d-inline-block">
                        <i class="fas fa-comment-dots"></i>
                        <span class="small">{{$idea->comments->count()}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //    === Make div square ===
    $('#{{$idea->id}}').outerHeight($('#{{$idea->id}}').outerWidth() / 2);
    $(window).on('resize', function() {
        $('#{{$idea->id}}').outerHeight($('#{{$idea->id}}').outerWidth());
        if ($(window).outerWidth() >= 1200) {
            $('#{{$idea->id}}').outerHeight($('#{{$idea->id}}').outerWidth() / 2);
        }
    })
</script>
@endforeach
@include('frontend.paginators.ideas_paginator', ['ideas' => $ideas])
@else
<h5 class="w-100 text-center text-danger mt-5">
    No Ideas found
</h5>
@endif