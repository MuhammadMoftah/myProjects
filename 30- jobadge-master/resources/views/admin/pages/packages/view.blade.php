@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    package View
                </h2>
                <h3>{{$package->companies()->count()}} Companies Subscribe to this Package</h3>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>English Name</th>
                            <td>{{$package->name_en}}</td>
                        </tr>
                        <tr>
                            <th>Arabic NAME</th>
                            <td>{{$package->name_ar}}</td>
                        </tr>
                        <tr>
                            <th>No. of posts</th>
                            <td>{{$package->no_of_posts}}</td>
                        </tr>
                        <tr>
                            <th>No. of jobs</th>
                            <td>{{$package->no_of_jobs}}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{$package->price}} <strong>USD</strong></td>
                        </tr>
                        <tr>
                            <th>Feature 1 English description</th>
                            <td>{{$package->feature1_en}}</td>
                        </tr>
                        <tr>
                            <th>Feature 1 Arabic description</th>
                            <td>{{$package->feature1_ar}}</td>
                        </tr>
                        <tr>
                            <th>Feature 2 English description</th>
                            <td>{{$package->feature2_en}}</td>
                        </tr>
                        <tr>
                            <th>Feature 2 Arabic description</th>
                            <td>{{$package->feature2_ar}}</td>
                        </tr>
                        <tr>
                            <th>Feature 3 English description</th>
                            <td>{{$package->feature3_en}}</td>
                        </tr>
                        <tr>
                            <th>Feature 3 Arabic description</th>
                            <td>{{$package->feature3_ar}}</td>
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