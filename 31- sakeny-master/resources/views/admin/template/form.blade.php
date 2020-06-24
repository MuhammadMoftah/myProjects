<div class="panel-body">

	<div class="col-lg-12">

		<!-- for any notes on the form -->

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

		<div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('city_id', __('lang.city_id')) !!}
			    <div id="cityList">
			    	{!! Form::select('city_id', [], null, ['class' => 'form-control', 'placeholder' =>  __('lang.select city')]) !!}
			    </div>
		    <small class="text-danger">{{ $errors->first('city_id') }}</small>
		</div>

		<div class="form-group {{ $errors->has('offer_type_id') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('offer_type_id', __('lang.Offer Types')) !!}
		    {!! Form::select('offer_type_id', $offer_types, null, ['class' => 'form-control select2', 'placeholder' =>  __('Select Offer Type')]) !!}
		    <small class="text-danger">{{ $errors->first('offer_type_id') }}</small>
		</div>

		<div class="form-group {{ $errors->has('property_type_id') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('property_type_id', __('lang.property_type_id')) !!}
		    {!! Form::select('property_type_id', $property_types, null, ['class' => 'form-control select2', 'placeholder' =>  __('Select Property Type')]) !!}
		    <small class="text-danger">{{ $errors->first('property_type_id') }}</small>
		</div>

    </div>

	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
		{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
	</div>



</div>


@push('script')
	<script>
		$(document).ready(function() {

			$country_id = $('[name="country_id"]').val();
			$.get('{{ url(ADMIN_PATH."/ads/api/cities") }}',{country_id: $country_id, selected: @if(isset($row)) {{ $row->city_id }} @else 0 @endif}, function(data) {
				$('#cityList').html(data);
			});

			$(document).on('change','[name="country_id"]', function(){
				$country_id = $('[name="country_id"]').val();
				$.get('{{ url(ADMIN_PATH."/ads/api/cities") }}',{country_id: $country_id, selected: @if(isset($row)) {{ $row->city_id }} @else 0 @endif}, function(data) {
					$('#cityList').html(data);
				});
			})


		});

	</script>
@endpush
