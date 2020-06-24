@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    jobtype View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>English Name</th>
                            <td>{{$jobtype->name_en}}</td>
                        </tr>
                        <tr>
                            <th>Arabic NAME</th>
                            <td>{{$jobtype->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>SLUG</th>
                            <td>{{$jobtype->slug}}</td>
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