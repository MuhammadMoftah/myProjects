@extends('master')
@section('body')
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title"><span>POST A JOB</span></h2>
        </div>
    </div>
    <section class="login p-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    @include('layouts.message')
                    <form action="{{route('company.job.post')}}" method="POST" class="form-row">
                        {{ csrf_field() }}
                        <div class="form-group col-md-6">
                            <label for="jobTitle"><span class="text-danger">*</span> Job Title</label>
                            <input value="{{old('title')}}" type="text" name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" id="jobTitle" aria-describedby="jobTitle" placeholder="Job Title">
                            {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="educationlevel"><span class="text-danger">*</span>  Education level</label>
                            <select id="educationlevel" class="form-control p-0 {{ $errors->has('education_level') ? 'is-invalid' : ''}}" name="education_level">
                                @if(!old('education_level'))
                                <option disabled selected>Select your education level</option>
                                @endif
                                <option {{old('education_level')=='highschool'?'selected':''}} value="highschool">high school</option>
                                <option {{old('education_level')=='diploma'?'selected':''}} value="diploma">Diploma</option>
                                <option {{old('education_level')=='bachelor'?'selected':''}} value="bachelor">Bachelor</option>
                                <option {{old('education_level')=='master'?'selected':''}} value="master">Master</option>
                                <option {{old('education_level')=='doctorate'?'selected':''}} value="doctorate">Doctorate</option>
                                <option {{old('education_level')=='MBA'?'selected':''}} value="MBA">MBA</option>
                            </select>
                            {!! $errors->first('education_level', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="category"><span class="text-danger">*</span> Categories</label>
                            <select id="category" class="form-control p-0 {{ $errors->has('category_id') ? 'is-invalid' : ''}}" name="category_id">
                                @if(!old('category_id'))
                                <option disabled selected>Select your category</option>
                                @endif
                                @foreach($categories as $category)
                                <option {{old('category_id')==$category->id?'selected':''}} value="{{$category->id}}">{{$category->name_en}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('category_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nationality"><span class="text-danger">*</span> Nationality</label>
                            <select id="nationality" class="form-control p-0 {{ $errors->has('nationality_id') ? 'is-invalid' : ''}}" name="nationality_id">
                                @if(!old('nationality_id'))
                                <option disabled selected>Select your nationality</option>
                                @endif
                                @foreach($nationalities as $nationality)
                                <option {{old('nationality_id')==$nationality->id?'selected':''}} value="{{$nationality->id}}">{{$nationality->name_en}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('nationality_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="jobtype"><span class="text-danger">*</span> Job Type</label>
                            <select id="jobtype" class="form-control p-0 {{ $errors->has('jobtype_id') ? 'is-invalid' : ''}}" name="jobtype_id">
                                @if(!old('jobtype_id'))
                                <option disabled selected>Select your job type</option>
                                @endif
                                @foreach($jobtypes as $jobtype)
                                <option {{old('jobtype_id')==$jobtype->id?'selected':''}} value="{{$jobtype->id}}">{{$jobtype->name_en}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('jobtype_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="joblevel"><span class="text-danger">*</span> Job Level</label>
                            <select id="joblevel" class="form-control p-0 {{ $errors->has('joblevel_id') ? 'is-invalid' : ''}}" name="joblevel_id">
                                @if(!old('joblevel_id'))
                                <option disabled selected>Select your job type</option>
                                @endif
                                @foreach($joblevels as $joblevel)
                                <option {{old('joblevel_id')==$joblevel->id?'selected':''}} value="{{$joblevel->id}}">{{$joblevel->name_en}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('joblevel_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="experience_years"><span class="text-danger">*</span> Job Experience Years</label>
                            <input value="{{old('experience_years')}}" type="text" name="experience_years" class="form-control {{ $errors->has('experience_years') ? 'is-invalid' : ''}}" id="experience_years" aria-describedby="experience_years" placeholder="experience years">
                            {!! $errors->first('experience_years', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="vacancies"><span class="text-danger">*</span> Job Vacancies</label>
                            <input value="{{old('vacancies')}}" type="number" name="vacancies" class="form-control {{ $errors->has('vacancies') ? 'is-invalid' : ''}}" id="vacancies" aria-describedby="vacancies" placeholder="vacancies">
                            {!! $errors->first('vacancies', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gender"><span class="text-danger">*</span> Gender</label>
                            <select id="gender" class="form-control p-0 {{ $errors->has('gender') ? 'is-invalid' : ''}}" name="gender">
                                @if(!old('gender'))
                                <option disabled selected>select gender</option>
                                @endif
                                <option {{old('gender')=='no preference'?'selected':''}} value="no preference">No Preference</option>
                                <option {{old('gender')=='only males'?'selected':''}} value="only males">only Males</option>
                                <option {{old('gender')=='only females'?'selected':''}} value="only females">only Females</option>
                                <option {{old('gender')=='males preferred'?'selected':''}} value="males preferred">males Preferred</option>
                                <option {{old('gender')=='females preferred'?'selected':''}} value="females preferred">females Preferred</option>
                            </select>
                            {!! $errors->first('gender', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-6">
                            <label for="travel_frequency">Travel frequency</label>
                            <select id="travel_frequency" class="form-control p-0 {{ $errors->has('travel_frequency') ? 'is-invalid' : ''}}" name="travel_frequency">
                                <option {{old('travel_frequency')=='none'?'selected':''}} value="none">none</option>
                                <option {{old('travel_frequency')=='minimal travel'?'selected':''}} value="minimal travel">minimal travel</option>
                                <option {{old('travel_frequency')=='up to 25% travel'?'selected':''}} value="up to 25% travel">up to 25% travel</option>
                                <option {{old('travel_frequency')=='up to 50% travel'?'selected':''}} value="up to 50% travel">up to 50% travel</option>
                                <option {{old('travel_frequency')=='up to 75% travel'?'selected':''}} value="up to 75% travel">up to 75% travel</option>
                                <option {{old('travel_frequency')=='up to 100% travel'?'selected':''}} value="up to 100% travel">up to 100% travel</option>
                            </select>
                            {!! $errors->first('travel_frequency', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-4">
                            <label for="salary_from"><span class="text-danger">*</span>  Salary from</label>
                            <input value="{{old('salary_from')}}" type="number" name="salary_from" class="form-control {{ $errors->has('salary_from') ? 'is-invalid' : ''}}" id="salary_from" aria-describedby="salary_to" placeholder="salary from">
                            {!! $errors->first('salary_from', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-4">
                            <label for="salary_to"><span class="text-danger">*</span> Salary to</label>
                            <input value="{{old('salary_to')}}" type="number" name="salary_to" class="form-control {{ $errors->has('salary_to') ? 'is-invalid' : ''}}" id="salary_to" aria-describedby="salary_to" placeholder="salary to">
                            {!! $errors->first('salary_to', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-4">
                            <label for="salary_period"><span class="text-danger">*</span> Salary Period</label>
                            <select id="salary_period" class="form-control p-0 {{ $errors->has('salary_period') ? 'is-invalid' : ''}}" name="salary_period">
                                <option {{old('salary_period')=='per hour'?'selected':''}} value="per hour">per hour</option>
                                <option {{old('salary_period')=='per day'?'selected':''}} value="per day">per day</option>
                                <option {{old('salary_period')=='per week'?'selected':''}} value="per week">per week</option>
                                <option {{old('salary_period')=='per month'?'selected':''}} value="per month">per month</option>
                                <option {{old('salary_period')=='per year'?'selected':''}} value="per year">per year</option>
                            </select>
                            {!! $errors->first('salary_period', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                            <input type="checkbox" name="salary_hidden" class="custom-control-input {{ $errors->has('salary_hidden') ? 'is-invalid' : ''}}" id="salary_hidden">
                            <label class="custom-control-label" for="salary_hidden">salary hidden</label>
                        </div>
                        <div class="form-group col-md-12">
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
                        <div class="form-group col-md-12">
                            <label for="job_location">Description job location (optional)</label>
                            <textarea id="job_location" rows="4" value="{{old('job_location')}}" name="job_location" class="form-control {{ $errors->has('job_location') ? 'is-invalid' : ''}}"  placeholder="Job location ">{{old('job_location')}}</textarea>
                            {!! $errors->first('job_location', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            <label for="description"><span class="text-danger">*</span> Job Description</label>
                            <textarea rows="10" value="{{old('description')}}" name="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : ''}}" id="description" placeholder="Job description">{{old('description')}}</textarea>
                            {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-12">
                            <label for="job_requirement"><span class="text-danger">*</span> Job Requirement</label>
                            <textarea rows="10" value="{{old('job_requirement')}}" name="job_requirement" class="form-control {{ $errors->has('job_requirement') ? 'is-invalid' : ''}}" id="job_requirement" placeholder="Job Requirement">{{old('job_requirement')}}</textarea>
                            {!! $errors->first('job_requirement', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-12">
                            <label for="skills"><span class="text-danger">*</span> Job Skills</label>
                            <textarea id="skills" rows="10" value="{{old('skills')}}" name="skills" class="form-control {{ $errors->has('skills') ? 'is-invalid' : ''}}" id="skills" placeholder="Job Skills">{{old('skills')}}</textarea>
                            {!! $errors->first('skills', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-12">
                            <label for="benefits"><span class="text-danger">*</span> Job Benefits</label>
                            <textarea id="benefits" rows="10" value="{{old('benefits')}}" name="benefits" class="form-control {{ $errors->has('benefits') ? 'is-invalid' : ''}}" id="benefits" placeholder="Job benefits">{{old('benefits')}}</textarea>
                            {!! $errors->first('benefits', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group col-md-12">
                            <label for="KPI">Job KPI (optional)</label>
                            <textarea id="kpi" rows="10" value="{{old('KPI')}}" name="KPI" class="form-control {{ $errors->has('KPI') ? 'is-invalid' : ''}}" id="KPI" placeholder="Job KPI">{{old('KPI')}}</textarea>
                            {!! $errors->first('KPI', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                            <input type="checkbox" name="confidential" class="custom-control-input {{ $errors->has('confidential') ? 'is-invalid' : ''}}" id="confidential">
                            <label class="custom-control-label" for="confidential">Confidential (keep company data confidential like name-logo-profile)</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3 ml-4 col-md-12">
                            <input {{old('apply_on_site')?'checked':''}} type="checkbox" name="apply_on_site" class="custom-control-input {{ $errors->has('apply_on_site') ? 'is-invalid' : ''}}" id="apply_on_site">
                            <label class="custom-control-label" for="apply_on_site">Apply on company Website</label>
                            {!! $errors->first('apply_on_site', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-6">
                            <label for="company_url">Company website</label>
                            <input value="{{old('company_url')}}" type="text" name="company_url" class="form-control {{ $errors->has('company_url') ? 'is-invalid' : ''}}" id="company_url" aria-describedby="company_url" placeholder="company website url">
                            {!! $errors->first('company_url', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            <input class="btn btn-success form-group col-md-3" type="submit" value="Post Job">
                            <input class="btn btn-info form-group col-md-3" name="draft" type="submit" value="Post Later">
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<!-- Ckeditor -->
<script src="{{asset('assets/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('site/js/job_ckeditor.js')}}"></script>
<script type="text/javascript">
    function getDescription() {
        var url = "{{route('company.description.get')}}";

        var category = $('#category').val();
        var title = $('#jobTitle').val();

        if (title && category) {
            $.ajax({
                url: url + '?category_id=' + category + '&title=' + title,
                type: 'GET'
            }).done(function(response) {
                CKEDITOR.instances['job_requirement'].setData(response.requirement);
                CKEDITOR.instances['description'].setData(response.description)
            });
        }
    }

    $('#category').change(function() {
        getDescription();
    });

    $('#jobTitle').keyup(function() {
        getDescription();
    });

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
    $(function(){

        GetCities($('#country1').val())
    })

</script>
@endsection