@include('frontend.includes.product_action_modals')
@if(count($products)>0)
@foreach($products as $key => $product)
@if(isset($featured_stores) && ($key==9 || $key==18 || ($key==27)))
<div class="col-md-12 px-2">
    <div class="col-md-12 p-0">
        <section class="cover" style="background-image:url('{{ asset('assets/site/images/featured_products.jpg') }}');"></section>
    </div>
</div>
@endif
@include('frontend.includes.single_product')
@endforeach
<div class="col-md-12 text-center my-4">
    <nav aria-label="Page navigation example">
        @include('frontend.paginators.products_paginator', ['products' => $products])
    </nav>
</div>
@else
<h5 class="w-100 text-center text-danger mt-5">
    No Products Found
</h5>
@endif