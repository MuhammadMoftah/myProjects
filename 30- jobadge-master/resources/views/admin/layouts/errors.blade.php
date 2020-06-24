@if (isset($errors))
@if (count($errors) > 0)
<div class="alert bg-red">
  
    @foreach ($errors->all() as $key => $error)
  
    <div class="alert alert-danger" role="alert">
      {{$error}}
    </div>
    @endforeach
</div>
@endif
@endif
