@extends('admin.master')
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit {{$content->type}} content
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                <form id="form_advanced_validation" method="POST" action="{{route('admin.contents.edit.post',$content->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea id="english_content" name="body_en" value="{{$content->body_en}}" cols="35" rows="15" class="form-control no-resize" required>{{$content->body_en}}</textarea>
                            <label class="form-label">* English Content</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea id="arabic_content" name="body_ar" value="{{$content->body_ar}}" cols="35" rows="15" class="form-control no-resize" required>{{$content->body_ar}}</textarea>
                            <label class="form-label">* Arabic Content</label>
                        </div>
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
<!-- Ckeditor -->
<script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/editors.js')}}"></script>

@endsection