@extends('admin.master')
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit size
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                <form id="form_advanced_validation" method="POST" action="{{route('admin.sizes.edit.post',$size->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$size->from}}" class="form-control" name="from" min="5" max="10000" required>
                            <label class="form-label">*Size From</label>
                        </div>
                        <div class="help-info">Min. Value: 5, Max. Value: 10000</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$size->to}}" class="form-control" name="to" min="5" max="10000" required>
                            <label class="form-label">*Size To</label>
                        </div>
                        <div class="help-info">Min. Value: 5, Max. Value: 10000</div>
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