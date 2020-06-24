@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
@endsection
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Create Work Experience
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                <form id="form_advanced_validation" method="POST" action="{{route('admin.experiences.create.post',$user->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('title')}}" class="form-control" name="title" maxlenght="200" required>
                            <label class="form-label">* Title</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('company_name')}}" class="form-control" name="company_name" maxlenght="200" required>
                            <label class="form-label">* Company name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('reporting_to')}}" class="form-control" name="reporting_to" maxlenght="254">
                            <label class="form-label">Reporting to</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* industry</b>
                            </p>
                            <select name="industry_id" class="form-control show-tick" data-live-search="true" required>
                                <option disabled selected>*please select the industry</option>
                                @foreach($industries as $industry)
                                <option value="{{$industry->id}}">{{$industry->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* country</b>
                            </p>
                            <select id="country" name="country_id" class="form-control show-tick" data-live-search="true" required>
                                <option disabled selected>*please select your country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float" id="cities_holder"></div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="description" value="{{old('description')}}" cols="30" rows="5" class="form-control no-resize" required>{{old('description')}}</textarea>
                            <label class="form-label">* Description</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="achievements" value="{{old('achievements')}}" cols="30" rows="5" class="form-control no-resize">{{old('achievements')}}</textarea>
                            <label class="form-label">* achievements</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <p>
                                    <b>* from</b>
                                </p>
                                <input value="{{old('from_date')}}" type="text" name="from_date" class="datepicker form-control" placeholder="Please choose start date...">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="form-line">
                                <p>
                                    <b>to</b>
                                </p>
                                <input value="{{old('to_date')}}" type="text" name="to_date" class="datepicker form-control" placeholder="Please choose end date...">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input {{old('till_present')?'checked':''}} type="checkbox" id="till_present" name="till_present">
                        <label for="till_present">till present</label>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- Autosize Plugin Js -->
<script src="{{asset('assets/plugins/autosize/autosize.js')}}"></script>

<!-- Moment Plugin Js -->
<script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script>

<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>
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