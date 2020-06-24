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
                <form id="form_advanced_validation" method="POST" action="{{route('admin.jobs.edit.post',$job->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$job->title}}" class="form-control" name="title" maxlenght="200" required>
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
                                <option {{$job->education_level=='highschool'?'selected':''}} value="highschool">high school</option>
                                <option {{$job->education_level=='diploma'?'selected':''}} value="diploma">Diploma</option>
                                <option {{$job->education_level=='bachelor'?'selected':''}} value="bachelor">Bachelor</option>
                                <option {{$job->education_level=='master'?'selected':''}} value="master">Master</option>
                                <option {{$job->education_level=='doctorate'?'selected':''}} value="doctorate">Doctorate</option>
                                <option {{$job->education_level=='MBA'?'selected':''}} value="MBA">MBA</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">* Description</label>
                        <div class="form-line">
                            <textarea id="description" name="description" value="{{$job->description}}" cols="30" rows="5" class="form-control no-resize" required>{{$job->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="job_location"> Job Location (optional)</label>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="country1"> Country</label>
                                <select id="country1" name="country_id" class="form-control p-0 {{ $errors->has('country_id') && old('type')=='user' ? 'is-invalid' : ''}}">
                                    <option disabled selected>Select your Country</option>
                                    @foreach($countries as $country)
                                    <option value="{{$country->id}}" @if( $job->country_id == $country->id )selected @endif>{{$country->name_en}}</option>
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
                        <label class="form-label">* job requirement</label>
                        <div class="form-line">
                            <textarea id="job_requirement" name="job_requirement" value="{{$job->job_requirement}}" cols="30" rows="5" class="form-control no-resize" required>{{$job->job_requirement}}</textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">* KPI</label>
                        <div class="form-line">
                            <textarea id="kpi" name="KPI" value="{{$job->KPI}}}" cols="30" rows="5" class="form-control no-resize">{{$job->KPI}}</textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">* Skills</label>
                        <div class="form-line">
                            <textarea id="skills" name="skills" value="{{$job->skills}}" cols="30" rows="5" class="form-control no-resize" required>{{$job->skills}}</textarea>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea id="benefits" name="benefits" value="{{$job->benefits}}" cols="30" rows="5" class="form-control no-resize" required>{{$job->benefits}}</textarea>
                            <label class="form-label">* benefits</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* category</b>
                            </p>
                            <select name="category_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($categories as $category)
                                <option {{$category->id==$job->category_id?'selected':''}} value="{{$category->id}}">{{$category->name_en}}</option>
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
                                @foreach($nationalities as $nationality)
                                <option {{$nationality->id==$job->nationality_id?'selected':''}} value="{{$nationality->id}}">{{$nationality->name_en}}</option>
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
                                @foreach($jobtypes as $jobtype)
                                <option {{$jobtype->id==$job->jobtype_id?'selected':''}} value="{{$jobtype->id}}">{{$jobtype->name_en}}</option>
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
                                @foreach($joblevels as $joblevel)
                                <option {{$joblevel->id==$job->joblevel_id?'selected':''}} value="{{$joblevel->id}}">{{$joblevel->name_en}}</option>
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
                                @foreach($companies as $company)
                                <option {{$company->id==$job->company_id?'selected':''}} value="{{$company->id}}">{{$company->name}}</option>
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
                                <option {{$job->gender=='no preference'?'selected':''}} value="no preference">No Preference</option>
                                <option {{$job->gender=='only males'?'selected':''}} value="only males">only Males</option>
                                <option {{$job->gender=='only females'?'selected':''}} value="only females">only Females</option>
                                <option {{$job->gender=='males preferred'?'selected':''}} value="males preferred">males Preferred</option>
                                <option {{$job->gender=='females preferred'?'selected':''}} value="females preferred">females Preferred</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>travel frequency</b>
                            </p>
                            <select name="travel_frequency" class="form-control show-tick" data-live-search="true" required>
                                <option {{$job->travel_frequency=='none'?'selected':''}} value="none">none</option>
                                <option {{$job->travel_frequency=='minimal travel'?'selected':''}} value="minimal travel">minimal travel</option>
                                <option {{$job->travel_frequency=='up to 25% travel'?'selected':''}} value="up to 25% travel">up to 25% travel</option>
                                <option {{$job->travel_frequency=='up to 50% travel'?'selected':''}} value="up to 50% travel">up to 50% travel</option>
                                <option {{$job->travel_frequency=='up to 75% travel'?'selected':''}} value="up to 75% travel">up to 75% travel</option>
                                <option {{$job->travel_frequency=='up to 100% travel'?'selected':''}} value="up to 100% travel">up to 100% travel</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$job->experience_years}}" class="form-control" name="experience_years" required>
                            <label class="form-label">* Experience Years</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{$job->vacancies}}" class="form-control" name="vacancies" maxlenght="2" required>
                            <label class="form-label">* Vacancies</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{$job->salary_from}}" class="form-control" name="salary_from" required>
                            <label class="form-label">* salary from</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{$job->salary_to}}" class="form-control" name="salary_to" required>
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
                                <option {{$job->salary_period=='per hour'?'selected':''}} value="per hour">per hour</option>
                                <option {{$job->salary_period=='per day'?'selected':''}} value="per day">per day</option>
                                <option {{$job->salary_period=='per week'?'selected':''}} value="per week">per week</option>
                                <option {{$job->salary_period=='per month'?'selected':''}} value="per month">per month</option>
                                <option {{$job->salary_period=='per year'?'selected':''}} value="per year">per year</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$job->salary_hidden==1?'checked':''}} id="salary_hidden" name="salary_hidden">
                        <label for="salary_hidden">salary hidden</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$job->confidential==1?'checked':''}} id="confidential" name="confidential">
                        <label for="confidential">Confidential (keep company data confidential like name-logo-profile)</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$job->apply_on_site==1?'checked':''}} id="apply_on_site" name="apply_on_site">
                        <label for="apply_on_site">Apply on Company Site</label>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$job->company_url}}" class="form-control" name="company_url" maxlenght="200">
                            <label class="form-label">company url</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" {{$job->close==1?'checked':''}} id="close" name="close">
                        <label for="close">Close this job</label>
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
<!-- Ckeditor -->
<script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript">
    $(function() {
        CKEDITOR.replace('description');
        CKEDITOR.replace('job_requirement');
        CKEDITOR.replace('skills');
        CKEDITOR.replace('benefits');
        CKEDITOR.replace('kpi');
    });
    
</script>
<script>
   
    $(function(){
        $('#country1').change(function() {
                var country = $(this).val();
            
                GetCities(country)
            
        });

            
        function GetCities(country){
            var city_id = " {{  old('city_id') ? old('city_id') : $job->city_id  }}"
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
    })
</script>
@endsection