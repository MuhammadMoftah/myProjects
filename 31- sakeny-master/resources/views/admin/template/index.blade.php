@extends('admin.layouts.app')

@section('title',trans("lang.$module_name")." - ".trans("lang.".end($breadcrumb)))

@section('content')

<!-- Page-Title -->
@section('breadcrumb')
@foreach ($breadcrumb as $bread)
@if ($loop->remaining == 1)
<li><a href="{{ url("$base_view/$route") }}">@lang("lang.$bread")</a></li>
@elseif($loop->last)
<li class="active">@lang("lang.$bread")</li>
@else
<li>@lang("lang.$bread")</li>
@endif
@endforeach
@stop
<!-- PAGE CONTENT WRAPPER -->

<div class="row">
    <div class="col-sm-12">
        <div class="card-box table-responsive">
            <h4 class="m-t-0 header-title pull-left"><b><i class="icon-list head-icon"></i>{!!Lang::get("lang.$bread")!!}</b></h4>
            <br>
            <hr>
            <h4 class="m-t-0 header-title pull-right">
                <a class="btn btn-default btn-style-custom" href="{{ url("$base_view/$route/create") }}">Create <i class="fa fa-plus"></i></a>
            </h4>

            <div class="clearfix"></div>
            <form action="" method="GET">
                <div class="m-separator m-separator--dashed d-xl-none">

                    <div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }} col-md-6">
                        {!! Form::label('country_id', __('lang.country_id')) !!}
                        <select name="country_id" class="form-control select2" placeholder="{{__('lang.select country')}}">
                            <option disabled selected>Select country</option>
                            @foreach($countries as $country)
                            <option {{isset($row)? $row->country_id==$country->id?'selected':'' :''}} value="{{$country->id}}">{{$country->name_en}}</option>
                            @endforeach
                        </select>
                        <small class="text-danger">{{ $errors->first('country_id') }}</small>
                    </div>

                    <div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }} col-md-6">
                        {!! Form::label('city_id', __('lang.city_id')) !!}
                        <div id="cityList">
                            {!! Form::select('city_id', [], null, ['class' => 'form-control', 'placeholder' => __('lang.select city')]) !!}
                        </div>
                        <small class="text-danger">{{ $errors->first('city_id') }}</small>
                    </div>

                    <div class="form-group {{ $errors->has('offer_type_id') ? ' has-error' : '' }} col-md-6">
                        {!! Form::label('offer_type_id', __('lang.Offer Types')) !!}
                        {!! Form::select('offer_type_id', $offer_types, null, ['class' => 'form-control select2', 'placeholder' => __('Select Offer Type')]) !!}
                        <small class="text-danger">{{ $errors->first('offer_type_id') }}</small>
                    </div>

                    <div class="form-group {{ $errors->has('property_type_id') ? ' has-error' : '' }} col-md-6">
                        {!! Form::label('property_type_id', __('lang.property_type_id')) !!}
                        {!! Form::select('property_type_id', $property_types, null, ['class' => 'form-control select2', 'placeholder' => __('Select Property Type')]) !!}
                        <small class="text-danger">{{ $errors->first('property_type_id') }}</small>
                    </div>

                    <h4 class="col-lg-12">
                        <button class="col-lg-12 btn btn-success btn-style-custom" href="{{ url("$base_view/$route/create") }}">Filter </button>
                    </h4>

                </div>
            </form>
            <table class="table datatable table-bordered">
                <thead>
                    <tr>
                        @foreach ($columns as $column)
                        <th>{{ trans("lang.$column") }}</th>
                        @endforeach
                        <th>@lang('lang.country')</th>
                        <th>@lang('lang.city')</th>
                        <th>@lang('lang.Offer Type')</th>
                        <th>@lang('lang.Property Type')</th>
                        <th>@lang('lang.Actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @include("$base_view.$path.loop")
                </tbody>
            </table>

        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function() {

        $country_id = $('[name="country_id"]').val();
        $.get('{{ url(ADMIN_PATH."/ads/api/cities") }}', {
            country_id: $country_id,
            selected: @if(isset($row)) {
                {
                    $row - > city_id
                }
            }
            @else 0 @endif
        }, function(data) {
            $('#cityList').html(data);
        });

        $(document).on('change', '[name="country_id"]', function() {
            $country_id = $('[name="country_id"]').val();
            $.get('{{ url(ADMIN_PATH."/ads/api/cities") }}', {
                country_id: $country_id,
                selected: @if(isset($row)) {
                    {
                        $row - > city_id
                    }
                }
                @else 0 @endif
            }, function(data) {
                $('#cityList').html(data);
            });
        })


    });
</script>
@endpush

@stop