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

		<div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('country_id', __('lang.country_id')) !!}
			<select name="country_id" class="form-control select2" placeholder="{{__('lang.select country')}}">
				<option disabled selected>Select country</option>
				@foreach($countries as $country)
					<option {{isset($row)? $row->country_id==$country->id?'selected':'' :''}} value="{{$country->id}}">{{$country->name_en}}</option>
				@endforeach
			</select>
			<small class="text-danger">{{ $errors->first('country_id') }}</small>
		</div>

		<div class="form-group {{ $errors->has('activation') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('activation', __('lang.activation')) !!}
		    {!! Form::select('activation', $activation, null, ['class' => 'form-control', 'placeholder' =>  __('lang.activation')]) !!}
		    <small class="text-danger">{{ $errors->first('activation') }}</small>
		</div>
		<div class="clearfix"></div>
		<div class="form-group {{ $errors->has('is_home') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('is_home', __('Show in homepage ?')) !!}
		    {!! Form::select('is_home', [ 1 => __('lang.active'), 0 => __('lang.inactive')], null, ['class' => 'form-control']) !!}
		    <small class="text-danger">{{ $errors->first('is_home') }}</small>
		</div>

		<div class="form-group{{ $errors->has('number_ads') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('number_ads', 'Number of ads') !!}
		    {!! Form::number('number_ads', null, ['class' => 'form-control', 'required' => 'required','min'=>0]) !!}
		    <small class="text-danger">{{ $errors->first('number_ads') }}</small>
		</div>

		<div class="clearfix"></div>
{{--
		<div class="form-group{{ $errors->has('price_per_meter') ? ' has-error' : '' }} col-md-12">
		    {!! Form::label('price_per_meter', __('lang.avg_price_per_unit')) !!}
		    {!! Form::number('price_per_meter', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('price_per_meter') }}</small>
		</div>
 --}}
		<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('image', 'Image') !!}
		    {!! Form::file('image', [ 'class'=>'form-control']) !!}
		    <small class="text-danger">{{ $errors->first('image') }}</small>
		</div>
		@if (isset($row))
			<div class="col-md-6">
				<img src="{{ env('AWS_URL') .$row->image }}">
			</div>
		@endif


    </div>

	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
		{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
	</div>




</div>

