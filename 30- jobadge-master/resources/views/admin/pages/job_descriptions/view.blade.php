@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    Job Description View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <td>{{$description->category->name_en}} - {{$description->category->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{$description->title}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! $description->description !!}</td>
                        </tr>
                        <tr>
                            <th>Requirement</th>
                            <td>{!! $description->requirement !!}</td>
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