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
                                    <th>Status</th>
                                    <td>@if($banner->active) Active @else Not Active @endif</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td><img src="{{$banner->image}}" /></td>
                                </tr>
                                <tr>
                                    <th>Link</th>
                                    <td><a href="{{$banner->link}}">{{$banner->link}}</a></td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{$banner->type}}</td>
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