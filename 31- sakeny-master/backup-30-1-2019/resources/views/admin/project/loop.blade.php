@foreach ($rows as $row)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->$column }}</td>
        @endforeach

        <td>
            @if ($row->view_in_front)
                <a href="{{ url("admin/project/update-view-in-front/$row->id?view_in_front=0") }}">
                    <span class="btn btn-danger"> @lang('lang.de-activate') </span>
                </a>
            @else
                <a href="{{ url("admin/project/update-view-in-front/$row->id?view_in_front=1") }}">
                    <span class="btn btn-success" style="width: 100px"> @lang('lang.activate') </span>
                </a>
            @endif
        </td>
        <td>
            <a href="{{ url("admin/project/$row->id/contact") }}" class="btn btn-warning"> view </a>
        </td>
        <td>
            @include("$base_view.$path.action")
        </td>
    </tr>
@endforeach
