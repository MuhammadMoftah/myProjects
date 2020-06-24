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
                                    <th>
                                        <a type="button" class="btn btn-success btn-flat" href="{{route('admin.subscriptions.approve',$subscription->id)}}">
                                            @if($subscription->approve==1)
                                            DisApprove
                                            @else
                                            Approve
                                            @endif
                                        </a>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <a type="button" class="btn btn-success btn-flat" href="{{route('admin.subscriptions.active',$subscription->id)}}">
                                            @if($subscription->active==1)
                                            Deactivate
                                            @else
                                            Activate
                                            @endif
                                        </a>
                                    </th>
                                </tr>
                                @if($subscription->active==0)
                                <tr>
                                    <th>Deactivated At</th>
                                    <td>
                                        {{$subscription->deactivate_date}}
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Package Name En</th>
                                    <td>{{$subscription->package->name_en}}</td>
                                </tr>
                                <tr>
                                    <th>Package Name Ar</th>
                                    <td>{{$subscription->package->name_ar}}</td>
                                </tr>
                                <tr>
                                    <th>Package Description Ar</th>
                                    <td>{{$subscription->package->description_ar}}</td>
                                </tr>
                                <tr>
                                    <th>Package Description En</th>
                                    <td>{{$subscription->package->description_en}}</td>
                                </tr>
                                <tr>
                                    <th>Package Price</th>
                                    <td>{{$subscription->package->price}}</td>
                                </tr>
                                <tr>
                                    <th>Subscriber Name</th>
                                    <td>{{$subscription->user_id?$subscription->user->name:$subscription->company->registered_name}}</td>
                                </tr>
                                <tr>
                                    <th>Subscriber Type</th>
                                    <td>{{$subscription->user_id?'User':'Company'}}</td>
                                </tr>

                                <tr>
                                    <th>Start Date</th>
                                    <td>{{$subscription->start_date}}</td>
                                </tr>
                                <tr>
                                    <th>End Date</th>
                                    <td>{{$subscription->end_date}}</td>
                                </tr>

                                <tr>
                                    <th>No, Of Seo Ads</th>
                                    <td>{{$subscription->no_of_seo_ads}}</td>
                                </tr>
                                <tr>
                                    <th>No, Of Normal Ads</th>
                                    <td>{{$subscription->no_of_normal_ads}}</td>
                                </tr>

                                <tr>
                                    <th>No, Of Repeated Ads</th>
                                    <td>{{$subscription->no_of_repeated_ads}}</td>
                                </tr>
                                <tr>
                                    <th>No, Of Special Ads</th>
                                    <td>{{$subscription->no_of_special_ads}}</td>
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