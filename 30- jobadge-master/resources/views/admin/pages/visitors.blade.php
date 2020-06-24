@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @include('admin.layouts.message')
                <h2 style="margin-bottom: 10px;">
                    visitors
                    <a href="{{route('admin.visitors.clear')}}" class="btn btn-danger waves-effect">
                        <span>Clear</span>
                    </a>
                    <a href="{{route('admin.visitors.export')}}" class="btn btn-primary waves-effect">
                        <span>Export</span>
                    </a>
                </h2>
                <form id="form_advanced_validation" action="{{route('admin.visitors')}}">
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input value="{{request('search')}}" type="text" class="form-control" name="search">
                            <label class="form-label">Search</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>filter by dates</b>
                            </p>
                            <select name="post_date" class="form-control show-tick">
                                <option {{request('post_date')==''?'selected':''}} value="">All Dates</option>
                                <option {{request('post_date')=='within_24_hours'?'selected':''}} value="within_24_hours">Past 24 Hours</option>
                                <option {{request('post_date')=='within_1_week'?'selected':''}} value="within_1_week">Past Week</option>
                                <option {{request('post_date')=='within_1_month'?'selected':''}} value="within_1_month">Past Month</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Search</button>
                </form>
            </div>
            @if(count($visitors)>0)
            <div class="body table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ip</th>
                            <th>user agent</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($visitors as $visitor)
                        <tr>
                            <td>{{$visitor->ip}}</td>
                            <td>{{$visitor->browser}}</td>
                            <td>{{$visitor->created_at->diffForHumans()}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="text-align:center;">
                    {{ $visitors->appends(getRequestBetweenPages())->render() }}
                </div>
            </div>
            @else
            <div class="alert bg-red">
                no Visitors yet
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