@if (Session::has('message'))
<div class="alert bg-green">
    {{Session::get('message')}}
</div>
@endif 