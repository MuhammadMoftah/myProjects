<main class="user-details bg-white rounded p-3">

   

    <div class="card">
        <div class="card-body py-4   ">   
        @if(!$user->IfSocialUser())
            <form action="{{route('user.password.change')}}" method="POST" class="form-row">
                <div class="form-group col-md-12">
                    <label>Change Your Password</label>
                    <input value="change_p" name="type" type="hidden"/>
                    {{csrf_field()}}
                    <input type="password" name="old_password" class="form-control m-1 {{ $errors->has('old_password') ? 'is-invalid' : ''}}" placeholder="Old Password">
                    {!! $errors->first('old_password', '<div class="invalid-feedback">:message</div>') !!}
                    <input type="password" name="password" class="form-control m-1 {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="New Password">
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                    <input type="password" name="password_confirmation" class="form-control m-1 {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="Confirm Password">
                    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                    <input type="submit" class="form-control btn btn-info m-1" value="Change">
                </div>
            
            </form>
        @else
            <div class="alert alert-info" role="alert"> 
                   
                Login using <span style="color:red">@if($user->facebook_id)  Facebook @endif  @if($user->twitter_id) Twitter @endif  @if($user->google_id) Google </span> @endif Social account 
            </div>
        @endif
        </div>
    </div>

   
    <div class="form-group  pt-3 border-top text-center col-md-12">
        <a class="btn btn-danger deleted-general " href="{{route('user.deactivate')}}" id="userDelete" data-toggle="modal" data-target="#generalDeleteModel" title="Delete"> Deactivate My Account </a>
    </div>

</main>

