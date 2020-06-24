<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="jobs in Egypt, job in Egypt, careers egypt, jobs available in Egypt, jobs in cairo, jobs in hurghada, online jobs in egypt, vacancies in egypt, total egypt careers, jobs in maadi">

    @section('meta-data')
        @if(Route::current()->getName() == 'user.index') 
        <meta name="google-site-verification" content="w-Xl1dmfR7ZdsBIyP3c3JVEIrLxF5vSJkKmN_sicbb4" />
        @endif 

        @if(Route::current()->getName() == 'user.get.job' &&  isset($job))
        <meta name="description" content="{{  preg_replace("/&#?[a-z0-9]{2,8};/i","",strip_tags($job->description))   }} "> 
        @elseif(Route::current()->getName() == 'user.company.all') 
        <meta name="description" content="browse 100+ of the best companies hiring now in Egypt, check out the available jobs and apply to your preferred job role ">
        @elseif(Route::current()->getName() == 'user.browse') 
        <meta name="description" content="searching for a job? Browse thousands of jobs available in Egypt now, refine your search by filtering the city and job role, find your best job and apply now. ">

        @elseif(Route::current()->getName() == 'user.company.get' && isset($company)) 
        <meta name="description" content="{{  preg_replace("/&#?[a-z0-9]{2,8};/i","",strip_tags($company->description))   }} ">
        @else
        <meta name="description" content="Jobadge is a platform for job seekers to find and hunt their dream jobs in Egypt & Gulf, and for recruiters and employers to find the best-qualified candidates. Get hired now!">
        @endif
    @show


   

    <!-- Favicon-->
    <link rel="icon" href="{{asset('site/images/logo/logo-old.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('site/css/loader.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Roboto:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('site/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/index.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"> 
   
    @yield('styles')
    <style>
          .animaalert {
                margin-left: 56px;
                
            }
            .animaalert  i {
                color: red;
                /* transition: all 2s ease-in-out; */
                animation: bounce 3s  infinite;
            }

            @keyframes bounce {
                0%, 20%, 60%, 100% {
                /* -webkit-transform: translateY(0); */
                /* transform: translateY(0); */
                color:red
                
                }

                40% {
                /* -webkit-transform: translateY(-20px); */
                /* transform: translateY(-20px); */
                color: #007bff;
                }

                80% {
                /* -webkit-transform: translateY(-10px); */
                /* transform: translateY(-10px); */
                color: #007bff;
                }
            }
            .container-header .dropdown-menu.show{
                left: -45px !important;

            }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144259104-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-144259104-2');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '552250225569304');
    fbq('track', 'PageView');
   @if(session()->has('register_status') )
       fbq('track', 'CompleteRegistration');
    {{session()->forget('register_status')}}
  @endif

   </script>

    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=552250225569304&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

  
    {{-- <title>JoBadge</title> --}}
    @if(Route::current()->getName() == 'user.browse') 
    <title>browse 1000+ job available in Egypt | JoBadge</title> 
    @elseif(Route::current()->getName() == 'user.company.get' && isset($company)) 
    <title>  Jobs and Careers at {{$company->name}}   | Jobadge  </title>
    @elseif(Route::current()->getName() == 'user.get.job' && isset($job)) 
     <title>{{$job->title}}@if($job->confidential==0) at  {{$job->company()->first()->name}}@endif | Jobadge    </title>
    @elseif(Route::current()->getName() == 'user.company.all') 
    <title>  Companies hiring now | Jobadge  </title>
    @else 
    <title>  Jobs available in Egypt and Gulf area | Jobadge</title>
    @endif
</head>

