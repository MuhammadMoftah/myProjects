@if (Session::has('message'))
<div class="alert alert-success" role="alert" style="{{Session::has('message')?'display:block':''}}">
    {{Session::get('message')}}
</div>
@endif