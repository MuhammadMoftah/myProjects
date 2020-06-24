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
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{!!Lang::get("lang.$bread")!!}</b></h4>
                <div class="clearfix"></div>
                {!! Form:: open(['method'=>'POST','url' => ADMIN_PATH."/$route", 'files'=>true,'class' => 'ajax-form-request']) !!}
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Key') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        @foreach ($languages as $language)
                            <div class="form-group{{ $errors->has("language[$language->id]") ? ' has-error' : '' }}">
                                {!! Form::label("language[$language->id]", $language->name) !!}
                                {!! Form::text("language[$language->id]", null, ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first("language[$language->id]") }}</small>
                            </div>
                        @endforeach

                        {!! Form::hidden('insertion_type', 'Manuelly') !!}

                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@stop
