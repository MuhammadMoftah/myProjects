<div class="panel-body">

    <div class="col-lg-12">

        <!-- for any notes on the form -->

        {{-- <p class="text-muted font-14 m-b-20">
            Parsley is a javascript form validation library. It helps you provide your users with feedback on their form submission before sending it to your server.
        </p> --}}

        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }} col-md-6">
            {!! Form::label('title', __('lang.title')) !!}
            {!! Form::text('title', null, ['class' => 'form-control','disabled', 'placeholder' => __('lang.title')]) !!}
            <small class="text-danger">{{ $errors->first('title') }}</small>
        </div>
        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }} col-md-6">
            {!! Form::label('status', __('lang.status')) !!}
            {!! Form::select('status', $status_list, null, ['class' => 'form-control','disabled']) !!}
            <small class="text-danger">{{ $errors->first('status') }}</small>
        </div>

        <div class="form-group {{ $errors->has('property_type_id') ? ' has-error' : '' }} col-md-6">
            {!! Form::label('property_type_id', __('lang.property_type_id')) !!}
            {!! Form::select('property_type_id', $proprty_type_list, null, ['class' => 'form-control','disabled']) !!}
            <small class="text-danger">{{ $errors->first('property_type_id') }}</small>
        </div>

        <div class="form-group {{ $errors->has('amenitie_id[]') ? ' has-error' : '' }} col-md-6">
            {!! Form::label('amenitie_id[]', __('Amenitie')) !!}
            {{-- {{ dd($row->amenitie_id)}} --}}

            {{-- {{ dd(explode(',', str_replace('[', '', str_replace(']', '', str_replace('"', '', $row->amenitie_id)))) )}} --}}
            {!! Form::select('amenitie_id[]', $amenities ,explode(',', str_replace('[', '', str_replace(']', '', str_replace('"', '', $row->amenitie_id)))) , ['class' => 'form-control select2','multiple','disabled']) !!}
            <small class="text-danger">{{ $errors->first('amenitie_id[]') }}</small>
        </div>

        <div class="form-group {{ $errors->has('level_of_finished_id') ? ' has-error' : '' }} col-md-6">
            {!! Form::label('level_of_finished_id', __('Level of finishing')) !!}
            {!! Form::select('level_of_finished_id', $level_of_finished, null, ['class' => 'form-control','disabled']) !!}
            <small class="text-danger">{{ $errors->first('level_of_finished_id') }}</small>
        </div>


        <div class="form-group {{ $errors->has('offer_type_id') ? ' has-error' : '' }} col-md-6">
            {!! Form::label('offer_type_id', __('lang.Offer Type')) !!}
            <select name="offer_type_id" class="form-control select2" disabled placeholder="{{__('lang.Offer Type')}}">
                <option disabled selected>Select offer type</option>
                @foreach($offer_type_list as $offer)
                <option {{isset($row)? $row->offer_type_id==$offer->id?'selected':'' :''}} value="{{$offer->id}}">{{$offer->title_en}}</option>
                @endforeach
            </select>
            <small class="text-danger">{{ $errors->first('offer_type_id') }}</small>
        </div>

        <div class="form-group {{ $errors->has('country_id') ? ' has-error' : '' }} col-md-6">
            {!! Form::label('country_id', __('lang.country_id')) !!}
            <select name="country_id" class="form-control select2" placeholder="{{__('lang.select country')}}" disabled>
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
                {!! Form::select('city_id', [], null, ['class' => 'form-control','disabled', 'placeholder' => __('lang.select city')]) !!}
            </div>
            <small class="text-danger">{{ $errors->first('city_id') }}</small>
        </div>

        <div class="form-group {{ $errors->has('district_id') ? ' has-error' : '' }} col-md-12">
            {!! Form::label('district_id', "district") !!}
            <div id="districtList">
                {!! Form::select('district_id', $districts, null, ['class' => 'form-control','disabled'=>'disabled', 'placeholder' => __('lang.select district')]) !!}
            </div>
            <small class="text-danger">{{ $errors->first('district_id') }}</small>
        </div>

        <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }} col-md-8">
            {!! Form::label('price', __('lang.price')) !!}
            {!! Form::number('price', null, ['class' => 'form-control','disabled', 'placeholder' => __('lang.price'), 'min' => 1]) !!}
            <small class="text-danger">{{ $errors->first('price') }}</small>
        </div>

        <div class="form-group {{ $errors->has('price_negotiable') ? ' has-error' : '' }} col-md-3">
            {!! Form::label('final', __('lang.Final')) !!}
            {!! Form::radio('price_negotiable', 0,null, ['class' => '', 'id' => 'final','disabled']) !!}
            <small class="text-danger">{{ $errors->first('price_negotiable') }}</small>
        </div>

        <div class="form-group {{ $errors->has('price_negotiable') ? ' has-error' : '' }} col-md-3">
            {!! Form::label('negotiable', __('lang.negotiable')) !!}
            {!! Form::radio('price_negotiable', 1,null, ['class' => '', 'id' => 'negotiable','disabled']) !!}
            <small class="text-danger">{{ $errors->first('price_negotiable') }}</small>
        </div>

        <div class="form-group {{ $errors->has('size') ? ' has-error' : '' }} col-md-6">
            {!! Form::label('size', __('lang.Size in m2')) !!}
            {!! Form::number('size', null, ['class' => 'form-control','disabled', 'placeholder' => __('lang.size'),'min'=>1]) !!}
            <small class="text-danger">{{ $errors->first('size') }}</small>
        </div>

        <div class="form-group {{ $errors->has('bedrooms_num') ? ' has-error' : '' }} col-md-6">
            {!! Form::label('bedrooms_num', __('lang.bedrooms_num')) !!}
            {!! Form::number('bedrooms_num', null, ['class' => 'form-control','disabled', 'placeholder' => __('lang.bedrooms_num'),'min'=>1]) !!}
            <small class="text-danger">{{ $errors->first('bedrooms_num') }}</small>
        </div>

        <div class="form-group {{ $errors->has('unit_view_id') ? ' has-error' : '' }} col-md-6">
            {!! Form::label('unit_view_id', __('lang.unit_view_id')) !!}
            {!! Form::select('unit_view_id', $unit_view_list, null, ['class' => 'form-control','disabled']) !!}
            <small class="text-danger">{{ $errors->first('unit_view_id') }}</small>
        </div>

        <div class="form-group {{ $errors->has('building_year') ? ' has-error' : '' }} col-md-6">
            {!! Form::label('building_year', __('lang.building_year')) !!}
            {!! Form::number('building_year', null, ['class' => 'form-control','disabled', 'placeholder' => __('lang.building_year'),'min'=>1]) !!}
            <small class="text-danger">{{ $errors->first('building_year') }}</small>
        </div>

        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }} col-md-12">
            {!! Form::label('description', __('lang.description')) !!}
            <textarea name="description" class="form-control summernote" disabled placeholder="description" rows="7" value="{!! $row->description !!}">{!! $row->description !!}</textarea>
            <small class="text-danger">{{ $errors->first('description') }}</small>
        </div>
        <div class="clearfix"></div>
        @if (!isset($row))
        <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }} col-md-12">
            {!! Form::label('user_type', 'User type') !!}
            {!! Form::select('user_type',[1=>'User',2=>'Company'], null, ['id' => 'user_type', 'class' => 'form-control','disabled']) !!}
            <small class="text-danger">{{ $errors->first('user_type') }}</small>
        </div>
        @endif
        <div class="clearfix"></div>
        <div class="form-group {{ $errors->has('owner_id') ? ' has-error' : '' }} col-md-12">
            {!! Form::label('owner_id', __('lang.owner_id')) !!}
            @if (isset($row))
            {!! Form::text('', $row->ad->owner->name,['class'=>'form-control','disabled'] ) !!}
            @else
            <div id="userList">
                {!! Form::select('owner_id', [], null, ['class' => 'form-control','disabled']) !!}
            </div>
            @endif
            <small class="text-danger">{{ $errors->first('owner_id') }}</small>
        </div>

        <div class="form-group col-md-12">
            {!! Form::label('addressMap', __('lang.location')) !!}
            <div class="m-input-icon m-input-icon--right">
                <span class="m-input-icon__icon m-input-icon__icon--right">
                    <span>
                        <i class="la la-map-marker"></i>
                    </span>
                </span>
            </div>
            <div id="picker" style="width: 100%; height: 400px;"></div>
            {!! Form::hidden('latitude', isset($row->latitude) && $row->latitude != "" ? $row->latitude : 30.0986622) !!}
            {!! Form::hidden('longitude', isset($row->longitude) && $row->longitude != "" ? $row->longitude : 31.31760029999998) !!}
        </div>
        @isset ($row)
        <div class="col-md-12">
            <label class="control-label col-md-2">@lang('lang.images')</label>
            <hr>
            <div class="row col-md-12">
                {{-- @if (request('name_en')) --}}
                @foreach($row->ad->images as $image)
                <div class="col-md-2 single-image">
                    <img src="{{ env('AWS_URL') .$image->image }}" style=" height: 150px; width: 150px; box-shadow: 3px 1px 15px rgba(0, 0, 0, 0.3) !important;">
                </div>
                @endforeach
                @foreach($row->images as $image)
                <div class="col-md-2 single-image">
                    <img src="{{ env('AWS_URL') .$image->image }}" style=" height: 150px; width: 150px; box-shadow: 3px 1px 15px rgba(0, 0, 0, 0.3) !important;">
                </div>
                @endforeach
                {{-- @endif --}}

            </div>
        </div>
        @endisset

    </div>
