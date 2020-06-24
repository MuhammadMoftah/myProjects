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
                <h4 class="m-t-0 header-title"><b>{!!Lang::get("$bread")!!}</b></h4>
                <div class="clearfix"></div>
	                {!! Form:: model($row,['method'=>'PATCH','url' => [ADMIN_PATH."/$route",$row->id], 'files'=>true,'class' => 'ajax-form-request']) !!}
	                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! Form::label('name', 'Key') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>

                        @foreach ($languages as $language)
                            @php
                                $l = $row->translations()->whereLanguageId($language->id)->first();
                                $l = $l ? $l->value : '--';
                            @endphp
                            <div class="form-group{{ $errors->has("language[$language->id]") ? ' has-error' : '' }}">
                                {!! Form::label("language[$language->id]", $language->name) !!}
                                {!! Form::text("language[$language->id]", $l , ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first("language[$language->id]") }}</small>
                            </div>
                        @endforeach

                        {!! Form::hidden('insertion_type', 'Manuelly') !!}
                        {!! Form::hidden('status', 'Pending') !!}

                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
	                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop
