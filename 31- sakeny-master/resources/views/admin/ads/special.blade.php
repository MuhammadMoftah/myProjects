@extends('admin.layouts.app')

@section('title',trans("lang.Ads_special")." - ".trans("lang.Index"))

@section('content')

<!-- Page-Title -->
@section('breadcrumb')
<li><a href="{{ url(ADMIN_PATH."/special") }}">@lang("lang.Ads_special")</a></li>
<li class="active">@lang("lang.Index")</li>
@stop
<!-- PAGE CONTENT WRAPPER -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title pull-left"><b><i class="icon-list head-icon"></i>{!!Lang::get("lang.Index")!!}</b></h4>
            <br>
            <hr>
            <div class="clearfix"></div>

            <div class="m-separator m-separator--dashed d-xl-none"></div>
            <div class="clearfix"></div>
            <div class="col-md-12">
                {!! Form::open(['method' => 'get']) !!}
                <div class="form-group col-md-3">
                    {!! Form::label('search_by_title', 'Search By Title') !!}
                    <div class="form-line">
                        <input type="text" value="{{request()->search}}" class="form-control" name="search" placeholder="search by title">
                    </div>
                </div>
<!--                <div class="form-group col-md-3">
                    {!! Form::label('search_by_owner', 'Search By Owner Name') !!}
                    <div class="form-line">
                        <input type="text" value="{{request()->search_by_owner}}" class="form-control" name="search_by_owner" placeholder="search by owner name">
                    </div>
                </div>-->
<!--                <div class="form-group{{ $errors->has('city_id') ? ' has-error' : '' }} col-md-3">
                    {!! Form::label('city_id', 'City') !!}
                    {!! Form::select('city_id', $cities, null, ['id' => 'city_id', 'class' => 'form-control select2']) !!}
                    <small class="text-danger">{{ $errors->first('city_id') }}</small>
                </div>-->
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
                        <th> @lang('lang.status') </th>
                        <th> @lang('lang.owner') </th>
                        <th> @lang('lang.owner_phone') </th>
                    </tr>
                </thead>
                <tbody>
                    @include("$base_view.$path.loop_special")
                </tbody>
            </table>
            {{ $rows->appends(getRequestBetweenPages())->render("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@stop