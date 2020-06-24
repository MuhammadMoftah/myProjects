@foreach ($rows as $row)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->$column }}</td>
        @endforeach
        <td>
            {{ $row->user->name }}
        </td>
        <td>
            @include("$base_view.$path.action_package")
        </td>
    </tr>
@endforeach
