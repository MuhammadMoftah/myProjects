@foreach ($rows as $row)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->$column }}</td>
        @endforeach
        <td>
            <a href="{{ url('admin/ads/'. @$row->ad->id .'/edit') }}" target="_blank"> {{ @$row->ad->title }}</a>
        </td>
        <td>
            <a href="{{ url('admin/user/'. @$row->user->id .'/edit') }}" target="_blank"> {{ @$row->user->name }}</a>
        </td>
        <td>
            @include("$base_view.$path.action")
        </td>
    </tr>
@endforeach
