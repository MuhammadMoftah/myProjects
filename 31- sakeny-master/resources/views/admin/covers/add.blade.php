@extends('admin.layouts.app')


@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title"><b></b></h4>
                <div class="clearfix"></div>
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.covers.create.post')}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float" style="width:90%">
                        <div class="form-line">
                            <input type="file" hidden class="form-control" name="image">
                            <label class="form-label">Image</label>
                        </div>
                        <div class="help-info">jpg,png,jpeg</div>
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
@stop