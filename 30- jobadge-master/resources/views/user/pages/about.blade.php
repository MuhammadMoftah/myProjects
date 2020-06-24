@extends('master')

@section('body')
<!--===== About Us =====-->
<!--===== About Us =====-->
<div class="container-blog-posts about-header">
    <div class="blog-posts-header">
        <div class="container">
            <h1 class="section-title">About <span>Jobadge</span></h1>
        </div>
    </div>
</div>

<!-- <section class="about py-5">
        <div class="container">
            {!! $aboutus->body_en !!}
        </div>
    </section> -->

<section class="about py-5">
    <div class="container">
        <h3 class="section-title mb-4 text-dark"> who <span> we are? </span></h3>
        <p class="text-center mb-4 text-muted"> “Jobadge” is a recruitment platform that help companies reach qualified candidates and provide a large pool of opportunities for job seekers. It will be available as a website and mobile app. Jobadge” will be targeting job seekers, employers, recruiters, fresh graduates and related services providers like training centers, and HR consultancy companies. </p>

        <div class="row my-5" style="position:relative">
            <div class="col-lg-5">
                <div class="img-side text-center">
                    <img src="{{asset('site/images/icon/mission.png')}}" alt="">
                </div>
            </div>
            <span class="col-lg-1"></span>
            <span class="center-border d-none d-lg-block"></span>
            <span class="col-lg-1"></span>
            <div class="col-lg-5">
                <div class="text-side py-5">
                    <p class="h3 text-dark"><strong> Mission </strong></p>
                    <p>
                        Jobadge is a smart, advanced and comprehensive yet simple to use recruitment platform that can add much more to what exists for companies and job seekers. 
                    </p>
                </div>
            </div>
        </div>

        <div class="row my-5" style="position:relative">
            <div class="col-lg-5">
                <div class="text-side py-5">
                    <p class="h3 text-dark"><strong> Vision </strong></p>
                    <p>
                        Jobadge “Where finding the right candidate is not a problem and the process of getting the right job is an experience and no longer a struggle.”
                    </p>
                    <ul class="text-muted">
                        <li class="my-3">
                            In Jobadge we create values to live by. Innovation is what we seek in every stage of the process, “Find the best, keep the best “ Cover the whole recruitment process through the platform including invitations, scheduling, reminders, evaluation, appreciation and tracking by maintaining open channel with companies. 
                        </li>
                        <li class="my-3">
                            Highlight the skilled and distinguished profiles from the crowd to save companies, recruiters and candidates time by providing rating, feedback, metrics and video interviews.  
                        </li>
                        <li class="my-3">
                            Building services covering the needs of recruiters and candidates by providing consultation, training and career advice services.
                        </li>
                        <li class="my-3">
                            Building a directory for Freelancers and Part timers willing to increase their income. 
                        </li>
                    </ul>
                </div>
            </div>
            <span class="col-lg-1"></span>
            <span class="center-border d-none d-lg-block"></span>
            <span class="col-lg-1"></span>
            <div class="col-lg-5">
                <div class="img-side text-center">
                    <img src="{{asset('site/images/icon/vision.png')}}" alt="">
                </div>
            </div>
        </div>

        <div class="row my-5" style="position:relative">
            <div class="col-lg-5">
                <div class="img-side text-center">
                    <img src="{{asset('site/images/icon/whyus.png')}}" alt="">
                </div>
            </div>
            <span class="col-lg-1"></span>
            <span class="center-border d-none d-lg-block"></span>
            <span class="col-lg-1"></span>
            <div class="col-lg-5">
                <div class="text-side py-5">
                    <p class="h3 text-dark"><strong> Why Us? </strong></p>
                    <p>
                     As one of Jobadge’s core values is to help our users “find the best, keep the best “and to bring to the market the best recruitment platform
                    </p>
                </div>
            </div>
        </div>

    </div>

</section>
@endsection
