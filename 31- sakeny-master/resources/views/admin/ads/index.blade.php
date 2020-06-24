@extends('admin.layouts.app')

@section('title',trans("lang.$module_name")." - ".trans("lang.".end($breadcrumb)))

@section('content')

<!-- Page-Title -->
@section('breadcrumb')
@foreach ($breadcrumb as $bread)
@if ($loop->remaining == 1)
<li><a href="{{ url("$base_view/$route") }}">@lang("lang.$bread")</a></li>
@elseif($loop->last)
<li class="active">@lang("lang.$bread")</li>
@else
<li>@lang("lang.$bread")</li>
@endif
@endforeach
@stop
<!-- PAGE CONTENT WRAPPER -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title pull-left"><b><i class="icon-list head-icon"></i>{!!Lang::get("lang.$bread")!!}</b></h4>
            <br>
            <hr>
            <h4 class="m-t-0 header-title pull-right">
                <a class="btn btn-default btn-style-custom" href="{{ url("$base_view/$route/create") }}">Create <i class="fa fa-plus"></i></a>
            </h4>
            <div class="clearfix"></div>

            <div class="m-separator m-separator--dashed d-xl-none"></div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                {!! Form::open(['method' => 'get']) !!}
                <div class="form-group col-md-2">
                    {!! Form::label('search', 'Search') !!}
                    <div class="form-line">
                        <input type="text" value="{{request()->search}}" class="form-control" name="search" placeholder="search">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('offer_type_id') ? ' has-error' : '' }} col-md-2">
                    {!! Form::label('offer_type_id', 'Offer type') !!}
                    <select name="offer_type_id" id="offer_type_id" class="form-control select2">
                        <option value="">Select your offer type</option>
                        @foreach($offer_type_list as $type)
                        <option {{request('offer_type_id')==$type->id?'selected':''}} value="{{$type->id}}">{{$type->title_en}}</option>
                        @endforeach
                    </select>
                    <small class="text-danger">{{ $errors->first('offer_type_id') }}</small>
                </div>
                <div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }} col-md-2">
                    {!! Form::label('featured', 'Featured Status') !!}
                    <select name="featured" id="featured" class="form-control select2">
                        <option value="">Select your status</option>
                        <option {{request('featured')==1?'selected':''}} value="1">featured</option>
                        <option {{request('featured')==='0'?'selected':''}} value="0">not featured</option>
                    </select>
                    <small class="text-danger">{{ $errors->first('offer_type_id') }}</small>
                </div>
                <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }} col-md-2">
                    {!! Form::label('city_id', 'City') !!}
                    <select name="city_id" id="city_id" class="form-control select2">
                        <option value="">Select your city</option>
                        <option value="">All</option>

                        @foreach($cities as $city)
                        <option {{request('city_id')==$city->id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                        @endforeach
                    </select>
                    <small class="text-danger">{{ $errors->first('city_id') }}</small>
                </div>
                <div class="btn-group col-md-2">

                    {!! Form::submit("Search", ['class' => 'btn btn-success btn-block', 'style'=>'margin-top: 25px;']) !!}
                </div>

                {!! Form::close() !!}
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        @foreach ($columns as $column)
                        <th>{{ trans("lang.$column") }}</th>
                        @endforeach
                        <th> @lang('lang.title') </th>
                        <th> @lang('lang.type') </th>
                        {{--<th> @lang('lang.Offer Type') </th>--}}
                        <th> @lang('lang.price') </th>
                        <th> @lang('lang.owner') </th>
                        <th> @lang('lang.status') </th>
                        <th> @lang('lang.reports') </th>
                        <th> @lang('selected') </th>
                        <th> Date </th>
                        <th> type </th>
                        <th>@lang('lang.Actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @include("$base_view.$path.loop")
                </tbody>
            </table>
            {{ $rows->appends(getRequestBetweenPages())->render("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@stop

@push('script')
<script>
    $(document).ready(function() {
        $('.featured-toggle').click(function(e) {
            e.preventDefault();
            $('#featured-modal').modal('show');
            let url = $(this).attr('href');
            $('#featured-toggle-link').attr('href', url);
        })
    });
</script>

@endpush