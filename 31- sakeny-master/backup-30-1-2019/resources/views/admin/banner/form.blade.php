<div class="panel-body">
	<div class="col-lg-12">


		<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} col-md-12">
		    {!! Form::label('name', __('lang.name')) !!}
		    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' =>  __('lang.name')]) !!}
		    <small class="text-danger">{{ $errors->first('name') }}</small>
		</div>

		<div class="form-group {{ $errors->has('activation') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('activation', __('lang.activation')) !!}
		    {!! Form::select('activation', $activation, null, ['class' => 'form-control', 'placeholder' =>  __('lang.activation')]) !!}
		    <small class="text-danger">{{ $errors->first('activation') }}</small>
		</div>
		<div class="clearfix"></div>

		<div class="clearfix"></div>


		<div class="form-group{{ $errors->has('page') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('page', 'page') !!}
		    {!! Form::select('page', $page_lists, null, ['id' => 'page', 'class' => 'form-control','required']) !!}
		    <small class="text-danger">{{ $errors->first('page') }}</small>
		</div>

		<div class="form-group{{ $errors->has('place') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('place', 'Place') !!}
		    {!! Form::select('place', $place_lists, null, ['id' => 'place', 'class' => 'form-control','required']) !!}
		    <small class="text-danger">{{ $errors->first('place') }}</small>
		</div>

		<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}col-md-12">
		    {!! Form::label('type', 'type') !!}
		    {!! Form::select('type', $type_lists, null, ['id' => 'type', 'class' => 'form-control','required']) !!}
		    <small class="text-danger">{{ $errors->first('type') }}</small>
		</div>

		<div class="codeSection hidden" banner-type="1">
			<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}col-md-12">
			    {!! Form::label('code', 'Code') !!}
			    {!! Form::textarea('code', null, ['class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('code') }}</small>
			</div>
		</div>
		<div class="bannerSection hidden" banner-type="2">
			<div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}col-md-12">
			    {!! Form::label('url', 'Url') !!}
			    {!! Form::url('url', null, ['class' => 'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('url') }}</small>
			</div>
			<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }} col-md-12">
			    {!! Form::label('image', 'Image') !!}
			    {!! Form::file('image', [ 'class'=>'form-control']) !!}
			    <small class="text-danger">{{ $errors->first('image') }}</small>
			</div>
			@if (isset($row))
				<div class="col-md-6">
					<img width="200" src="{{ url("$row->image") }}">
				</div>
			@endif
		</div>

		<br><br>

		<div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('country_id', __('lang.country_id')) !!}
		    {!! Form::select('country_id', $countries_list, null, ['class' => 'form-control select2', 'placeholder' =>  __('lang.select country')]) !!}
		    <small class="text-danger">{{ $errors->first('country_id') }}</small>
		</div>
		<div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('city_id', __('lang.city_id')) !!}
			    <div id="cityList">
			    	{!! Form::select('city_id', [], null, ['class' => 'form-control', 'placeholder' =>  __('lang.select city')]) !!}
			    </div>
		    <small class="text-danger">{{ $errors->first('city_id') }}</small>
		</div>
		<br><br>


		<div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('start_date', 'Start date') !!}
		    {!! Form::date('start_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('start_date') }}</small>
		</div>
		<div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }} col-md-6">
		    {!! Form::label('end_date', 'End date') !!}
		    {!! Form::date('end_date', null, ['class' => 'form-control', 'required' => 'required']) !!}
		    <small class="text-danger">{{ $errors->first('end_date') }}</small>
		</div>

    </div>

	<div class="form-group text-right m-b-0">
		<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
		{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
	</div>




</div>


@push('script')
	<script type="text/javascript">
		$(document).ready(function() {
			typeHandler();
			$('[name="type"]').on('change', function(e){
				typeHandler();
			});
		});

		function typeHandler() {
			$val = $('[name="type"]').val();
			if ($val == 1) {
				$('[banner-type="2"]').addClass('hidden');
			}else {
				$('[banner-type="1"]').addClass('hidden');
			}
			$('[banner-type="' + $val +'"]').removeClass('hidden');
		}
	</script>
		<script>
		$(document).ready(function() {
			$country_id = $('[name="country_id"]').val();
			$.get('{{ url(ADMIN_PATH."/ads/api/cities") }}',{country_id: $country_id, selected: "@if(isset($row)) {{ $row->city_id }} @else 0 @endif"}, function(data) {
				$('#cityList').html(data);
			});

			$(document).on('change','[name="country_id"]', function(){
				$country_id = $('[name="country_id"]').val();
				$.get('{{ url(ADMIN_PATH."/ads/api/cities") }}',{country_id: $country_id, selected: "@if(isset($row)) {{ $row->city_id }} @else 0 @endif"}, function(data) {
					$('#cityList').html(data);
				});
			})
		});
	</script>

@endpush
