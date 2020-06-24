<table class="table table-bordered">
    <thead>
        <tr>
            <th>Branch Address</th>
            <th>showroom</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($branches as $branch)
        <tr>
            <td><a href="{{route('admin.branches.view',['id'=>$branch->id])}}">{{$branch->address_en}}</a></td>
            <td> <a href="{{route('admin.showroom.details',$branch->showroom->id)}}">{{$branch->showroom->name_en}}</a></td>
        <td>
            <a href="{{ route('admin.branches.delete',$branch->id)}}" type="button" class="btn  bg-red btn-circle waves-effect waves-circle waves-float">
                <i class="material-icons">delete</i>
            </a>
            <a href="{{ route('admin.branches.edit',$branch->id)}}" type="button" class="btn  bg-green btn-circle waves-effect waves-circle waves-float">
                <i class="material-icons">edit</i>
            </a>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $branches->links() }}
</div>