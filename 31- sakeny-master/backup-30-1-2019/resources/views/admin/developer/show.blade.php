@extends('admin.layouts.app')

@section('title',trans("lang.$module_name")." - ".trans("lang.".end($breadcrumb)))

@section('content')

<!-- Page-Title -->
@section('breadcrumb')
    @foreach ($breadcrumb as $bread)
        <li><a href="#">{{ $bread }}</a></li>
    @endforeach
@stop
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> {!!Lang::get("lang.$bread")!!} </h3>
                </div>       
            </div>
        </div>
        <!-- END PAGE CONTENT WRAPPER -->                                                
    </div>            
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

@stop