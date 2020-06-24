@extends('admin.layouts.app')


@section('content')

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                    <div class="body table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Package Name En</th>
                                    <td>{{$package->name_en}}</td>
                                </tr>
                                <tr>
                                    <th>Package Name Ar</th>
                                    <td>{{$package->name_ar}}</td>
                                </tr>
                                <tr>
                                    <th>Package Description Ar</th>
                                    <td>{{$package->description_ar}}</td>
                                </tr>
                                <tr>
                                    <th>Package Description En</th>
                                    <td>{{$package->description_en}}</td>
                                </tr>
                                <tr>
                                    <th>Package Price</th>
                                    <td>{{$package->price}}</td>
                                </tr>
                                <tr>
                                    <th>Package Status</th>
                                    <td>{{$package->active==1?'Active':'Deactive'}}</td>
                                </tr>
                                {{--<tr>
                                    <th>Duration</th>
                                    <td>{{$package->duration->name_en}} - {{$package->duration->name_ar}}</td>
                                </tr>--}}
                                <tr>
                                    <th>Duration Type</th>
                                    <td>{{$package->durationtype->name_en}} - {{$package->durationtype->name_ar}}</td>
                                </tr>
                                <tr>
                                    <th>Ad Type</th>
                                    <td>{{$package->adtype->name_en}} - {{$package->adtype->name_ar}}</td>
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
        <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

@stop