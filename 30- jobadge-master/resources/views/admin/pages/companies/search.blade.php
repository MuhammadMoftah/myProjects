@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @include('admin.layouts.message')
                <h2 style="margin-bottom: 10px;">
                    companies
                </h2>
                <a href="{{route('admin.companies.create.get')}}" class="btn btn-primary waves-effect">
                    <i class="material-icons">add</i>
                    <span>Create</span>
                </a>
                <form style="margin-top:10px;" id="form_advanced_validation" action="{{route('admin.companies.search')}}">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="search" required>
                            <label class="form-label">* Search</label>
                        </div>
                    </div>
                </form>
            </div>
            @if(count($companies)>0)
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Industry</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($companies as $company)
                        <tr>
                            <td>{{$company->name}}</td>
                            <td>{{$company->industry->name_en}} - {{$company->industry->name_ar}}</td>
                            <td>
                                <a href="{{route('admin.companies.view',$company->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">visibility</i>
                                </a>
                                <a href="{{route('admin.companies.edit.get',$company->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="{{route('admin.companies.suspend',$company->id)}}" type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                    @if($company->suspend==0)
                                    <i class="material-icons">pan_tool</i>
                                    @else
                                    <i class="material-icons">done</i>
                                    @endif
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align:center;">
                    {{ $companies->appends(getRequestBetweenPages())->render() }}
                </div>
            </div>
            @else
            <div class="alert bg-red">
                no companies found for your search
            </div>
            @endif
        </div>
    </div>
</div>
<!-- #END# Bordered Table -->
@endsection
@section('scripts')
<!-- Validation Plugin Js -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>
@endsection 