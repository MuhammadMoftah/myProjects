@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b></b></h4>
            <div class="clearfix"></div>
            <h1>{{$video->type}}</h1>
            <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.videos.update',$video->id)}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <input {{$video->active==1?'checked':''}} type="checkbox" id="active" name="active">
                    <label for="active">Active</label>
                </div>
                <div class="form-group {{ $errors->has('link') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('video', 'video') !!}
                    {!! Form::text('video', $video->video, ['class' => 'form-control', 'placeholder' => 'video_url']) !!}
                </div>
                <button class="btn btn-primary waves-effect" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@stop