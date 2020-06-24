@if (isset($errors))
@if (count($errors) > 0)
<div class="alert bg-red" style="text-align: center">
    @foreach ($errors->all() as $error)
    <strong>{{$error}}</strong><br>
    @endforeach
</div>
@endif
@endif 
@if (Session::has('failed'))
<div class="alert bg-red">
    <strong>{{ Session::get('failed') }}</strong><br>
</div>
@endif