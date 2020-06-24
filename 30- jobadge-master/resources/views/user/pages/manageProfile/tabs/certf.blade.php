<main class="user-details bg-white rounded p-3">
  
        @forelse ($user->certificates as  $certificate)
            
        <div class="card">
        <div class="card-body py-0 d-flex justify-content-between align-items-center flex-column flex-sm-row">
            <hgroup class="py-3">
                <div>
                    <span></span>
                    <strong class="text-capitalize">{{$certificate->name}} </strong> 
                    From
                    <strong class="text-capitalize">{{$certificate->place_name}} </strong>
                </div>
                <div class="text-muted">
                    <i class="far fa-clock mr-2 text-muted text-center" style="width: 15px;"></i>
                    <strong class="text-capitalize">{{ $certificate->displayStart() }}</strong> 
                    to
                    <strong class="text-capitalize"> {{ $certificate->displayEnd() }} </strong>
                </div>  
            </hgroup>
            
            <aside class="mb-2 mb-sm-0">
                <button data-href="{{route('user.certificate.edit',$certificate->id)}}" class="btn btn-info btn-sm edit-certificate edit-certs-{{$certificate->id}} " title="Edit" 
                    data-id="{{$certificate->id}}"
                    data-name="{{$certificate->name}}"
                    data-place_name="{{$certificate->place_name}}"
                    data-member_id="{{$certificate->member_id}}"
                    data-date="{{$certificate->date}}"
                    data-expired_date="{{$certificate->expired_date}}"
                    data-button = ".edit-certs-{{$certificate->id}}"
                >
                    <i class="fas fa-user-edit"></i>
                </button> 
                <a href="{{route('user.certificate.delete',$certificate->id)}}"  data-id="{{$certificate->id}}" class="btn btn-danger deleted-general btn-sm" data-toggle="modal" data-target="#generalDeleteModel" title="Delete"><i class="far fa-trash-alt"></i></a>        
            </aside>
        </div>
        </div>
        @empty
        <!-- ==== Show if no Experince Added ==== -->
        <div class="card mb-2">
            <div class="card-body text-center">
                    <strong class="text-muted">You have no work Certificate yet.</strong>
            </div>
        </div>
        @endforelse
    

    <button class="btn btn-main2 mt-4 btn-sm" data-toggle="modal" data-target="#addCertiModal"> <i class="fas fa-plus mr-2"></i>  Add Certificate</button>

</main>

@push('models')
    <!-- Add new Certificate Modal -->
