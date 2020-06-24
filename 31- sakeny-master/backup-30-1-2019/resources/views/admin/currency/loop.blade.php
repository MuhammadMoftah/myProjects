@forelse ($rows as $row)
	<tr>
		@foreach ($columns as $column)
			<td>{{ $row->$column }}</td>
		@endforeach
		<td>
			{!! Form::open(['method' => 'DELETE', 'route' => ["$route.destroy",$row->id], 'class' => 'form-horizontal']) !!}

					{!! Form::hidden('id', $row->id) !!}
					<a class="btn btn-info btn-flat" href="{{ route("$route.edit",$row->id) }}"> <i class="fa fa-pencil"></i> @lang('lang.edit')</a>
					<button type="submit" class="btn btn-danger btn-flat" onclick="return confirm('Confirm Delete operation ?');"> <i class="fa fa-trash"></i> @lang('lang.delete')</button>
			{!! Form::close() !!}
		</td>
	</tr>
@empty
	<tr>
		<td colspan="30" class="text-center">{{ trans('lang.No Data') }}</td>
	</tr>
@endforelse
<tr>
	{{ $rows->appends(['search'=>old('search')])->render() }}
</tr>