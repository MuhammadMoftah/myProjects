@foreach ($rows as $row)
    <tr>
        @foreach ($select_columns as $column)
            <td>{{ $row->company->$column }}</td>
        @endforeach
        <td>
            {{ $row->company->user->name }}
        </td>
        <td>
            {{ $row->company->user->email }}
        </td>
        <td>
            {{ $row->package->name_en }}
        </td>
        <td>
            {{ $row->package->price }} {{ $row->company->country->currency_en }}
        </td>
        <td>
            {{ $row->company->country->name_en }}
        </td>
        <td>
            <a href="{{ url("admin/company/approval-packages/approve/".$row->id) }}">
                <span class="btn btn-success" style="width: 100px"> @lang('lang.activate') </span>
            </a>
        </td>
       <td>
            <a href="{{ url("admin/company/approval-packages/delete/".$row->id) }}">
                <span class="btn btn-danger"> @lang('lang.delete') </span>
            </a>
        </td>
    </tr>
@endforeach
