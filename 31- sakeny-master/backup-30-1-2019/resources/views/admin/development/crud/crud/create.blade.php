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
    <div class="row">
        <div class="col-sm-12">
            {!! Form:: open(['method'=>'POST','url' => ADMIN_PATH."/$route", 'files'=>true,'class' => 'ajax-form-request']) !!}
                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title"><b>Basic Setting</b></h4>
                    <div class="clearfix"></div>
                        <div class="panel-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
                                {!! Form::label('name', 'Module name') !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('controller_name') ? ' has-error' : '' }} col-md-6">
                                {!! Form::label('controller_name', 'Controller name') !!}
                                {!! Form::text('controller_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('controller_name') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('table_name') ? ' has-error' : '' }} col-md-6">
                                {!! Form::label('table_name', 'Table name') !!}
                                {!! Form::text('table_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('table_name') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('route_name') ? ' has-error' : '' }} col-md-6">
                                {!! Form::label('route_name', 'Route name') !!}
                                {!! Form::text('route_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('route_name') }}</small>
                            </div>
                        </div>
                </div>

                <div class="card-box table-responsive">
                    <h4 class="m-t-0 header-title"><b>Database Schema</b></h4>
                    <div class="clearfix"></div>
                    <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                     <th>Coulmn Title</th>
                                    <th>Database configration</th>
                                    <th>UI Configration</th>
                                    <th><i class="fa fa-times"></i></th>
                                </tr>
                            </thead>
                            <tbody class="data-container">

                                <tr class="data-row">
                                    <td>
                                        {!! Form::text('coulmntitle[]', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'Coulmn Title']) !!}
                                    </td>


                                    <td>
                                        @include("$base_view.$path.database-advanced")
                                    </td>
                                   <td>
                                        @include("$base_view.$path.ui-advanced")
                                    </td>

                                        <button data-toggle="duplicate-input-database" data-toggleclass="btn-danger btn-default" data-duplicate=".data-row" data-target=".data-container" data-toggledata="<i class='ti-minus'> </i>" type="button" class="btn btn-default">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <p class="help-block">Note: id column and created_at & updated_at will created automatically
                    </div>
                </div>
                </div>
            {!! Form::close() !!}

        </div>
    </div>

@stop

@push('script')
    <script src="{{ url('backend') }}/assets/mark/crud/create.js"></script>

@endpush
