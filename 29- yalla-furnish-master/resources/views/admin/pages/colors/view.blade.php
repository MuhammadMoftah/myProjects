@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    color View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>English name</th>
                            <td>{{$color->name_en}}</td>
                        </tr>
                        <tr>
                            <th>Arabic name</th>
                            <td>{{$color->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>Color code</th>
                            <td>
                                {{$color->code}}
                                <div style="height: 20px;display: -webkit-inline-box; width: 30px; vertical-align: bottom; background-color: {{$color->code}};"></div>
                            </td>
                        </tr>
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