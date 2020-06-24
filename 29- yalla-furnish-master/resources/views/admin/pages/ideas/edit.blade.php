@extends('admin.master')
@section('styles')
<style>
    .bs-searchbox {
        max-width: 95% !important;
        padding-left: 15px !important;
    }
</style>
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Update Idea
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.message')
                @include('admin.layouts.errors')
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.idea.update',['id' => $idea->id])}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* English Name</b>
                            </p>
                            <textarea required id="name_en" type="text" value="{{$idea->name_en}}" class="form-control editor" name="name_en">{{$idea->name_en}}</textarea>
                            <p style="color: red">{{ $errors->has('name_en')?$errors->first('name_en'):'' }}
                            </p>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Arabic Name</b>
                            </p>
                            <textarea required id="name_ar" type="text" value="{{$idea->name_ar}}" class="form-control editor" name="name_ar">{{$idea->name_ar}}</textarea>
                            <p style="color: red">{{ $errors->has('name_ar')?$errors->first('name_ar'):'' }}
                            </p>
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
                                <option {{ $idea->user_id == $user->id?'selected':''}} value="{{$user->id}}">{{$user->first_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>
                            <b>* categories (up to 10)</b>
                        </p>
                        <select required name="categories[]" class="form-control show-tick" multiple>
                            @foreach($categories as $category)
                            <option {{in_array($category->id,$idea->categories->pluck('id')->all())?'selected':''}} value="{{$category->id}}">{{$category->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <img src="{{ $idea->idea_image }}" width="200px" height="160px" alt="">
                    <div class="form-group form-float" style="width:90%">
                        <label class="form-label">* Idea image </label>
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" multiple="multiple" id="uploadimgs" hidden class="form-control" name="idea_image">
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="images-preview" style="display: -webkit-box;"></div>
                    <button class="btn btn-primary waves-effect submmit" type="submit">update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="card">
            <div class="header">
                <h2>
                    New Paragraph
                </h2>
            </div>
            <div class="body">

                <form id="form_advanced_validation" enctype="multipart/form-data" action="{{route('admin.paragraphs.create.post',$idea->id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>English Title</b>
                            </p>
                            <textarea id="new_title_en" type="text" value="" class="form-control editor" name="title_en"></textarea>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>Arabic Title</b>
                            </p>
                            <textarea id="new_title_ar" type="text" value="" class="form-control editor" name="title_ar"></textarea>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">English Description</label>
                        <div class="form-line">
                            <textarea id="description_en" name="description_en" cols="30" rows="5" class="form-control no-resize editor"></textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">Arabic Description</label>
                        <div class="form-line">
                            <textarea id="description_ar" name="description_ar" cols="30" rows="5" class="form-control no-resize editor"></textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>Youtube Link</b>
                            </p>
                            <input type="url" class="form-control" name="youtube_link">
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <label class="form-label">Paragraph image </label>
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" hidden class="form-control" name="image">
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <p>
                            <b>Image Position</b>
                        </p>
                        <select required name="position" class="form-control show-tick">
                            <option>top</option>
                            <option>bottom</option>
                            <option>left</option>
                            <option>right</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="active" name="active">
                        <label for="active">Active</label>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@foreach($idea->paragraphs as $paragraph)
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <div class="card">
            <div class="header">
                <h2>
                    Edit Paragraph
                </h2>
            </div>
            <div class="body">

                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.paragraphs.update',$paragraph->id)}}">
                    {{csrf_field()}}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>English Title</b>
                            </p>
                            <textarea type="text" id="title_en_{{$paragraph->id}}" value="{{$paragraph->title_en}}" class="form-control editor" name="title_en">{{$paragraph->title_en}}</textarea>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>Arabic Title</b>
                            </p>
                            <textarea type="text" id="title_ar_{{$paragraph->id}}" value="{{$paragraph->title_ar}}" class="form-control editor" name="title_ar">{{$paragraph->title_ar}}</textarea>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">English Description</label>
                        <div class="form-line">
                            <textarea id="description_en_{{$paragraph->id}}" id="description_en" value="{{$paragraph->description_en}}" name="description_en" cols="30" rows="5" class="form-control no-resize editor">{{$paragraph->description_en}}</textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">Arabic Description</label>
                        <div class="form-line">
                            <textarea id="description_ar_{{$paragraph->id}}" name="description_ar" value="{{$paragraph->description_ar}}" cols="30" rows="5" class="form-control no-resize editor">{{$paragraph->description_ar}}</textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>Youtube Link</b>
                            </p>
                            <input type="url" value="{{$paragraph->youtube_link}}" class="form-control" name="youtube_link">
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <img src="{{ $paragraph->image }}" width="200px" height="160px" alt="">
                    <div class="form-group form-float" style="width:90%">
                        <label class="form-label">Paragraph image </label>
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" hidden class="form-control" name="image">
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <p>
                            <b>* Image Position</b>
                        </p>
                        <select required name="position" class="form-control show-tick">
                            <option {{$paragraph->position=='top'?'selected':''}}>top</option>
                            <option {{$paragraph->position=='bottom'?'selected':''}}>bottom</option>
                            <option {{$paragraph->position=='left'?'selected':''}}>left</option>
                            <option {{$paragraph->position=='right'?'selected':''}}>right</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input {{$paragraph->active==1?'checked':''}} type="checkbox" id="active_{{$paragraph->id}}" name="active">
                        <label for="active_{{$paragraph->id}}">Active</label>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Update</button>
                    <a class="btn btn-danger waves-effect" href="{{route('admin.paragraphs.delete',$paragraph->id)}}">Delete</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('scripts')
<!-- Validation Plugin Js -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>
<script src="{{asset('assets/js/addIdea.js')}}"></script>
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
@if(Session::has('success'))
<script>
    Swal.fire({
        position: 'center',
        type: 'success',
        title: 'Idea updated successfully',
        timer: 2500,
        showConfirmButton: true,
        showLoaderOnConfirm: true,
    });
</script>
@endif
@endsection