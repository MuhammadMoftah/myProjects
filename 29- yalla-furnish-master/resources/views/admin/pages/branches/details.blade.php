@extends('admin.master')
@section('body')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Branch English name</th>
                            <td>{{$branch ->address_en}}</td>
                        </tr>
                        <tr>
                            <th>Branch Arabic name</th>
                            <td>{{$branch ->address_ar}}</td>
                        </tr>
                        <tr>
                            <th>Branch Working From</th>
                            <td>{{$branch ->working_from}}</td>
                        </tr>
                        <tr>
                            <th>Branch Working To</th>
                            <td>{{$branch ->working_to}}</td>
                        </tr>
                        <tr>
                            <th>Branch First Mobile</th>
                            <td>{{$branch ->mob1}}</td>
                        </tr>
                        <tr>
                            <th>Branch Second Mobile</th>
                            <td>{{$branch ->mob2}}</td>
                        </tr>
                        <tr>
                            <th>Branch First Telephone</th>
                            <td>{{$branch ->tel1}}</td>
                        </tr>
                        <tr>
                            <th>Branch Second Telephone</th>
                            <td>{{$branch ->tel2}}</td>
                        </tr>
                        <tr>
                            <th>Branch Third Telephone</th>
                            <td>{{$branch ->tel3}}</td>
                        </tr>
                        <tr>
                            <th>Branch Latitude</th>
                            <td>{{$branch ->lat}}</td>
                        </tr>
                        <tr>
                            <th>Branch Longitude </th>
                            <td>{{$branch ->lang}}</td>
                        </tr>

                        </thead>

                        <tbody>
                        <tr>
                            
                        </tr>
                        </tbody>
                    </table>
                    <div class="form-group">
                            <label class="d-block" for="">Working Hours: </label>
                            @foreach ($branch->info as $info)
                                
                            
                            <div class="form-check d-inline-block my-1">
                                <label class="form-check-label" for="new_sunday" style="width:90px">
                                    {{ $info->day }}
                                </label>
                                @include('admin.pages.branches.working_hours')
                            </div>
                            @endforeach
    
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection