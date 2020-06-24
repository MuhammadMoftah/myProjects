<main class="user-details initial-info bg-white rounded p-3">
    <div class="card">
        <div class="card-header py-0 d-flex justify-content-between align-items-center flex-column flex-sm-row">
            <hgroup class="py-3">
                <strong>{{$user->first_name}} {{$user->last_name}}</strong> 
                |
                <span>{{$user->title}}</span>
            </hgroup>
            
            <aside class="mb-2 mb-sm-0">
                <a href="javascript:void(0)" class="btn btn-info btn-sm initialInfoModalButton" title="Edit" data-toggle="modal" data-target="#initialInfoModal"><i class="fas fa-user-edit"></i></a> 
                {{-- <a href="javascript:void(0)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteInfoModal" title="Delete"><i class="far fa-trash-alt"></i></a>  --}}
            </aside>
        </div>

        <div class="card-body added-info">
            <div class="row">
                <div class="col-md-6 my-2">
                    <i class="fas fa-map-marker-alt"></i>
                    <span class="text-muted">{{$user->city->name_en}}, {{$user->country->name_en}}</span>
                </div>

                <div class="col-md-6 my-2">
                    <img src="{{asset('site/images/icon/age-icon.png')}}" width="26px" alt="" style="margin-right:5px;">
                    <span class="text-muted">{{$user->age}} Years</span>
                </div>

                <div class="col-md-6 my-2">
                    <i class="fas fa-envelope"></i>
                    <span class="text-muted text-lowercase">{{$user->email}}</span>
                </div>

                <div class="col-md-6 my-2">
                    <i class="fas fa-phone fa-rotate-90"></i>
                    <span class="text-muted">{{$user->phone}}</span>
                </div>
                <div class="col-md-12 mt-4">
                    
                    <a href="{{$user->getUserCv()}}" target="_blank" class=" @if(!$user->cv)  disabled @endif btn btn-sm bg-main text-white mr-2">
                        @if($user->cv) 
                            Show CV
                        @else
                            Not Uploaded CV
                        @endif
                    </a>
                    <button @if(!$user->video_cv)  disabled @endif  class="btn btn-sm bg-main text-white mr-2 @if(!$user->video_cv)  disabled @endif " data-toggle="modal" data-target="#vedioCv">
                        @if($user->video_cv)
                        Watch Video CV
                        @else
                         No video uploaded
                        @endif
                    </button>
                </div>
            </div>
        </div>

    </div>
</main> 
{{-- models --}}
@push('models')
    
    <!-- Initial Information Modal -->
