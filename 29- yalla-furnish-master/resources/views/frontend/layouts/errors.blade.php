@if (isset($errors))
@if (count($errors) > 0)
<div class="alert alert-danger text-center"  >
    @foreach ($errors->all() as $error)
    <strong>{{$error}}</strong><br>
    @endforeach
</div>
@endif
@endif