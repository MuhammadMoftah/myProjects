<table class="table table-bordered">
    <thead>
        <tr>
            <th>Content Creator</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ideas as $idea)
        <tr>
            <td><a href="{{route('user.view.profile',['id'=>$idea->user->id])}}">{{$idea->user->fullname}}</a></td>
            <td><a href="{{route('user.get.idea',['id'=>$idea->id])}}">{!!$idea->name_en!!}</a></td>
            <td><img style="height: 100px; width: 100px;" src="{{ $idea->idea_image }}" alt=""></td>
            <td>
                @foreach($idea->categories as $category)
                    {{$category->name_en}} @if(!$loop->last)|@endif
                @endforeach
            </td>
            <td>
                <a href="{{route('admin.idea.view',$idea->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">visibility</i>
                </a>
                <a href="{{ route('admin.idea.delete',$idea->id) }}" data-route="{{ route('admin.idea.delete',$idea->id) }}" type="button" class="btn delete_alert bg-red btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons ">delete</i>
                </a>
                <a href="{{ route('admin.idea.edit',$idea->id) }}" type="button" class="btn bg-blue  btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">edit</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $ideas->links() }}
</div>