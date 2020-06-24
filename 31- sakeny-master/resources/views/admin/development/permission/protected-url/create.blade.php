@extends('admin.layouts.app')

@section('title',trans("lang.$module_name")." - ".trans("lang.".end($breadcrumb)))

@section('content')

    <!-- Page-Title -->
    @section('breadcrumb')
        @foreach ($breadcrumb as $bread)
            @if ($loop->remaining == 1)
                <li><a href="{{ url("$base_view/$route") }}">@lang("$bread")</a></li>
            @elseif($loop->last)
                <li class="active">@lang("Add Exception Action")</li>
            @else
                <li>@lang("lang.$bread")</li>
            @endif
        @endforeach
    @stop
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b>{!!Lang::get("Add Exception Action")!!}</b></h4>
                <div class="clearfix"></div>
                {!! Form:: open(['method'=>'POST','url' => ADMIN_PATH."/$route", 'files'=>true,'class' => 'ajax-form-request']) !!}
                    @include ("$base_view.$path.form",['submitButton' => Lang::get('lang.create')])
                {!! Form::close() !!}
            </div>
        </div>
    </div>


@stop
