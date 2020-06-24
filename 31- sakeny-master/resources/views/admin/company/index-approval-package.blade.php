@extends('admin.layouts.app')

@section('title',"Company Packages Approvals - ".trans("lang.".end($breadcrumb)))

@section('content')

    <!-- Page-Title -->
    @section('breadcrumb')
        @foreach ($breadcrumb as $bread)
            @if ($loop->remaining == 1)
                <li><a href="{{ url("$base_view/$route") }}">@lang("lang.$bread")</a></li>
            @elseif($loop->last)
                <li class="active">Company Packages Approvals</li>
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
                <table class="table datatable table-bordered">
                    <thead>
                        <tr>
                            @foreach ($columns as $column)
                                <th>{{ trans("lang.$column") }}</th>
                            @endforeach
                            <td>@lang('lang.name')</td>
                            <td>@lang('lang.email')</td>
                            <td>package Name</td>
                            <td>package Price</td>
                            <th> Country</th>
                            <th> Approval</th>
                            <th> Cancel</th>
                        </tr>
                    </thead>
                    <tbody>
                       @include("$base_view.$path.loop-approval-package")
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop

