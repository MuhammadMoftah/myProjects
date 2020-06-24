@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Create City
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                @include('admin.layouts.message')
                <form id="form_advanced_validation" method="POST" action="{{route('admin.city.create.post')}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="name_en" type="text" value="{{old('name_en')}}" class="form-control" name="name_en" maxlenght="200" required>
                            <label class="form-label">* English name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="name_ar" type="text" value="{{old('name_ar')}}" class="form-control" name="name_ar" maxlenght="200" required>
                            <label class="form-label">* Arabic name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Create</button>
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