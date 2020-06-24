@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b></b></h4>
            <div class="clearfix"></div>
            <h1>Create Ad Type For Package</h1>
            <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.ad_type.post')}}">
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

                  <div class="form-group {{ $errors->has('no_of_special_ads') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('no_of_special_ads','number of special ads') !!}
                    {!! Form::number('no_of_special_ads', old('no_of_special_ads'), ['class' => 'form-control', 'placeholder' =>'number of special ads', 'required']) !!}
                    <small class="text-danger">{{ $errors->first('no_of_special_ads') }}</small>
                </div>

                   <div class="form-group {{ $errors->has('no_of_repeated_ads') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('no_of_repeated_ads','number of repeated ads') !!}
                    {!! Form::number('no_of_repeated_ads', old('no_of_repeated_ads'), ['class' => 'form-control', 'placeholder' =>'number of repeated ads', 'required']) !!}
                    <small class="text-danger">{{ $errors->first('no_of_repeated_ads') }}</small>
                </div>


                   <div class="form-group {{ $errors->has('no_of_seo_ads') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('no_of_seo_ads','number of Seo ads') !!}
                    {!! Form::number('no_of_seo_ads', old('no_of_seo_ads'), ['class' => 'form-control', 'placeholder' =>'number of Seo ads', 'required']) !!}
                    <small class="text-danger">{{ $errors->first('no_of_seo_ads') }}</small>
                </div>

                   <div class="form-group {{ $errors->has('no_of_normal_ads') ? ' has-error' : '' }} col-md-6">
                    {!! Form::label('no_of_normal_ads','number of normal ads') !!}
                    {!! Form::number('no_of_normal_ads', old('no_of_normal_ads'), ['class' => 'form-control', 'placeholder' =>'number of normal ads', 'required']) !!}
                    <small class="text-danger">{{ $errors->first('no_of_normal_ads') }}</small>
                </div>

        


                
                <div class="col-xs-12">
                    <button class="btn btn-primary waves-effect" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop