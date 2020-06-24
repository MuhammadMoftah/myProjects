@foreach ($rows as $row)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->$column }}</td>
        @endforeach
        <td>
        	{{ $row->views }}
        </td>
        <td>
        	<label class="label label-success"> {{ $row->category->name_en }} </label>
        </td>
        <td>
            @include("$base_view.$path.action")
        </td>
    </tr>
@endforeach
