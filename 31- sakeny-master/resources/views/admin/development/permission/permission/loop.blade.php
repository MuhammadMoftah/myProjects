@foreach ($roles as $role)
@if ($role->id != 1)
	
  <tr>
    <td>{{ $role->title }}</td>
    <td>
        <a href="{{ url(ADMIN_PATH.'/admin-permission/'.$role->id.'/edit') }}" class="btn btn-info btn-flat">{{ trans('lang.edit') }}</a>
        <button href="{{ url(ADMIN_PATH.'/admin-permission/'.$role->id) }}" class="btn btn-danger btn-flat deleteRow" item-id="{{ $role->id }}">{{ trans('lang.delete') }}</button>
            
    </td>
  </tr>
@endif
@endforeach
<tr>
    <td colspan="30">{!! $roles->render() !!}</td>
</tr>


