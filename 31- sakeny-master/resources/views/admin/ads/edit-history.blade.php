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
                <br><hr>
                <h4 class="m-t-0 header-title pull-right">
                    <a class="btn btn-default btn-style-custom" href="{{ url("$base_view/$route/create") }}">Create New Ad<i class="fa fa-plus"></i></a>
                </h4>

                <div class="clearfix"></div>

                 <div class="m-separator m-separator--dashed d-xl-none"></div>

                <table class="table datatable table-bordered">
                    <thead>
                        <tr>
                            @foreach ($columns as $column)
                                <th>{{ trans("lang.$column") }}</th>
                            @endforeach
                            <th> @lang('lang.title') </th>
                            <th> @lang('lang.type') </th>
                            <th> @lang('lang.Offer Type') </th>
                            <th> @lang('lang.price') </th>
                            <th> @lang('lang.owner') </th>
                            <th>@lang('lang.Actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($rows as $row)
                        <tr>
                            @foreach ($select_columns as $column)
                                <td>{{ $row->$column }}</td>
                            @endforeach
                            <td>
                                {{ str_limit($row->title, 30) }}
                            </td>
                            <td>
                                <span class="label label-warning">
                                    {{ isset($row->property_type->name_en) ? $row->property_type->name_en : __('lang.not set') }}
                                </span>
                            </td>
                            <td>
                                <span class="label label-primary">
                                    {{ isset($row->offer_type->title_en) ? $row->offer_type->title_en : __('lang.not set') }}
                                </span>
                            </td>
                            <td>
                                <span class="label label-danger">{{ $row->price }}</span>
                            </td>
                            <td>
                                <span class="label label-inverse">{{ isset($row->owner->name) ? $row->owner->name : __('lang.not set') }}</span>
                            </td>

                            <td>

                                <a class="btn btn-icon waves-effect btn-info waves-light"
                                   href="{{ url(ADMIN_PATH."/$route/$selected_ad->id/view/$row->id") }}">
                                    <i class="icon-eye"></i> View
                                </a>
                                <a class="btn btn-icon waves-effect btn-default waves-light"
                                   href="{{ url(ADMIN_PATH."/$route/$selected_ad->id/accept/$row->id") }}">
                                    <i class="icon-check"></i> Accept
                                </a>

                                <a class="btn btn-icon waves-effect btn-danger waves-light"
                                   href="{{ url(ADMIN_PATH."/$route/$selected_ad->id/reject/$row->id") }}">
                                    <i class="icon-close"></i> reject
                                </a>

                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop

