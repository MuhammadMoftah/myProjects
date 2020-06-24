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
                @include('admin.layouts.errors')
                <h2 style="margin-bottom: 10px;">
                    users
                </h2>
                <form id="form_advanced_validation" enctype="multipart/form-data" action="{{route('admin.users.import.post')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-float" style="width: 20%; float:left;">
                        <div class="form-line">
                            <input type="file" class="form-control" name="file" required>
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Import</button>
                </form>
                <hr style="width:100%">
                <a href="{{route('admin.users.export')}}" class="btn bg-indigo waves-effect" style="margin: 8px!important;">
                    <i class="material-icons">insert_drive_file</i>
                    <span>Export</span>
                </a>
                <a href="{{route('admin.users.create.get')}}" class="btn btn-primary waves-effect">
                    <i class="material-icons">add</i>
                    <span>Create</span>
                </a>
                <form style="margin-top:10px;" id="form_advanced_validation" action="{{route('admin.users.search')}}">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="search" required>
                            <label class="form-label">* Search</label>
                        </div>
                    </div>
                </form>
            </div>
            @if(count($users)>0)
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->first_name}} {{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="{{route('admin.users.view',$user->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">visibility</i>
                                </a>
                                <a href="{{route('admin.users.edit.get',$user->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="{{route('admin.users.suspend',$user->id)}}" type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                    @if($user->suspend==0)
                                    <i class="material-icons">pan_tool</i>
                                    @else
                                    <i class="material-icons">done</i>
                                    @endif
                                </a>
                            </td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align:center;">
                    {{ $users->appends(getRequestBetweenPages())->render() }}
                </div>
            </div>
            @else
            <div class="alert bg-red">
                no users found
            </div>
            @endif
        </div>
    </div>
</div>
<!-- #END# Bordered Table -->
@endsection
@section('scripts')
<!-- Validation Plugin Js -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>
@endsection 