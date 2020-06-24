@extends('site.master')
@section('body')
<section class="about message">
    <div class="container">
        <div class="row">
            <div class="title2 col-sm-12 py-3 rounded mb-5">
                <h1 class="text-center text-white font-weight-bold m-0">{{trans('lang.messages')}}</h1>
            </div>

            <div class="col-md-12 border-bottom px-0">
                <div class="control">
                    {{--<a class="btn btn-danger text-white" title="Delete">
                        <i class="far fa-trash-alt"></i>
                    </a>--}}
                    <a id="refresh" class="btn btn-info text-white" title="Refresh">
                        <i class="fas fa-sync-alt"></i>
                    </a>

                </div>
            </div>

            <div class="col-md-12 py-2 bg-white px-0">
                @foreach($room->messages as $message)
                <div class="part my-5">
                    <div class="message-info p-3">
                        <div class="d-inline-block">
                            <img src="{{env('AWS_URL') .$message->sender->image}}" alt="">
                        </div>
                        <div class="d-inline-block py-3">
                            <h6>{{$message->sender->name}}</h6>
                            <small>{{$message->created_at->diffForHumans()}}</small>
                        </div>
                    </div>

                    <div class="message-body">
                        {{$message->message}}
                    </div>
                </div>
                @endforeach

            </div>

            <form class="col-md-12 py-2 bg-white px-0" method="POST" action="{{route('company.post.message',$room->id)}}">
                {{ csrf_field() }}
                <div class="form-group p-5">
                    <textarea name="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : ''}}" id="exampleFormControlTextarea1" rows="4"></textarea>
                    {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
                    <input type="submit" class="btn  px-5 my-4" value="{{trans('lang.send')}}">
                </div>
            </form>

        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection
@section('scripts')
<script src="{{url('site')}}/js/inbox.js"></script>
@endsection