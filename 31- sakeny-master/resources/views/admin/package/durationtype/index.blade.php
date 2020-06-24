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
                <a class="btn btn-default btn-style-custom" href="{{route('admin.durationtypes.create')}}">Create <i class="fa fa-plus"></i></a>
            </h4>

            <div class="clearfix"></div>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>English Name</th>
                            <th>Arabic Name</th>
                            <th>Duration type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($types as $type)
                        <tr>
                            <td>{{$type->name_en}}</td>
                            <td>{{$type->name_ar}}</td>
                            <td>{{$type->duration->name_en}}-{{$type->duration->name_ar}}</td>
                            <td>
                                <a type="button" class="btn btn-primary btn-flat" href="{{route('admin.durationtypes.edit',$type->id)}}">
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