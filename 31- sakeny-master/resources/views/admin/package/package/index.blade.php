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
                <a class="btn btn-default btn-style-custom" href="{{route('admin.packages.create')}}">Create <i class="fa fa-plus"></i></a>
            </h4>

            <div class="clearfix"></div>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>English Name</th>
                            <th>Arabic Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $package)
                        <tr>
                            <td>{{$package->name_en}}</td>
                            <td>{{$package->name_ar}}</td>
                            <td>{{$package->price}}</td>
                            <td>
                                <a type="button" class="btn btn-success btn-flat" href="{{route('admin.packages.status.change',$package->id)}}">
                                    @if($package->free==1)
                                    Mark As Not Free
                                    @else
                                    Mark As Free
                                    @endif
                                </a>
                                <a type="button" class="btn btn-success btn-flat" href="{{route('admin.packages.active.change',$package->id)}}">
                                    @if($package->active==1)
                                    Mark As Not Active
                                    @else
                                    Mark As Active
                                    @endif
                                </a>
                                <a type="button" class="btn btn-info btn-flat" href="{{route('admin.packages.view',$package->id)}}">
                                    View
                                </a>
                                <a type="button" class="btn btn-primary btn-flat" href="{{route('admin.packages.edit',$package->id)}}">
                                    Edit
                                </a>
                                <a type="button" class="btn btn-danger btn-flat" href="{{route('admin.packages.delete',$package->id)}}">
                                    Delete
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