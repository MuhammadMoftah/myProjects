<form action="{{ route('delete.excel') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" id="">
    <input type="submit" value="delete">
</form>