<!-- Add new Certificate Modal  -->
<div id="addCertiModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Add new certificate</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('user.certificate.post')}}" method="POST" class="form-row" >
                        @csrf
                        <input value="certs" name="tab"   type="hidden">
                        <input value="#addCertiModal" name="model" type="hidden">
                        <div class="form-group col-md-12">
                            <label><span class="text-danger">*</span> Certificate Name</label>
                            <input value="{{old('name')}}" name="name" type="text" class="form-control {{ $errors->has('name') && old('model') == '#addCertiModal' && old('tab') == 'certs'? 'is-invalid': ''}}" placeholder="Certificate Name">
                            @if(old('tab') == 'certs' && old('model') == '#addCertiModal' && old('tab') ){!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>

                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Place Name (University,institute..)</label>
                            <input value="{{old('place_name')}}" type="text" name="place_name" class="form-control {{ $errors->has('place_name')&& old('model') == '#addCertiModal' && old('tab')  && old('tab') == 'certs'? 'is-invalid': ''}}" placeholder="Place name">
                            @if(old('tab') == 'certs' && old('model') == '#addCertiModal' && old('tab') ){!! $errors->first('place_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>

                        <div class="form-group col-md-6">
                            <label><span class="text-danger"></span> Member ID</label>
                            <input value="{{old('member_id')}}" type="text" name="member_id" class="form-control {{ $errors->has('member_id') && old('tab') == 'certs'? 'is-invalid': ''}}" placeholder="member id">
                            @if(old('tab') == 'certs'){!! $errors->first('member_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>

                        <div class="form-group col-md-6">
                            <label><span class="text-danger">*</span> Start From</label>
                            <input value="{{old('date')}}" type='text' name="date" class="form-control datepicker {{ $errors->has('date') && old('tab') == 'certs'? 'is-invalid': ''}}" data-language='en' />
                            @if(old('tab') == 'certs'){!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>

                        <div class="form-group col-md-6 endDateCertifcate">
                            <label><span class="text-danger"></span> End Date</label>
                            <input value="{{old('expired_date')}}" type='text' name="expired_date" class="form-control end-date datepicker {{ $errors->has('expired_date') && old('tab') == 'certs'? 'is-invalid': ''}}" data-language='en' />
                            @if(old('tab') == 'certs'){!! $errors->first('expired_date', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>
                        {{-- <div class="col-md-12">
                            <input type="checkbox" value="1" @if( old("no_expire") == 1) checked @else  @endif  name="no_expire"   style="width:30px;height:17px " class="allow-end"  data-input=".endDateCertifcate">
                            <label>This certificate has no expirational date</label>  
                        </div> --}}

                        <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                            <input data-end=".endDateCertifcate" type="checkbox" value="1" @if( old("no_expire") == 1) checked @else  @endif  name="no_expire"  class="custom-control-input currently-work currently-work2" id="certi2">
                            <label class="custom-control-label" for="certi2">This certificate has no expirational date</label>
                        </div>

                            

                        

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Add Certificate">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Edit your Certificate details -->
<!-- Edit your Certificate details -->
<div id="editCertiModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Add new certificate</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-row" >
                    @csrf
                    <input value="certs" name="tab"   type="hidden">
                    <input value="#editCertiModal" name="model" type="hidden">
                    <input type="hidden" name="editbutton" value="">
                    <div class="form-group col-md-12">
                        <label><span class="text-danger">*</span> Certificate Name</label>
                        <input value="{{old('name')}}" name="name" type="text" class="form-control {{ $errors->has('name') && old('tab') == 'certs'? 'is-invalid': ''}}" placeholder="Certificate Name">
                        @if(old('tab') == 'certs'){!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Place Name (University,institute..)</label>
                        <input value="{{old('place_name')}}" type="text" name="place_name" class="form-control {{ $errors->has('place_name') && old('tab') == 'certs'? 'is-invalid': ''}}" placeholder="Place name">
                        @if(old('tab') == 'certs'){!! $errors->first('place_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger"></span> Member ID</label>
                        <input value="{{old('member_id')}}" type="text" name="member_id" class="form-control {{ $errors->has('member_id') && old('tab') == 'certs'? 'is-invalid': ''}}" placeholder="member id">
                        @if(old('tab') == 'certs'){!! $errors->first('member_id', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6">
                        <label><span class="text-danger">*</span> Start From</label>
                        <input value="{{old('date')}}" type='text' name="date" class="form-control datepicker {{ $errors->has('date') && old('tab') == 'certs'? 'is-invalid': ''}}" data-language='en' />
                        @if(old('tab') == 'certs'){!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>

                    <div class="form-group col-md-6 endDateCertifcateEdit">
                        <label><span class="text-danger"></span> End Date</label>
                        <input value="{{old('expired_date')}}" type='text' name="expired_date" class="form-control end-date datepicker {{ $errors->has('expired_date') && old('tab') == 'certs'? 'is-invalid': ''}}" data-language='en' />
                        @if(old('tab') == 'certs'){!! $errors->first('expired_date', '<div class="invalid-feedback">:message</div>') !!}@endif
                    </div>
                    {{-- <div class="col-md-12">
                        <input type="checkbox" value="1" @if( old("no_expire") == 1) checked @else  @endif  name="no_expire"   style="width:30px;height:17px " class="allow-end"  data-input=".endDateCertifcate">
                        <label>This certificate has no expirational date</label>  
                    </div> --}}

                    <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                        <input data-end=".endDateCertifcateEdit" type="checkbox" value="1" @if( old("no_expire") == 1) checked @else  @endif  name="no_expire"  class="custom-control-input currently-work currently-work2" id="certi2Edit">
                        <label class="custom-control-label" for="certi2Edit">This certificate has no expirational date</label>
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Edit Certificate">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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

            
            let  name        = $("#editCertiModal input[name='name']"),
                EditJobModel=$("#editCertiModal"),
                FormEditCertModel = EditJobModel.find("form") ,
                member_id = $("#editCertiModal input[name='member_id']"),
                date = $("#editCertiModal input[name='date']"),
                expired_date = $("#editCertiModal input[name='expired_date']"),
                no_expire = $("#editCertiModal input[name='no_expire']"),
                place_name = $("#editCertiModal input[name='place_name']"),
                editbutton  = $("#editCertiModal input[name='editbutton']");
        
             
           // ====================
           $("body").on("click",".edit-certificate", function(e){
              //set value in form 
              e.preventDefault();
            
              var _elm = $(this);
              FormEditCertModel.prop('action', _elm.data("href"))
              name.val(_elm.data("name"))
              place_name.val(_elm.data("place_name"))
              expired_date.val(_elm.data('expired_date'))
              date.val(_elm.data('date'))
              member_id.val(_elm.data('member_id'))
              
              editbutton.val(_elm.data('button'))
              
            //   console.log(expired_date)  
              if(_elm.data("expired_date")){
                no_expire.attr("checked", false)
                expired_date.prop("disabled", false)
              }else{
                no_expire.attr("checked", true)
                expired_date.prop("disabled", true)
              }  
              
              EditJobModel.modal("show")
              // =================


           })

            
        })


    </script>
@endpush