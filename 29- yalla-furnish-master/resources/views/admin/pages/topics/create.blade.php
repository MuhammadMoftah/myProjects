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
                    Create Topic
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                @include('admin.layouts.message')
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.topic.create.post')}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <label class="form-label">* Topic</label>
                        <div class="form-line">
                            <textarea id="body" name="body" value="{{old('body')}}" cols="30" rows="5" class="form-control no-resize" required>{{old('body')}}</textarea>
                            <label class="form-label">* Topic body</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="link" type="text" value="{{old('link')}}" class="form-control" name="link">
                            <label class="form-label">* Attached Link</label>
                        </div>
                        <div class="help-info">example: http/https://www.example.com</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>User</b>
                            </p>
                            <select name="user_id" class="form-control show-tick" data-live-search="true">
                                <option value="" selected>select your User</option>
                                @foreach($users as $user)
                                <option {{ old('user_id') == $user->id?'selected':''}} value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>
                            <b>* categories (up to 3)</b>
                        </p>
                        <select name="categories[]" class="form-control show-tick" multiple>
                            @foreach($categories as $category)
                            <option @if(old('categories')!==null) {{in_array($category->id,old('categories'))?'selected':''}} @endif value="{{$category->id}}">{{$category->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <label class="form-label">* Topic images (up to 5 images)</label>
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" multiple="multiple" id="uploadimgs" hidden class="form-control" name="images[]" required>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="images-preview" style="display: -webkit-box;"></div>
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
<script src="{{asset('assets/js/addProduct.js')}}"></script>
@endsection