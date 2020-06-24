@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @include('admin.layouts.message')
                @include('admin.layouts.errors')
                <h2 style="margin-bottom: 10px;">
                    Upload Emails File
                </h2>
                <form id="form_advanced_validation" enctype="multipart/form-data" action="{{route('admin.emails.import')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="subject" maxlength="100" required>
                            <label class="form-label">* Subject</label>
                        </div>
                        <div class="help-info">Max. 100 characters</div>
                    </div>
                    <div class="form-group form-float" style="width: 20%; float:left;">
                        <div class="form-line">
                            <input type="file" class="form-control" name="file" required>
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Import</button>
                </form>
                <hr style="width:100%;">
            </div>
        </div>
    </div>
</div>
<!-- #END# Bordered Table -->
@endsection
@section('scripts')
<!-- Validation Plugin Js -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>
@endsection