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
                <a class="btn btn-default btn-style-custom" href="{{route('admin.districts.create.get')}}">Create <i class="fa fa-plus"></i></a>
            </h4>

            <div class="clearfix"></div>
            <div class="m-separator m-separator--dashed d-xl-none"></div>
            <div class="body table-responsive">
                <table class="table table-bordered" id="districts">
                    <thead>
                        <tr>
                            <th>Arabic name</th>
                            <th>English name</th>
                            <th>City</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($districts as $district)
                        <tr>
                            <td>{{$district->name_ar}}</td>
                            <td>{{$district->name_en}}</td>
                            <td>{{$district->city->name_en}}</td>
                            <td>
                                <a type="button" class="btn btn-info btn-flat" href="{{route('admin.districts.edit.get',$district->id)}}"> <i class="fa fa-edit"></i> @lang('lang.edit')</a>
                                <a type="button" class="btn btn-primary btn-flat" href="{{route('admin.districts.change',$district->id)}}">
                                    @if($district->activation==1)
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
<script type="text/javascript">
</script>
@endsection