<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($malls as $mall)
        <tr>
            <td>{{$mall->name}}</td>
            <td>{{$mall->active==1?'Active':'Deactivated'}}</td>
            <td>
                <a href="{{route('admin.malls.view',$mall->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">visibility</i>
                </a>
                <a href="{{route('admin.malls.edit.get',$mall->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">edit</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $malls->links() }}
</div>