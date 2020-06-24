@extends('site.master')
@section('fb_pixel_events')
    fbq('track', 'ViewContent');
    fbq('track', 'Lead');
@endsection

@section('styles')
<meta property="og:title" content='{{$ad->title}}'>
<meta property="og:image" content="{{env('AWS_URL').$ad->images[0]['image']}}">
<meta property="og:description" content="{!! $ad->description !!}">
{{-- <meta name="description" content="{!! $ad->description !!}"> --}}

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@">
<meta name="twitter:title" content='{{$ad->title}}'>
<meta name="twitter:image" content="{{env('AWS_URL').$ad->images[0]['image']}}">
<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyAiJwjqodwVVY04ESTFA9REOjqOt1pXOQI'></script>
@endsection
@section('body')
<section class="single-project">
    <div class="container">
        @include('site.layouts.message')
        <div class="inner">
            <div class="row">
                <div id="fb-root"></div>
                <div class="col-md-8 test">
                    <div class="title py-4">
                        <h1>
                            {{$ad->title}}  
                            <a href="{{route('user.favourite',['id'=>$ad->id,'lang'=>app()->getLocale()])}}" style="font-size:35px!important;" class="{{$ad->isFavourite()?'fas':'far'}} fa-star fa-transparent fav-button {{app()->getLocale()=='en'? 'float-right': 'float-left'}} mx-1" title="Add to favorite"></a>
                            <button data-href="{{route('user.add.compare',$ad->id)}}" id="compare-btn" class="btn btn-success {{app()->getLocale()=='en'? 'float-right': 'float-left'}}" {{$ad->checkIfInCompare()?'disabled':''}} title="Add to compare"> <i class="fas fa-table"></i></button>
                        </h1>
                        <h2 style="color:#0000008c; @if(app()->getLocale()=='en') text-align: left; @else text-align: right; @endif" class="h6 mt-3">
                            @if(app()->getLocale()=='en') {{$ad->property_type->name_en}} @else {{$ad->property_type->name_ar}} @endif @if(app()->getLocale()=='en') {{$ad->offer_type->title_en}} @else {{$ad->offer_type->title_ar}} @endif {{trans('lang.in')}}@if(app()->getLocale()=='en'){{$ad->district->name_en}} @else{{$ad->district->name_ar}} @endif
                        </h2>
                    </div>

                    <div class="card">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @if(count($ad->images)>0)
                                @foreach($ad->images as $key => $image)
                                <div class="carousel-item {{$key==0?'active':''}}">
                                    <img class="d-block w-100" src="{{env('AWS_URL') .$image->image}}" alt="{{$ad->title}}">
                                </div>
                                @endforeach
                                @endif
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

                        <div class="card-body">
                            <p class="text-secondary text-center m-0">
                                {!! $ad->description !!}
                            </p>
                        </div>
                        <div class="card-footer ">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i>@if(app()->getLocale()=='en') {{$ad->city->name_en}} @else {{$ad->city->name_ar}} @endif</small>
                            <small class="text-muted mx-2"><i class="far fa-eye"></i> {{$ad->views}}</small>
                            <small class="text-muted"><i class="far fa-clock"></i> {{$ad->created_at}}</small>
                            <small class="text-muted float-right"><span class="text-success font-weight-bold">{{$ad->price}}</span> @if(app()->getLocale()=='en') {{$ad->country->currency_en}} @else {{$ad->country->currency_ar}} @endif 
                            ( @if($ad->price_negotiable==1) {{trans('lang.negotiable')}} @else {{trans('lang.final')}} @endif )
                            </small>
                        </div>
                        <div class="card-footer d-flex justify-content-between" style="font-size:20px">
                            <small class="text-muted"><i class="fas fa-square text-success"></i> {{$ad->size}}m²</small>
                            <small class="text-muted"><i class="fas fa-bed text-danger"></i> {{$ad->bedrooms_num}} {{trans('lang.beds')}}</small>
                            <small class="text-muted"><i class="fas fa-bath text-primary"></i> {{$ad->bathrooms_num}} {{trans('lang.bathrooms')}}</small>
                        </div>
                    </div>

                    <ul class="list-unstyled py-4">
                        <li><b>{{trans('lang.level_of_finishing')}}: </b> @if(app()->getLocale()=='en') {{$ad->level_of_finished->name_en}} @else {{$ad->level_of_finished->name_ar}} @endif</li>
                        <li><b>{{trans('lang.view_of_unit')}}: </b>@if(app()->getLocale()=='en') {{$ad->unit_view->name_en}} @else {{$ad->unit_view->name_ar}} @endif</li>
                        <li><b>{{trans('lang.building_year')}}: </b>{{$ad->building_year}}</li>
                    </ul>
                    <div class="pt-1">
                        <h4 class="font-weight-bold">{{trans('lang.share')}}:</h4>
                        <div class="text-center social-login pb-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <a class="facebook" style="background-color:#005ebf" href="{{route('user.ad.share',['provider'=> 'facebook','id'=>$ad->id])}}">
                                <fa><i aria-hidden="true" class="fab fa-facebook-f"></i></fa>
                            </a>
                            <a class="twitter" style="background-color:#55acee" href="{{route('user.ad.share',['provider'=> 'twitter','id'=>$ad->id])}}">
                                <fa><i aria-hidden="true" class="fab fa-twitter"></i></fa>
                            </a>
                            <a class="linked" style="background-color:#0077b5" href="{{route('user.ad.share',['provider'=> 'linkedin','id'=>$ad->id])}}">
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
                                    link: "{{route('user.ad.get',['id'=>$ad->id,'ad_name'=>$ad->title,'lang'=>app()->getLocale()])}}"
                                },
                                function(status) {

                                }
                            );
                        }
                    </script>
                    @if(count($ad->amenities)>0)
                    <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="title ">
                            <h3>{{trans('lang.features')}}</h3>
                        </div>

                        <ul class="features list-unstyled wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            @foreach($ad->amenities as $feature)
                            <li><i class="fas fa-check my-2"></i> <b>@if(app()->getLocale()=='en') {{$feature->name_en}} @else {{$feature->name_ar}} @endif</b></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


                    <div class="py-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h4 class="font-weight-bold">{{trans('lang.location_on_map')}}</h4>
                        <div id="map1" style="width: 100%;height: 400px"></div>
                    </div>
                    <script>
                        var lat = JSON.parse({{$ad->latitude}});
                        var lng = JSON.parse({{$ad->longitude}});
                        var map = new google.maps.Map(document.getElementById('map1'), {
                            center: {
                                lat: lat,
                                lng: lng
                            },
                            zoom: 15
                        });
                        var marker = new google.maps.Marker({
                            position: {
                                lat: lat,
                                lng: lng
                            },
                            map: map,
                        });
                    </script>
                    
                    
                    @if(auth()->guard('user')->check() && auth()->guard('user')->user()->type==1 && auth()->guard('user')->user()->activation==1)
                    <div class="py-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <button class="btn d-block  wow fadeInUp text-white" data-wow-duration="1s" data-wow-delay="0.3s" style="background-color: rgb(120, 18, 178);" data-toggle="modal" data-target="#report_m">
                            {{trans('lang.report_this_add')}}
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="report_m" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <form action="{{route('user.report.post',$ad->id)}}" method="POST">
                                {{csrf_field()}}
                                <input type="hidden" value="report" name="type" />
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h5 class="modal-title w-100" id="exampleModalLabel">{{trans('lang.report_this_add')}}</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <textarea name="reason" class="form-control {{ $errors->has('reason') ? 'is-invalid' : ''}}" id="" rows="5"></textarea>
                                                {!! $errors->first('reason', '<div class="invalid-feedback">:message</div>') !!}
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success w-25 mx-auto">{{trans('lang.send')}}</button>
                                            <button type="button" class="btn btn-danger w-25  mx-auto" data-dismiss="modal">{{trans('lang.closeit')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-md-4">
                    <div class="title py-4">
                        <h3>{{trans('lang.information')}}  </h3>
                    </div>
                    <div class="user text-center border rounded pt-3">
                        @if($ad->agent_id!==null)
                        <img src="{{env('AWS_URL') .$ad->agent->image}}" width="100px" class="rounded-circle py-3 " alt="{{$ad->agent->name}}">
                        <a style="color:black;">
                            <h4 style="text-align:center !important;">{{$ad->agent->name}}</h4>
                        </a>
                        <h6 id="shown_phone" style='display:none'>{{$ad->agent->phone}}</h6>
                        <h6 id="shown_email" style='display:none'>{{$ad->agent->email}}</h6>
                        @else
                        <img src="{{env('AWS_URL') .$ad->owner->image}}" width="100px" class="rounded-circle py-3 " alt="{{$ad->owner->name}}">
                        <a style="color:black;" href="{{route('user.ads.get',['id'=>$ad->owner->id,'lang'=>app()->getLocale()])}}">
                            <h4 style="text-align:center !important;">{{$ad->owner->name}}</h4>
                        </a>
                        <h6 id="shown_phone" style='display:none'>{{$ad->owner->phone}}</h6>
                        @if($ad->able_email=='true')
                        <h6 id="shown_email" style='display:none'>{{$ad->owner->email}}</h6>
                        @endif
                        @endif

                        @if(auth()->guard('user')->check() && auth()->guard('user')->user()->activation==1)
                        <ul class="footer-social-link border-top list-unstyled list-inline pt-3">
                            @if($ad->able_call=='true')
                            <li id="show-phone" class="list-inline-item mb-1 px-4"><a><i class="fas fa-phone"></i> {{trans('lang.show_phone')}}  </a>
                            @endif
                            
                            @if($ad->able_chat=='true')
                            <li class="list-inline-item mb-1 px-4"><a data-toggle="modal" data-target="#message_modal"><i class="far fa-comment-dots"></i> {{trans('lang.send_adv_message')}}  </a></li>
                            <!-- Modal -->
                            <div class="modal fade" id="message_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="{{route('user.post.chatroom',$ad->id)}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" value="send_message" name="type" />
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title w-100" id="exampleModalLabel">{{trans('lang.send_message')}}</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control {{ $errors->has('message') ? 'is-invalid' : ''}}" rows="5"></textarea>
                                                    {!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success w-25 mx-auto">{{trans('lang.send')}}</button>
                                                <button type="button" class="btn btn-danger w-25  mx-auto" data-dismiss="modal">{{trans('lang.closeit')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            @endif
                            @if($ad->able_email=='true')
                            <li id="show-email" class="list-inline-item mb-1 px-4"><a><i class="far fa-envelope-open"></i> {{trans('lang.show_email')}} </a>
                            </li>
                            @endif
                        </ul>
                        @elseif(!auth()->guard('user')->check())
                        <ul class="footer-social-link border-top list-unstyled list-inline pt-3 px-2">

                            @if($ad->able_call=='true')
                            <li id="show-phone" class="list-inline-item mb-1 px-4"><a><i class="fas fa-phone"></i> {{trans('lang.show_phone')}}  </a>
                            @endif

                            
                            @if($ad->able_chat=='true')
                            {{-- <li class="list-inline-item"><a href="{{route('user.login.get',app()->getLocale())}}"><i class="far fa-comment-dots"></i></a></li> --}}
                            <li class="list-inline-item mb-1 px-4"><a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.user_login') }}"> <i class="far fa-comment-dots"></i> {{trans('lang.send_adv_message')}} </a> </li>
                            @endif

                            @if($ad->able_email=='true')
                            {{-- <li class="list-inline-item">
                                <a href="{{route('user.login.get',app()->getLocale())}}"><i class="far fa-envelope-open"></i>
                                </a>
                            </li> --}} 
                            <li class="list-inline-item mb-1 px-4">
                                <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.user_login') }}"> <i class="far fa-envelope-open"></i> {{trans('lang.show_email')}} </a> 
                            </li> 
                           
                            @endif
                            
                        </ul>
                        @endif
                    </div>

                    @foreach($similar_ads as $one_ad)
                    <a class="card my-4" href="{{route('user.ad.get',['id'=>$one_ad->id,'lang'=>app()->getLocale(),'ad_name'=>str_replace('+','-',urlencode(str_replace('/','',$one_ad->title)))])}}">
                        <span class="sale bg-danger">@if(app()->getLocale()=='en') {{$one_ad->offer_type->title_en}} @else {{$one_ad->offer_type->title_ar}} @endif</span>
                        @if(count($one_ad->images)>0)
                        <img class="card-img-top" src="{{env('AWS_URL') .$one_ad->images[0]['image']}}" alt="{{$one_ad->title}}">
                        @endif
                        <div class="card-body">
                            <p class="text-secondary text-center m-0">{{$one_ad->title}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i>@if(app()->getLocale()=='en') {{$one_ad->city->name_en}} @else {{$one_ad->city->name_ar}} @endif</small>
                            <small class="text-muted float-right"><span class="text-success font-weight-bold">{{$one_ad->price}}</span> @if(app()->getLocale()=='en') {{$one_ad->country->currency_en}} @else {{$one_ad->country->currency_ar}} @endif</small>
                        </div>
                    </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<section class="houses wow fadeInUp" data-wow-duration="1s">
    <img src="{{url('site')}}/images/footer.jpg" alt="">
</section>
@endsection
@section('scripts')
<script type="text/javascript">
    $('#compare-btn').click(function () {
        var link = $(this).attr('data-href');
        $(this).prop('disabled', true);
        window.location.replace(link);
    });

    $('.user #show-phone').click(function (){
        $('#shown_phone').fadeToggle();
    });

    $('.user #show-email').click(function(){
        $('#shown_email').fadeToggle();
    });

    $(document).ready(function() {
        var dialog_type = "{{old('type')?old('type'):''}}";

        if (dialog_type == "report") {
            $('#report_m').modal('show');
        } else if (dialog_type == "send_message") {
            $("#message_modal").modal('show');
        }
    });
</script>
@endsection