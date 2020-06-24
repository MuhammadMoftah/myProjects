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
                <a class="btn btn-default btn-style-custom" href="{{route('admin.ad_type.create')}}">Create <i class="fa fa-plus"></i></a>
            </h4>

            <div class="clearfix"></div>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>English Name</th>
                            <th>Arabic Name</th>
                            <th>number of special ads</th>
                            <th>number of repeated ads</th>
                            <th>number of normal ads</th>
                            <th>number of seo ads</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ad_types as $ad_type)
                        <tr>
                            <td>{{$ad_type->name_en}}</td>
                            <td>{{$ad_type->name_ar}}</td>
                            <td>{{$ad_type->no_of_special_ads}}</td>
                            <td>{{$ad_type->no_of_repeated_ads}}</td>
                            <td>{{$ad_type->no_of_normal_ads}}</td>
                            <td>{{$ad_type->no_of_seo_ads}}</td>
                            <td>
                                <a type="button" class="btn btn-primary btn-flat" href="{{route('admin.ad_type.edit',$ad_type->id)}}">
                                    Edit
                                </a>
                                  <a type="button" class="btn btn-danger btn-flat" href="{{route('admin.ad_type.delete',$ad_type->id)}}">
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