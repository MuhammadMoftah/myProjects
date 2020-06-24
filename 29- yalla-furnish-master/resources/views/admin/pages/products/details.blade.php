@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" />
<style>
    /* this used to align the data in each tr to be in top   */
   .table-bordered thead tr th { 
        vertical-align: top; 
    }
</style>
@endsection
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>

                        <tr>
                            <th>Product English name</th>
                            <td>{{$product->name_en}}</td>
                        </tr>

                        <tr>
                            <th>Product Arabic name</th>
                            <td>{{$product->name_ar}}</td>
                        </tr>

                        <tr>
                            <th>Product English Description</th>
                            <td>{!!$product->description_en!!}</td>
                        </tr>

                        <tr>
                            <th>Product Arabic Description</th>
                            <td>{!!$product->description_ar!!}</td>
                        </tr>

                        <tr>
                            <th>Product Guarantee</th>
                            <td>{{$product->guarantee}}</td>
                        </tr>

                        <tr>
                            <th>Product Approval</th>
                            <td>
                                @if(!$product->approve)
                                <a href="{{route('admin.product.approve',$product->id)}}" class="btn btn-success">ON</a>
                                @endif
                                @if(!$product->approve && !$product->reason)
                                <button data-type="prompt" class="btn btn-danger sweetalert">OFF</button>
                                @endif
                                @if($product->approve)
                                <button data-type="prompt" class="btn btn-danger sweetalert">OFF</button>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Product Images</th>
                            @foreach($product->images as $image)
                            <td><img src="{{ $image->image }}" width="70px" height="70px" alt=""></td>
                            @endforeach
                        </tr>

                        <tr>
                            <th>Owner Show Room</th>
                            <td>{{$product->showroom->name_en}}</td>
                        </tr>

                        <tr>
                            <th>Product catergories</th>
                            <td>
                                @foreach($product->categories as $category)
                                {{$category->name_en}} @if(!$loop->last)|@endif
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <th>Product Style</th>
                            <td>{{$product->style->name_en}}</td>
                        </tr>

                        <tr>
                            <th>Product Color</th>
                            <td>{{$product->color->name_en}}</td>
                        </tr>

                        <tr>
                            <th>Product Material</th>
                            <td>{{$product->material->name_en}}</td>
                        </tr>

                        <tr>
                            <th>Product Country</th>
                            <td>{{$product->country->name_en}}</td>
                        </tr>

                        <tr>
                            <th>Product Upholstery</th>
                            <td>{{$product->upholstery->name_en}}</td>
                        </tr>

                        <tr>
                            <th>Product Height</th>
                            <td>{{$product->height}}</td>
                        </tr>

                        <tr>
                            <th>Product Width</th>
                            <td>{{$product->width}}</td>
                        </tr>

                        <tr>
                            <th>Product Depth</th>
                            <td>{{$product->depth}}</td>
                        </tr>

                        <tr>
                            <th>Product Others</th>
                            <td>{{$product->others}}</td>
                        </tr>
                        <tr>
                            <th>Product Created At</th>
                            <td>{{$product->created_at}}</td>
                        </tr>


                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- SweetAlert Plugin Js -->
<script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/dismiss.js')}}"></script>
<script type="text/javascript">
    function showPromptMessage() {
        swal({
            title: "Dismiss Product",
            text: "Reason for dismiss this product",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Reason"
        }, function(inputValue) {
            if (inputValue === false) return false;
            if ($.trim(inputValue) === "") {
                swal.showInputError("You need to write something!");
                return false
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product = '{{$product->id}}';
            var url = "{{route('admin.product.dismiss',':product')}}".replace(":product", product);
            $.ajax({
                type: 'POST',
                url: url,
                data: {
                    reason: inputValue
                }
            }).done(function(response) {
                swal("Nice!", "you decline with reason: " + inputValue, "success");
                setTimeout(function() {
                    location.reload();
                }, 1200);
            }).fail(function(error) {
                swal("something went wrong", "reason must be less than 250 characters");
            });
        });
    }
</script>
@endsection