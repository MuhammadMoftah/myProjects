@extends('admin.layouts.app')
@section('content')
<!-- PAGE CONTENT WRAPPER -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title pull-left"><b><i class="icon-list head-icon"></i></b></h4>
            <br>
            <hr>
            <h4 class="m-t-0 header-title pull-right">
                <a class="btn btn-default btn-style-custom" href="{{route('admin.covers.create.get')}}">Create <i class="fa fa-plus"></i></a>
            </h4>

            <div class="clearfix"></div>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($covers as $cover)
                        <tr>
                            <td><img height="100px;" width="100px;" src="{{env('AWS_URL') .$cover->getImageUrl()}}"/></td>
                            <td>@if($cover->active==1) active @else not active @endif</td>
                            <td>
                                <a type="button" class="btn btn-info btn-flat" href="{{route('admin.covers.view',$cover->id)}}" > <i class="fa fa-eye"></i> @lang('lang.view')</a>
                                <a type="button" class="btn btn-danger btn-flat" href="{{route('admin.covers.delete',$cover->id)}}" > <i class="fa fa-trash"></i> @lang('lang.delete')</a>
                                <a type="button" class="btn btn-primary btn-flat" href="{{route('admin.covers.change',$cover->id)}}" >
                                   @if($cover->active==1)
                                    suspend
                                   @else
                                    Active
                                   @endif
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection