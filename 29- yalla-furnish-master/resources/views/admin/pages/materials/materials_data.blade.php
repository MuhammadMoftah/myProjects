<table class="table table-bordered">
    <thead>
        <tr>
            <th>English Name</th>
            <th>Arabic Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($materials as $material)
        <tr>
            <td>{{$material->name_en}}</td>
            <td>{{$material->name_ar}}</td>
            <td>
                <a href="{{route('admin.materials.view',$material->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">visibility</i>
                </a>
                <a href="{{route('admin.materials.edit.get',$material->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">edit</i>
                </a>
                <a href="{{route('admin.material.delete',$material->id)}}" data-route="{{route('admin.material.delete',$material->id)}}" type="button" class="btn delete_alert bg-red btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">delete</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $materials->links() }}
</div>