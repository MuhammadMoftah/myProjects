@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<!-- Bootstrap Material Datetime Picker Css -->
<link href="{{asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
@endsection
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Create Job Seeker
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.users.create.post')}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('first_name')}}" class="form-control" name="first_name" maxlenght="200" required>
                            <label class="form-label">* First Name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('last_name')}}" class="form-control" name="last_name" maxlenght="200" required>
                            <label class="form-label">* Last Name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="email" value="{{old('email')}}" class="form-control" name="email" maxlenght="254" required>
                            <label class="form-label">* Email</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input value="{{old('phone')}}" class="form-control" name="phone" maxlenght="11" required>
                            <label class="form-label">* Phone</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input value="{{old('age')}}" class="form-control" name="age"  required id="Birth_Date" placeholder="" data-language='en' data-format="y-m-d">
                            <label class="form-label">* Birth Date</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* gender</b>
                            </p>
                            <select name="gender" class="form-control show-tick" data-live-search="true" required>
                                <option disabled selected>*please select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('title')}}" class="form-control" name="title" maxlenght="200" required>
                            <label class="form-label">* Title</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" required name="password" minlength="8" maxlength="254">
                            <label class="form-label">* Password</label>
                        </div>
                        <div class="help-info">Min. 8 , Max. 254 characters</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" required name="password_confirmation" minlength="8" maxlength="254">
                            <label class="form-label">* Password Confirmation</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* nationality</b>
                            </p>
                            <select name="nationality_id" class="form-control show-tick" data-live-search="true" required>
                                <option disabled selected>*please select your country</option>
                                @foreach($nationalities as $nationality)
                                <option value="{{$nationality->id}}">{{$nationality->name_en}}</option>
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
                    <div class="form-group form-float" style="width:90%">
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" hidden class="form-control" name="image">
                            <label class="form-label">Image</label>
                        </div>
                        <div class="help-info">jpg,png</div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" class="form-control" name="cv" required>
                            <label class="form-label">* CV</label>
                        </div>
                        <div class="help-info">.pdf</div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" hidden class="form-control" name="video_cv">
                            <label class="form-label">Video CV</label>
                        </div>
                        <div class="help-info">.mp4</div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="subscription" name="subscription">
                        <label for="subscription">Subscription</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="checkbox" name="verified">
                        <label for="checkbox">Verified</label>
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
 <!-- datepicker Js -->
 <script src="{{asset('assets/plugins/momentjs/moment.js')}}"></script>
 <script src="{{asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
 <script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>
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
    $(function(){
        // clander
            var today = moment().subtract(16, 'years')
            $("#Birth_Date").bootstrapMaterialDatePicker({
                format : 'YYYY-MM-DD',
                time: false,
                endDate: "today",
                maxDate: today
            })
    })
</script>
@endsection