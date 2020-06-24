@foreach ($products as $product)
    {{ $product->product->name_en }}  <a href="{{ route('delete.comparison_table.product',$product->id) }}">delete</a><br>
    
@endforeach
@if(Session::has('delete'))
<script>
    Swal.fire({
        
        type: 'success',
        showConfirmButton:true,
        title: ' Product Removed Successfully',
        timer: 3000,
        confirmButtonText: 'done',
        showLoaderOnConfirm: true,
        confirmButtonColor: '#21d5de'
    });
</script>
@endif