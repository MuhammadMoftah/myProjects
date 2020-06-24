<div class="panel-body">

	<div class="col-lg-12">

		<!-- for any notes on the form -->

        {{-- <p class="text-muted font-14 m-b-20">
            Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
        </p> --}}

		
		<div class="form-group {{ $errors->has('title_ar') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('title_ar', __('lang.title_ar')) !!}
		    {!! Form::text('title_ar', null, ['class' => 'form-control', 'placeholder' =>  __('lang.title_ar')]) !!}
		    <small class="text-danger">{{ $errors->first('title_ar') }}</small>
		</div>

		<div class="form-group {{ $errors->has('title_en') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('title_en', __('lang.title_en')) !!}
		    {!! Form::text('title_en', null, ['class' => 'form-control', 'placeholder' =>  __('lang.title_en')]) !!}
		    <small class="text-danger">{{ $errors->first('title_en') }}</small>
		</div>

		<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }} col-md-12">
		    {!! Form::label('image', __('lang.image')) !!}
		    {!! Form::file('image', ['class' => 'form-control', 'placeholder' =>  __('lang.image')]) !!}
		    <small class="text-danger">{{ $errors->first('image') }}</small>
		</div>
		
		<div class="form-group {{ $errors->has('content_ar') ? ' has-error' : '' }} col-md-12">
		    {!! Form::label('content_ar', __('lang.content_ar')) !!}
		    {!! Form::textarea('content_ar', null, ['class' => 'form-control', 'placeholder' =>  __('lang.content_ar'), 'rows' => 3]) !!}
		    <small class="text-danger">{{ $errors->first('content_ar') }}</small>
		</div>

		<div class="form-group {{ $errors->has('content_en') ? ' has-error' : '' }} col-md-12">
		    {!! Form::label('content_en', __('lang.content_en')) !!}
		    {!! Form::textarea('content_en', null, ['class' => 'form-control', 'placeholder' =>  __('lang.content_en'), 'rows' => 3]) !!}
		    <small class="text-danger">{{ $errors->first('content_en') }}</small>
		</div>
		
    </div>
	
	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
		{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
	</div>




</div>

