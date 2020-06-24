@if (isset($errors))
@if (count($errors) > 0)
<div class="alert alert-danger" style="@if(app()->getLocale()=='ar') text-align:right; @endif" role="alert">
    @foreach ($errors->all() as $error)
    {{$error}}<br>
    @endforeach
</div>
@endif
@endif