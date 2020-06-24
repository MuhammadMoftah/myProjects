@extends('admin.layouts.app')
@section('content')
<!-- PAGE CONTENT WRAPPER -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title pull-left"><b><i class="icon-list head-icon"></i></b></h4>
            <br>
            <hr>
            {{--<h4 class="m-t-0 header-title pull-right">
                <a class="btn btn-default btn-style-custom" href="{{route('admin.packages.create')}}">Create <i class="fa fa-plus"></i></a>
            </h4>--}}

            <div class="clearfix"></div>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
            <div class="body table-responsive">
                <div class="col-md-12">
                    {!! Form::open(['method' => 'get']) !!}
                    <div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }} col-md-2">
                        {!! Form::label('approve_status', 'Approval Status') !!}
                        <select name="status" id="approve_status" class="form-control select2">
                            <option value="">Select your status</option>
                            <option {{request('status')==1?'selected':''}} value="1">Approve</option>
                            <option {{request('status')==='0'?'selected':''}} value="0">DisApprove</option>
                        </select>
                        <small class="text-danger">{{ $errors->first('offer_type_id') }}</small>
                    </div>
                    <div class="btn-group col-md-2">

                        {!! Form::submit("Search", ['class' => 'btn btn-success btn-block', 'style'=>'margin-top: 25px;']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Subscriber Name</th>
                            <th>Package Name</th>
                            <th>Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscriptions as $subscription)
                        <tr>
                            <td>{{$subscription->user_id?$subscription->user->name:$subscription->company->registered_name}}</td>
                            <td>{{$subscription->package->name_en}}</td>
                            <td>{{$subscription->user_id?'User':'Company'}}</td>
                            <td>{{$subscription->start_date}}</td>
                            <td>{{$subscription->end_date}}</td>
                            <td>
                                <a type="button" class="btn btn-success btn-flat" href="{{route('admin.subscriptions.approve',$subscription->id)}}">
                                    @if($subscription->approve==1)
                                    DisApprove
                                    @else
                                    Approve
                                    @endif
                                </a>
                                <a type="button" class="btn btn-info btn-flat" href="{{route('admin.subscriptions.view',$subscription->id)}}">
                                    View
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $subscriptions->appends(getRequestBetweenPages())->render("pagination::bootstrap-4") }}
            </div>

        </div>
    </div>
</div>

@endsection