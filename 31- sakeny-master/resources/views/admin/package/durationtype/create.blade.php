@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b></b></h4>
            <div class="clearfix"></div>
            <h1>Create Duration Type For Package</h1>
            <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.durationtypes.post')}}">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('name_ar', __('lang.name_ar')) !!}
                    {!! Form::text('name_ar', old('name_ar'), ['class' => 'form-control', 'placeholder' => __('lang.name_ar'), 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name_ar') }}</small>
                </div>

                <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('name_en', __('lang.name_en')) !!}
                    {!! Form::text('name_en', old('name_en'), ['class' => 'form-control', 'placeholder' => __('lang.name_en'), 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name_en') }}</small>
                </div>

                <div class="form-group {{ $errors->has('duration_id') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('duration', 'duration') !!}
                    <select name="duration_id" class="form-control" id="duration">
                        @if(!old('duration_id'))
                        <option selected disabled>Select Duration</option>
                        @endif
                        @foreach($durations as $duration)
                        <option value="{{$duration->id}}">{{$duration->name_en}}</option>
                        @endforeach
                    </select> <small class="text-danger">{{ $errors->first('duration_id') }}</small>
                </div>
                <div class="col-xs-12">
                    <button class="btn btn-primary waves-effect" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop