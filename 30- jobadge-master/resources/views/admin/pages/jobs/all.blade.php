@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @include('admin.layouts.message')
                @include('admin.layouts.errors')
                <h2 style="margin-bottom: 10px;">
                    jobs
                </h2>
                <form id="form_advanced_validation" enctype="multipart/form-data" action="{{route('admin.jobs.import.post')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group form-float" style="width: 20%; float:left;">
                        <div class="form-line">
                            <input type="file" class="form-control" name="file" required>
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Import</button>
                </form>
                <hr style="width:100%;">
                <a href="{{route('admin.jobs.export')}}" class="btn bg-indigo waves-effect" style="margin: 8px!important;">
                    <i class="material-icons">insert_drive_file</i>
                    <span>Export</span>
                </a>
                <a href="{{route('admin.jobs.create.get')}}" class="btn btn-primary waves-effect">
                    <i class="material-icons">add</i>
                    <span>Create</span>
                </a>
                <form style="margin-top:10px;" id="form_advanced_validation" action="{{route('admin.jobs.search')}}">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="search" required>
                            <label class="form-label">* Search</label>
                        </div>
                    </div>
                </form>
            </div>
            @if(count($jobs)>0)
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Company</th>
                            <th>Actions</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $job)
                        <tr>
                            <td>{{$job->title}}</td>
                            <td>{{$job->company->name}}</td>
                            <td>
                                <a href="{{route('admin.jobs.view',$job->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">visibility</i>
                                </a>
                                <a href="{{route('admin.jobs.edit.get',$job->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">edit</i>
                                </a>
                                {{--<a href="{{route('admin.jobs.delete',$job->id)}}" type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">delete</i>
                                </a>--}}
                            </td>
                            <td>{{$job->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align:center;">
                    {{ $jobs->appends(getRequestBetweenPages())->render() }}
                </div>
            </div>
            @else
            <div class="alert bg-red">
                no jobs found
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