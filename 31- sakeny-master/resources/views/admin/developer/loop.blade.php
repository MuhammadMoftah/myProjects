@foreach ($rows as $row)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->$column }}</td>
        @endforeach
        <td>
            <button class="btn btn-icon waves-effect waves-light btn-success"> 
                <i class="fa fa-home"></i>  {{ $row->projects->count() }}
            </button>
        </td>
        <td>
        	<div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">@lang('lang.projects') <span class="caret"></span></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url(ADMIN_PATH."/project/create?developer=$row->id") }}" style="margin: 10px;">@lang('lang.Add new')</a><br><br>
                    <a class="dropdown-item" href="{{ url(ADMIN_PATH."/project?developer=$row->id") }}" style="margin: 10px;">@lang('lang.projects')</a>
                </div>
            </div>
        </td>
        <td>
            @include("$base_view.$path.action")
        </td>
    </tr>
@endforeach
