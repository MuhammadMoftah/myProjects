<!-- Modal body -->
<div class="modal-body ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <ul class="nav nav-pills mb-3 row" id="pills-tab" role="tablist" style="max-height:450px;overflow:auto">
                    @foreach($products as $key => $single_product)
                    <li class="nav-item one-product col-xl-3 col-lg-4 col-6 mb-4">
                        <a class="nav-link product-img @if($key==0) active @endif" data-toggle="pill" href="#pills-{{$single_product->id}}" @if(count($single_product->images))
                            style="background-image:url('{{$single_product->featured_image}}');"
                            @endif
                            ></a>
                    </li>
                    @endforeach
                    @if(!count($products))
                    No Products Found
                    @endif
                </ul>
            </div>
            <div class="col-lg-4">
                <div class="tab-content" style="max-height: 450px;overflow: auto;">
                    @foreach($products as $key=>$product)
                    <div class="text-center py-3 tab-pane fade @if($key==0) show active @endif" id="pills-{{$product->id}}">
                        <h3 class=" px-3 w-100">{{$product->name_en}}</h3>
                        @foreach($product->pngImages as $image)
                        <article class="one-item">
                            <figure data-id="{{$product->id}}" class="item-img drop-image" style="background-image:url('{{$image->image}}');"></figure>
                        </article>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
        </div>


    </div>
</div>