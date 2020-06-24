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
                <a class="btn btn-default btn-style-custom" href="{{route('admin.banners.create.get')}}">Create <i class="fa fa-plus"></i></a>
            </h4>--}}

            <div class="clearfix"></div>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Active</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $banner)
                        <tr>
                            <td><img height="100px;" width="100px;" src="{{$banner->image}}" /></td>
                            <td>@if($banner->active==1) active @else not active @endif</td>
                            <td>{{$banner->type}}</td>
                            <td>
                                <a type="button" class="btn btn-info btn-flat" href="{{route('admin.home_banners.view',$banner->id)}}"> <i class="fa fa-eye"></i> @lang('lang.view')</a>
                                <a type="button" class="btn btn-primary btn-flat" href="{{route('admin.home_banners.edit',$banner->id)}}">
                                    Edit
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