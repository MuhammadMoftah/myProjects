@extends('admin.layouts.app')

@section('title',trans("lang.CompanyPackages")." - ".trans("lang.CompanyPackageList"))

@section('content')

@section('breadcrumb')
@stop
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"> {!!Lang::get("Company $company->registered_name Package List")!!} </h3>
                </div>       
            </div>
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>{{ trans("lang.Package") }}</th>
                                <th>{{ trans("lang.Type") }}</th>
                                <th>{{ trans("lang.Activate") }}</th>
                                <th>{{ trans("lang.Status") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($company_packages as $package)
                            <tr>
                                <td>{{ app()->getLocale() == 'en' ? $package->package()->first()->name_en : $package->package()->first()->name_ar }}</td>
                                @if($package->type == 0)
                                <td>monthly</td>
                                @elseif($package->type == 1)
                                <td>quartely</td>
                                @elseif($package->type == 2)
                                <td>semi_annual</td>
                                @elseif($package->type == 3)
                                <td>annual</td>
                                @endif
                                <td>
                                    @if($package->status == 0)
                                    <label>Deactivated</label>
                                    @elseif($package->status == 1)
                                    <form method="post" action="{{ route('admin.company_package.disable', $package->id) }}">
                                        {{ csrf_field() }}
                                        <input type="submit" value="Deacrivate">
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    @if($package->status == 1 && $package->confirmed != 1)
                                    <form id="accept_form" method="post" action="{{ route('admin.company_package.accept', $package->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="status" value="accept">
                                    </form>
                                    <form id="reject_form" method="post" action="{{ route('admin.company_package.reject', $package->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="status" value="reject">
                                    </form>
                                    <form id="pending_form" method="post" action="{{ route('admin.company_package.pending', $package->id) }}">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="status" value="pending">
                                    </form>
                                    <select id="status_list" name="status_list" onchange="check_status();">
                                        <option value="0" {{ $package->confirmed == 0 ? 'selected' : '' }}>Pending</option>
                                        <option value="1" {{ $package->confirmed == 1 ? 'selected' : '' }}>Accept</option>
                                        <option value="2" {{ $package->confirmed == 2 ? 'selected' : '' }}>Reject</option>
                                    </select>
                                    @elseif($package->status == 0)
                                    @endif
                                </td>
                            </tr>
                            @endforeach
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

@section('script')
<script type="text/javascript">
    function check_status() {
        if ($("#status_list").val() == 0) {
//            alert('pending');
            $("#pending_form").submit();
        } else if ($("#status_list").val() == 1) {
//            alert('accept');
            $("#accept_form").submit();
        } else if ($("#status_list").val() == 2) {
//            alert('reject');
            $("#reject_form").submit();
        }
    }
</script>
@stop