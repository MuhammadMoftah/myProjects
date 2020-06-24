@extends('site.master')
@section('styles')
<meta property="og:title" content='{{$project->title_en}}'>
<meta property="og:image" content="{{url('/').'/'.$project->images[0]['image']}}">
<meta property="og:description" content="{{$project->description_en}}">
<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@">
<meta name="twitter:title" content='{{$project->title_en}}'>
<meta name="twitter:image" content="{{url('/').'/'.$project->images[0]['image']}}">
@endsection
@section('fb_pixel_events')
    fbq('track', 'ViewContent');
    fbq('track', 'Lead');
@endsection
@section('body')

<section class="single-project">
    <div class="container">
    @include('site.layouts.message')
        <div class="inner">
            <div class="row">
                <div class="col-md-8 test">
                    <div class="title py-4">
                        <h1>@if(app()->getLocale()=='en') {{$project->title_en}} @else {{$project->title_ar}} @endif</h1>
                    </div>

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <!-- <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol> -->
                        <div class="carousel-inner">
                            @foreach($project->images as $key => $image)
                            <div class="carousel-item {{$key==0?'active':''}}">
                                <img class="d-block w-100" src="{{env('AWS_URL') .$image->image}}" alt="@if(app()->getLocale()=='en') {{$project->title_en}} @else {{$project->title_ar}} @endif">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="card-footer d-flex justify-content-between" style="font-size:20px">
                        @if($project->property_type_id)
                        <small class="text-muted"><i class="far fa-building text-info"></i>
                            @foreach($project->properties as $key=>$property)
                            @if(app()->getLocale()=='en') {{$property->name_en}} @else {{$property->name_ar}} @endif @if(!$loop->last),@endif
                            @endforeach
                        </small>
                        @endif
                        @if($project->size_from && $project->size_to)
                        <small class="text-muted"><i class="fas fa-square text-warning"></i> {{$project->size_from}}{{trans('lang.m²')}} - {{$project->size_to}}{{trans('lang.m²')}}</small>
                        @endif
                        @if($project->price_from && $project->size_to)
                        <small class="text-success"> {{$project->price_from}} - {{$project->price_to}}
                            @if(app()->getLocale()=='en') {{$country->currency_en}} @else {{$country->currency_ar}} @endif
                        </small>
                        @endif
                    </div>

                    <div class="wow fadeInUp py-3" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="title">
                            <h3>{{trans('lang.project_description')}}</h3>
                        </div>
                        <b class="text-muted ">
                            @if(app()->getLocale()=='en') {!! $project->description_en !!} @else {!! $project->description_ar !!} @endif
                        </b>
                    </div>

                    <!-- <div class="wow fadeInUp mb-5" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="title">
                            <h1>Payment Plan</h1>
                        </div>
                        <b>0% down payment rest till 4 years<br> 5% down payment then after 3 months <br> 5% down payment rest till 6 years <br> 10% down payment then after 3 months <br> 10% then 10% on delivery rest till 8 years equal installm </b>
                    </div> -->

                    @if($project->video)
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="title">
                            <h3>{{trans('lang.video')}}</h3>
                        </div>
                        <div class="embed-responsive embed-responsive-21by9 py-5">
                            <iframe class="embed-responsive-item py-2" src="{{url('/').'/'.$project->video}}" allowfullscreen></iframe>
                        </div>
                    </div>
                    @endif


                    <div class="pt-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="title">
                            <h3>{{trans('lang.address')}}</h3>
                        </div>
                        <p class="text-black-50">{{$project->address}}</p>
                    </div>

                    <div class="pt-5 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="title">
                            <h3>{{trans('lang.about_developer')}}</h3>
                        </div>

                        <div class="@if(app()->getLocale()=='ar') text-right @else text-left @endif py-3">
                          <img src="{{env('AWS_URL') .$project->developer->image}}" class="img-thumbnail" alt="{{$project->developer->name}}" style="width:100px;">
                          <b>{{$project->developer->name}}</b>
                        </div>
                        

                        <b class="text-black-50 py-2">
                            @if(app()->getLocale()=='en') {!! $project->developer_description_en !!} @else {!! $project->developer_description_ar !!} @endif
                        </b>
                    </div>

                    <div class="pt-5 ">
                        <div class="title">
                            <h3>{{trans('lang.share')}}</h3>
                        </div>
                        <div class="text-center social-login pb-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <a class="facebook" style="background-color:#005ebf" href="{{route('user.project.share',['provider'=> 'facebook','id'=>$project->id])}}">
                                <fa><i aria-hidden="true" class="fab fa-facebook-f"></i></fa>
                            </a>
                            <a class="twitter" style="background-color:#55acee" href="{{route('user.project.share',['provider'=> 'twitter','id'=>$project->id])}}">
                                <fa><i aria-hidden="true" class="fab fa-twitter"></i></fa>
                            </a>
                            <a class="linked" style="background-color:#0077b5" href="{{route('user.project.share',['provider'=> 'linkedin','id'=>$project->id])}}">
                                <fa><i aria-hidden="true" class="fab fa-linkedin-in"></i></fa>
                            </a>
                            <a onclick="newInvite()" class="messenger" style="background-color:#55acee">
                                <fa><i class="fab fa-facebook-messenger"></i></fa>
                            </a>
                        </div>

                    </div>
                    <script type="text/javascript" src="https://connect.facebook.net/en_US/all.js"></script>
                    <script type="text/javascript">
                        FB.init({
                            appId: '807941156228364',
                            status: true, // check login status
                            cookie: true, // enable cookies to allow the server to access the session
                            xfbml: true // parse XFBML
                        });

                        function newInvite() {
                            var receiverUserIds = FB.ui({
                                    method: 'send',
                                    display: "popup",
                                    link: "{{route('user.project.get',['id'=>$project->id,'lang'=>app()->getLocale(),'project_title'=>str_replace('+','-',urlencode(str_replace('/','',$project->title_en)))])}}"
                                },
                                function(status) {

                                }
                            );
                        }
                    </script>
                </div>



                <div class="col-md-4  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                    <div class="title py-4">
                        <h3>{{trans('lang.features')}}</h3>
                    </div>

                    <ul class="features list-unstyled px-0">
                        @foreach($project->features as $feature)
                        <li><i class="fas fa-check my-2"></i> <b>{{$feature->feature}}</b></li>
                        @endforeach
                    </ul>
                    @if(auth()->guard('user')->check())
                    <form action="{{route('user.project.sendMail',$project->id)}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="type" value="request" />
                        <div class="form-group wow fadeInUp @if(app()->getLocale()=='ar') text-right @else text-left @endif" data-wow-duration="1s" data-wow-delay="0.3s">
                            <label for="exampleFormControlTextarea1">{{trans('lang.message')}}</label>
                            <textarea name="message" class="form-control {{ $errors->has('message') && old('type')=='request' ? 'is-invalid' : ''}}" id="exampleFormControlTextarea1" rows="5"></textarea>
                            @if(old('type')=='request'){!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}@endif
                        </div>
                        <button class="btn d-block mx-auto my-4 wow fadeInUp text-white" data-wow-duration="1s" data-wow-delay="0.3s" style="background-color: rgb(120, 18, 178);">
                            {{trans('lang.request_call')}}
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>


        {{--<div class="contact">
            <div class="title pt-5 pb-3">
                <h1>{{trans('lang.Contact US')}}</h1>
    </div>
    <form action="{{route('user.sendMail')}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="type" value="contact" />
        <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <label for="exampleInputUser1">{{trans('lang.username')}}</label>
            <input type="text" name="name" class="form-control {{ $errors->has('name') && old('type')=='contact' ? 'is-invalid' : ''}}" id="exampleInputUser1" placeholder="{{trans('lang.enter_name')}}">
            @if(old('type')=='contact'){!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}@endif
        </div>

        <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <label for="exampleInputEmail1">{{trans('lang.Email')}}</label>
            <input type="email" name="email" class="form-control {{ $errors->has('email') && old('type')=='contact' ? 'is-invalid' : ''}}" id="exampleInputEmail1" placeholder="{{trans('lang.enter_email')}}">
            @if(old('type')=='contact'){!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}@endif
        </div>

        <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <label for="exampleInputPhone1">{{trans('lang.phone')}}</label>
            <input type="text" name="phone" class="form-control {{ $errors->has('phone') && old('type')=='contact' ? 'is-invalid' : ''}}" id="exampleInputPhone1" placeholder="{{trans('lang.enter_phone')}}">
            @if(old('type')=='contact'){!! $errors->first('phone', '<div class="invalid-feedback">:message</div>') !!}@endif
        </div>

        <div class="form-group wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <label for="exampleFormControlTextarea1">{{trans('lang.message')}}</label>
            <textarea name="message" class="form-control {{ $errors->has('message') && old('type')=='contact' ? 'is-invalid' : ''}}" id="exampleFormControlTextarea1" rows="5"></textarea>
            @if(old('type')=='contact'){!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}@endif
        </div>
        <button type="submit" class="btn btn-success w-25 mx-auto wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">{{trans('lang.send')}}</button>
    </form>
    </div>--}}

    <div class="related-projects">
        <div class="title pt-5">
            <h3>{{trans('lang.related_projects')}}</h3>
        </div>

        <div class="swiper-container py-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="swiper-wrapper">
                @foreach($similar_projects as $_project)
                <div class="swiper-slide">
                    <a href="{{route('user.project.get',['id'=>$_project->id,'project_title'=>$_project->title_en,'lang'=>app()->getLocale()])}}"><img src="{{env('AWS_URL') .$_project->getThumbnailAttribute()}}" alt=""></a>
                </div>
                @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>

    </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection

