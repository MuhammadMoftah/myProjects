<!-- Modal body -->
<div class="modal-body ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist" style="max-height:450px;overflow:auto">
                    @if(isset($used_products))
                    @foreach($used_products as $key => $used_product)
                    <li class="nav-item one-product col-xl-3 col-lg-4 col-6 mb-4">
                        <a class="nav-link product-img" target="_blank" href="{{route('user.product.get',$used_product->id)}}" @if(count($used_product->images))
                            style="background-image:url('{{$used_product->featured_image}}');"
                            @endif
                            ></a>
                    </li>
                    @endforeach
                    @endif
                    @if(!isset($used_products) || (isset($used_products) && count($used_products)==0))
                    No Products Used
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>