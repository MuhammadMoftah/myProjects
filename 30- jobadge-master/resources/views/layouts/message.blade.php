@if (Session::has('message'))
<div class="alert alert-success" role="alert">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>   
    <p style="text-transform: capitalize">{{Session::get('message')}}</p>
</div>
@endif