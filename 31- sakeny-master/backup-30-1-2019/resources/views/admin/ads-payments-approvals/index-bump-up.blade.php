@extends('admin.layouts.app')

@section('title','Ads Bump Up Approvals'." - ".trans("lang.".end($breadcrumb)))

@section('content')

    <!-- Page-Title -->
    @section('breadcrumb')
        @foreach ($breadcrumb as $bread)
            @if ($loop->remaining == 1)
                <li><a href="{{ url("$base_view/$route") }}">Ads Bump Up Approvals</a></li>
            @elseif($loop->last)
                <li class="active">Ads Bump Up Approvals</li>
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
                <br><hr>
                <h4 class="m-t-0 header-title pull-right">
                    <a class="btn btn-default btn-style-custom" href="{{ url("$base_view/$route/create") }}">Create <i class="fa fa-plus"></i></a>
                </h4>

                <div class="clearfix"></div>

                 <div class="m-separator m-separator--dashed d-xl-none"></div>
                     <div class="clearfix"></div>
                <table class="table datatable table-bordered">
                    <thead>
                        <tr>
                            @foreach ($columns as $column)
                                <th>{{ trans("lang.$column") }}</th>
                            @endforeach
                            <th> @lang('lang.title') </th>
                            <th> @lang('lang.type') </th>
                            <th> @lang('lang.price') </th>
                            <th> @lang('lang.owner') </th>
                            <th> @lang('lang.view') </th>
                            <th> @lang('lang.approvel') </th>
                            <th> @lang('lang.cancel') </th>
                        </tr>
                    </thead>
                    <tbody>
                       @include("$base_view.$path.loop-premium")
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop

