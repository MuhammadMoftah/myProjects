@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    district View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>English name</th>
                            <td>{{$district->name_en}}</td>
                        </tr>
                        <tr>
                            <th>Arabic name</th>
                            <td>{{$district->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{$district->city->name_en}} - {{$district->city->name_ar}}</td>
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