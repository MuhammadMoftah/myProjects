@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b></b></h4>
            <div class="clearfix"></div>
            <h1>Edit Package</h1>
            <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.packages.update',$package->id)}}">
                {{ csrf_field() }}

                <div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('name_ar', __('lang.name_ar')) !!}
                    {!! Form::text('name_ar', $package->name_ar, ['class' => 'form-control', 'placeholder' => __('lang.name_ar'), 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name_ar') }}</small>
                </div>

                <div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('name_en', __('lang.name_en')) !!}
                    {!! Form::text('name_en', $package->name_en, ['class' => 'form-control', 'placeholder' => __('lang.name_en'), 'required']) !!}
                    <small class="text-danger">{{ $errors->first('name_en') }}</small>
                </div>

                <div class="form-group {{ $errors->has('description_en') ? ' has-error' : '' }} col-md-12">
                    {!! Form::label('description_en', 'English Description') !!}
                    {!! Form::textarea('description_en',$package->description_en, ['class' => 'form-control', 'placeholder' => 'Description En', 'rows' => 7]) !!}
                    <small class="text-danger">{{ $errors->first('description_en') }}</small>
                </div>

                <div class="form-group {{ $errors->has('description_ar') ? ' has-error' : '' }} col-md-12">
                    {!! Form::label('description_ar', 'Arabic Description') !!}
                    {!! Form::textarea('description_ar', $package->description_ar, ['class' => 'form-control', 'placeholder' => 'Description Ar', 'rows' => 7]) !!}
                    <small class="text-danger">{{ $errors->first('description_ar') }}</small>
                </div>

                <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('price', __('lang.price')) !!}
                    {!! Form::number('price', $package->price, ['class' => 'form-control', 'placeholder' => __('lang.price'), 'required']) !!}
                    <small class="text-danger">{{ $errors->first('price') }}</small>
                </div>

                <div class="form-group {{ $errors->has('duration_id') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('duration_type_id', 'Duration type') !!}
                    <select name="duration_type_id" class="form-control" id="duration_type_id">
                        @foreach($types as $type)
                        <option {{$type->id==$package->duration_type_id?'selected':''}} value="{{$type->id}}">{{$type->name_en}} - {{$type->duration->name_en}}</option>
                        @endforeach
                    </select> <small class="text-danger">{{ $errors->first('duration_type_id') }}</small>
                </div>

                <div class="form-group {{ $errors->has('duration_id') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('ad_type_id', 'Ad types') !!}
                    <select name="ad_type_id" class="form-control" id="ad_type_id">
                        @foreach($adtypes as $adtype)
                        <option {{$adtype->id==$package->ads_type_id?'selected':''}} value="{{$adtype->id}}">{{$adtype->name_en}} - {{$adtype->name_ar}}</option>
                        @endforeach
                    </select> <small class="text-danger">{{ $errors->first('ad_type_id') }}</small>
                </div>

                <div class="col-xs-12">
                    <button class="btn btn-primary waves-effect" type="submit">EDIT</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop