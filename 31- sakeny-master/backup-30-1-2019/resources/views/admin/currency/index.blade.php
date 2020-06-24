    @extends('admin.layouts.app')

@section('title',trans("lang.$module_name")." - ".trans("lang.".end($breadcrumb)))

@section('content')

    <!-- Page-Title -->
    @section('breadcrumb')
        @foreach ($breadcrumb as $bread)
            @if ($loop->last)
                <li class="active">@lang("lang.$bread")</li>
            @else   
                <li><a href="{{ url(ADMIN_PATH."/$route") }}">@lang("lang.$bread")</a></li>
            @endif
        @endforeach
    @stop
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> {!!Lang::get("lang.$bread")!!} </h3>
                    </div>
                   <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            @foreach ($columns as $column)
                                                <th>{{ trans("lang.$column") }}</th>
                                            @endforeach
                                            <th>@lang('lang.controllers')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include("$base_view.$route.loop")
                                    </tbody>
                                </table>
                            </div>         
                </div>
            </div>
            <!-- END PAGE CONTENT WRAPPER -->                                                
        </div>            
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->

@stop