<body>
    <!--===== Loader =====-->
    <div class="loader">
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    {{-- {{dd( auth()->guard('company')->user()->isActivated() )}} --}}
{{-- {{dd(url('company/logout'))}} --}}
    <!--===== NavBar =====-->
    @section('customeHeader')
        <header class="container-header">
            <div class="container">
                <div class="row no-gutters align-items-center">
                    <div class="col-4 col-md-1 col-xl-2">
                        <div class="header-logo">
                            <h3>
                                <a href="{{route('user.index')}}" class="logo-link">
                                    <img src="{{asset('site/images/logo/logo.png')}}" alt="Careers at Jobadge">
                                    <!--<span>JOBADGE</span>-->
                                </a>
                            </h3>
                        </div>
                        
                    </div>
                    <div class="col-8 col-md-11 col-xl-10 text-right">
                        <nav class="header-nav">
                            <ul>
                               
                                <li><a href="{{route('user.index')}}" class="header-nav-link">HOME</a></li>
                                <li><a href="{{route('user.browse')}}" class="header-nav-link">BROWSE JOBS</a></li>
                                <li><a href="{{route('user.aboutus')}}" class="header-nav-link">ABOUT US</a></li>
                                <li><a href="{{route('web.blog.user.home')}}" target="_blank" class="header-nav-link">BLOG</a></li>
                                <li><a href="{{route('user.contactus')}}" class="header-nav-link">CONTACT US</a></li>
                                @if(!auth()->guard('company')->check() && !auth()->guard('user')->check())
                                <li><a href="{{route('user.register.get')}}" class="header-nav-link">JOIN US</a></li>
                                <li><a href="{{route('user.login.get')}}" class="header-link-action"><span>LOGIN</span></a></li>
                                @endif
                            </ul>
                        </nav>
                        @if(auth()->guard('user')->check() || auth()->guard('company')->check())
                        <div class="dropdown d-inline-block notifcation mr-3">
                            @if(auth()->guard('user')->check())

                            <img src="{{auth()->guard('user')->user()->getUserImage()}}" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="{{auth()->guard('user')->user()->first_name . '-' .  auth()->guard('user')->user()->last_name  }}">
                            <i class="fas fa-bars" data-toggle="dropdown" style="position: absolute;bottom: 0;right: 0;color: white;background-color: var(--clr2);padding: 4px;border-radius: 50%;font-size: 13px;cursor: pointer;"></i>
                            

                            @elseif(auth()->guard('company')->check())
                            <img src="{{auth()->guard('company')->user()->getCompanyLogo()}}" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="">
                            <i class="fas fa-bars" data-toggle="dropdown" style="position: absolute;bottom: 0;right: 0;color: white;background-color: var(--clr2);padding: 4px;border-radius: 50%;font-size: 13px;cursor: pointer;"></i>
                            @endif
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <p class="text-center border-bottom pb-2 mb-0">
                                    @if(auth()->guard('user')->check())
                                    <a href="{{route('user.get',auth()->guard('user')->user()->id)}}">View profile</a>
                                    @elseif(auth()->guard('company')->check())
                                    <a href="{{route('user.company.get',auth()->guard('company')->user()->slug)}}">View profile</a>
                                    @endif
                                </p>
                                @if(auth()->guard('company')->check() && auth()->guard('company')->user()->isActivated())
                                <a class="dropdown-item text-muted py-2" href="{{route('company.cvs.get')}}">Manage Applicants</a>
                                <a class="dropdown-item text-muted py-2" href="{{route('company.myjobs.get')}}">my jobs</a>
                                <a class="dropdown-item text-muted py-2" href="{{route('company.jobseekers.search')}}">job seekers</a>
                                <a class="dropdown-item text-muted py-2" href="{{route('company.invite.get')}}">invite</a>
                                <a class="dropdown-item text-muted py-2" href="{{route('company.profile')}}"><i class="fas fa-cog"></i> setting</a>
                                @endif
                                @if(auth()->guard('user')->check() && auth()->guard('user')->user()->isActivated())
                                <a class="dropdown-item text-muted py-2" href="{{route('user.recommendations')}}">recommended jobs</a>
                                <a class="dropdown-item text-muted py-2" href="{{route('user.applicaions.get')}}">my applications</a>
                                <a class="dropdown-item text-muted py-2" href="{{route('user.profile.manage')}}" class="header-nav-link">manage profile 
                                    @if(auth('user')->user()->getUserRate() != 100 || auth('user')->user()->full_register == false)
                                    <strong class="animaalert">
                                    {{-- <i class="fa fa-percent" aria-hidden="true">{{auth('user')->user()->getUserRate()}} </i> --}}
                                    <i class="fa fa-info" aria-hidden="true"></i>

                                    </strong>
                                    @endif
                                </a>
                                <a class="dropdown-item text-muted py-2" href="{{route('user.setting')}}" class="header-nav-link"><i class="fas fa-cog"></i> account settings
                                    {{-- @if(auth('user')->user()->full_register == false)
                                    <strong class="animaalert">
                                        <i class="fa fa-info" aria-hidden="true"></i>
                                    </strong>
                                    @endif --}}
                                </a>
                                @endif
                                @if(!auth()->guard('company')->check() && !auth()->guard('user')->check())
                                @else
                                @if(auth()->guard('company')->check())
                                <a class="dropdown-item text-muted py-2 border-top" href="{{route('company.logout')}}"> <i class="fas fa-sign-out-alt"></i>logout</a>

                                @else
                                <a class="dropdown-item text-muted py-2 border-top" href="{{route('user.logout')}}"> <i class="fas fa-sign-out-alt"></i>logout</a>
                                @endif
                                @endif
                            </div>
                        </div>
                        @endif
                        @if(auth()->guard('company')->check() && auth()->guard('company')->user()->isActivated())
                        <a href="{{route('company.job.create')}}" class="header-link-action"><span>POST A JOB</span></a>
                        @endif
                        <span class="icon icon-menu menu-mobile"></span>
                    </div>
                </div>
            </div>
        </header>
    @show
    
   