@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 style="margin-bottom: 10px;">
                    Content View
                </h2>
            </div>
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Type</th>
                            <td>{{$content->type}}</td>
                        </tr>
                        <tr>
                            <th>English Content</th>
                            <td id="english_content">{!! $content->body_en !!}</td>
                        </tr>
                        <tr>
                            <th>Arabic Content</th>
                            <td id="arabic_content">{!! $content->body_ar !!}</td>
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