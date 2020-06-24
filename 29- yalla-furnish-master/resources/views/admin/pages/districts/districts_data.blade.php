<table class="table table-bordered">
    <thead>
        <tr>
            <th>English Name</th>
            <th>Arabic Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($districts as $district)
        <tr>
            <td>{{$district->name_en}}</td>
            <td>{{$district->name_ar}}</td>
            <td>
                <a href="{{route('admin.districts.view',$district->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">visibility</i>
                </a>
                <a href="{{ route('admin.district.edit',['id'=>$district->id]) }}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">edit</i>
                </a>
                <a href="{{route('admin.district.delete',$district->id)}}" data-route="{{route('admin.district.delete',$district->id)}}" type="button" class="btn delete_alert bg-red btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">delete</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $districts->links() }}
</div>