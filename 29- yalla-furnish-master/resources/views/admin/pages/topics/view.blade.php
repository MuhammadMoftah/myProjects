@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    Topic View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <td>@if($topic->user_id) {{$topic->user->fullname}} @else Yalla-Furnish @endif</td>
                        </tr>
                        <tr>
                            <th>Categories</th>
                            <td>
                                @foreach($topic->categories as $category)
                                {{$category->name_en}} @if(!$loop->last)-@endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>topic</th>
                            <td style="word-break: break-all;">{{$topic->body}}</td>
                        </tr>
                        @if($topic->link)
                        <tr>
                            <th>attached link</th>
                            <td><a href="{{$topic->link}}">{{$topic->link}}</a></td>
                        </tr>
                        @endif
                        <tr>
                            <th>images</th>
                            <td>
                                @foreach($topic->images as $topic_image)
                                <img style="height: 200px; width: 200px;" src="{{$topic_image->image}}" />
                                @endforeach
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