<form method="POST" action="{{route('user.project.sendMessage',$project->id)}}" class="fixed-message-box card shadow">
    {{csrf_field()}}
    <input type="hidden" name="type" value="project_message"/>
    <div class="card-header text-center">
        {{trans('lang.request_call')}}
        <span class="btn btn-success" onclick="$('.fixed-message-box').toggleClass('go-side')">
            <i class="far fa-envelope" style=""></i>
        </span>
    </div>
    @if(old('type')=='project_message')
    @include('site.layouts.errors')
    @endif
    <div class="card-body row">
        <div class="col-sm-12">

            <div class="form-group">
                <input class="form-control" name="name" value="@if(old('type')=='project_message'){{old('name')}}@endif" type="text" placeholder="{{trans('lang.name')}}">
            </div>
            <div class="form-group">
                <input class="form-control" name="phone" value="@if(old('type')=='project_message'){{old('phone')}}@endif" type="text" placeholder="{{trans('lang.phone')}}">
            </div>
            <div class="form-group">
                <textarea class="form-control pt-2" value="@if(old('type')=='project_message'){{old('message')}}@endif" name="message" placeholder="{{trans('lang.message')}}" rows="4">@if(old('type')=='project_message'){{old('message')}}@endif</textarea>
            </div>            
        </div>   

        <button type="submit" class="btn d-block mx-auto my-2 text-white" style="background-color: rgb(120, 18, 178)"> {{trans('lang.request_call')}} </button>
    </div>
</form>

<style>

</style>
