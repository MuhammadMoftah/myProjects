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
                <a class="btn btn-primary btn-style-custom" href="{{route('users.export')}}">Export</a>
            </h4>
            <form enctype="multipart/form-data" action="{{route('users.import.post')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group form-float" style="width: 20%; float:left;">
                    <div class="form-line">
                        <input type="file" class="form-control" name="file" required>
                    </div>
                </div>
                <button class="btn btn-primary waves-effect" type="submit">Import</button>
            </form>
            <div style="display:block;">
                <form action="{{route('admin.users.search')}}" method="GET">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" value="{{request()->search}}" class="form-control" name="search">
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Search</button>
                </form>
            </div>
            <div class="clearfix"></div>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        @foreach ($columns as $column)
                        <th>{{ trans("lang.$column") }}</th>
                        @endforeach
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