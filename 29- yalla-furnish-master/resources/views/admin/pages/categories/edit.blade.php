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
                    Edit Category
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                @include('admin.layouts.message')
                <form enctype="multipart/form-data" id="form_advanced_validation" method="POST" action="{{route('admin.category.edit.post',$category->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="name_en" type="text" value="{{$category->name_en}}" class="form-control" name="name_en" maxlenght="200" required>
                            <label class="form-label">* English name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="name_ar" type="text" value="{{$category->name_ar}}" class="form-control" name="name_ar" maxlenght="200" required>
                            <label class="form-label">* Arabic name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="slug" type="text" value="{{$category->slug}}" class="form-control" name="slug" maxlenght="300" required>
                            <label class="form-label">* Slug</label>
                        </div>
                        <div class="help-info">Max. Char: 250</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            * Category Image
                            <input type="file" class="form-control" name="category_image">
                        </div>
                        <div class="help-info">png,jpg,jpeg</div>
                    </div>
                    <button class="btn btn-primary waves-effect submmit" disabled type="submit">Edit</button>
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
<script>
    $('form').bind('change keyup', function() {
        $('.submmit').prop('disabled', false); // update button
    });
</script>
@endsection