@extends('admin.layouts.app')

@section('breadcrumb')
    <li class="active">@lang("403")</li>
@stop

@push('head')
    <style type="text/css">
        .wrapper-page {
            margin-top: 0px;
            margin: 5% auto;
            position: relative;
            width: 420px;
            margin-top: 0px;
        }
    </style>
@endpush

@section('content')

        <div class="wrapper-page">
            <div class="ex-page-content text-center">
                <div class="text-error"><span class="text-primary">4</span><i class="ti-face-sad text-pink"></i><span class="text-info">3</span></div>
                <h2>Forbidden</h2><br>
                <p class="text-muted">You don't have permission to access on this action.</p>
                <br>
                <a class="btn btn-default waves-effect waves-light" href="{{ url('') }}"> Return Home</a>

            </div>
        </div>

@stop
