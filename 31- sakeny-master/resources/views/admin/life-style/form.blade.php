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
		
		<div class="form-group {{ $errors->has('description_ar') ? ' has-error' : '' }} col-md-12">
		    {!! Form::label('description_ar', __('lang.description_ar')) !!}
		    {!! Form::textarea('description_ar', null, ['class' => 'form-control', 'placeholder' =>  __('lang.description_ar'), 'rows' => 3]) !!}
		    <small class="text-danger">{{ $errors->first('description_ar') }}</small>
		</div>

		<div class="form-group {{ $errors->has('description_en') ? ' has-error' : '' }} col-md-12">
		    {!! Form::label('description_en', __('lang.description_en')) !!}
		    {!! Form::textarea('description_en', null, ['class' => 'form-control', 'placeholder' =>  __('lang.description_en'), 'rows' => 3]) !!}
		    <small class="text-danger">{{ $errors->first('description_en') }}</small>
		</div>

		<div class="form-group {{ $errors->has('category_id') ? ' has-error' : '' }} col-md-12">
		    {!! Form::label('category_id', __('lang.category_id')) !!}
		    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
		    <small class="text-danger">{{ $errors->first('category_id') }}</small>
		</div>


    </div>
	
	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
		{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
	</div>




</div>

