@if (count($errors) > 0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@elseif (session()->has('success'))
	<div class="alert alert-success">
			<p>{{ session()->get('success') }}</p>
	</div>

@elseif (session()->has('failed'))
	<div class="alert alert-danger">
			<p>{{ session()->get('failed') }}</p>
	</div>

@elseif (session()->has('notice'))
	<div class="alert alert-info">
			<p>{{ session()->get('notice') }}</p>
	</div>

@elseif (session()->has('status'))
	<div class="alert alert-info">
			<p>{{ session()->get('status') }}</p>
	</div>
@endif



