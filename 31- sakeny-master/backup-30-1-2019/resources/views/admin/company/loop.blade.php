@foreach ($rows as $row)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->$column }}</td>
        @endforeach
        <td>
            {{ $row->user->name }}
        </td>
        <td>
            {{ $row->user->email }}
        </td>
        <td>
            <button class="btn btn-icon waves-effect waves-light btn-purple">
                <i class="fa fa-user"></i>  {{ $row->num_agents }}
            </button>
        </td>
        <td>
            @if ($row->status)
                <a href="{{ url("admin/company/approve/$row->id?status=0") }}">
                    <span class="btn btn-danger"> @lang('lang.de-activate') </span>
                </a>
            @else
                <a href="{{ url("admin/company/approve/$row->id?status=1") }}">
                    <span class="btn btn-success" style="width: 100px"> @lang('lang.activate') </span>
                </a>
            @endif

        </td>
       <td>
            @if ($row->view_in_front)
                <a href="{{ url("admin/company/update-view-in-front/$row->id?view_in_front=0") }}">
                    <span class="btn btn-danger"> @lang('lang.de-activate') </span>
                </a>
            @else
                <a href="{{ url("admin/company/update-view-in-front/$row->id?view_in_front=1") }}">
                    <span class="btn btn-success" style="width: 100px"> @lang('lang.activate') </span>
                </a>
            @endif
        </td>
        <td>
            @include("$base_view.$path.action")
        </td>
    </tr>
@endforeach
