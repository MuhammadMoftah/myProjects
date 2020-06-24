 
@extends('frontend.showrooms.dashboard') 
@section('dashboard-main') 
<div class="container dash-offers" >
    <div class="row bg-white rounded p-2">
        <ul class="nav nav-pills mb-3 w-100" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link btn main-btn2 mr-2 active"
                    href="{{route('user.product.create.get',$showroom->id)}}">
                    Add Offer
                </a> 
            </li>
        </ul>

        <div class="tab-content w-100" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-manage-offers">
                
                <!--Offers-->    
                <div class="container trending">
                    <div class="row vendors offers bg-transparent px-2">
                        @if($showroom->offers)
                        @foreach ($showroom->offers as $offer)
                        <div class="col-md-4 col-sm-6 col-12 px-2">
                            <div class="part card" id="offer-{{$offer->id}}"
                                style="min-width: 200px;min-height: 200px;max-height: 280px;  height: 298.328px;">
                                <figure class="img"
                                    style="background-image: url('{{$offer->featured_image}}')">
                                </figure>
                                <aside class="overlay text-center">
                                    <a class="d-block w-50 mx-auto btn btn-info "
                                        href="{{ route('user.product.edit',['showroom_id'=>$offer->showroom->id,'id'=>$offer->id]) }}"
                                        style="min-width: 150px;">Edit Offer</a>

                                    <a class="d-block w-50 mx-auto btn btn-danger   showroom-delete-offer"
                                        href="{{ route('user.offer.delete',['showroom_id'=>$offer->showroom->id,'id'=>$offer->id]) }}"
                                        style="margin-top: 10px;min-width: 150px;">Delete Offer</a>
                                </aside>
                                <div class="card-footer">
                                    <h6 class="card-title mb-1">{{ $offer->name_en }}</h6>
                                    <h6 class="card-title">{{ $offer->showroom->name_en }}</h6>
                                    <div class="social mt-2">
                                        <a href="{{ route('user.offer.get',$offer->id) }}"
                                            class="small main-link2">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $('.main-link').click(function() {
                                setTimeout(function() {
                                    //    === Make div square ===
                                    $('#offer-{{$offer->id}}').outerHeight($('#offer-{{$offer->id}}').outerWidth());
                                    $(window).on('resize', function() {
                                        $('#offer-{{$offer->id}}').outerHeight($('#offer-{{$offer->id}}').outerWidth());
                                    });
                                }, 200);
                            });
                        </script>
                        @endforeach
                        @endif


                    </div>
                </div>
                <!--End Offers Row-->
            </div>
            <!--End offers tab -->

            <!--Add Offers Tap-->
            <div class="tab-pane fade" id="pills-add-offer">
                <form action="" class="add-product">
                    <div class="row">
                        <div class="col-md-6 border-right">
                            <div class="form-group">
                                <label for="">Upload up to Photos</label>
                                <label for="uploadimgs" class="float-right">
                                    <div class="btn upload-btn">Upload</div>
                                </label>
                                <input type="file" multiple class="d-none" id="uploadimgs">

                                <small class="text-muted d-block pb-2">Supported files: JPG, JPEG,
                                    PNG</small>
                                <div class="m-1 d-inline-block">
                                    <label for="profileImg" class="uploadimg">
                                        <div class="close-overlay">
                                            <span class="btn btn-danger fas fa-trash-alt"></span>
                                        </div>
                                        <img src="images/white.png" id="profileImage1" alt="">
                                        <input type="file" style="display:none" id="profileImg2"
                                            onchange="document.getElementById('profileImage2').src = window.URL.createObjectURL(this.files[0])">
                                    </label>
                                    <input type="file" style="display:none" id="profileImg"
                                        onchange="document.getElementById('profileImage').src = window.URL.createObjectURL(this.files[0])">
                                </div>

                                <div class="m-1 d-inline-block">
                                    <label for="profileImg2" class="uploadimg">
                                        <div class="close-overlay">
                                            <span class="btn btn-danger fas fa-trash-alt"></span>
                                        </div>
                                        <img src="images/white.png" id="profileImage2" alt="">
                                    </label>
                                    <input type="file" style="display:none" id="profileImg2"
                                        onchange="document.getElementById('profileImage2').src = window.URL.createObjectURL(this.files[0])">
                                </div>

                                <div class="m-1 d-inline-block">
                                    <label for="profileImg2" class="uploadimg">
                                        <div class="close-overlay">
                                            <span class="btn btn-danger fas fa-trash-alt"></span>
                                        </div>
                                        <img src="images/white.png" id="profileImage2" alt="">
                                    </label>
                                    <input type="file" style="display:none" id="profileImg3"
                                        onchange="document.getElementById('profileImage3').src = window.URL.createObjectURL(this.files[0])">
                                </div>

                                <div class="m-1 d-inline-block">
                                    <label for="profileImg2" class="uploadimg">
                                        <div class="close-overlay">
                                            <span class="btn btn-danger fas fa-trash-alt"></span>
                                        </div>
                                        <img src="images/white.png" id="profileImage2" alt="">
                                    </label>
                                    <input type="file" style="display:none" id="profileImg4"
                                        onchange="document.getElementById('profileImage4').src = window.URL.createObjectURL(this.files[0])">
                                </div>

                                <div class="m-1 d-inline-block">
                                    <label for="profileImg2" class="uploadimg">
                                        <div class="close-overlay">
                                            <span class="btn btn-danger fas fa-trash-alt"></span>
                                        </div>
                                        <img src="images/white.png" id="profileImage2" alt="">
                                    </label>
                                    <input type="file" style="display:none" id="profileImg5"
                                        onchange="document.getElementById('profileImage5').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <h5>Price:</h5>
                                <input class="form-control form-control-sm" style="width:150px"
                                    type="text">
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <h5>Product Category:</h5>
                                <select name="" id="" class="selectpicker" multiple
                                    data-hide-disabled="true" data-size="5">
                                    <option value="">Category</option>
                                    <option value="">Category</option>
                                    <option value="">Category</option>
                                    <option value="">Category</option>
                                    <option value="">Category</option>
                                    <option value="">Category</option>
                                </select>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <h5>Product Style:</h5>
                                <select name="" id="" class="selectpicker" multiple
                                    data-hide-disabled="true" data-size="5">
                                    <option value="">Style</option>
                                    <option value="">Style</option>
                                    <option value="">Style</option>
                                    <option value="">Style</option>
                                    <option value="">Style</option>
                                    <option value="">Style</option>
                                </select>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <h5>Product Color:</h5>
                                <select name="" id="" class="form-control-sm py-0">
                                    <option value="">Color</option>
                                    <option value="" style="" class="text-su">Green</option>
                                </select>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <h5>Product Color:</h5>
                                <select name="" id="" class="selectpicker form-control-sm p-0">
                                    <option value="">Color</option>
                                    <option data-content="
                                        <div class='d-flex justify-content-between'>
                                            <p>White</p>
                                            <span style='background-color:white'></span>
                                        </div>">
                                    </option>

                                    <option data-content="
                                        <div class='d-flex justify-content-between'>
                                            <p>Red</p>
                                            <span style='background-color:red'></span>
                                        </div>">
                                    </option>

                                    <option data-content="
                                        <div class='d-flex justify-content-between'>
                                            <p>Blue</p>
                                            <span style='background-color:blue'></span>
                                        </div>">
                                    </option>
                                </select>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <h5>Upholstery Material:</h5>
                                <select name="" id="" class="form-control-sm py-0">
                                    <option value="">Matrial</option>
                                    <option
                                        data-content="<span class='badge badge-success'>Relish</span>">
                                        Relish</option>

                                </select>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <h5>Frame Material:</h5>
                                <select name="" id="" class="form-control-sm py-0">
                                    <option value="">Matrial</option>
                                </select>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <h5>Product Dimensions:</h5>
                                <select name="" id="" class="form-control-sm py-0">
                                    <option value="">Matrial</option>
                                </select>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <h5 style="width:150px">Frame Material:</h5>
                                <div>
                                    <input class="form-control d-inline-block" type="text"
                                        style="width:70px; text-align:center" placeholder="Hight">
                                    <input class="form-control d-inline-block" type="text"
                                        style="width:70px; text-align:center" placeholder="Width">
                                    <input class="form-control d-inline-block" type="text"
                                        style="width:70px; text-align:center" placeholder="Depth">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Product Description:</h5>
                                <textarea class="form-control" name="" id="" cols="15" rows="5"
                                    style="resize:none"></textarea>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <h5>Product Avaliable in:</h5>
                                <select name="" id="" class="form-control-sm py-0">
                                    <option value="">Branch</option>
                                </select>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <h5 style="width:200px">Guarantee:</h5>
                                <div>
                                    <select name="" id="" class="form-control-sm py-0"
                                        style="width:80px">
                                        <option value="">Month</option>
                                    </select>
                                    <select name="" id="" class="form-control-sm py-0"
                                        style="width:80px">
                                        <option value="">Year</option>
                                    </select>
                                </div>
                            </div>

                            <div
                                class="form-group d-flex justify-content-between border-bottom pb-4">
                                <h5>Made in:</h5>
                                <select name="" id="" class="form-control-sm py-0">
                                    <option value="">Country</option>
                                </select>
                            </div>


                            <div class="custom-control custom-checkbox py-3">
                                <input type="checkbox" class="custom-control-input" id="customRadio"
                                    name="example1">
                                <label class="custom-control-label" for="customRadio">Add this
                                    Product to Offer</label>
                            </div>


                            <div class="form-group d-flex justify-content-between">
                                <h5>Descound Percentage:</h5>
                                <div class="input-group-sm mb-3 d-flex ">
                                    <input type="text" class="form-control" style="width:60px">
                                    <div class="input-group-append">
                                        <span class="input-group-text"
                                            style="border-radius: 0px 5px 5px 0px;">%</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <h5 style="width:200px">Valid Until:</h5>
                                <div>
                                    <select name="" id="" class="form-control-sm py-0"
                                        style="width:80px">
                                        <option value="">Day</option>
                                    </select>
                                    <select name="" id="" class="form-control-sm py-0"
                                        style="width:80px">
                                        <option value="">Month</option>
                                    </select>
                                    <select name="" id="" class="form-control-sm py-0"
                                        style="width:80px">
                                        <option value="">Year</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="submit-product">
                                <a href="" class="btn">Preview Product</a>
                                <input type="submit" class="btn" value="Submit Product">
                            </div>
                        </div>

                    </div>

                </form>
            </div>
            <!--End Add offer tap-->
        </div>


    </div>
</div> 
@push('scripts_stack')
<script>
    $(document).ready(function() {
        // console.log('Ok')
        // delete Offer Button 
        $('.showroom-delete-offer').click(function(e) {
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
                        'Your Offer has been deleted.',
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