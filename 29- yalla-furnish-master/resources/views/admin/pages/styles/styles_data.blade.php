<table class="table table-bordered">
    <thead>
        <tr>
            <th>English Name</th>
            <th>Arabic Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($styles as $style)
        <tr>
            <td>{{$style->name_en}}</td>
            <td>{{$style->name_ar}}</td>
            <td>
                <a href="{{route('admin.styles.view',$style->id)}}" type="button"
                    class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">visibility</i>
                </a>
                <a href="{{route('admin.styles.edit.get',$style->id)}}" type="button"
                    class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">edit</i>
                </a>
                <a href="{{route('admin.style.delete',$style->id)}}" data-route="{{ route('admin.style.delete',$style->id ) }} " type="button"
                    class="btn delete_alert bg-red btn-circle waves-effect waves-circle waves-float">
                    <i class="material-icons">delete</i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $styles->links() }}
</div>

