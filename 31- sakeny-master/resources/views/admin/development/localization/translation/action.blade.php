{!! Form::open(['method' => 'DELETE', 'url' => [ADMIN_PATH."/$route",$id], 'class' => 'form-horizontal']) !!}
        {!! Form::hidden('id', $id) !!}
        <a class="btn btn-info btn-flat" href="{{ url(ADMIN_PATH."/$route/$id/edit") }}"> <i class="fa fa-pencil"></i> @lang('lang.edit')</a>
        <button type="submit" class="btn btn-danger btn-flat" onclick="return confirm('Confirm Delete operation ?');"> <i class="fa fa-trash"></i> @lang('lang.delete')</button>
{!! Form::close() !!}
