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
                    Edit ad
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.ads.edit.post',$ad->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="body" value="{{$ad->body}}" cols="30" rows="5" class="form-control no-resize" required>{{$ad->body}}</textarea>
                            <label class="form-label">* Content</label>
                        </div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" hidden class="form-control" name="image">
                            <label class="form-label">Image</label>
                        </div>
                        <div class="help-info">jpg,png,jpeg</div>
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