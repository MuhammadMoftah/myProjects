@extends('admin.layouts.app')

@section('title',trans("lang.Profile"))

@section('content')

	<!-- Page-Title -->
	@section('breadcrumb')
            <li class="active">{{ trans("lang.Profile") }}</li>
	@stop
	<!-- PAGE CONTENT WRAPPER -->
	<div class="page-content-wrap container">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    <h3 class="panel-title"> {!!Lang::get("lang.edit")!!} </h3>
	                </div>
	                {!! Form::model($user,['method'=>'POST', 'files'=>true,'class' => 'ajax-form-request submit-form']) !!}
	                    <div class="panel-body">
	                    	<div class="row">
	                    		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
		                    	    {!! Form::label('name', trans('lang.name')) !!}
		                    	    {!! Form::text('name', null, ['class' => 'form-control']) !!}
		                    	    <small class="text-danger">{{ $errors->first('name') }}</small>
		                    	</div>

		                    	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
		                    	    {!! Form::label('email', trans('lang.email')) !!}
		                    	    {!! Form::email('email', null, ['class' => 'form-control']) !!}
		                    	    <small class="text-danger">{{ $errors->first('email') }}</small>
		                    	</div>
								<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} col-md-12">
								    {!! Form::label('image', trans('lang.image')) !!}
								    {!! Form::file('image', ['class' => 'form-control']) !!}
								    <small class="text-danger">{{ $errors->first('image') }}</small>
								</div>
		                    	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-6">
		                    	    {!! Form::label('password', trans('lang.password')) !!}
		                    	    {!! Form::password('password', ['class' => 'form-control']) !!}
		                    	    <small class="text-danger">{{ $errors->first('password') }}</small>
		                    	</div>

		                    	<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} col-md-6">
		                    	    {!! Form::label('password_confirmation', trans('lang.password_confirmation')) !!}
		                    	    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
		                    	    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
		                    	</div>

	                    	</div>	
		                    	<button type="submit" class="btn btn-default btn-style-custom">@lang('lang.save')</button>

	                    </div>
	                {!! Form::close() !!}         
	            </div>
	        </div>
	        <!-- END PAGE CONTENT WRAPPER -->                                                
	    </div>            
	    <!-- END PAGE CONTENT -->
	</div>
	<!-- END PAGE CONTAINER -->

@stop


@section('footer')


@stop