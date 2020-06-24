{!! Form::open(['method' => 'DELETE', 'url' => [ADMIN_PATH."/$route",$row->id], 'class' => 'form-horizontal']) !!}

        {!! Form::hidden('id', $row->id) !!}
        <a class="btn btn-icon waves-effect btn-default waves-light" href="{{ url(ADMIN_PATH."/$route/$row->id/edit") }}"> <i class="fa fa-pencil"></i></a>
        <button type="submit" class="btn btn-icon waves-effect btn-danger waves-light" onclick="return confirm('Confirm Delete operation ?');"> <i class="fa fa-trash"></i></button>
{!! Form::close() !!}
