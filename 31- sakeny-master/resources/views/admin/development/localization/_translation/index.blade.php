@extends('admin.layouts.app')

@section('title',trans("lang.$module_name")." - ".trans("lang.".end($breadcrumb)))

@section('content')

    <!-- Page-Title -->
    @section('breadcrumb')
        @foreach ($breadcrumb as $bread)
            @if ($loop->remaining == 1)
                <li><a href="{{ url("$base_view/$route") }}">@lang("lang.$bread")</a></li>
            @elseif($loop->last)
                <li class="active">@lang("lang.$bread")</li>
            @else
                <li>@lang("lang.$bread")</li>
            @endif
        @endforeach
    @stop
    <!-- PAGE CONTENT WRAPPER -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title pull-left"><b>{!!Lang::get("lang.$bread")!!}</b></h4>
                        <h4 class="m-t-0 header-title pull-right">
                            <a class="btn btn-default" href="{{ url("$base_view/$route/create") }}">Create <i class="fa fa-plus"></i></a>
                            <a class="btn btn-success" href="{{ url(ADMIN_PATH."/development/localization/language/create") }}">Create Language <i class="fa fa-plus"></i></a>
                            <a class="btn btn-info" href="{{ url(ADMIN_PATH."/development/localization/language") }}"> Languages <i class="fa fa-eye"></i></a>
                        </h4>
                        <div class="clearfix"></div>

                        <table id="myTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>name</th>
                                    @foreach ($languages as $language)
                                        <th>{{ $language->name }}</th>
                                    @endforeach
                                    <th>Insertion type</th>
                                    <th>Status</th>
                                    <th>@lang('lang.Actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $row)
                                   <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->name }}</td>
                                       @foreach ($languages as $language)
                                            <td>{{ $row->translations()->whereLanguageId($language->id)->first()->value or '--'  }}</td>
                                        @endforeach
                                        <td>{{ $row->insertion_type }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>
                                            @include ("$base_view.$path.action",['route' => $route,
                                                                                 'id'=>$row->id])
                                        </td>
                                   </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
@stop




@push('script')
    <script>
    $(function () {
        $('.table').DataTable({
            serverSide: false,
            processing: false,
            ajax: '',
        });
    });
</script>
@endpush
