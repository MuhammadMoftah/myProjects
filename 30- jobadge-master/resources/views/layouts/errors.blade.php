@if (isset($errors))
@if (count($errors) > 0)
<div class="alert alert-danger" role="alert">
    @foreach ($errors->all() as $error)
    {!! $error !!}<br>
    @endforeach
</div>
@endif
@endif