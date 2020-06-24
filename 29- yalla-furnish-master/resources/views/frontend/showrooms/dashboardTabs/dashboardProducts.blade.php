@extends('frontend.showrooms.dashboard') 
@section('dashboard-main') 
<div class="container dash-products" >
    <div class="row bg-white rounded p-2">
        <ul class="nav nav-pills mb-3 w-100" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link btn main-btn2 mr-2 active"
                    href="{{route('user.product.create.get',$showroom->id)}}">Add Product
                </a>
            </li>
        </ul> 
        <div class="tab-content w-100" id="pills-tabContent">  
            <div class="tab-pane fade show active" id="pills-manage-products">
                <!--Product-->
                <div class="container trending">
                    <div class="row vendors offers bg-transparent px-2">
                        @foreach($showroom->products as $product)
                        <div class="col-md-4 col-sm-6 col-12 px-2 ">
                            <div class="part card" 
                                 id="product-{{$product->id}}"
                                 style="min-width: 200px; min-height: 200px; max-height: 280px; height: 298.328px;"> 
                                <figure class="img"
                                       style="background-image: url('{{$product->featured_image}}')">
                                </figure> 
                                <aside class="overlay text-center">
                                    <a class="d-block w-50 mx-auto btn btn-info"
                                        href="{{ route('user.product.edit',['showroom_id'=>$product->showroom->id,'id'=>$product->id]) }}"
                                        style="min-width: 150px;">Edit Product</a>
                                    <a class="d-block w-50 mx-auto btn btn-danger showroom-delete-product"
                                        href="{{ route('user.product.delete',['showroom_id'=>$product->showroom->id,'id'=>$product->id]) }}"
                                        style="margin-top: 10px;min-width: 150px;">Delete
                                        Product</a>
                                </aside>
                                <div class="card-footer">
                                    <h6 class="card-title mb-1">{{$product->name_en}}</h6>
                                    <h6 class="card-title">{{$product->showroom->name_en}}</h6>
                                    <div class="social mt-2">
                                        <a href="{{route('user.product.get',$product->id)}}"
                                            class="small main-link2">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $('.main-link').click(function() {
                                setTimeout(function() {
                                    //    === Make div square ===
                                    $('#product-{{$product->id}}').outerHeight($('#product-{{$product->id}}').outerWidth());
                                    $(window).on('resize', function() {
                                        $('#product-{{$product->id}}').outerHeight($('#product-{{$product->id}}').outerWidth());
                                    });
                                }, 200);
                            });
                        </script>
                        @endforeach
                    </div>
                </div>
                <!--End Offers Row-->
            </div>     
        </div>  
    </div>
</div>  
@push('scripts_stack')
<script>
    $(document).ready(function() {   
        // delete Product Button 
        $('.showroom-delete-product').click(function(e) { 
            e.preventDefault(); 
             Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your Product has been deleted.',
                        'success'
                    )
                    window.location.href = $(this).attr('href');
                }
            }); 
        }); 
    });
</script>
@endpush {{-- end scripts Section --}}
@endsection {{-- end dashboard-main Section --}}