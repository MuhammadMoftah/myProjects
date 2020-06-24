@if(count($boards) > 0)
@foreach ($boards as $board)
<div class="col-xl-4  col-md-6 px-2">
    <div class="part card" id="board-{{$board->id}}">
        <a href="@if(Route::currentRouteName()=='user.view.profile') {{route('user.board.view',$board->id)}} @else {{route('user.board',$board->id)}} @endif" class="img" style="background-image: url({{$board->image}});"></a>
        <div class="card-body card-footer d-flex flex-column justify-content-around">
            @if($board->private==1)
            <i class="fas fa-lock" style="position:absolute;bottom:10px;right:10px;"></i>
            @endif
            <h5 class="card-title">{{ $board->name }}</h5>
            <a href="@if(Route::currentRouteName()=='user.view.profile') {{route('user.board.view',$board->id)}} @else {{route('user.board',$board->id)}} @endif" class="card-text main-link2 m-0">
                {{$board->items->count()}} Saved Items
            </a>
        </div>
    </div>
</div>
<script>
    //To MAke Images Square
    $(window).on('load', function() {
        $('#board-{{ $board->id }}').css({
            'height': $('#board-{{ $board->id }}').width() + 'px'
        });
    });

    $('#board-{{ $board->id }}').css({
        'height': $('#board-{{ $board->id }}').width() + 'px'
    });

    $(window).on('resize', function() {
        $('#board-{{ $board->id }}').css({
            'height': $('#board-{{ $board->id }}').width() + 'px'
        });
    });
    $('body').on('click', '.main-link', function() {
        //To MAke Images Square
        $(window).on('load', function() {
            //To MAke Images Square
            $('#board-{{ $board->id }}').css({
                'height': $('#board-{{ $board->id }}').width() + 'px'
            });
        });
        //To MAke Images Square
        $('#board-{{ $board->id }}').css({
            'height': $('#board-{{ $board->id }}').width() + 'px'
        });
        $(window).on('resize', function() {
            $('#board-{{ $board->id }} ').css({
                'height': $('#board-{{ $board->id }} ').width() + 'px'
            });
        });
    });
</script>
@endforeach
@else
<h5 class="w-100 text-center text-danger mt-5">
    No Boards Found
</h5>
@endif