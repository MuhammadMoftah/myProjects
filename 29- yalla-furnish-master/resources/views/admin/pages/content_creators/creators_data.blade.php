<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Content Creator</th>

            <th>No, of Ideas</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($creators as $creator)
        <tr>
            <td><a href="{{route('user.view.profile',$creator->id)}}">{{$creator->first_name}}</a></td>
            <td>{{$creator->email}}</td>
            <td>
                    @if($creator->content_creator)
                    <a href="{{route('admin.user.contentCreator',$creator->id)}}" type="button"
                        class="btn bg-red waves-effect waves-float">
                        remove from content creators
                    </a>
                    @else
                    <a href="{{route('admin.user.contentCreator',$creator->id)}}" type="button"
                        class="btn bg-blue waves-effect waves-float">
                        add to content creators
                    </a>
                    @endif
                </td>
            <td>{{$creator->Ideas->count()}}</td>
            <td>
                <a href="{{route('admin.user.view',$creator->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">visibility</i>
                </a>
                <a href="" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">edit</i>
                </a>
                <a href="" type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">delete</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $creators->links() }}
</div>