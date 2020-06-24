@extends('master')
@section('styles')
<!-- Facebook Cards -->
<meta property="og:title" content='{{$user->full_name}} - {{$user->title}}'>
<meta property="og:image" content="{{$user->getUserImage()}}">
<meta propert="og:description" content="{{$user->getSummaryForShare()}}">
<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@">
<meta name="twitter:title" content='{{$user->full_name}} - {{$user->title}}'>
<meta name="twitter:image" content="{{$user->getUserImage()}}">
@endsection
@section('body')
<!--===== User Profile =====-->
<!--===== User Profile =====-->
<section class="user-profile p-5">
    <div class="container"> 
        @if(auth('user')->id() == $user->id && $user->getUserRate() != 100 ) 
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-primary">
                     Your Profile is {{$user->getUserRate()}}%  ,  complete your profile from this <a href="{{route('user.profile.manage') }}" class=" text-muted font-weight-bold"> Link </a>  
                    
                </div>
            </div>
        </div>
        @endif

        <div class="user-info bg-white rounded">
            <div class="d-flex flex-column flex-md-row">
                <img src="{{$user->getUserImage()}}" class="rounded-circle" alt="">
                <div class="pt-md-4 ">
                    <h5 class="font-weight-bold">{{$user->full_name}}</h5>
                    <h6>{{$user->title}}</h6>
                    @if($user->country_id && $user->city_id)
                    <p class="text-muted">{{$user->city->name_en}}, {{$user->country->name_en}}</p>
                    @endif
                    @foreach($user->skills as $skill)
                    <span class="badge-success d-inline-block rounded p-1  m-1"> {{$skill->skill}}</span>
                    @endforeach
                </div> 
            </div>
        </div>

        

        <div class="row">
            <div class="col-md-12">
                <div class="part bg-white rounded my-3">
                    <div class="part-title py-3">
                        <h5 class="font-weight-bold"><i class="fas fa-info-circle"></i> General info</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-6 part-body rounded my-2">
                            <p class="font-weight-bold m-0">Age: <small>@if($user->age!=0) {{$user->age}} Years @else N/A @endif</small></p>
                            <p class="font-weight-bold m-0">Gender: <small>@if($user->gender) {{ $user->gender}} @else 'N/A' @endif</small></p>
                            <p class="font-weight-bold m-0">Nationality: <small>@if($user->nationality_id) {{$user->nationality->name_en}} @else N/A @endif</small></p>
                            @if($user->target_job->count() > 0  && $user->target_job->first() && $user->target_job->first()->show_salary == 1 )
                            <p class="font-weight-bold m-0">Target Salary: <small >{{$user->target_job->first()->salary_from }} : {{$user->target_job->first()->salary_to }} EGP </small> </p>
                            @endif
                        </div>

                        <div class="col-md-6 part-body rounded my-2">
                            <h4>Contact info:</h4>
                            <p class="font-weight-bold m-0"><i class="fas fa-mobile-alt"></i> <small>@if($user->phone) {{$user->phone}} @else N/A @endif</small></p>

                            <p class="font-weight-bold m-0"><i class="fas fa-envelope"></i><small> {{$user->email}} </small></p>

                            <p class="font-weight-bold m-0"><i class="far fa-file-pdf"></i> <a target="_blank" href="{{route('user.cv.get',$user->id)}}" class="small">View CV</a></p>
                            
                            @if($user->video_cv)
                            <p class="font-weight-bold m-0"><i class="fas fa-video"></i> <a target="_blank" data-toggle="modal" data-target="#vedio"  class="small text-primary">View Vedio CV</a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="part bg-white rounded my-3">
                    <div class="part-title py-3">
                        <h5 class="font-weight-bold"><i class="far fa-building"></i> Work Experince</h5>
                    </div>
                    @foreach($user->work_experiences as $experience)
                    <div class="part-body border rounded p-2 my-2">
                        <h6 class="font-weight-bold m-0">{{$experience->title}}</h6>
                        <small class="text-muted">{{$experience->displayStart()}} to @if($experience->till_present==1) Now @else {{$experience->displayEnd()}} @endif</small>
                    </div>
                    @endforeach
                    @if(count($user->work_experiences)==0)
                    <h6>No experiences Added</h6>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="part bg-white rounded my-3">
                    <div class="part-title py-3">
                        <h5 class="font-weight-bold"><i class="fas fa-university"></i> Education</h5>
                    </div>
                    @foreach($user->educations as $education)
                    <div class="part-body border rounded p-2 my-2">
                        <h6 class="font-weight-bold m-0"> {{$education->place_name}}</h6>
                        <small class="text-muted">{{$education->displayStart()}} to {{$education->displayEnd()}}</small>
                    </div>
                    @endforeach
                    @if(count($user->educations)==0)
                    <h6>No educations Added</h6>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="part bg-white rounded my-3">
                    <div class="part-title py-3">
                        <h5 class="font-weight-bold"><i class="fab fa-leanpub"></i> Certificates</h5>
                    </div>
                    @foreach($user->certificates as $certificate)
                    <div class="part-body border rounded p-2 my-2">
                        <h6 class="font-weight-bold m-0">{{$certificate->name}}</h6>
                        <small class="text-muted">{{$certificate->place_name}} - {{$certificate->displayStart()}}</small>
                    </div>
                     @endforeach
                    @if(count($user->certificates)==0)
                    <h6>No certificates Added</h6>
                    @endif
                    @if(auth('user')->id() == $user->id)
                    <a href="{{route('user.profile.manage') }}" class=" text-muted font-weight-bold"> Edit </a> 
                    @endif 

                </div>
            </div>

            <div class="col-md-6">
                <div class="part bg-white rounded my-3">
                    <div class="part-title py-3">
                        <h5 class="font-weight-bold"><i class="fas fa-user-tag"></i> References</h5>
                    </div>
                    @if($user->ref1_name)
                    <div class="part-body border rounded p-2 my-2">
                        <h6 class="font-weight-bold m-0">{{$user->ref1_name}}</h6>
                        <small class="text-muted">{{$user->ref1_title}} - {{$user->ref1_phone}}</small>
                    </div>
                    @endif
                    @if($user->ref2_name)
                    <div class="part-body border rounded p-2 my-2">
                        <h6 class="font-weight-bold m-0">{{$user->ref2_name}}</h6>
                        <small class="text-muted">{{$user->ref2_title}} - {{$user->ref2_phone}}</small>
                    </div>
                    @endif
                    @if(!$user->ref1_name && !$user->ref2_name)
                    <h6>No references Added</h6>
                    @endif
                </div>
            </div>

            <div class="col-md-6">
                <div class="part bg-white rounded my-3">
                    <div class="part-title py-3">
                        <h5 class="font-weight-bold"><i class="fas fa-language"></i> Languages</h5>
                    </div>
                    @foreach($user->languages as $language)
                    <span class="badge-info d-inline-block rounded p-1  m-1"> {{$language->language}}</span>
                    @endforeach
                    @if(count($user->languages)==0)
                    <h6>No languages Added</h6>
                    @endif
                    <br>
                    @if(auth('user')->id() == $user->id)
                    <a href="{{route('user.profile.manage') }}" class=" text-muted font-weight-bold"> Edit </a>  
                    @endif

                </div>
            </div>

            <div class="col-md-6">
                <div class="part bg-white rounded my-3">
                    <div class="part-title py-3">
                        <h5 class="font-weight-bold"><i class="far fa-lightbulb"></i> Skills</h5>
                    </div>
                    @if(count($user->skills)==0)
                    <h6>No Skills Added</h6>
                    @endif
                    @foreach($user->skills as $skill)
                    <span class="badge-info d-inline-block rounded p-1  m-1"> {{$skill->skill}}</span>
                    @endforeach
                </div>
            </div>
            {{-- @if($user->video_cv)
            <div class="col-md-6">
                <div class="part bg-white rounded my-3">
                    <div class="part-title py-3">
                        <h5 class="font-weight-bold"><i class="fas fa-video"></i> My video</h5>
                    </div>
                    <div>
                        <video width="100%" height="300" controls>
                            <source src="{{$user->getVideoCv()}}" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            @endif --}}
        </div>
    </div>
</section>

@if($user->video_cv)
{{-- vedio --}}
<!-- Modal -->
<div class="modal fade" id="vedio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Video Cv</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="text-center">
             <video src="{{$user->getVideoCv()}}" id="vedio-cv"  style="width:100%" controls></video>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  @endif

@endsection

@section('scripts')
<script>
    $(function(){
        $('#vedio').on('hidden.bs.modal', function (e) {
           
            var elm = $('#vedio-cv').get(0);
            if(elm)
                elm.pause()
        })
    })
</script>
    
@endsection