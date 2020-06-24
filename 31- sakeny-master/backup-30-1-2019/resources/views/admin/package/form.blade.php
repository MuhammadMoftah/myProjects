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

		<div class="form-group {{ $errors->has('description_ar') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('description_ar', __('lang.description_ar')) !!}
		    {!! Form::textarea('description_ar', null, ['class' => 'form-control', 'placeholder' =>  __('lang.description_ar'), 'rows' => 3]) !!}
		    <small class="text-danger">{{ $errors->first('description_ar') }}</small>
		</div>

		<div class="form-group {{ $errors->has('description_en') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('description_en', __('lang.description_en')) !!}
		    {!! Form::textarea('description_en', null, ['class' => 'form-control', 'placeholder' =>  __('lang.description_en'), 'rows' => 3]) !!}
		    <small class="text-danger">{{ $errors->first('description_en') }}</small>
		</div>

		<div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('country_id', __('lang.country_id')) !!}
		    {!! Form::select('country_id', $countries, null, ['class' => 'form-control select2', 'placeholder' =>  __('lang.select country')]) !!}
		    <small class="text-danger">{{ $errors->first('country_id') }}</small>
		</div>

		<div class="form-group {{ $errors->has('type') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('type', __('lang.package type')) !!}
		    {!! Form::select('type', $packagesType, null, ['class' => 'form-control select2']) !!}
		    <small class="text-danger">{{ $errors->first('type') }}</small>
		</div>

		<div class="form-group{{ $errors->has('number_of_premium_ads') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('number_of_premium_ads', trans('lang.number_of_premium_ads')) !!}
		    {!! Form::number('number_of_premium_ads', null, ['class' => 'form-control', 'required' => 'required','min'=>1]) !!}
		    <small class="text-danger">{{ $errors->first('number_of_premium_ads') }}</small>
		</div>
		<div class="form-group{{ $errors->has('number_of_regular_ads') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('number_of_regular_ads', trans('lang.number_of_regular_ads')) !!}
		    {!! Form::number('number_of_regular_ads', null, ['class' => 'form-control', 'required' => 'required','min'=>1]) !!}
		    <small class="text-danger">{{ $errors->first('number_of_regular_ads') }}</small>
		</div>
		<div class="form-group{{ $errors->has('number_of_repost_ads') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('number_of_repost_ads', trans('lang.number_of_repost_ads')) !!}
		    {!! Form::number('number_of_repost_ads', null, ['class' => 'form-control', 'required' => 'required','min'=>1]) !!}
		    <small class="text-danger">{{ $errors->first('number_of_repost_ads') }}</small>
		</div>
		<div class="form-group{{ $errors->has('number_of_facebook_ads') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('number_of_facebook_ads', trans('lang.number_of_facebook_ads')) !!}
		    {!! Form::number('number_of_facebook_ads', null, ['class' => 'form-control', 'required' => 'required','min'=>1]) !!}
		    <small class="text-danger">{{ $errors->first('number_of_facebook_ads') }}</small>
		</div>
{{-- 		<div class="form-group{{ $errors->has('number_of_agents') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('number_of_agents', trans('lang.number_of_agents')) !!}
		    {!! Form::number('number_of_agents', null, ['class' => 'form-control', 'required' => 'required','min'=>1]) !!}
		    <small class="text-danger">{{ $errors->first('number_of_agents') }}</small>
		</div> --}}


		<div class="form-group{{ $errors->has('price') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('price', trans('lang.price')) !!}
		    {!! Form::number('price', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('price') }}</small>
		</div>

		<div class="form-group {{ $errors->has('activation') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('activation', __('lang.activation')) !!}
		    {!! Form::select('activation', $activation, null, ['class' => 'form-control seelct2', 'placeholder' =>  __('lang.activation')]) !!}
		    <small class="text-danger">{{ $errors->first('activation') }}</small>
		</div>


    </div>

	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
		{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
	</div>




</div>

