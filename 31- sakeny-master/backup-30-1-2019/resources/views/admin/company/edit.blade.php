@extends('admin.layouts.app')

@section('title',trans("lang.$module_name")." - ".end($breadcrumb))

@section('content')

	<!-- Page-Title -->
	@section('breadcrumb')
	    @foreach ($breadcrumb as $bread)
            @if ($loop->remaining == 1)
                <li><a href="{{ url("$base_view/$route") }}">@lang("lang.$bread")</a></li>
            @elseif($loop->last)
                <li class="active">@lang("$bread")</li>
            @else
                <li>@lang("lang.$bread")</li>
            @endif
        @endforeach
	@stop
	 <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title pull-left"><b>{!!Lang::get("$bread")!!}</b></h4>
                <h4 class="m-t-0 header-title pull-right">
                    <img src="{{ url($row->logo) }}" class="img-responsive img-circle img-rounded" width="100" height="100">
                </h4>

                <div class="clearfix"></div>
	                {!! Form:: model($row,['method'=>'PATCH','url' => [ADMIN_PATH."/$route",$row->id], 'files'=>true,'class' => 'ajax-form-request submit-form']) !!}
	                    @include ("$base_view.$path.form",['submitButton' => Lang::get('lang.update')])
	                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop
