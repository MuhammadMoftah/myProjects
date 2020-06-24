@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    Work Experience View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <td>{{$workexperience->title}}</td>
                        </tr>
                        <tr>
                            <th>company name</th>
                            <td>{{$workexperience->company_name}}</td>
                        </tr>
                        <tr>
                            <th>Reporting to</th>
                            <td>{{$workexperience->reporting_to}}</td>
                        </tr>
                        <tr>
                            <th>industry</th>
                            <td>{{$workexperience->industry->name_en}} - {{$workexperience->industry->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>country</th>
                            <td>{{$workexperience->country->name_en}} - {{$workexperience->country->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>city</th>
                            <td>{{$workexperience->city->name_en}} - {{$workexperience->city->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>from</th>
                            <td>{{$workexperience->from}}</td>
                        </tr>
                        <tr>
                            <th>to</th>
                            <td>@if($workexperience->till_present==1) Now @else {{$workexperience->to}} @endif</td>
                        </tr>
                        <tr>
                            <th>description</th>
                            <td>{{$workexperience->job_description}}</td>
                        </tr>
                        <tr>
                            <th>achievements</th>
                            <td>{{$workexperience->achievements}}</td>
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