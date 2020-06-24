<div class="panel-body">

	<div class="col-lg-12">

		<!-- for any notes on the form -->

        {{-- <p class="text-muted font-14 m-b-20">
            Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
        </p> --}}

		
		<div class="form-group {{ $errors->has('name_ar') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('name_ar', __('lang.name_ar')) !!}
		    {!! Form::text('name_ar', null, ['class' => 'form-control', 'placeholder' =>  __('lang.name_ar')]) !!}
		    <small class="text-danger">{{ $errors->first('name_ar') }}</small>
		</div>

		<div class="form-group {{ $errors->has('name_en') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('name_en', __('lang.name_en')) !!}
		    {!! Form::text('name_en', null, ['class' => 'form-control', 'placeholder' =>  __('lang.name_en')]) !!}
		    <small class="text-danger">{{ $errors->first('name_en') }}</small>
		</div>
		

    </div>
	
	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
		{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
	</div>




</div>

