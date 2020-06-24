@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    Post View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <td>
                                {{$post->company->name}}
                            </td>
                        </tr>
                        <tr>
                            <th>Body</th>
                            <td>
                                {{$post->body}}
                            </td>
                        </tr>
                        <tr>
                            @if($post->image)
                        <tr>
                            <th>Image</th>
                            <td>
                                <div class="image">
                                    <img src="{{$post->getPostImage()}}" width="100" height="100" alt="User" />
                                </div>
                            </td>
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