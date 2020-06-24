<div class="modal" id="filMessageModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body py-4 px-5 rounded">
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-center">
                        <img src="{{asset('./images/free-cons.png')}}" width="100%;" alt="">
                    </div>
                    <div class="col-lg-6">
                        <form enctype="multipart/form-data" action="{{route('user.consultant.store')}}" method="POST">
                            @if(old('type')=="service_modal")
                            @include('frontend.layouts.errors')
                            @endif
                            {{csrf_field()}}
                            <input type="hidden" name="type" value="service_modal"/>
                            <div class="form-group">
                                <label for="Servicesubject">Subject</label>
                                <input value="{{old('subject')}}" class="form-control mt-2" id="Servicesubject" name="subject" placeholder="Subject" type="text">
                            </div>

                            <div class="form-group">
                                <label for="Servicemessage">Your message</label>
                                <textarea id="Servicemessage" value="{{old('message')}}" class="form-control mt-2" name="message" id="" rows="5">{{old('message')}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Upload Images (max. 5 images)</label>
                                <input class="form-control mt-2" name="images[]" multiple placeholder="Subject" type="file">
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-light border ml-2" data-dismiss="modal" data-toggle="modal" data-target="#skipModal">Skip</button>
                                <button class="btn main-btn ml-2" type="submit">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Sent successfully modal -->
<div class="modal fade" id="sentModal">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body py-4 px-5 rounded">
                <p class="h5">Your message have been send to Yalla furnish </p>
            </div>

        </div>
    </div>
</div>


<!-- Skip modal -->
<div class="modal fade" id="skipModal">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body py-4 px-5 rounded">
                <p class="h5 font-weight-bold">Are you sure you want to skip the free Consultancy Service? </p>

                <div class="form-group text-right mt-4 mb-0">
                    <button class="btn main-btn border ml-2" data-dismiss="modal" data-toggle="modal" data-target="#filMessageModal">No</button>
                    <button class="btn btn-light ml-2 border" data-dismiss="modal" data-toggle="modal" data-target="#profileNoteModal">Yes</button>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Sent profile note modal -->
<div class="modal fade" id="profileNoteModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body py-4 px-5 rounded text-center">
                <p class="h4">You still have 1 free Consultancy Service </p>
                <p class="h5">Find it in your<a href="javascript:void(0)" data-dismiss="modal" data-toggle="modal" class="main-link2"> Profile</a></p>
                <button class="btn main-btn ml-2" data-dismiss="modal" data-toggle="modal">Close</button>
            </div>

        </div>
    </div>
</div>