@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    feedback View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User</th>
                            <td>{{$feedback->user->first_name}}</td>
                        </tr>
                        <tr>
                            <th>User Image</th>
                            <td>
                                <div class="image">
                                    <img src="{{$feedback->user->getUserImage()}}" width="100" height="100" alt="User" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Approved By Admin</th>
                            <td>
                                @if($feedback->approved==1)
                                <i class="material-icons">done</i>
                                @else
                                <i class="material-icons">close</i>
                                @endif
                                <a href="{{route('admin.feedbacks.approve',$feedback->id)}}" type="button" style="vertical-align: bottom; float: right;" class="btn bg-indigo waves-effect waves-float">
                                    @if($feedback->approved==1)
                                    disapprove
                                    @else
                                    approve
                                    @endif
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>Feedback</th>
                            <td>{{$feedback->body}}</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- #END# Bordered Table -->
@endsection 