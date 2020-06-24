<table class="table table-bordered">
    <thead>
        <tr>
            <th>Role Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $role)
        <tr>
            <td>{{$role->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div style="text-align:center;">
    {{ $roles->links() }}
</div>