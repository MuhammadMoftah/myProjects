@if(auth('user')->check())
<!-- The Share Modal -->
<div class="modal fade sharemodal" id="ShareModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Share With</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body ">
                <div class="row product-content trending">
                    <div class="col-12 d-flex shareicons justify-content-between text-center border-bottom pb-3">
                        <a id="facebook_share" target="_blank" href="#"><i style="background-color:#3b5998;" class="fab fa-facebook-f"></i></a>
                        <a id="twitter_share" target="_blank" href="#"><i style="background-color:#00acee;" class="fab fa-twitter"></i></a>
                        <a id="linkedIn_share" target="_blank" href="#"><i style="background-color:#0077b5;" class="fab fa-linkedin-in"></i></a>
                        <a id="email_share" target="_blank" href="#"><i style="background-color:#0077b5;" class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End ShareModal-->
<!-- The Message Modal -->
<div class="modal fade" id="msgModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Send Message</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body p-3 pb-3">
                <form id="showroomMessageForm" action="{{ route('user.store.message') }}" method="POST" id="form" enctype="multipart/form-data">
                    @if(old('type')=="showroom_message_modal")
                    @include('frontend.layouts.errors')
                    @endif
                    @csrf
                    <input type="hidden" name="type" value="showroom_message_modal">
                    <input type="hidden" value="{{old('showroom_id')}}" id="showroomId" name="showroom_id">
                    <div class="form-group">
                        <label for="showroomMessageText">Message</label>
                        <textarea class="form-control mt-1" name="body" id="showroomMessageText" rows="4" placeholder="Your Message ...."></textarea>
                        <div class="form-group mt-2">
                            <div class="form-group mt-2">
                                <p>Upload Image</p>
                                <div class="col-md-12 mt-1">
                                    <label for="profileImg" style="cursor:pointer">
                                        <div class="close-overlay">
                                            <span class="btn btn-danger fas fa-trash-alt"></span>
                                        </div>
                                        <img src="{{ asset('assets/site/images/add-image.png') }}" style="width:100px; height: 100px; border-radius:5%;margin-bottom: 10px;" id="profileImage" alt="">
                                    </label>
                                    <input type="file" style="display:none" id="profileImg" name="image[]">
                                </div>
                                <div id="image_preview"></div>
                            </div>
                            <button type="button" id="sendShowroomMessageBtn" class="btn main-btn mt-3">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal-->

{{-- SaveModal --}}
<div class="modal fade savemodal" id="SaveModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Save Item</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row product-content trending">
                    <div class="col-md-5 px-2">
                        <div class="card" style="height: 287.325px;">
                            <div class="img" id="productBackground" style="background-image: url();">
                            </div>
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h5 class="card-title" id="productCategory"></h5>
                                <p id="productName" class="card-text text-info m-0">
                                </p>
                                <p id="productPrice" class="small text-muted">
                                </p>
                                <div class="social">
                                    <div id="productRate" class="stars d-block">
                                    </div>
                                    <div>
                                        <div class="likes d-inline-block">
                                            <i class="fas fa-heart"></i>
                                            <span class="small" id="productSavesCount"></span>
                                        </div>
                                        <div class="comments d-inline-block">
                                            <i class="fas fa-comment-dots"></i>
                                            <span class="small" id="productCommentsCount"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 p-2">
                        <div class="form-group">
                            <h4>Choose board</h4>
                            <select name="board_id" id="board_id" data-style="btn-white" class="selectpicker form-control ">
                                <option value="select" id=>select board</option>
                                @foreach (auth('user')->user()->boards as $board)
                                <option value="{{ $board->id }}">{{ $board->name }}</option>
                                @endforeach
                                <option value="create" data-content="
                                                    <div class='d-flex justify-content-between border-top py-1' id='create_new'>
                                                        <span>Creat New Board</span>
                                                        <span class='btn btn-info py-0'> Create</span>
                                                    </div>">
                                </option>
                            </select>
                            <div id="append" class="mt-3">

                            </div>
                        </div>


                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input class="btn main-btn save" type="button" value="Save" id="save-button">
                    <button type="button" class="btn main-btn2" data-dismiss="modal">Close</button>
                </div>
            </div>


        </div>
    </div>
</div>
{{-- End SaveModal --}}
@endif



    {{--  model for send request price --}}
      <!-- The Message Modal -->
      <div class="modal fade" id="request_price">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Send Request Price</h4> 
                </div>
                <!-- Modal body -->
                <div class="modal-body p-3 pb-3">
                    <form action="{{ route('user.product.request_price.post') }}" method="POST" id="form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="">
                        <p class="text-center mb-2">
                            You will send the Request  ? 
                        </p>
                        <div class="text-center mt-2">
                            <button class="btn btn-success"> Send</button>
                            <button type="button" class="btn main-btn2" data-dismiss="modal">Close</button>
                        </div>
                    </form >
                </div>
            </div>
        </div>
    </div>
    <!--End Modal-->