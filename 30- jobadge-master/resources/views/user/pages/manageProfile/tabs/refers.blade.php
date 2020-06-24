<main class="user-details bg-white rounded p-3">

    <!-- ==== Show if no Experince Added ==== -->
   

    <div class="card">
        @if($user->ref1_name ||  $user->ref2_name)
        <div class="card-body py-0 d-flex justify-content-between align-items-center flex-column flex-sm-row">
            @if($user->ref1_name)
            <hgroup class="py-3">
                <div>
                     <strong class="text-capitalize">{{$user->ref1_name}}</strong> 
                </div>
                <div class="text-muted">
                    <strong class="text-capitalize">{{$user->ref1_title }}</strong> 
                    {{-- at
                    <strong class="text-capitalize">Minvotech </strong> --}}
                </div>
                <div class="text-muted">
                    <i class="fa fa-phone fa-rotate-90 mr-2 text-muted text-center" style="width: 15px;"></i>
                <span>{{$user->ref1_phone}}</span>
                </div> 
                
            </hgroup>
            @endif
            @if($user->ref2_name)
            <hgroup class="py-3">
                <div>
                     <strong class="text-capitalize">{{$user->ref2_name}}</strong> 
                </div>
                <div class="text-muted">
                    <strong class="text-capitalize">{{$user->ref2_title }}</strong> 
                    {{-- at
                    <strong class="text-capitalize">Minvotech </strong> --}}
                </div>
                <div class="text-muted">
                    <i class="fa fa-phone fa-rotate-90 mr-2 text-muted text-center" style="width: 15px;"></i>
                <span>{{$user->ref2_phone}}</span>
                </div> 
                
            </hgroup>
            @endif
            
            <aside class="mb-2 mb-sm-0">
                {{-- <a href="javascript:void(0)" class="btn btn-info btn-sm" title="Edit" data-toggle="modal" data-target="#editCertiModal"><i class="fas fa-user-edit"></i></a>  --}}
                {{-- <a href="javascript:void(0)" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeleteInfoModal" title="Delete"><i class="far fa-trash-alt"></i></a>  --}}
            </aside>
        </div>
        @else
            
                <div class="card-body text-center">
                    <strong class="text-muted">You have no  reference  yet.</strong>
                </div>
        
        @endif

    </div>
    <a href="javascript:void(0)" class="btn btn-info btn-sm mt-3" title="Edit" data-toggle="modal" data-target="#addRefModal"><i class="fas fa-user-edit"></i> 
        @if($user->ref1_name ||  $user->ref2_name)
            Edit references
        @else
           Add references 
        @endif
    </a> 

    {{-- <button class="btn btn-main2 mt-4 btn-sm" data-toggle="modal" data-target="#addRefModal"> <i class="fas fa-plus mr-2"></i>  Add reference </button> --}}

</main>

@push('models')
    <!-- Add new reference  Modal -->
<!-- Add new reference  Modal  -->
<div id="addRefModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Add new Reference</h5>
            </div>
            <div class="modal-body">
                <form action="{{route('user.edit.references.post')}}" method="POST" class="form-row" >
                    @csrf
                    <input value="refs" name="tab"   type="hidden">
                    <input value="#addRefModal" name="model" type="hidden">
                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">* Reference_1 name</label>
                                <input type="text" value="{{$user->ref1_name ? $user->ref1_name : old('ref1_name') }}"
                                      class="form-control {{ $errors->has('ref1_name') && old('tab')=='refs' ? 'is-invalid' : ''}}"
                                      name="ref1_name" maxlenght="200"
                                      >
                            </div>
                            <div class="help-info">Max. Char: 200</div>
                            
                            @if(old('tab')=="refs")
                                {!! $errors->first('ref1_name', '<div class="invalid-feedback">:message</div>') !!}
                            @endif
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">* Reference_1 title</label>
                                <input type="text" value="{{$user->ref1_title ? $user->ref1_title : old('ref1_title')}}"
                                class="form-control {{ $errors->has('ref1_title') && old('tab')=='refs' ? 'is-invalid' : ''}}"
                                 name="ref1_title" maxlenght="200">
                              
                            </div>
                            <div class="help-info">Max. Char: 200</div>
                            @if(old('tab')=="refs"){!! $errors->first('ref1_title', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">* Reference_1 phone</label>
                                <input type="text" value="{{$user->ref1_phone ? $user->ref1_phone : old('ref1_phone') }}" 
                                 class="form-control {{ $errors->has('ref1_phone') && old('tab')=='refs' ? 'is-invalid' : ''}}"
                                 name="ref1_phone" maxlenght="200">
                                
                            </div>
                            {{-- <div class="help-info">Max. Char: 200</div> --}}
                            @if(old('tab')=="refs") {!! $errors->first('ref1_phone', '<div class="invalid-feedback">:message</div>') !!} @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">* Reference_2 name</label>
                                <input type="text" value="{{$user->ref2_name ? $user->ref2_name  : old('ref2_name') }}" 
                                 class="form-control {{ $errors->has('ref2_name') && old('tab')=='refs' ? 'is-invalid' : ''}}"
                                 name="ref2_name" maxlenght="200">
                            </div>
                            <div class="help-info">Max. Char: 200</div>
                            @if(old('tab')=="refs"){!! $errors->first('ref2_name', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">* Reference_2 title</label>
                                <input type="text" value="{{$user->ref2_title ? $user->ref2_title : old('ref2_title') }}"
                                class="form-control {{ $errors->has('ref2_title') && old('tab')=='refs' ? 'is-invalid' : ''}}" 
                                 name="ref2_title" maxlenght="200">
                            </div>
                            <div class="help-info">Max. Char: 200</div>
                            @if(old('tab')=="refs"){!! $errors->first('ref2_title', '<div class="invalid-feedback">:message</div>') !!}@endif

                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">* Reference_2 phone</label>
                                <input type="text" value="{{$user->ref2_phone ? $user->ref2_phone :old('ref2_phone')  }}"
                                class="form-control {{ $errors->has('ref2_phone') && old('tab')=='refs' ? 'is-invalid' : ''}}" 

                                 name="ref2_phone" maxlenght="200">
                            </div>
                            {{-- <div class="help-info">Max. Char: 200</div> --}}
                            @if(old('tab')=="refs"){!! $errors->first('ref2_phone', '<div class="invalid-feedback">:message</div>') !!}@endif

                        </div>
                        
                    </div>
                    {{-- ==================== --}}
                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Update References">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Edit your reference  details -->
<!-- Edit your reference  details -->
{{-- <div id="editCertiModal" class="modal fade">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold w-100 ">Add new Reference</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="form-row" >
                    <div class="form-group col-md-6">
                        <label for="lastname">Reference name</label>
                        <input value="" type="text" name="company_name" class="form-control " id="" placeholder="Reference name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="firstname">Reference title</label>
                        <input type="text" name="" class="form-control " id="" placeholder="Reference title">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">Company name</label>
                        <input value="" type="text" name="company_name" class="form-control " id="" placeholder="Company name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="lastname">Reference number</label>
                        <input value="" type="number" name="" class="form-control " id="" placeholder="Reference name">
                    </div>

                    <div class="form-group col-md-12">
                        <input type="submit" class="btn btn-primary w-25 my-1" value="Edit Reference">
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> --}}
@endpush