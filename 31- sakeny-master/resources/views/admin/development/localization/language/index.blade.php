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
                        <h4 class="m-t-0 header-title pull-left"><b>{!!Lang::get("lang.$bread")!!}</b></h4>
                        <h4 class="m-t-0 header-title pull-right">
                            <a class="btn btn-default" href="{{ url("$base_view/$route/create") }}">Create Language <i class="fa fa-plus"></i></a>
                            <a class="btn btn-success" href="{{ url(ADMIN_PATH."/development/localization/translation/create") }}">Create translation <i class="fa fa-plus"></i></a>
                            <a class="btn btn-info" href="{{ url(ADMIN_PATH."/development/localization/translation") }}">Translations <i class="fa fa-eye"></i></a>
                            <a data-toggle="modal" href='#buildForm' class="btn btn-primary" href="{{ url(ADMIN_PATH."/development/localization/translation") }}">Build Language <i class="fa fa-cog  fa-spin"></i></a>
                        </h4>
                        <div class="clearfix"></div>

                        <table id="myTable" class="table datatable table-striped table-bordered">
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

                    </div>
                </div>
            </div>



            <div class="modal fade" id="buildForm">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Build language files.</h4>
                        </div>
                        {!! Form::open(['method' => 'POST', 'route' => 'admin.development.localization.language.build','onsubmit'=>'return confirm("confirm to processing..")']) !!}

                            <div class="modal-body">
                                <div class="alert alert-warning">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>NOTE:</strong> Your current language files will be override !
                                </div>
                                <p class="help-block">Choose 1 or more language to build</p>

                                @foreach ($languages as $language)
                                    <div class="checkbox checkbox-primary">
                                        {!! Form::checkbox('languages[]',$language->id,  null,['id'=>"lang-$language->id"]) !!}
                                        <label for="lang-{{ $language->id }}">
                                           {{ $language->name }}
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Build</button>
                            </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
@stop




