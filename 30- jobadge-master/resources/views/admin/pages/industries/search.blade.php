@extends('admin.master')
@section('styles')
<!-- <link href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" /> -->
@endsection
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @include('admin.layouts.message')
                <h2 style="margin-bottom: 10px;">
                    industries
                </h2>
                <a href="{{route('admin.industries.create.get')}}" class="btn btn-primary waves-effect">
                    <i class="material-icons">add</i>
                    <span>Create</span>
                </a>
                <form style="margin-top:10px;" id="form_advanced_validation" action="{{route('admin.industries.search')}}">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="search" required>
                            <label class="form-label">* Search</label>
                        </div>
                    </div>
                </form>
            </div>
            @if(count($industries)>0)
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>English Name</th>
                            <th>Arabic NAME</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($industries as $industry)
                        <tr>
                            <td>{{$industry->name_en}}</td>
                            <td>{{$industry->name_ar}}</td>
                            <td>
                                <a href="{{route('admin.industries.view',$industry->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">visibility</i>
                                </a>
                                <a href="{{route('admin.industries.edit.get',$industry->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">edit</i>
                                </a>
                                @if(count($industry->companies)==0&&count($industry->experiences)==0&&count($industry->targets)==0)
                                <a href="{{route('admin.industries.delete',$industry->id)}}" type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">delete</i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align:center;">
                    {{ $industries->appends(getRequestBetweenPages())->render() }}
                </div>
            </div>
            @else
            <div class="alert bg-red">
                no industries found for your search
            </div>
            @endif
        </div>
    </div>
</div>
<!-- #END# Bordered Table -->
@endsection
@section('scripts')
<!-- Bootstrap Notify Plugin Js -->
<!-- <script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script> -->
<!-- SweetAlert Plugin Js -->
<!-- <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script> -->
<!-- <script src="{{asset('assets/js/pages/ui/dialogs.js')}}"></script> -->
<!-- Validation Plugin Js -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>
@endsection 