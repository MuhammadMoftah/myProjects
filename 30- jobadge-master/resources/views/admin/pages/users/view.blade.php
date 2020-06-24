@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<!-- Bootstrap Tagsinput Css -->
<link href="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
@endsection
@section('body')
<!-- Example Tab -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                @include('admin.layouts.message')
                @include('admin.layouts.errors')
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                    @if($user->verified===1)
                    <button class="btn bg-green btn-sm btn-block waves-effect" type="button">Verified</button>
                    @else
                    <button class="btn bg-red btn-sm btn-block waves-effect" type="button">Not Verified</button>
                    @endif
                </div>
                <h2>
                    User Info
                </h2>
            </div>
            <div class="body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tab-nav-right" role="tablist">
                    <li role="presentation" class="active"><a href="#home" data-toggle="tab">Personal info</a></li>
                    <li role="presentation"><a href="#work_experience" data-toggle="tab">Work Experience</a></li>
                    <li role="presentation"><a href="#education" data-toggle="tab">Education</a></li>
                    <li role="presentation"><a href="#skills" data-toggle="tab">Skills</a></li>
                    <li role="presentation"><a href="#languages" data-toggle="tab">Languages</a></li>
                    <li role="presentation"><a href="#certificates" data-toggle="tab">Certificates</a></li>
                    <li role="presentation"><a href="#target_job" data-toggle="tab">Target Job</a></li>
                    <li role="presentation"><a href="#cv" data-toggle="tab">CV</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content" style="display:flow-root;">
                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                        <div class="image">
                            <img src="{{$user->getUserImage()}}" width="100" height="100" alt="User" />
                        </div>
                        <h5>First Name : {{$user->first_name}}</h5>
                        <h5>Last Name : {{$user->last_name}}</h5>
                        <h5>Email : {{$user->email}}</h5>
                        <h5>Phone : {{$user->phone}}</h5>
                        <h5>Title : {{$user->title}}</h5>
                        @if($user->nationality_id)
                        <h5>Nationality : {{$user->nationality->name_en}} - {{$user->nationality->name_ar}}</h5>
                        @endif
                        @if($user->country_id && $user->city_id)
                        <h5>Country : {{$user->country->name_en}} - {{$user->country->name_ar}}</h5>
                        <h5>City : {{$user->city->name_en}} - {{$user->city->name_ar}}</h5>
                        @endif
                        <hr>
                        @if($user->ref1_name && $user->ref1_phone && $user->ref1_title)
                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        First reference
                                    </h2>
                                </div>
                                <div class="body">
                                    <ul class="list-group">
                                        <li class="list-group-item">{{$user->ref1_name}} <span class="badge bg-pink">name</span></li>
                                        <li class="list-group-item">{{$user->ref1_phone}} <span class="badge bg-cyan">phone</span></li>
                                        <li class="list-group-item">{{$user->ref1_title}}<span class="badge bg-teal">title</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($user->ref2_name && $user->ref2_phone && $user->ref2_title)
                        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        Second reference
                                    </h2>
                                </div>
                                <div class="body">
                                    <ul class="list-group">
                                        <li class="list-group-item">{{$user->ref2_name}} <span class="badge bg-pink">name</span></li>
                                        <li class="list-group-item">{{$user->ref2_phone}} <span class="badge bg-cyan">phone</span></li>
                                        <li class="list-group-item">{{$user->ref2_title}}<span class="badge bg-teal">title</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($user->video_cv)
                        <div>
                            <video width="320" height="240" controls>
                                <source src="{{$user->getVideoCv()}}" type="video/mp4">
                            </video>
                        </div>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="work_experience">
                        <a href="{{route('admin.experiences.create.get',$user->id)}}" type="button" class="btn bg-indigo waves-effect">Add work experience</a>
                        @if(count($user->work_experiences)>0)
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Company</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user->work_experiences as $experience)
                                    <tr>
                                        <td>{{$experience->title}}</td>
                                        <td>{{$experience->company_name}}</td>
                                        <td>
                                            <a href="{{route('admin.experiences.view',$experience->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="{{route('admin.experiences.edit.get',$experience->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{route('admin.experiences.delete',$experience->id)}}" type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="education">
                        <a href="{{route('admin.educations.create.get',$user->id)}}" type="button" class="btn bg-indigo waves-effect">Add education</a>
                        @if(count($user->educations) > 0)
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Degree</th>
                                        <th>University/Institute</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user->educations as $education)
                                    <tr>
                                        <td>{{$education->degree}}</td>
                                        <td>{{$education->place_name}}</td>
                                        <td>
                                            <a href="{{route('admin.educations.view',$education->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="{{route('admin.educations.edit.get',$education->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{route('admin.educations.delete',$education->id)}}" type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif

                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="skills">
                        <form id="form_advanced_validation" method="POST" action="{{route('admin.skills.create.post',$user->id)}}">
                            {{ csrf_field() }}
                            <div class="form-group demo-tagsinput-area">
                                <div class="form-line">
                                    <input name="skills" placeholder="enter another skill" type="text" class="form-control" data-role="tagsinput" value="{{$user->getSkillsForEdit()}}">
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">Save</button>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="languages">
                        <form id="form_advanced_validation" method="POST" action="{{route('admin.languages.create.post',$user->id)}}">
                            {{ csrf_field() }}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="{{old('language')}}" class="form-control" name="language" maxlenght="200" required>
                                    <label class="form-label">* Enter your language</label>
                                </div>
                                <div class="help-info">Max. Char: 200</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="rate" class="form-control show-tick" data-live-search="true" required>
                                        <option disabled selected>* select your rate</option>
                                        <option value="1">Bad</option>
                                        <option value="2">intermediate</option>
                                        <option value="3">Good</option>
                                        <option value="4">V.Good</option>
                                        <option value="5">Excellent</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">Save</button>
                        </form>
                        @foreach($user->languages as $language)
                        <hr>
                        <form style="display: contents;" id="form_advanced_validation" method="POST" action="{{route('admin.languages.edit.post',$language->id)}}">
                            {{ csrf_field() }}
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" value="{{$language->language}}" class="form-control" name="language" maxlenght="200" required>
                                    <label class="form-label">* Language</label>
                                </div>
                                <div class="help-info">Max. Char: 200</div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <select name="rate" class="form-control show-tick" data-live-search="true" required>
                                        <option {{$language->rate==1?'selected':''}} value="1">intermediate</option>
                                        <option {{$language->rate==2?'selected':''}} value="2">Good</option>
                                        <option {{$language->rate==3?'selected':''}} value="3">V.Good</option>
                                        <option {{$language->rate==4?'selected':''}} value="4">Excellent</option>
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">Edit</button>
                        </form>
                        <a href="{{route('admin.languages.delete',$language->id)}}" type="button" class="btn bg-red waves-effect">Delete</a>

                        @endforeach
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="certificates">
                        <a type="button" href="{{route('admin.certificates.create.get',$user->id)}}" class="btn bg-indigo waves-effect">Add Certificate</a>
                        @if(count($user->certificates) > 0)
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>University/Institute</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($user->certificates as $certificate)
                                    <tr>
                                        <td>{{$certificate->name}}</td>
                                        <td>{{$certificate->place_name}}</td>
                                        <td>
                                            <a href="{{route('admin.certificates.view',$certificate->id)}}" type="button" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a href="{{route('admin.certificates.edit.get',$certificate->id)}}" type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{route('admin.certificates.delete',$certificate->id)}}" type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="target_job">
                        {{--@if(!$user->target_job)--}}
                        <div style="margin:10px;">
                            <a href="{{route('admin.targets.create.get',$user->id)}}" type="button" class="btn bg-indigo waves-effect">Add target job</a>
                        </div>
                        {{--@else--}}
                        @foreach($user->target_job as $target_job)
                        <a href="{{route('admin.targets.edit.get',$target_job->id)}}" type="button" class="btn bg-blue waves-effect">Edit</a>
                        <a href="{{route('admin.targets.delete',$target_job->id)}}" type="button" class="btn bg-red waves-effect">Delete</a>
                        <div class="body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>title</th>
                                        <td>{{$target_job->title}}</td>
                                    </tr>
                                    <tr>
                                        <th>category</th>
                                        <td>{{$target_job->category->name_en}} - {{$target_job->category->name_ar}}</td>
                                    </tr>
                                    <tr>
                                        <th>country</th>
                                        <td>{{$target_job->country->name_en}} - {{$target_job->country->name_ar}}</td>
                                    </tr>
                                    <tr>
                                        <th>city</th>
                                        <td>{{$target_job->city->name_en}} - {{$target_job->city->name_ar}}</td>
                                    </tr>
                                    <tr>
                                        <th>industry</th>
                                        <td>{{$target_job->industry->name_en}} - {{$target_job->industry->name_ar}}</td>
                                    </tr>
                                    <tr>
                                        <th>Job type</th>
                                        <td>{{$target_job->jobtype->name_en}} - {{$target_job->jobtype->name_ar}}</td>
                                    </tr>
                                    <tr>
                                        <th>Salary From</th>
                                        <td>{{$target_job->salary_from}} EGP</td>
                                    </tr>
                                    <tr>
                                        <th>Salary To</th>
                                        <td>{{$target_job->salary_to}} EGP</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endforeach
                        {{--@endif--}}
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="cv">
                        @if($user->cv)
                        <embed src="{{$user->getUserCv()}}" type="application/pdf" width="100%" height="600px" />
                        @else
                        <h2 style="text-align:center;">No cv uploaded for this user</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Example Tab -->
<!-- #END# Bordered Table -->
@endsection
@section('scripts')
<!-- Bootstrap Tags Input Plugin Js -->
<script src="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
<!-- Validation Plugin Js -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>
@endsection