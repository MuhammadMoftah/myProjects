<div class="panel-body">

	<div class="col-lg-12">

		<!-- for any notes on the form -->

        {{-- <p class="text-muted font-14 m-b-20">
            Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
        </p> --}}

		
		<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('name', __('lang.name')) !!}
		    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' =>  __('lang.name')]) !!}
		    <small class="text-danger">{{ $errors->first('name') }}</small>
		</div>

		<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('email', __('lang.email')) !!}
		    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' =>  __('lang.email')]) !!}
		    <small class="text-danger">{{ $errors->first('email') }}</small>
		</div>

		<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('phone', __('lang.phone')) !!}
		    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' =>  __('lang.phone')]) !!}
		    <small class="text-danger">{{ $errors->first('phone') }}</small>
		</div>

		{{--<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('password', __('lang.password')) !!}
		    {!! Form::password('password', ['class' => 'form-control', 'placeholder' =>  __('lang.password')]) !!}
		    <small class="text-danger">{{ $errors->first('password') }}</small>
		</div>--}}

		<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('image', __('lang.image')) !!}
		    {!! Form::file('image', ['class' => 'form-control', 'placeholder' =>  __('lang.image')]) !!}
		    <small class="text-danger">{{ $errors->first('image') }}</small>
		</div>

		<div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('gender', __('lang.gender')) !!}
		    {!! Form::select('gender', $gender, null, ['class' => 'form-control seelct2']) !!}
		    <small class="text-danger">{{ $errors->first('gender') }}</small>
		</div>

		
		{!! Form::hidden('activation', 1); !!}
		{!! Form::hidden('type', 1); !!}


    </div>
	
	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
		{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
	</div>




</div>

