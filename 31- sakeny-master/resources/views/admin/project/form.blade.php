<div class="panel-body">

	<div class="col-lg-12">

		<!-- for any notes on the form -->

		{{-- <p class="text-muted font-14 m-b-20">
            Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
        </p> --}}


		<div class="form-group {{ $errors->has('title_ar') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('title_ar', __('lang.title_ar')) !!}
			{!! Form::text('title_ar', null, ['class' => 'form-control', 'placeholder' => __('lang.title_ar'), 'required']) !!}
			<small class="text-danger">{{ $errors->first('title_ar') }}</small>
		</div>

		<div class="form-group {{ $errors->has('title_en') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('title_en', __('lang.title_en')) !!}
			{!! Form::text('title_en', null, ['class' => 'form-control', 'placeholder' => __('lang.title_en'), 'required']) !!}
			<small class="text-danger">{{ $errors->first('title_en') }}</small>
		</div>

		<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('email', __('email')) !!}
			{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('email')]) !!}
			<small class="text-danger">{{ $errors->first('email') }}</small>
		</div>

		<div class="form-group {{ $errors->has('phone_number') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('phone_number', __('phone number')) !!}
			{!! Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => __('phone number')]) !!}
			<small class="text-danger">{{ $errors->first('phone_number') }}</small>
		</div>

		<div class="form-group {{ $errors->has('address') ? ' has-error' : '' }} col-md-12">
			{!! Form::label('address', __('lang.address')) !!}
			{!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('lang.address')]) !!}
			<small class="text-danger">{{ $errors->first('address') }}</small>
		</div>

		<div class="form-group {{ $errors->has('description_ar') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('description_ar', __('lang.description_ar')) !!}
			{!! Form::textarea('description_ar', null, ['class' => 'summernote', 'placeholder' => __('lang.description_ar'), 'rows' => 3, 'required']) !!}
			<small class="text-danger">{{ $errors->first('description_ar') }}</small>
		</div>

		<div class="form-group {{ $errors->has('description_en') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('description_en', __('lang.description_en')) !!}
			{!! Form::textarea('description_en', null, ['class' => 'summernote', 'placeholder' => __('lang.description_en'), 'rows' => 3, 'required']) !!}
			<small class="text-danger">{{ $errors->first('description_en') }}</small>
		</div>

		<div class="form-group {{ $errors->has('developer_description_ar') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('developer_description_ar', __('lang.developer_description_ar')) !!}
			{!! Form::textarea('developer_description_ar', null, ['class' => 'form-control summernote', 'placeholder' => __('lang.developer_description_ar'), 'rows' => 3, 'required']) !!}
			<small class="text-danger">{{ $errors->first('developer_description_ar') }}</small>
		</div>

		<div class="form-group {{ $errors->has('developer_description_en') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('developer_description_en', __('lang.developer_description_en')) !!}
			{!! Form::textarea('developer_description_en', null, ['class' => 'form-control summernote', 'placeholder' => __('lang.developer_description_en'), 'rows' => 3, 'required']) !!}
			<small class="text-danger">{{ $errors->first('developer_description_en') }}</small>
		</div>

		<div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('country_id', __('lang.country_id')) !!}
			{!! Form::select('country_id', $countries_list, null, ['class' => 'form-control select2', 'placeholder' => __('lang.select country')]) !!}
			<small class="text-danger">{{ $errors->first('country_id') }}</small>
		</div>
		<div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('city_id', __('lang.city_id')) !!}
			<div id="cityList">
				{!! Form::select('city_id', [], null, ['class' => 'form-control', 'placeholder' => __('lang.select city')]) !!}
			</div>
			<small class="text-danger">{{ $errors->first('city_id') }}</small>
		</div>

		<div class="form-group {{ $errors->has('district_id') ? ' has-error' : '' }} col-md-12">
			{!! Form::label('district_id', "district") !!}
			<div id="districtList">
				{!! Form::select('district_id', $districts, null, ['class' => 'form-control', 'placeholder' => __('lang.select district')]) !!}
			</div>
			<small class="text-danger">{{ $errors->first('district_id') }}</small>
		</div>

		<div class="form-group{{ $errors->has('activation') ? ' has-error' : '' }}">
			{!! Form::label('activation', 'Activation') !!}
			{!! Form::select('activation', [ 1 => __('lang.active'), 0 => __('lang.inactive')], null, ['id' => 'activation', 'class' => 'form-control']) !!}
			<small class="text-danger">{{ $errors->first('activation') }}</small>
		</div>

		<div class="form-group {{ $errors->has('property_type_id[]') ? ' has-error' : '' }} col-md-12">
		    {!! Form::label('property_type_id[]', 'properties') !!}
		    {!! Form::select('property_type_id[]', $property_type_list, null, ['class' => 'form-control select2','multiple']) !!}
		    <small class="text-danger">{{ $errors->first('property_type_id[]') }}</small>
		</div>

		<div class="form-group {{ $errors->has('price_from') ? ' has-error' : '' }} col-md-5">
			{!! Form::label('price', 'price from') !!}
			{!! Form::number('price_from', null, ['class' => 'form-control', 'placeholder' => 'price from', 'min' => 1]) !!}
			<small class="text-danger">{{ $errors->first('price_from') }}</small>
		</div>

		<div class="form-group {{ $errors->has('price_to') ? ' has-error' : '' }} col-md-5">
			{!! Form::label('price', 'price to') !!}
			{!! Form::number('price_to', null, ['class' => 'form-control', 'placeholder' => 'price to', 'min' => 1]) !!}
			<small class="text-danger">{{ $errors->first('price_to') }}</small>
		</div>

		<div class="form-group {{ $errors->has('size_from') ? ' has-error' : '' }} col-md-5">
			{!! Form::label('size', 'size from') !!}
			{!! Form::number('size_from', null, ['class' => 'form-control', 'placeholder' => 'size from', 'min' => 1]) !!}
			<small class="text-danger">{{ $errors->first('size_from') }}</small>
		</div>

		<div class="form-group {{ $errors->has('size_to') ? ' has-error' : '' }} col-md-5">
			{!! Form::label('size', 'size to') !!}
			{!! Form::number('size_to', null, ['class' => 'form-control', 'placeholder' => 'size to', 'min' => 1]) !!}
			<small class="text-danger">{{ $errors->first('size_to') }}</small>
		</div>

		<div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('featured', 'Featured') !!}
			<select name="feature" class="form-control select2" placeholder="select status of developer">
				<option value="1" @if(isset($row)){{$row->feature==1?'selected':''}}@endif>Featured</option>
				<option value="0" @if(isset($row)){{$row->feature==0?'selected':''}}@endif>Not Featured</option>
			</select>
			<small class="text-danger">{{ $errors->first('feature') }}</small>
		</div>

		{{-- <div class="form-group {{ $errors->has('location') ? ' has-error' : '' }} col-md-12">
		{!! Form::label('location', __('lang.location')) !!}
		(<small class="text-danger">@lang('lang.Embed code')</small>)
		{!! Form::textarea('location', null, ['class' => 'form-control', 'placeholder' => __('lang.location'), 'rows' => 3, 'required']) !!}

		<small class="text-danger">{{ $errors->first('location') }}</small>
	</div> --}}

	<div class="form-group col-md-12">
		{!! Form::label('addressMap', __('lang.pick your location')) !!}
		<div class="m-input-icon m-input-icon--right">
			<input id="addressMap" type="text" class="form-control m-input" placeholder="Enter your address">
			<span class="m-input-icon__icon m-input-icon__icon--right">
				<span>
					<i class="la la-map-marker"></i>
				</span>
			</span>
		</div>
		<div id="picker" style="width: 100%; height: 400px;"></div>

		{!! Form::hidden('latitude', isset($row->latitude) && $row->latitude != "" ? $row->latitude : 30.0986622) !!}
		{!! Form::hidden('longitude', isset($row->longitude) && $row->longitude != "" ? $row->longitude : 31.31760029999998) !!}
	</div>

	<div class="form-group {{ $errors->has('video') ? ' has-error' : '' }} col-md-12">
		{!! Form::label('video', __('lang.video')) !!}
		{!! Form::file('video', ['class' => 'form-control', 'placeholder' => __('lang.video')]) !!}
		<small class="text-danger">{{ $errors->first('video') }}</small>
	</div>

	<div class="form-group col-md-12">
		{!! Form::label('image', __('lang.images')) !!}<span class="text-danger">*</span>
		<div class="data-container-images">
			<div class="data-row-images">
				<div class="links_wrap">
					<div class="col-md-6">
						{!!Form::file('images[]', array('class'=>'form-control selectImg'))!!} <br>
					</div>
					<div class="col-md-5">
						<img width="200" src="" class="img-thumbnail img-responsive">
					</div>
					<div class="col-md-1">
						<button data-toggle="duplicate-input-images" data-toggleclass="btn-danger btn-default" data-duplicate=".data-row-images" data-target=".data-container-images" data-toggledata="<i class='ti-minus'> </i>" type="button" class="btn btn-default">
							<i class="ti-plus"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="form-group col-md-12">
		{!! Form::label('feature', __('lang.features')) !!}<span class="text-danger">*</span>
		<div class="data-container-features">
			<div class="data-row-features">
				<div class="links_wrap">
					<div class="col-md-11">
						{!!Form::text('features[]', '', array('class'=>'form-control'))!!} <br>
					</div>

					<div class="col-md-1">
						<button data-toggle="duplicate-input" data-toggleclass="btn-danger btn-default" data-duplicate=".data-row-features" data-target=".data-container-features" data-toggledata="<i class='ti-minus'> </i>" type="button" class="btn btn-default">
							<i class="ti-plus"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	@isset ($row)
	<div class="col-md-12">
		<hr>
		<label class="control-label col-md-2">@lang('lang.Current Images')</label><br>
		<div class="row col-md-12">
			{{-- @if (request('name_en')) --}}
			@foreach($row->images as $image)
			<div class="col-md-2 single-image">
				<img src="{{ env('AWS_URL') .$image->image }}" style=" height: 150px; width: 150px; box-shadow: 3px 1px 15px rgba(0, 0, 0, 0.3) !important;">
				<button href="{{ url("admin/project/image/delete/$image->id") }}" type="button" class="btn btn-danger deleteProduct" data-id="{{ $image->id }}" data-token="{{ csrf_token() }}" style="border-radius: 42%;margin-left: 50px;margin-top: 10px;"><i class="icon-trash"></i></button>
			</div>
			@endforeach
			{{-- @endif --}}

		</div>
	</div>


	<div class="col-md-12">
		<br>
		<hr>
		<label class="control-label col-md-2">@lang('lang.Current features')</label><br>
		<div class="row col-md-12">
			{{-- @if (request('name_en')) --}}
			@foreach($row->features as $feature)
			<div class="col-md-2 single-image">
				<div style="border: 1px solid; padding: 10px;"> {{ $feature->feature }} </div>
				<button href="{{ url("admin/project/feature/delete/$feature->id") }}" type="button" class="btn btn-danger deleteProduct" data-id="{{ $feature->id }}" data-token="{{ csrf_token() }}" style="border-radius: 42%;margin-left: 50px;margin-top: 10px;"><i class="icon-trash"></i></button>
			</div>
			@endforeach
			{{-- @endif --}}

		</div>
	</div>
	@endisset

	{!! Form::hidden('developer_id', request('developer')) !!}

