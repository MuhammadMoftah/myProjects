<table class="table table-bordered">
    <thead>
        <tr>
            <th>English Name</th>
            <th>Arabic Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($upholsteries as $upholstery)
        <tr>
            <td>{{$upholstery->name_en}}</td>
            <td>{{$upholstery->name_ar}}</td>
            <td>
                <a href="{{route('admin.upholsteries.view',$upholstery->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">visibility</i>
                </a>
                <a href="{{route('admin.upholstery.edit.get',$upholstery->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">edit</i>
                </a>
                <a href="{{route('admin.upholstery.delete',$upholstery->id)}}" data-route="{{route('admin.upholstery.delete',$upholstery->id)}}" type="button" class="btn delete_alert bg-red btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">delete</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $upholsteries->links() }}
</div>