@foreach ($rows as $row)
@continue($row->id == 1)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->$column }}</td>
        @endforeach
        <td>
            @include("$base_view.$path.action")
        </td>
    </tr>
@endforeach
