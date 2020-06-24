@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    User Education View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Dregree</th>
                            <td>{{$education->degree}}</td>
                        </tr>
                        <tr>
                            <th>university/institute</th>
                            <td>{{$education->place_name}}</td>
                        </tr>
                        <tr>
                            <th>Major</th>
                            <td>{{$education->major}}</td>
                        </tr>
                        <tr>
                            <th>country</th>
                            <td>{{$education->country->name_en}} - {{$education->country->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>city</th>
                            <td>{{$education->city->name_en}} - {{$education->city->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>from</th>
                            <td>{{$education->from_year}}</td>
                        </tr>
                        <tr>
                            <th>to</th>
                            <td>{{$education->to_year}}</td>
                        </tr>
                        @if(isset($education->notes))
                        <tr>
                            <th>notes</th>
                            <td>{{$education->notes}}</td>
                        </tr>
                        @endif
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- #END# Bordered Table -->
@endsection 