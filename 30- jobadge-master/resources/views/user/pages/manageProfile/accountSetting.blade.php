@extends('master')
@section('styles')

@endsection
@section('body')


<div class="container mt-5 py-4">

    @include('layouts.message')

    <div class="card">
        <div class="card-body py-4   ">   
        @if(!$user->IfSocialUser())
            <div class="">
                <h4 style="font-weight: bold">Change  Password</h4>
                <p class="text-muted " style="padding-left: 10px">
                    To change your account password, enter your current password, then enter your new password and confirm it.
                </p>
            </div>
            <form action="{{route('user.password.change')}}" method="POST" class="form-row ">
                <div class="form-group col-md-12">
                    
                    <input value="change_p" name="type" type="hidden"/>
                    {{csrf_field()}}
                    <label> <span class="text-danger">*</span> Old Password</label>
                    <input type="password" name="old_password" class="form-control m-1 {{ $errors->has('old_password') ? 'is-invalid' : ''}}" placeholder="Old Password">
                    {!! $errors->first('old_password', '<div class="invalid-feedback">:message</div>') !!}
                    <label><span class="text-danger">*</span> New  Password</label>
                    <input type="password" name="password" class="form-control m-1 {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="New Password">
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                    <label><span class="text-danger">*</span> Confirm  Password</label>
                    <input type="password" name="password_confirmation" class="form-control m-1 {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="Confirm Password">
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                    <button type="submit" class=" btn btn-lg btn-block  btn-info mt-4  " >Change</button>
                </div>
            
            </form>
        @else
            <div class="alert alert-info" role="alert"> 
                   
                Login using <span style="color:red">@if($user->facebook_id)  Facebook @endif  @if($user->twitter_id) Twitter @endif  @if($user->google_id) Google  @endif </span> Social account 
            </div>
        @endif
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body py-4   ">   
            <div>
                <h4 style="font-weight: bold">Delete Account</h4>
                <p class="text-muted " style="padding-left: 10px">
                    If you Deactivate your account, companies will not be able to see your profile.
                </p>
            </div>
            <div class="form-group  pt-3  text-center ">
                <a class="btn btn-danger deleted-general " data-method="GET" href="{{route('user.deactivate')}}" id="userDelete" data-toggle="modal" data-target="#generalDeleteModel" title="Delete"> Deactivate My Account </a>
            </div>
        </div>
    </div>


</div>





<!-- Delete Modal -->
<!-- Delete Modal -->
<div id="generalDeleteModel" class="modal fade">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #1C1C1C;">
            <div class="modal-body p-4">
                <form action="" method="GET" class="form-row text-center" >
                   
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






    
@endsection

@section('scripts')
    <!-- datepicker Js -->
   

        <script>
          $(document).ready(function(){
                 // general file
            var deletModel        = $("#generalDeleteModel")
            var FormDeleteModel   = deletModel.find("form") 
          
           

           

         
          
            // general delte
            $("body").on("click", ".deleted-general" , function(event){ 
                var _el = $(this);
                FormDeleteModel.prop('action',_el.attr("href") )
                if(_el.data("method")){
                    FormDeleteModel.prop("method", _el.data("method"))
                    if(_el.data("method") != "GET"){
                        
                        
                    }
                }

                // console.log(FormDeleteModel.prop("action"))
            })

           


            
            })
        </script>

@endsection

