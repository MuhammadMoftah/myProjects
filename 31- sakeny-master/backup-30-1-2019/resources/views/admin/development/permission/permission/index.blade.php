@extends('admin.starter')
@section('title',"التصاريح")
@section('content')
<div class="page-content">
          <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title"> التصاريح </h3>

        <ul class="breadcrumb">
             <li><i class="fa fa-dashboard active"> </i> {{ trans('lang.controlpanel') }}</li>
            <li class="active">التصاريح</li>
        </ul>                        
        <div class="portlet light profile-sidebar-portlet ">
            <div class="settings-form">
            

            <div class="box box-primary">
                <div class="box-body">
                @include('admin.errors')
                <div class="box-header">
                  <h3 class="box-title pull-left">التصاريح</h3>
                  <h3 class="box-title pull-right">
                      <a class="btn btn-primary" href="{{ url('admin/admin-permission/create') }}">انشاء مدير</a>
                  </h3>

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="rows" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>{{ trans('lang.title') }}</th>
                          <th>{{ trans('lang.controller') }}</th>
                        </tr>
                      </thead>
                      <tbody>
                          @include('admin.admin.permission.loop')
                      </tbody>
                  </table>
            </div>
        </div>
        <!-- END PAGE HEADER-->
  </div>
  <!-- END CONTENT -->
@endsection