<div class="container">
    <form action="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.properties_for_rent') }}" class="bg-dark p-4 ">
        <div class="row form-group ">
            <div class="col-xl-2 col-lg-2 col-md-2 form-group">
                <select class="form-control" name="city_id" id="city">
                    <option value="">{{trans('lang.select city')}}</option>
                    @foreach($cities as $city)
                    <option value="{{$city->id}}">@if(app()->getLocale()=='en') {{$city->name_en}} @else {{$city->name_ar}} @endif</option>
                    @endforeach
                </select>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-2 form-group">
                <select class="form-control" name="district_id" id="districts_holder">
                    <option value=""> {{trans('lang.select district')}} </option>
                </select>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 form-group">
                <select class="form-control" name="min_price">
                    <option value=""> {{trans('lang.min price')}} </option>
                    @for($i=100000;$i<=40000000;$i+=100000) <option {{request('min_price')==$i?'selected':''}} value="{{$i}}">{{number_format($i)}} @if(app()->getLocale()=='en') {{$country->currency_en}} @else {{$country->currency_ar}} @endif </option>
                        @endfor
                </select>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 form-group">
                <select class="form-control" name="max_price">
                    <option value=""> {{trans('lang.max price')}} </option>
                    @for($i=100000;$i<=40000000;$i+=100000) <option {{request('max_price')==$i?'selected':''}} value="{{$i}}">{{number_format($i)}} @if(app()->getLocale()=='en') {{$country->currency_en}} @else {{$country->currency_ar}} @endif </option>
                        @endfor
                </select>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 form-group">
                <select class="form-control" name="min_bedrooms_num">
                    <option value=""> {{trans('lang.min bed')}} </option>
                    <option value="1"> 1 {{trans('lang.rooms')}} </option>
                    <option value="2"> 2 {{trans('lang.rooms')}} </option>
                    <option value="3"> 3 {{trans('lang.rooms')}} </option>
                    <option value="4"> 4 {{trans('lang.rooms')}} </option>
                    <option value="5"> 5 {{trans('lang.rooms')}} </option>
                    <option value="6"> 6 {{trans('lang.rooms')}} </option>
                    <option value="7"> 7 {{trans('lang.rooms')}} </option>
                </select>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 form-group">
                <select class="form-control" name="max_bedrooms_num">
                    <option value=""> {{trans('lang.max bed')}} </option>
                    <option value="1"> 1 {{trans('lang.rooms')}} </option>
                    <option value="2"> 2 {{trans('lang.rooms')}} </option>
                    <option value="3"> 3 {{trans('lang.rooms')}} </option>
                    <option value="4"> 4 {{trans('lang.rooms')}} </option>
                    <option value="5"> 5 {{trans('lang.rooms')}} </option>
                    <option value="6"> 6 {{trans('lang.rooms')}} </option>
                    <option value="7"> 7 {{trans('lang.rooms')}} </option>
                </select>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 form-group">
                <select class="form-control" name="min_size">
                    <option value=""> {{trans('lang.min area')}} </option>
                    @for($i=50;$i<=5000;$i+=200) <option {{request('min_size')==$i?'selected':''}} value="{{$i}}">{{number_format($i)}} {{trans('lang.m2')}}</option>
                        @endfor
                </select>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-3 form-group">
                <select class="form-control" name="max_size">
                    <option value=""> {{trans('lang.max area')}} </option>
                    @for($i=50;$i<=5000;$i+=200) <option {{request('max_size')==$i?'selected':''}} value="{{$i}}">{{number_format($i)}} {{trans('lang.m2')}}</option>
                        @endfor
                </select>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 form-group">
                <input name="search" value="{{request('search')}}" type="text" placeholder="{{trans('lang.keywords')}}" class="form-control">
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4">
                <input type="submit" value="{{trans('lang.search')}}" class="btn btn-danger w-100">
            </div>

        </div>
    </form>
</div>