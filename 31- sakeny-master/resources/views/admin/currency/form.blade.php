<div class="panel-body">

	@foreach ($inputs as $input)
		@if (in_array($input['type'], ['text','textarea','email']))

			<div class="form-group{{ $errors->has($input['name']) ? ' has-error' : '' }} {{ @$input['wrap_class'] }}">
			    {!! Form::label($input['name'], $input['label']) !!}
			    {!! Form::$input['type']($input['name'], $input['value'], $input['options']) !!}
			    <small class="text-danger">{{ $errors->first($input['name']) }}</small>
			</div>

		@elseif ($input['type'] == 'password')

			<div class="form-group{{ $errors->has($input['name']) ? ' has-error' : '' }} {{ @$input['wrap_class'] }}">
			    {!! Form::label($input['name'], $input['label']) !!}
			    {!! Form::password($input['name'], $input['options']) !!}
			    <small class="text-danger">{{ $errors->first($input['name']) }}</small>
			</div>
		@elseif($input['type'] == 'file')
			<div class="form-group{{ $errors->has($input['name']) ? ' has-error' : '' }} {{ @$input['wrap_class'] }}">
			    {!! Form::label($input['name'], $input['label'],['class'=>'control-label']) !!}
			    {!! Form::file($input['name'], $input['options']) !!}
			    <small class="text-danger">{{ $errors->first($input['name']) }}</small>
			</div>



		@elseif($input['type'] == 'select')
			<div class="form-group{{ $errors->has($input['name']) ? ' has-error' : '' }} {{ @$input['wrap_class'] }}">
			    {!! Form::label($input['name'], $input['label']) !!}
			    {!! Form::select($input['name'], $input['select_options'], $input['value'], $input['options']) !!}
			    <small class="text-danger">{{ $errors->first($input['name']) }}</small>
			</div>

		@elseif(in_array($input['type'],['checkbox','radio']))
	    	{!! Form::label('', $input['label']) !!}
	    	<div class="clearfix"></div>
			@foreach ($input['select_options'] as $key => $value)
				<div class="{{ $input['type'] }} {{ $input['type'] }}-primary col-md-3">
				    {!! Form::$input['type']($input['name'], $key, @$value[1], array_merge(['id'=>$input['name'].'_'.$key],$input['options'])) !!}
				    {!! Form::label(@$input['options']['id'] ? $input['options']['id'] :  $input['name'].'_'.$key, $value[0]) !!}
				</div>
			@endforeach
	    	<div class="clearfix"></div>
	    @elseif($input['type'] == 'custom')
	    	{!! $input['input'] !!}
		@else

			<div class="form-group{{ $errors->has($input['name']) ? ' has-error' : '' }} {{ @$input['wrap_class'] }}">
			    {!! Form::label($input['name'], $input['label']) !!}
			    {!! Form::input($input['type'],$input['name'], $input['value'], $input['options']) !!}
			    <small class="text-danger">{{ $errors->first($input['name']) }}</small>
			</div>

		@endif
	@endforeach

	<button type="submit" class="btn btn-success">{{ $submitButton }}</button>





</div>

