@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
@endsection
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Create targetjob
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                <form id="form_advanced_validation" method="POST" action="{{route('admin.targets.edit.post',$targetjob->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$targetjob->title}}" class="form-control" name="title" maxlenght="200" required>
                            <label class="form-label">* Title</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="category_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($categories as $category)
                                <option {{$category->id==$targetjob->category_id?'selected':''}} value="{{$category->id}}">{{$category->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="industry_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($industries as $industry)
                                <option {{$industry->id==$targetjob->industry_id?'selected':''}} value="{{$industry->id}}">{{$industry->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select id="country" name="country_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($countries as $country)
                                <option {{$country->id==$targetjob->country_id?'selected':''}} value="{{$country->id}}">{{$country->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float" id="cities_holder">
                        <div class="form-line">
                            <select name="city_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($cities as $city)
                                <option {{$city->id==$targetjob->city_id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <select name="jobtype_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($jobtypes as $jobtype)
                                <option {{$jobtype->id==$targetjob->jobtype_id?'selected':''}} value="{{$jobtype->id}}">{{$jobtype->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{$targetjob->salary_from}}" class="form-control" name="salary_from" required>
                            <label class="form-label">* Salary From</label>
                        </div>
                        <div class="help-info">EGP</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{$targetjob->salary_to}}" class="form-control" name="salary_to" required>
                            <label class="form-label">* Salary To</label>
                        </div>
                        <div class="help-info">EGP</div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- Validation Plugin Js -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>

<script type="text/javascript">
    $('#country').change(function() {
        var country = $(this).val();
        var url = "{{route('admin.countries.cities.get',':country')}}".replace(":country", country);
        $.ajax({
            url: url,
        }).done(function(response) {
            var cities = response.cities;
            var cities_select = '<div class="form-line"> <select name="city_id" class="form-control show-tick" data-live-search="true" required> <option disabled selected>*please select your city</option>';
            $.each(cities, function(index, city) {
                cities_select = cities_select + '<option value="' + city.id + '">' + city.name_en + '</option>';
            });
            cities_select = cities_select + '</select></div>';
            $('#cities_holder').html(cities_select);
        });
    });
</script>
@endsection 