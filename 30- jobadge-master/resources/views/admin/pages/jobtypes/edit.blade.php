@extends('admin.master')
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit jobtype
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                <form id="form_advanced_validation" method="POST" action="{{route('admin.jobtypes.edit.post',$jobtype->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" value="{{$jobtype->name_en}}" name="name_en" maxlength="200" required>
                            <label class="form-label">* English Name</label>
                        </div>
                        <div class="help-info">Max. 200 characters</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" value="{{$jobtype->name_ar}}" name="name_ar" maxlength="200" required>
                            <label class="form-label">* Arabic Name</label>
                        </div>
                        <div class="help-info">Max. 200 characters</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" value="{{$jobtype->slug}}" name="slug" maxlength="300" required>
                            <label class="form-label">* SLUG</label>
                        </div>
                        <div class="help-info">Max. 300 characters</div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Edit</button>
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