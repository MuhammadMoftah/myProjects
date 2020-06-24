@if(count($board_items)>0)
@foreach($board_items as $item)
<div class="col-xl-4 col-md-6 px-2">
    <div class="part card" id="item-{{$item->id}}">
        <a href="{{$item->link}}" class="img" style="background-image: url({{ $item->image }}); cursor:pointer;">
            <div class="card-body  d-flex flex-column justify-content-around">
                <p>@if($item->topic_id) {!! substr($item->name, 0,22) !!} @else {{ substr($item->name, 0,22) }} @endif</p>
            </div>
        </a>
    </div>
    @if(auth()->check() && auth()->guard('user')->user()->id === $item->board->user_id)
    <div class="text-center mb-2">
        <button class="btn btn-danger mx-2 delete-board-item">Delete</button>
        <form method="POST" action="{{route('user.item.delete',['id' => $item->id])}}">@csrf</form>
    </div>
    @endif
</div>
@endforeach
@else
<h5 class="w-100 text-center text-danger mt-5">
    No Items Found
</h5>
@endif