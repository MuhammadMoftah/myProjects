@extends('admin.master')
@section('styles')
<style>
    .bs-searchbox {
        max-width: 95% !important;
        padding-left: 15px !important;
    }
</style>
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Create Idea
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                @include('admin.layouts.message')
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.idea.create.post')}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* English Name</b>
                            </p>
                            <textarea id="name_en" required type="text" value="{{old('name_en')}}" class="form-control editor" name="name_en">{{old('name_en')}}</textarea>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Arabic Name</b>
                            </p>
                            <textarea id="name_ar" required type="text" value="{{old('name_ar')}}" class="form-control editor" name="name_ar">{{old('name_ar')}}</textarea>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>User</b>
                            </p>
                            <select name="user_id" class="form-control show-tick" data-live-search="true">
                                <option value="" selected>select your User</option>
                                @foreach($users as $user)
                                <option {{ old('user_id') == $user->id?'selected':''}} value="{{$user->id}}">{{$user->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>
                            <b>* categories (up to 10)</b>
                        </p>
                        <select id="categories" required name="categories[]" class="form-control show-tick" multiple>
                            @foreach($categories as $category)
                            <option @if(old('categories')!==null) {{in_array($category->id,old('categories'))?'selected':''}} @endif value="{{$category->id}}">{{$category->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <label class="form-label">* Idea image </label>
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" multiple="multiple" id="uploadimgs" hidden class="form-control" name="idea_image" required>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="images-preview" style="display: -webkit-box;"></div>
                    <!-- add paragraph -->
                    <hr>
                    <div id="paragraphs">
                        <h3>
                            New Paragraph
                        </h3>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>English Title</b>
                                </p>
                                <textarea id="new_title_en" type="text" value="" class="form-control editor" name="paragraphs[0][title_en]"></textarea>
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>Arabic Title</b>
                                </p>
                                <textarea id="new_title_ar" type="text" value="" class="form-control editor" name="paragraphs[0][title_ar]"></textarea>
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">English Description</label>
                            <div class="form-line">
                                <textarea id="description_en" name="paragraphs[0][description_en]" cols="30" rows="5" class="form-control no-resize editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Arabic Description</label>
                            <div class="form-line">
                                <textarea id="description_ar" name="paragraphs[0][description_ar]" cols="30" rows="5" class="form-control no-resize editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>Youtube Link</b>
                                </p>
                                <input type="url" value="" class="form-control" name="paragraphs[0][youtube_link]">
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="form-group form-float" style="width:90%">
                            <label class="form-label">Paragraph image </label>
                            <div class="form-line">
                                <input style="margin-left: 50px;" type="file" hidden class="form-control" name="paragraphs[0][image]">
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="col-md-12">
                            <p>
                                <b>Image Position</b>
                            </p>
                            <select name="paragraphs[0][position]" required class="form-control show-tick">
                                <option>top</option>
                                <option>bottom</option>
                                <option>left</option>
                                <option>right</option>
                            </select>
                        </div>
                    </div>
                    <button data-number="1" class="btn btn-primary waves-effect" id="add-paragraph" type="button">Add Paragraph</button>
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
<script src="{{asset('assets/js/addIdea.js?rand=123')}}"></script>
<script src="{{asset('assets/js/ckeditor/ckeditor.js?rand=123')}}"></script>
<script>
    $('.editor').each(function() {
        var id = $(this).attr('id');
        var textarea = document.getElementById(id);
        CKEDITOR.replace(textarea);
    });
    $('.editor').each(function() {
        $(this).removeClass('editor')
    });
</script>
@endsection