</div>

<div class="form-group text-right m-b-0">
	<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
	{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
</div>

</div>

@push('script')
<!-- include summernote css/js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
	$(document).ready(function() {
		$('.summernote').summernote();
	});
</script>
<script type="text/javascript" src='https://maps.google.com/maps/api/
	js?sensor=false&libraries=places&key=AIzaSyAiJwjqodwVVY04ESTFA9REOjqOt1pXOQI'></script>
<script src="{{url('backend')}}/assets/js/locationpicker.jquery.js"></script>
<script>
	$(document).ready(function() {
		$country_id = $('[name="country_id"]').val();
		$.get('{{ url(ADMIN_PATH."/ads/api/cities") }}', {
			country_id: $country_id,
			selected: "@if(isset($row)) {{ $row->city_id }} @else 0 @endif"
		}, function(data) {
			$('#cityList').html(data);
		});

		$(document).on('change', '[name="country_id"]', function() {
			$country_id = $('[name="country_id"]').val();
			$.get('{{ url(ADMIN_PATH."/ads/api/cities") }}', {
				country_id: $country_id,
				selected: "@if(isset($row)) {{ $row->city_id }} @else 0 @endif"
			}, function(data) {
				$('#cityList').html(data);
			});
		})

		$(document).on('change', '[name="city_id"]', function() {
			$city_id = $('[name="city_id"]').val();
			$.get('{{ url(ADMIN_PATH."/ads/api/districts") }}', {
				city_id: $city_id,
				selected: "@if(isset($row)) {{ $row->district_id }} @else 0 @endif"
			}, function(data) {
				$('#districtList').html(data);
			});
		})
	});
</script>

<script>
	$('#picker').locationpicker({
		location: {
			latitude: {{isset($row->latitude) && $row->latitude != "" ? $row->latitude : 30.0986622}},
			longitude: {{isset($row->longitude) && $row->longitude != "" ? $row->longitude : 31.31760029999998}},
		},
		radius: 20,
		zoom: 17,
		inputBinding: {
			locationNameInput: $('#addressMap')
		},
		enableAutocomplete: true,
		onchanged: function(currentLocation, radius, isMarkerDropped) {
			$("[name='latitude']").val(currentLocation.latitude);
			$("[name='longitude']").val(currentLocation.longitude);
		}
	});
</script>

<script type="text/javascript">
	$(document).ready(function() {

		$(document).on('click', '[data-toggle="duplicate-input-images"]', function(e) {
			$item_selector = $(this).data('duplicate'); // item need to duplicate
			$item = $($item_selector).last().clone(); // clone it


			// empty all inputs
			$item.find('input').val('');
			$item.find('img').attr('src', '');
			$item.find('input:not([type="checkbox"]) :not([type="radio"])').val('');
			$item.find('textarea').val('');
			$item.find('input[type="checkbox"]').prop('checked', false);
			$item.find('input[type="radio"]').prop('checked', false);

			// target will receive the data
			$target = $(this).data('target'); //get target

			// replace content of button such as icon
			$item.find(`[data-target="${$target}"]`)
				.children().first()
				.replaceWith($(this).data('toggledata'));

			// change button functionlity to remove instead of create
			$item.find(`[data-target="${$target}"]`)
				.toggleClass($(this).data('toggleclass'))
				.attr('data-toggle', 'remove-input');

			if ($($target).length == 1) {
				$($target).append($item);
			} else if ($($target).length > 1) {
				$(this).parents($item_selector).closest($target).append($item);
			}
		});
		$(document).on('change', '.selectImg', function(e) {
			var input = this;
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$(document).find(input).parent().parent()
						.find('img')
						.attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		})
	});
</script>
@endpush