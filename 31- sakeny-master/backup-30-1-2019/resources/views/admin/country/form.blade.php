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

		<div class="form-group {{ $errors->has('latitude') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('latitude', __('latitude')) !!}
			{!! Form::text('latitude', null, ['class' => 'form-control', 'placeholder' =>  __('latitude')]) !!}
			<small class="text-danger">{{ $errors->first('latitude') }}</small>
		</div>

		<div class="form-group {{ $errors->has('longitude') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('longitude', __('longitude')) !!}
			{!! Form::text('longitude', null, ['class' => 'form-control', 'placeholder' =>  __('longitude')]) !!}
			<small class="text-danger">{{ $errors->first('longitude') }}</small>
		</div>

		<div class="form-group {{ $errors->has('currency_ar') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('currency_ar', __('lang.currency_ar')) !!}
			{!! Form::text('currency_ar', null, ['class' => 'form-control', 'placeholder' =>  __('lang.currency_ar')]) !!}
			<small class="text-danger">{{ $errors->first('currency_ar') }}</small>
		</div>

		<div class="form-group {{ $errors->has('currency_en') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('currency_en', __('lang.currency_en')) !!}
			{!! Form::text('currency_en', null, ['class' => 'form-control', 'placeholder' =>  __('lang.currency_en')]) !!}
			<small class="text-danger">{{ $errors->first('currency_en') }}</small>
		</div>

		<div class="form-group {{ $errors->has('activation') ? ' has-error' : '' }} col-md-12">
		    {!! Form::label('activation', __('lang.activation')) !!}
		    {!! Form::select('activation', $activation, null, ['class' => 'form-control seelct2', 'placeholder' =>  __('lang.activation')]) !!}
		    <small class="text-danger">{{ $errors->first('activation') }}</small>
		</div>

		<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
		    {!! Form::label('image', 'Image') !!}
		    {!! Form::file('image', ['class' => 'form-control']) !!}
		    <small class="text-danger">{{ $errors->first('image') }}</small>
		</div>
		<div class="clearfix"></div>
		<hr> <h3> @lang('lang.user ads Info') </h3> <hr>

		<div class="form-group {{ $errors->has('price_for_special_ads') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('price_for_special_ads', __('lang.price_for_special_ads')) !!}
		    {!! Form::number('price_for_special_ads', null, ['class' => 'form-control' ,'min' => 0, 'placeholder' =>  __('lang.price_for_special_ads')]) !!}
		    <small class="text-danger">{{ $errors->first('price_for_special_ads') }}</small>
		</div>
		<div class="form-group {{ $errors->has('number_of_days_for_special_ads') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('number_of_days_for_special_ads', __('lang.number_of_days_for_special_ads')) !!}
		    {!! Form::number('number_of_days_for_special_ads', null, ['class' => 'form-control' ,'min' => 0, 'placeholder' =>  __('lang.number_of_days_for_special_ads')]) !!}
		    <small class="text-danger">{{ $errors->first('number_of_days_for_special_ads') }}</small>
		</div>
		<div class="form-group {{ $errors->has('price_for_bump_up_ads') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('price_for_bump_up_ads', __('lang.price_for_bump_up_ads')) !!}
		    {!! Form::number('price_for_bump_up_ads', null, ['class' => 'form-control' ,'min' => 0, 'placeholder' =>  __('lang.price_for_bump_up_ads')]) !!}
		    <small class="text-danger">{{ $errors->first('price_for_bump_up_ads') }}</small>
		</div>
		<div class="form-group {{ $errors->has('number_of_days_for_bump_up_ads') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('number_of_days_for_bump_up_ads', __('lang.number_of_days_for_bump_up_ads')) !!}
		    {!! Form::number('number_of_days_for_bump_up_ads', null, ['class' => 'form-control' ,'min' => 0, 'placeholder' =>  __('lang.number_of_days_for_bump_up_ads')]) !!}
		    <small class="text-danger">{{ $errors->first('number_of_days_for_bump_up_ads') }}</small>
		</div>
		<div class="clearfix"></div>
				<div class="clearfix"></div>
		<hr> <h3> Trial Package Info </h3> <hr>
		<div class="form-group {{ $errors->has('number_of_days_for_trial_package') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('number_of_days_for_trial_package', __('lang.number_of_days_for_trial_package')) !!}
		    {!! Form::number('number_of_days_for_trial_package', null, ['class' => 'form-control' ,'min' => 0, 'placeholder' =>  __('lang.number_of_days_for_trial_package')]) !!}
		    <small class="text-danger">{{ $errors->first('number_of_days_for_trial_package') }}</small>
		</div>
		<div class="form-group {{ $errors->has('number_of_ads_for_trial_package') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('number_of_ads_for_trial_package', __('lang.number_of_ads_for_trial_package')) !!}
		    {!! Form::number('number_of_ads_for_trial_package', null, ['class' => 'form-control' ,'min' => 0, 'placeholder' =>  __('lang.number_of_ads_for_trial_package')]) !!}
		    <small class="text-danger">{{ $errors->first('number_of_ads_for_trial_package') }}</small>
		</div>
		<div class="clearfix"></div>
    </div>

	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
		{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
	</div>




</div>

