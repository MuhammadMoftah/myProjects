@foreach ($rows as $row)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->$column }}</td>
        @endforeach
        <td>
        	{{ $row->views }}
        </td>
        <td>
            @include("$base_view.$path.action")
        </td>
    </tr>
@endforeach
