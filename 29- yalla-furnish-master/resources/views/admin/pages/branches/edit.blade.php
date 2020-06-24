@extends('admin.master')
@section('body')
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit City
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                @include('admin.layouts.message')
<form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.branches.update',$branch->id)}}">
    {{ csrf_field() }}
<div class="form-group form-float">
    <div class="form-line">
        <label for="">English Address</label>
        <input type="text" value="{{ $branch->address_en }}" name="address_en" class="form-control no-resize">
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label for="">Arabic Address</label>
        <input type="text" value="{{ $branch->address_ar }}" name="address_ar" class="form-control no-resize">
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label class="d-inline" for="">Phone1: </label>
        <input type="text" value="{{ $branch->mob1 }}" name="mob1" class="form-control no-resize">
    </div>
</div>
<div class="form-group form-float">
    <div class="form-line">
        <label class="d-inline" for="">Phone2: </label>
        <input type="text" value="{{ $branch->mob2 }}" name="mob2" class="form-control no-resize">
    </div>
</div>

<div class="form-group">
    <label class="d-block" for="">Working Hours: </label>
    @foreach ($branch->info as $info)
        
    <div class="form-check d-inline-block my-1">
        <input type="checkbox" {{ $info->day ?'checked':''}} name="{{ $info->day }}" id="new_{{ $info->day}}">
        <label class="form-check-label" for="new_{{ $info->day }}" style="width:90px">
            {{ $info->day }}
        </label>
        <span class="text-muted mx-2"> from </span>
        <select name="working_from_{{$info->day}}" class="working_from" style="width:75px">
            @for($i=1 ; $i<13 ; $i++)
            <option {{  $info->day ?'selected':''}} value="{{$i}} AM">{{$i}} AM</option>
            @endfor
        
            @for($i=1 ; $i<13 ; $i++)
            <option value="{{$i}} PM">{{$i}} PM</option>
            @endfor
        </select>
        <span class="text-muted mx-2"> to </span>
        <select name="working_to_{{  $info->day}}" class="working_to" style="width:75px">
            @for($i=1 ; $i<13 ; $i++)
            <option  {{ $info->day ?'selected':''}} value="{{$i}} AM">{{$i}} AM</option>
            @endfor
            @for($i=1 ; $i<13 ; $i++)
            <option value="{{$i}} PM">{{$i}} PM</option>
            @endfor
        </select>    </div>

    @endforeach
        <button class="btn btn-primary waves-effect submit" type="submit" >Edit</button>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection