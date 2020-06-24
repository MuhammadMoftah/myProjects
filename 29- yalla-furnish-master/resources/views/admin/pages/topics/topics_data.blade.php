<table class="table table-bordered">
    <thead>
        <tr>
            <th>Email</th>
            <th>Categories</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($topics as $topic)
        <tr>
            <td>{{$topic->user->email}}</td>
            <td>
                @foreach($topic->categories as $category)
                {{$category->name_en}} @if(!$loop->last)-@endif
                @endforeach
            </td>
            <td>
                <a href="{{route('admin.topics.view',$topic->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">visibility</i>
                </a>
                <a href="{{ route('admin.topic.edit',$topic->id) }}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">edit</i>
                </a>
                <a href="{{ route('admin.topic.delete',$topic->id) }}" type="button" class="btn delete_alert bg-red btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">delete</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $topics->links() }}
</div>