@if (Session::has('message'))
<div class="alert alert-success" style="@if(app()->getLocale()=='ar') text-align:right; @endif" role="alert">
    {{Session::get('message')}}
</div>
@endif