<!-- Initial Information Modal -->
<div id="initialInfoModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Fill your initial information to increase your profile Percentage</h5>
            </div>
            <div class="modal-body">

                <div>
                    @if($user->image != "user.png")
                    <form method="POST" id="delted-image" action="{{ route('user.delete.picture') }} " style="display: none">
                            @csrf
                            <button class="btn btn-danger confirm" data-message="Are You Sure ? To Delete The Picture ">Delete image</button>
                        </form>
                    @endif
                </div>

                <form action="{{route('user.profile.post')}}" method="POST" class="form-row" enctype="multipart/form-data" >
                    @csrf
                    <input value="info" name="tab"   type="hidden">
                    <input value="#initialInfoModal" name="model" type="hidden">
                
                    <div class="form-group col-md-6">
                        <label for="firstname">* First Name</label>
                        <input value=" {{$user->first_name}}" type="text" name="first_name" class="form-control {{ $errors->has('first_name') && old('model') == '#initialInfoModal' ? 'is-invalid' : ''}}" id="firstname" placeholder="First name">
                        @if(old('model') == '#initialInfoModal') {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!} @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">* Last name</label>
                        <input value="{{$user->last_name}}" type="text" name="last_name" class="form-control {{ $errors->has('last_name') && old('model') == '#initialInfoModal' ? 'is-invalid' : ''}}" id="lastname" placeholder="Last name">
                        {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
                        
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">* Email address</label>
                        <input value="{{$user->email}}" type="email" name="email" class="form-control {{ $errors->has('email') && old('model') == '#initialInfoModal' ? 'is-invalid' : ''}}" id="email" aria-describedby="emailHelp" placeholder="Email address">
                        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-md-6">
                        <label for="phone">* Phone</label>
                        <input value="{{$user->phone}}" type="text" name="phone" class="form-control {{ $errors->has('phone') ? 'is-invalid' : ''}}" id="phone" placeholder="Phone">
                        {!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-md-6">
                        <label for="nationality">* Nationality</label>
                        <select id="nationality" name="nationality_id" class="form-control p-0 {{ $errors->has('nationality_id') ? 'is-invalid' : ''}}">
                            @if(!$user->nationality_id)
                            <option disabled selected>please select your nationality</option>
                            @endif
                            @foreach($nationalities as $nationality)
                            <option {{$user->nationality_id==$nationality->id || old('nationality_id')==$nationality->id?'selected':''}} value="{{$nationality->id}}">{{$nationality->name_en}}</option>
                            @endforeach
                        </select>
                        {!! $errors->first('nationality_id', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-md-6">
                        <label for="country1">* Country</label>
                        <select id="country1" data-target=".info-city" data-city="{{$user->city_id}}" name="country_id" class="country-select form-control p-0 {{ $errors->has('country_id') && old('model') == '#initialInfoModal' ? 'is-invalid' : ''}}">
                            @if(!$user->country_id)
                            <option disabled selected>please select your country</option>
                            @endif
                            @foreach($countries as $country)
                            <option {{$user->country_id==$country->id?'selected':''}} value="{{$country->id}}">{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('model') == '#initialInfoModal')  {!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!} @endif
                    </div>

                    <div class="form-group col-md-6 info-city " id="cities_holder">
                        <label>* City</label>
                        <select name="city_id" class="form-control p-0 {{ $errors->has('city_id') && old('model') == '#initialInfoModal' ? 'is-invalid' : ''}}">
                            @if(!$user->city_id)
                            <option disabled selected>please select your city</option>
                            @endif
                            @foreach($cities as $city)
                            <option {{$user->city_id==$city->id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                            @endforeach
                        </select>
                        @if(old('model') == '#initialInfoModal') {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!} @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="title">* Job Title</label>
                        <input value="{{$user->title}}" type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" id="title" placeholder="Title">
                        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-md-6">
                        <label for="age">* Birth Date</label>
                        <input value="{{$user->birth_date?:old('birth_date')}}" type="text" name="birth_date" class="form-control  {{ $errors->has('birth_date') ? 'is-invalid' : ''}}" id="Birth_Date" placeholder="Birth Date" data-language='en' data-format="y-m-d">
                        {!! $errors->first('birth_date', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-md-6">
                        <label for="gender">* Gender</label>
                        <select id="gender" name="gender" class="form-control p-0 {{ $errors->has('gender') ? 'is-invalid' : ''}}">
                            @if(!$user->gender)
                            <option disabled selected>Select your Gender</option>
                            @endif
                            <option {{$user->gender=='male' || old('gender')=='male'?'selected':''}} value="male">Male</option>
                            <option {{$user->gender=='female'|| old('gender')=='female'?'selected':''}} value="female">Female</option>
                        </select>
                        {!! $errors->first('gender', '<div class="invalid-feedback" style="display:block">:message</div>') !!}
                    </div>

                    <div class="form-group col-md-6 ">   
                        @if(!$user->cv)  * @endif Upload CV (.pdf, .doc, Max Size: 10 MB)
                        <input type="file" name="cv" class="custom-file-input {{ $errors->has('cv') ? 'is-invalid' : ''}}" id="cv">
                        <label style="width: 90%;top:32px;overflow: hidden;" class="custom-file-label" for="cv">.PDF,.DOC CV</label>
                        {!! $errors->first('cv', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-md-6  " style="padding-top: 34px;">   
                        <a href="{{$user->getUserCv()}}" target="_blank" class=" @if(!$user->cv)  disabled @endif btn btn-block btn-lg btn-sm bg-main text-white mr-2">
                            @if($user->cv) 
                                Show CV
                            @else
                                Not Uploaded CV
                            @endif
                        </a>
                    </div>


                    <div class="form-group col-md-6"> 
                        Profile Picture (.jpg,png,jpeg,gif, Max Size: 4 MB)
                        <input type="file" class="custom-file-input {{ $errors->has('image') ? 'is-invalid' : ''}}" name="image" id="image">
                        <label style="width: 90%;top:32px;overflow: hidden;" class="custom-file-label" for="image">.jpg .png .jpeg Picture</label>
                        {!! $errors->first('image', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-md-6" style="padding-top: 34px;"> 
                        @if($user->image != "user.png")
                        <button class="btn btn-danger confirm"  data-form="#delted-image" data-message="Are You Sure ? To Delete The Picture ">Delete image</button>
                        @else
                        <p class="text-danger">No picture uploaded</p>
                        @endif
                    </div>

                    <div class="form-group col-md-6">  Video CV (.mp4)
                        <input type="file" class="custom-file-input {{ $errors->has('video_cv') ? 'is-invalid' : ''}}" name="video_cv" id="video">
                        <label style="width: 90%;top:32px;overflow: hidden;" class="custom-file-label" for="video">.mp4 Video CV</label>
                        {!! $errors->first('video_cv', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group col-md-6" style="padding-top: 34px;"> 
                        @if($user->video_cv)
                        <button class="btn btn-danger confirm"  data-form="#form-delte-cv" data-message="Are You Sure ? To Delete The Picture ">Delete video cv</button>
                        @else
                        <p class="text-danger">No video cv  uploaded</p>
                        @endif
                    </div>

                    <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                        <input type="checkbox" name="subscription" {{$user->subscription==1?'checked':''}} name="subscription" class="custom-control-input" id="subscription">
                        <label class="custom-control-label" for="subscription">Subscription</label>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Save Changes">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Delete Modal -->
<div id="DeleteInfoModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #1C1C1C;">
            <div class="modal-body p-4">
                <form action="{{ route('user.delete.vedio') }} " id="form-delte-cv" method="POST" class="form-row text-center" >
                    @csrf
                    <div class="col-12 form-group mb-3">
                        <strong class="h4 text-white"> Are you sure you want to delete this?</strong>
                    </div>

                    <div class="form-group col-md-12 mb-0">
                        <button class="btn btn-main mx-2" type="button" data-dismiss="modal"> No </button>
                        <button class="btn btn-main mx-2" type="submit">Yes</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@if($user->video_cv)
<div id="vedioCv" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Video CV</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <form method="POST"  id="deleted-cv"  action="{{ route('user.delete.vedio') }} ">
                        @csrf
                        <button  data-form="" class="btn btn-danger deleted-general btn-sm confirm" data-message="Are You Sure ? To Delete The Vedio Cv " ><i class="far fa-trash-alt"></i></a> 
                    </form>
                    
                </div>    
                <div class="text-center">
                    <video src="{{$user->getVideoCv()}}" style="width:100%" controls id="vedio-cv"></video>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif




<!-- Delete Modal -->
<!-- Delete Modal -->
<div id="DeleteInfoModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #1C1C1C;">
            <div class="modal-body p-4">
                <form action="" method="POST" class="form-row text-center" >
                    <div class="col-12 form-group mb-3">
                        <strong class="h4 text-white"> Are you sure you want to delete this?</strong>
                    </div>

                    <div class="form-group col-md-12 mb-0">
                        <button class="btn btn-main mx-2" type="button" data-dismiss="modal"> No </button>
                        <button class="btn btn-main mx-2" type="submit">Yes</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endpush




{{-- scripts --}}

@push('tabsScripts')
    <script>
        $(function(){

            @if($user->video_cv)
            $('#vedioCv').on('hidden.bs.modal', function(e) {

            var elm = $('#vedio-cv').get(0);
            if (elm)
                elm.pause()
            })
            @endif

            // clander
            var today = moment().subtract(16, 'years')
            $("#Birth_Date").bootstrapMaterialDatePicker({
                format : 'YYYY-MM-DD',
                time: false,
                endDate: "today",
                maxDate: today
            })

            //  display file name after uploading it
            $('#cv').change(function() {
                var i = $(this).next('label').clone();
                var file = $('#cv')[0].files[0].name;
                $(this).next('label').text(file);
            });



            //  display file name after uploading it
            $('#video').change(function() {
                var i = $(this).next('label').clone();
                var file = $('#video')[0].files[0].name;
                $(this).next('label').text(file);
            });

            //  display file name after uploading it
            $('#image').change(function() {
                var i = $(this).next('label').clone();
                var file = $('#image')[0].files[0].name;
                $(this).next('label').text(file);
            });

            $(".confirm").click(function(e){
                e.preventDefault();
                $msg  = $(this).data("message")
                let x = confirm($msg)
                if(x){
                    $($(this).data("form") ).submit();
                }


            })

            
        })


    </script>
@endpush
