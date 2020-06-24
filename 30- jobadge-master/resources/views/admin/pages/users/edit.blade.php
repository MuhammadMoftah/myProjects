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
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.users.edit.post',$user->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$user->first_name}}" class="form-control" name="first_name" maxlenght="200" required>
                            <label class="form-label">* First Name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$user->last_name}}" class="form-control" name="last_name" maxlenght="200" required>
                            <label class="form-label">* Last Name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="email" value="{{$user->email}}" class="form-control" name="email" maxlenght="254" required>
                            <label class="form-label">* Email</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input value="{{$user->phone}}" class="form-control" name="phone" maxlenght="11" required>
                            <label class="form-label">* Phone</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$user->title}}" class="form-control" name="title" maxlenght="200" required>
                            <label class="form-label">* Title</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    {{-- <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="8" maxlength="254">
                            <label class="form-label">* Password</label>
                        </div>
                        <div class="help-info">Min. 8 , Max. 254 characters</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password_confirmation" minlength="8" maxlength="254">
                            <label class="form-label">* Password Confirmatfion</label>
                        </div>
                        <div class="help-info"></div>
                    </div> --}}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* nationality</b>
                            </p>
                            <select name="nationality_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($nationalities as $nationality)
                                <option {{$nationality->id==$user->nationality_id?'selected':''}} value="{{$nationality->id}}">{{$nationality->name_en}}</option>
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
                                @foreach($countries as $country)
                                <option {{$country->id==$user->country_id?'selected':''}} value="{{$country->id}}">{{$country->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- {{ dd($user->city_id)}} --}}
                    <div class="form-group form-float" id="cities_holder">
                        @if($user->city_id)
                        <div class="form-line">
                            <p>
                                <b>* city</b>
                            </p>
                            <select name="city_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($cities as $city)
                                <option {{$city->id==$user->city_id? 'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                           
                            <input type="text"  class="form-control" name="birth_date" value="{{$user->birth_date ? $user->birth_date : \Carbon\Carbon::parse("2004-4-07") }}" name="birth_date" required id="Birth_Date" placeholder="" data-language='en' data-format="y-m-d" />
                            <label class="form-label"> Birth date</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* gender</b>
                            </p>
                            <select name="gender" class="form-control show-tick" data-live-search="true" required>
                                <option {{$user->gender=='male'?'selected':''}} value="male">Male</option>
                                <option {{$user->gender=='female'?'selected':''}} value="female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" hidden class="form-control" name="image">
                            <label class="form-label">Image</label>
                        </div>
                        <div class="help-info">jpg,png</div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" class="form-control" name="cv">
                            <label class="form-label"> CV</label>
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
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$user->ref1_name}}" class="form-control" name="ref1_name" maxlenght="200">
                            <label class="form-label">* reference_1 name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$user->ref1_title}}" class="form-control" name="ref1_title" maxlenght="200">
                            <label class="form-label">* reference_1 title</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$user->ref1_phone}}" class="form-control" name="ref1_phone" maxlenght="200">
                            <label class="form-label">* reference_1 phone</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$user->ref2_name}}" class="form-control" name="ref2_name" maxlenght="200">
                            <label class="form-label">* reference_2 name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$user->ref2_title}}" class="form-control" name="ref2_title" maxlenght="200">
                            <label class="form-label">* reference_2 title</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$user->ref2_phone}}" class="form-control" name="ref2_phone" maxlenght="200">
                            <label class="form-label">* reference_2 phone</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$user->subscription==1?'checked':''}} id="subscription" name="subscription">
                        <label for="subscription">Subscription</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$user->verified==1?'checked':''}} id="checkbox" name="verified">
                        <label for="checkbox">Verified</label>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Edit</button>
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
<script src="{{asset('assets/js/pages/forms/basic-form-elements.js')}}"></script>
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
    $('#country').each(function() {
        var country = $(this).val();
        var city_id = "{{$user->city_id}}"
        var url = "{{route('admin.countries.cities.get',':country')}}".replace(":country", country);
        $.ajax({
            url: url,
        }).done(function(response) {
            var cities = response.cities;
            var cities_select = '<div class="form-line"> <select name="city_id" class="form-control show-tick" data-live-search="true" required> <option disabled selected>*please select your city</option>';
            $.each(cities, function(index, city) {
                cities_select = cities_select + `<option ${city_id == city.id ? 'selected' : '' } value="` + city.id + '">' + city.name_en + '</option>';
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