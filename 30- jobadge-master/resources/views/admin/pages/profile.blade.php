@extends('admin.master')
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit Profile
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.message')
                @include('admin.layouts.errors')
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.post.profile')}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{auth()->guard('admin')->user()->name}}" class="form-control" name="name" maxlength="254" required>
                            <label class="form-label">* Name</label>
                        </div>
                        <div class="help-info">Max. 200 characters</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="email" value="{{auth()->guard('admin')->user()->email}}" class="form-control" name="email" maxlength="254" required>
                            <label class="form-label">* Email</label>
                        </div>
                        <div class="help-info">Max. 254 characters</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="8" maxlength="254">
                            <label class="form-label">New Password</label>
                        </div>
                        <div class="help-info">Min. 8 , Max. 254 characters</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_confirmation" minlength="8" maxlength="254">
                            <label class="form-label">Password Confirmation</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line" style="width:90%;">
                            <input style="margin-left: 50px;" type="file" class="form-control" name="image">
                            <label class="form-label">Image</label>
                        </div>
                        <div class="help-info">.jpg,.png</div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- Validation Plugin Js -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>
@endsection 