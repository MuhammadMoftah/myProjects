@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    Certificate View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <td>{{$certificate->name}}</td>
                        </tr>
                        <tr>
                            <th>university/institute</th>
                            <td>{{$certificate->place_name}}</td>
                        </tr>
                        <tr>
                            <th>Member ID</th>
                            <td>{{$certificate->member_id}}</td>
                        </tr>
                        <tr>
                            <th>Date from</th>
                            <td>{{$certificate->date}}</td>
                        </tr>
                        <tr>
                            <th>Expire Date</th>
                            <td>{{$certificate->expired_date}}</td>
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