<div class="panel-body">

	<div class="col-lg-12">

		<!-- for any notes on the form -->

		{{-- <p class="text-muted font-14 m-b-20">
            Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
        </p> --}}


		<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('name', __('lang.name')) !!}
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('lang.name')]) !!}
			<small class="text-danger">{{ $errors->first('name') }}</small>
		</div>

		{!! Form::hidden('email', null) !!}

		<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }} col-md-6">
			{!! Form::label('phone', __('lang.phone')) !!}
			{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('lang.phone')]) !!}
			<small class="text-danger">{{ $errors->first('phone') }}</small>
		</div>
		{{--
		<div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} col-md-6">
		{!! Form::label('password', __('lang.password')) !!}
		{!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('lang.password')]) !!}
		<small class="text-danger">{{ $errors->first('password') }}</small>
	</div> --}}

	<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }} col-md-6">
		{!! Form::label('image', __('lang.image')) !!}
		{!! Form::file('image', ['class' => 'form-control', 'placeholder' => __('lang.image')]) !!}
		<small class="text-danger">{{ $errors->first('image') }}</small>
	</div>

	<div class="form-group{{ $errors->has('show_in_front') ? ' has-error' : '' }} col-md-6">
		{!! Form::label('show_in_front', 'show in front') !!}
		<select name="show_in_front" class="form-control select2" placeholder="select status of developer">
			<option value="1" @if(isset($row)){{$row->show_in_front==1?'selected':''}}@endif>active</option>
			<option value="0" @if(isset($row)){{$row->show_in_front==0?'selected':''}}@endif>deactive</option>
		</select>
		<small class="text-danger">{{ $errors->first('show_in_front') }}</small>
	</div>
	{{--
		<div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }} col-md-6">
	{!! Form::label('gender', __('lang.gender')) !!}
	{!! Form::select('gender', $gender, null, ['class' => 'form-control seelct2']) !!}
	<small class="text-danger">{{ $errors->first('gender') }}</small>
</div> --}}


{!! Form::hidden('activation', 1); !!}
{!! Form::hidden('type', 4); !!}


</div>

<div class="form-group text-right m-b-0">
	<button type="submit" class="btn btn-primary waves-effect waves-light btn-style-custom">{{ $submitButton }}</button>
	{{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5"> @lang('lang.Cancel') </button> --}}
</div>




</div>