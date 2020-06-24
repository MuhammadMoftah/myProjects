<div class="panel-body">
	<div class="col-lg-12">
        <div class="clearfix"></div>
		<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('name', __('lang.name')) !!}
		    {!! Form::text('name', isset($row->user->name) ? $row->user->name : null, ['class' => 'form-control', 'placeholder' =>  __('lang.name')]) !!}
		    <small class="text-danger">{{ $errors->first('name') }}</small>
		</div>
		<div class="clearfix"></div>

		<div class="form-group {{ $errors->has('registered_name') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('registered_name', __('lang.registered_name')) !!}
		    {!! Form::text('registered_name', null, ['class' => 'form-control', 'placeholder' =>  __('lang.registered_name')]) !!}
		    <small class="text-danger">{{ $errors->first('registered_name') }}</small>
		</div>
		<div class="clearfix"></div>

		<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('description', __('lang.description')) !!}
		    {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' =>  __('lang.description'), 'rows' => 3]) !!}
		    <small class="text-danger">{{ $errors->first('description') }}</small>
		</div>
		<div class="clearfix"></div>

		<div class="form-group{{ $errors->has('activation') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('activation', 'Activation') !!}
		    {!! Form::select('activation',[ 1 => __('lang.active'), 0 => __('lang.inactive'),2=>__('Pending')], isset($row->user->activation) ? $row->user->activation : null, ['id' => 'activation', 'class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('activation') }}</small>
		</div>
		<div class="form-group{{ $errors->has('in_registration') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('in_registration', 'Show in registration page') !!}
		    {!! Form::select('in_registration',[ 1 => __('lang.active'), 0 => __('lang.inactive')], null, ['id' => 'in_registration', 'class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('in_registration') }}</small>
		</div>
		<div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }} col-md-12">
		    {!! Form::label('country_id', 'Country') !!}
		    {!! Form::select('country_id',$countries_list, null, ['id' => 'country_id', 'class' => 'form-control','placeholder'=>'Select country']) !!}
		    <small class="text-danger">{{ $errors->first('country_id') }}</small>
		</div>


		@if (isset($row))
			{!! Form::hidden('user_id', $row->user_id) !!}
		@endif

		<hr> <h3> @lang('lang.Contact Info') </h3> <hr>
		<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('email', __('lang.email')) !!}
		    {!! Form::email('email', isset($row->user->email) ? $row->user->email : null, ['class' => 'form-control', 'placeholder' =>  __('lang.email')]) !!}
		    <small class="text-danger">{{ $errors->first('email') }}</small>
		</div>

		<div class="form-group {{ $errors->has('cr_number') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('cr_number', __('lang.cr_number')) !!}
		    {!! Form::text('cr_number', null, ['class' => 'form-control', 'placeholder' =>  __('lang.cr_number')]) !!}
		    <small class="text-danger">{{ $errors->first('cr_number') }}</small>
		</div>
		<div class="clearfix"></div>

		<div class="form-group {{ $errors->has('cr_number_file') ? ' has-error' : '' }} col-md-6">
			<label for="">
				@lang('lang.cr_number_file')
				@if(isset($row) && $row->cr_number_file != null)
			    	[<a href="{{ url($row->cr_number_file) }}" download="">Download</a>]
			    @endif
			</label>
		    {!! Form::file('cr_number_file', ['class' => 'form-control']) !!}
		    <small class="text-danger">{{ $errors->first('cr_number_file') }}</small>

		</div>

		<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('phone', __('lang.phone')) !!}
		    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' =>  __('lang.phone')]) !!}
		    <small class="text-danger">{{ $errors->first('phone') }}</small>
		</div>

		<div class="clearfix"></div>

		<div class="form-group {{ $errors->has('city') ? ' has-error' : '' }} col-md-4">
		    {!! Form::label('city', __('lang.city')) !!}
		    {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' =>  __('lang.city')]) !!}
		    <small class="text-danger">{{ $errors->first('city') }}</small>
		</div>

		<div class="form-group {{ $errors->has('zip_code') ? ' has-error' : '' }} col-md-2">
		    {!! Form::label('zip_code', __('lang.zip_code')) !!}
		    {!! Form::text('zip_code', null, ['class' => 'form-control', 'placeholder' =>  __('lang.zip_code')]) !!}
		    <small class="text-danger">{{ $errors->first('zip_code') }}</small>
		</div>

		{{-- <div class="form-group {{ $errors->has('num_agents') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('num_agents', __('lang.num_agents')) !!}
		    {!! Form::number('num_agents', null, ['class' => 'form-control', 'placeholder' =>  __('lang.num_agents'), 'min' => 0]) !!}
		    <small class="text-danger">{{ $errors->first('num_agents') }}</small>
		</div> --}}

		<div class="clearfix"></div>

		<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }} col-md-12">
		    {!! Form::label('logo', __('lang.logo')) !!}
		    {!! Form::file('image', ['class' => 'form-control', 'placeholder' =>  __('lang.logo')]) !!}
		    <small class="text-danger">{{ $errors->first('image') }}</small>
		</div>


		{{-- {!! Form::hidden('activation', 1); !!} --}}
		{!! Form::hidden('type', 2); !!}

		<div class="clearfix"></div>
		<hr> <h3> @lang('Subscription details') </h3> <hr>
		<div class="form-group{{ $errors->has('number_of_premium_ads') ? ' has-error' : '' }} col-md-3">
		    {!! Form::label('number_of_premium_ads', 'Number of premium ads') !!}
		    {!! Form::number('number_of_premium_ads', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('number_of_premium_ads') }}</small>
		</div>
		<div class="form-group{{ $errors->has('number_of_regular_ads') ? ' has-error' : '' }} col-md-3">
		    {!! Form::label('number_of_regular_ads', 'Number of regular ads') !!}
		    {!! Form::number('number_of_regular_ads', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('number_of_regular_ads') }}</small>
		</div>
		<div class="form-group{{ $errors->has('number_of_agents') ? ' has-error' : '' }} col-md-3">
		    {!! Form::label('number_of_agents', 'Number of agents') !!}
		    {!! Form::number('number_of_agents', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('number_of_agents') }}</small>
		</div>
		<div class="form-group{{ $errors->has('number_of_repost') ? ' has-error' : '' }} col-md-3">
		    {!! Form::label('number_of_repost', 'Number of reposts') !!}
		    {!! Form::number('number_of_repost', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('number_of_repost') }}</small>
		</div>



    </div>

	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
		{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
	</div>




</div>

