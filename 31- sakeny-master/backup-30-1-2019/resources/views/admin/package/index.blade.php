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
                    <a class="btn btn-default btn-style-custom" href="{{ url("$base_view/$route/create") }}">Create <i class="fa fa-plus"></i></a>
                </h4>

                <div class="clearfix"></div>
                 <div class="m-separator m-separator--dashed d-xl-none"></div>
                    <div class="col-md-12">
                        {!! Form::open(['method' => 'get']) !!}
                            <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }} col-md-8">
                                {!! Form::label('country_id', 'Country') !!}
                                {!! Form::select('country_id', $countries, null, ['id' => 'country_id', 'class' => 'form-control select2']) !!}
                                <small class="text-danger">{{ $errors->first('country_id') }}</small>
                            </div>
                            <div class="btn-group col-md-4">
                                {!! Form::submit("Search", ['class' => 'btn btn-success btn-block', 'style'=>'margin-top: 25px;']) !!}
                            </div>

                        {!! Form::close() !!}
                    </div>
                <table class="table datatable table-bordered">
                    <thead>
                        <tr>
                            @foreach ($columns as $column)
                                <th>{{ trans("lang.$column") }}</th>
                            @endforeach
                            <th>@lang('lang.country')</th>
                            <th>@lang('lang.package type')</th>
                            <th>@lang('lang.Actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                       @include("$base_view.$path.loop")
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@stop