</div>

@push('script')
<!-- include summernote css/js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAiJwjqodwVVY04ESTFA9REOjqOt1pXOQI'></script>
<script src="{{url('backend')}}/assets/js/locationpicker.jquery.js"></script>
<script>
    $(document).ready(function() {
        $user_type = $('[name="user_type"]').val();
        $.get('{{ url(ADMIN_PATH."/ads/api/users") }}', {
            user_type: $user_type
        }, function(data) {
            $('#userList').html(data);
        });

        $('[name="user_type"]').on('change', function() {
            $user_type = $('[name="user_type"]').val();
            $.get('{{ url(ADMIN_PATH."/ads/api/users") }}', {
                user_type: $user_type
            }, function(data) {
                $('#userList').html(data);
            });
        })

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
            $('[name="city_id"]').attr("disabled", "true")
        });

        $(document).on('change', '[name="city_id"]', function() {
            $city_id = $('[name="city_id"]').val();
            $.get('{{ url(ADMIN_PATH."/ads/api/districts") }}', {
                city_id: $city_id,
                selected: "@if(isset($row)) {{ $row->district_id }} @else 0 @endif"
            }, function(data) {
                $('#districtList').html(data);
            });
        })


    });

    $('#picker').locationpicker({
        location: {
            latitude: {{isset($row->latitude) && $row->latitude != "" ? $row->latitude : 30.0986622}},
            longitude: {{isset($row->longitude) && $row->longitude != "" ? $row->longitude : 31.31760029999998}},
        },
        radius: 20,
        zoom: 17,
        inputBinding: {
            locationNameInput: $('#addressMap')
        },
        enableAutocomplete: true,
        onchanged: function(currentLocation, radius, isMarkerDropped) {
            $("[name='latitude']").val(currentLocation.latitude ? currentLocation.latitude : 30.0986622);
            $("[name='longitude']").val(currentLocation.longitude ? currentLocation.longitude : 31.31760029999998);
        }
    });
</script>
@endpush