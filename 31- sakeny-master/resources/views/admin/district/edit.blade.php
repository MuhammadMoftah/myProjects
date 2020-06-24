@extends('admin.layouts.app')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-name"><b></b></h4>
            <div class="clearfix"></div>
            <form id="form_advanced_validation" method="POST" action="{{route('admin.districts.edit.post',$district->id)}}">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('name_ar', __('lang.name_ar')) !!}
                    {!! Form::text('name_ar', $district->name_ar, ['class' => 'form-control', 'placeholder' => __('lang.name_ar'), 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name_ar') }}</small>
                </div>

                <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('name_en', __('lang.name_en')) !!}
                    {!! Form::text('name_en', $district->name_en, ['class' => 'form-control', 'placeholder' => __('lang.name_en'), 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name_en') }}</small>
                </div>

                <div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('city_id', __('lang.city_id')) !!}
                    <select name="city_id" class="form-control select2" placeholder="{{__('lang.select city')}}">
                        @foreach($cities as $city)
                        <option {{$district->city_id==$city->id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                        @endforeach
                    </select>
                    <small class="text-danger">{{ $errors->first('city_id') }}</small>
                </div>

                <div class="form-group">
                    <input type="checkbox" {{$district->activation==1?'checked':''}} id="active" name="active">
                    <label for="active">Active</label>
                </div>
                <button class="btn btn-primary waves-effect" type="submit">Edit</button>
            </form>
        </div>
    </div>
</div>
@stop