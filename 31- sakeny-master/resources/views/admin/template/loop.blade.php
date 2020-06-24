@foreach ($rows as $row)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->$column }}</td>
        @endforeach
        <td>{{ $row->country->name_en }}</td>
        <td>{{ $row->city->name_en }}</td>
        <td>{{ $row->offer_type->title_en }}</td>
        <td>{{ $row->property_type->name_en }}</td>
        <td>
            @include("$base_view.$path.action")
        </td>
    </tr>
@endforeach
