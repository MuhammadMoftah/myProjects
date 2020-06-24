@if (Session::has('message'))
<div class="alert bg-green" style="text-align: center">
    {{Session::get('message')}}
</div>
@endif