@foreach ($rows as $row)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->$column }}</td>
        @endforeach
        <td>
            {{ str_limit($row->title, 30) }}
        </td>
        <td>
            @if ($row->status)
                <a href="{{ url("admin/ads/update-status/$row->id?status=0") }}">
                    <span class="btn btn-danger"> @lang('lang.de-activate') </span>
                </a>
            @else
                <a href="{{ url("admin/ads/update-status/$row->id?status=1") }}">
                    <span class="btn btn-success" style="width: 100px"> @lang('lang.activate') </span>
                </a>
            @endif
        </td>
        <td>
            <span class="label label-inverse">{{ isset($row->owner->name) ? $row->owner->name : __('lang.not set') }}</span>
        </td>
        <td>
            {{ $row->owner->phone }}
        </td>
    </tr>
@endforeach
