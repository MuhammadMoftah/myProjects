@extends('admin.layouts.app')


@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title"><b></b></h4>
            <div class="clearfix"></div>
            @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
            @endif
            <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('sendMails.post')}}">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('developer_description_ar') ? ' has-error' : '' }} col-md-12">
                    {!! Form::label('Message', 'message') !!}
                    {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'message', 'rows' => 5, 'required']) !!}
                    <small class="text-danger">{{ $errors->first('message') }}</small>
                </div>
                <button class="btn btn-primary waves-effect" type="submit">Send</button>
            </form>
        </div>
    </div>
</div>
@stop