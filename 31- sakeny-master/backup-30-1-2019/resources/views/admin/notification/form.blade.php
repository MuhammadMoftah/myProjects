<div class="panel-body">

	<div class="col-lg-12">

		<!-- for any notes on the form -->

        {{-- <p class="text-muted font-14 m-b-20">
            Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
        </p> --}}


		<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
		    {!! Form::label('title', __('lang.title')) !!}
		    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' =>  __('lang.title')]) !!}
		    <small class="text-danger">{{ $errors->first('title') }}</small>
		</div>
		<div class="clearfix"></div>
		<div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}">
		    {!! Form::label('message', __('lang.message')) !!}
		    {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' =>  __('lang.message')]) !!}
		    <small class="text-danger">{{ $errors->first('message') }}</small>
		</div>

    </div>

	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
		{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
	</div>




</div>

