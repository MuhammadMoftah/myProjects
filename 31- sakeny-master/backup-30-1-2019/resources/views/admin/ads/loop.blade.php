@foreach ($rows as $row)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->$column }}</td>
        @endforeach
        <td>
            {{ str_limit($row->title, 30) }}
        </td>
        <td>
        	<span class="label label-warning">
        		{{ isset($row->property_type->name_en) ? $row->property_type->name_en : __('lang.not set') }}
        	</span>
        </td>
        {{--<td>--}}
        	{{--<span class="label label-primary">--}}
        		{{--{{ isset($row->offer_type->title_en) ? $row->offer_type->title_en : __('lang.not set') }}--}}
        	{{--</span>--}}
        {{--</td>--}}
        <td>
        	<span class="label label-danger">{{ $row->price }}</span>
        </td>
        <td>
            <span class="label label-inverse">{{ isset($row->owner->name) ? $row->owner->name : __('lang.not set') }}</span>
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
            <span class="label label-danger">{{ $row->reports()->count() }}</span>
        </td>
        <td>
            @if ($row->is_selected)
                <a href="{{ url("admin/ads/update-selected/$row->id?is_selected=0") }}">
                    <span class="badge badge-danger" style="width: 60px"> remove </span>
                </a>
            @else
                <a href="{{ url("admin/ads/update-selected/$row->id?is_selected=1") }}">
                    <span class="badge badge-success" style="width: 60px"> add </span>
                </a>
            @endif
        </td>
        <td>
            @include("$base_view.$path.action")
        </td>
    </tr>
@endforeach
