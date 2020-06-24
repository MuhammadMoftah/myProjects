@foreach ($rows as $row)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->ad->$column }}</td>
        @endforeach
        <td>
            {{ str_limit($row->ad->title, 30) }}
        </td>
        <td>
        	<span class="label label-warning">
        		{{ isset($row->ad->property_type->name_en) ? $row->ad->property_type->name_en : __('lang.not set') }}
        	</span>
        </td>
        {{--<td>--}}
        	{{--<span class="label label-primary">--}}
        		{{--{{ isset($row->ad->offer_type->title_en) ? $row->ad->offer_type->title_en : __('lang.not set') }}--}}
        	{{--</span>--}}
        {{--</td>--}}
        <td>
        	<span class="label label-danger">{{ $row->ad->price }}</span>
        </td>
        <td>
            <span class="label label-inverse">{{ isset($row->ad->owner->name) ? $row->ad->owner->name : __('lang.not set') }}</span>
        </td>
        <td>
                <a href="https://sakeny.com/en/ads/{{ $row->ad->id}}" target="_blank">
                    <span class="btn btn-info fa fa-eye" style="width: 60px"> </span>
                </a>
        </td>
        <td>
                <a href="{{ url("admin/ads-payments-accept-premium/".$row->id) }}">
                    <span class="btn btn-success" style="width: 100px"> @lang('lang.accept') </span>
                </a>
        </td>
        <td>
                <a href="{{ url("admin/ads-payments-delete/".$row->id."/1") }}">
                    <span class="btn btn-danger"> @lang('lang.cancel') </span>
                </a>
        </td>

    </tr>
@endforeach
