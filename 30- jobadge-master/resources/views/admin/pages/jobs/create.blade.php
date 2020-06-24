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
                    Create job
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                <form id="form_advanced_validation" method="POST" action="{{route('admin.jobs.create.post')}}">
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
                            <p>
                                <b>* Education level</b>
                            </p>
                            <select name="education_level" class="form-control show-tick" data-live-search="true" required>
                                <option disabled selected>* Education level</option>
                                <option value="highschool">high school</option>
                                <option value="diploma">Diploma</option>
                                <option value="bachelor">bachelor</option>
                                <option value="master">Master</option>
                                <option value="doctorate">Doctorate</option>
                                <option value="MBA">MBA</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">* Description</label>
                        <div class="form-line">
                            <textarea id="description" name="description" value="{{old('description')}}" cols="30" rows="5" class="form-control no-resize" required>{{old('description')}}</textarea>
                            <label class="form-label">* Description</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea id="job_requirement" name="job_requirement" value="{{old('job_requirement')}}" cols="30" rows="5" class="form-control no-resize" required>{{old('job_requirement')}}</textarea>
                            <label class="form-label">* job requirement</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label for="job_location"> Job Location (optional)</label>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="country1"> Country</label>
                                <select id="country1" name="country_id" class="form-control p-0 {{ $errors->has('country_id') && old('type')=='user' ? 'is-invalid' : ''}}">
                                    <option disabled selected>Select your Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}" @if(old('country_id') == $country->id )selected @endif>{{$country->name_en}}</option>
                                    @endforeach
                                </select>
                                @if(old('type')=='user') {!! $errors->first('country_id', '<div class="invalid-feedback">:message</div>') !!} @endif
                            </div>
                            <div class="col-md-6" id="cities_holder1">
                                <label for="city1"> City</label>
                                <select id="cit1" name="city_id" class="form-control p-0 {{ $errors->has('city_id') && old('type')=='user' ? 'is-invalid' : ''}}">
                                    <option disabled selected>Select your City</option>
                                </select>
                                @if(old('type')=='user') {!! $errors->first('city_id', '<div class="invalid-feedback">:message</div>') !!} @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">* KPI</label>
                        <div class="form-line">
                            <textarea id="kpi" name="KPI" value="{{old('KPI')}}" cols="30" rows="5" class="form-control no-resize">{{old('KPI')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">* Skills</label>
                        <div class="form-line">
                            <textarea id="skills" name="skills" value="{{old('skills')}}" cols="30" rows="5" class="form-control no-resize" required>{{old('skills')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">* benefits</label>
                        <div class="form-line">
                            <textarea id="benefits" name="benefits" value="{{old('benefits')}}" cols="30" rows="5" class="form-control no-resize" required>{{old('benefits')}}</textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* category</b>
                            </p>
                            <select name="category_id" class="form-control show-tick" data-live-search="true" required>
                                <option disabled selected>*please select your category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* nationality</b>
                            </p>
                            <select name="nationality_id" class="form-control show-tick" data-live-search="true" required>
                                <option disabled selected>*please select nationality</option>
                                @foreach($nationalities as $nationality)
                                <option value="{{$nationality->id}}">{{$nationality->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* job type</b>
                            </p>
                            <select name="jobtype_id" class="form-control show-tick" data-live-search="true" required>
                                <option disabled selected>*please select job type</option>
                                @foreach($jobtypes as $jobtype)
                                <option value="{{$jobtype->id}}">{{$jobtype->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* job level</b>
                            </p>
                            <select name="joblevel_id" class="form-control show-tick" data-live-search="true" required>
                                <option disabled selected>*please select job level</option>
                                @foreach($joblevels as $joblevel)
                                <option value="{{$joblevel->id}}">{{$joblevel->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* company</b>
                            </p>
                            <select name="company_id" class="form-control show-tick" data-live-search="true" required>
                                <option disabled selected>*please select Company</option>
                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* gender</b>
                            </p>
                            <select name="gender" class="form-control show-tick" data-live-search="true" required>
                                <option disabled selected>*please select Gender</option>
                                <option value="no preference">No Preference</option>
                                <option value="only males">only Males</option>
                                <option value="only females">only Females</option>
                                <option value="males preferred">males Preferred</option>
                                <option value="females preferred">females Preferred</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>travel frequency</b>
                            </p>
                            <select name="travel_frequency" class="form-control show-tick" data-live-search="true" required>
                                <option value="none">none</option>
                                <option value="minimal travel">minimal travel</option>
                                <option value="up to 25% travel">up to 25% travel</option>
                                <option value="up to 50% travel">up to 50% travel</option>
                                <option value="up to 75% travel">up to 75% travel</option>
                                <option value="up to 100% travel">up to 100% travel</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('experience_years')}}" class="form-control" name="experience_years" required>
                            <label class="form-label">* Experience Years</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{old('vacancies')}}" class="form-control" name="vacancies" maxlenght="2" required>
                            <label class="form-label">* Vacancies</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{old('salary_from')}}" class="form-control" name="salary_from" required>
                            <label class="form-label">* salary from</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{old('salary_to')}}" class="form-control" name="salary_to" required>
                            <label class="form-label">* salary to</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>Salary Period</b>
                            </p>
                            <select name="salary_period" class="form-control show-tick" data-live-search="true" required>
                                <option value="per hour">per hour</option>
                                <option value="per day">per day</option>
                                <option value="per week">per week</option>
                                <option value="per month">per month</option>
                                <option value="per year">per year</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="salary_hidden" name="salary_hidden">
                        <label for="salary_hidden">salary confidential</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="confidential" name="confidential">
                        <label for="confidential">Confidential (keep company data confidential like name-logo-profile)</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="apply_on_site" name="apply_on_site">
                        <label for="apply_on_site">Apply on Company Site</label>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{old('company_url')}}" class="form-control" name="company_url" maxlenght="200">
                            <label class="form-label">company url</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
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
<!-- Ckeditor -->
<script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(function() {
        CKEDITOR.replace('description');
        CKEDITOR.replace('job_requirement');
        CKEDITOR.replace('skills');
        CKEDITOR.replace('benefits');
        CKEDITOR.replace('kpi');


        //===========
        $('#country1').change(function() {
            var country = $(this).val();
        
            GetCities(country)
        
        });

    
        function GetCities(country){
            var city_id = " {{  old('city_id') }}"
            if(country )
            {
                var url = "{{route('user.countries.cities.get',':country')}}".replace(":country", country);
                $.ajax({
                    url: url,
                }).done(function(response) {
                    var cities = response.cities;
                    var cities_select = '<label for=""><span class="text-danger">*</span> City</label><select name="city_id" class="form-control" required> <option disabled selected><span class="text-danger">*</span>please select your city</option>';
                    $.each(cities, function(index, city) {
                        let attr = city_id == city.id ? "selected" : ""
                        cities_select = cities_select + '<option value="' + city.id + '"'+attr+'>' + city.name_en + '</option>';
                    });
                    cities_select = cities_select + '</select>';
                    $('#cities_holder1').html(cities_select);
                });
            }
            
        }
    

        GetCities($('#country1').val())
   
    });
</script>
@endsection