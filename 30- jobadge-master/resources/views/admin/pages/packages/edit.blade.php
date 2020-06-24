@extends('admin.master')
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit Package
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                <form id="form_advanced_validation" method="POST" action="{{route('admin.packages.edit.post',$package->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" value="{{$package->name_en}}" name="name_en" maxlength="200" required>
                            <label class="form-label">* English Name</label>
                        </div>
                        <div class="help-info">Max. 200 characters</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" value="{{$package->name_ar}}" name="name_ar" maxlength="200" required>
                            <label class="form-label">* Arabic Name</label>
                        </div>
                        <div class="help-info">Max. 200 characters</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{$package->no_of_posts}}" class="form-control" name="no_of_posts" min="1" required>
                            <label class="form-label">* No. of Posts</label>
                        </div>
                        <div class="help-info">Min. Value: 1</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{$package->no_of_jobs}}" class="form-control" name="no_of_jobs" min="1" required>
                            <label class="form-label">* No. of Jobs</label>
                        </div>
                        <div class="help-info">Min. Value: 1</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{$package->price}}" class="form-control" name="price" min="1" required>
                            <label class="form-label">* Price</label>
                        </div>
                        <div class="help-info">Min. Value: 1</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="feature1_en" value="{{$package->feature1_en}}" cols="30" rows="5" class="form-control no-resize" required>{{$package->feature1_en}}</textarea>
                            <label class="form-label">English Feature1</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="feature1_ar" value="{{$package->feature1_ar}}" cols="30" rows="5" class="form-control no-resize" required>{{$package->feature1_ar}}</textarea>
                            <label class="form-label">Arabic Feature1</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="feature2_en" value="{{$package->feature2_en}}" cols="30" rows="5" class="form-control no-resize" required>{{$package->feature2_en}}</textarea>
                            <label class="form-label">English Feature2</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="feature2_ar" value="{{$package->feature2_ar}}" cols="30" rows="5" class="form-control no-resize" required>{{$package->feature2_ar}}</textarea>
                            <label class="form-label">Arabic Feature2</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="feature3_en" value="{{$package->feature3_en}}" cols="30" rows="5" class="form-control no-resize" required>{{$package->feature3_en}}</textarea>
                            <label class="form-label">English Feature3</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="feature3_ar" value="{{$package->feature3_ar}}" cols="30" rows="5" class="form-control no-resize" required>{{$package->feature3_ar}}</textarea>
                            <label class="form-label">Arabic Feature3</label>
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
@endsection 