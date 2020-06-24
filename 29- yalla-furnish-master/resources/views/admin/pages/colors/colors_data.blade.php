<table class="table table-bordered">
    <thead>
        <tr>
            <th>English Name</th>
            <th>Arabic Name</th>
            <th>code</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($colors as $color)
        <tr>
            <td>{{$color->name_en}}</td>
            <td>{{$color->name_ar}}</td>
            <td>{{$color->code}} <div style="height: 20px;display: -webkit-inline-box; width: 30px; vertical-align: bottom; background-color: {{$color->code}};"></div></td>
            <td>
                <a href="{{route('admin.colors.view',$color->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">visibility</i>
                </a>
                <a href="{{route('admin.colors.edit.get',$color->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">edit</i>
                </a>
                <a href="{{route('admin.color.delete',$color->id)}}" data-route="{{route('admin.color.delete',$color->id)}}" type="button" class="btn delete_alert bg-red btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">delete</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $colors->links() }}
</div>