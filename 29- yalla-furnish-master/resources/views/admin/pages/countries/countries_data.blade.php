<table class="table table-bordered">
    <thead>
        <tr>
            <th>English Name</th>
            <th>Arabic Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($countries as $country)
        <tr>
            <td>{{$country->name_en}}</td>
            <td>{{$country->name_ar}}</td>
            <td>
                <a href="{{route('admin.countries.view',$country->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">visibility</i>
                </a>
                <a href="{{route('admin.countries.edit.get',$country->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">edit</i>
                </a>
                <a href="{{route('admin.country.delete',$country->id)}}" data-route="{{route('admin.country.delete',$country->id)}}" type="button" class="btn delete_alert bg-red btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">delete</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $countries->links() }}
</div>