@if(app()->getLocale()=='ar' && Route::currentRouteName()=='user.index')
<!--    ===== How to use =====-->
<!--    ===== How to use =====-->
<section class=" py-5">
    <div class="container">
        <div class="title">
            <h3> كيف تستفيد من سكني؟</h3>
        </div>
        <div class="row py-2">
            <div class="col-12 " style="text-align: right">
                <p class="h5">للاستفادة من محرك بحث سكني للعقارات والحصول على أفضل النتائج:</p>
                <p>
                    ابدأ عملية البحث عن عقارك باختيار المدينة التي تريد السكن بها ثم تحديد المنطقة أو الحي داخل المدينة ليتم إظهار كل العقارات المعروضة للبيع أو للإيجار داخل المدينة والحي المطلوب،
                    - على سبيل المثال: يمكنك اختيار المدينة: القاهرة ثم المنطقة: مصر الجديدة فيظهر أمامك كل إعلانات العقارات المعروضة للبيع أو للشراء في مدينة القاهرة، حي مصر الجديدة.
                    <br><br>قم باختيار حالة العقار الذي تبحث عنه ( عقار للبيع / عقار للإيجار ) كما يمكنك اختيار نوع العقار (شقة ، فيلا ، شاليه ، دوبلكس ، عيادة ، أراضي ، طابق كامل أو مجمع سكني كامل).
                    <br><br>
                    قم بتحديد السعر المناسب لك عن طريق تحديد أقل سعر أو أقصي سعر أو كلاهما معًا للعقار المعروض للبيع (الذي تبحث عنه)
                    <br> <br>
                    كما يمكنك أيضًا الحصول على نتائج أكثر دقة عن طريق تحديد المساحة الكلية التي تريدها للعقار، فقط قم باختيار أقل مساحة للعقار وأقصي مساحة للعقار.
                    <br> <br>
                    وفي حالة البحث عن شقق للبيع أو شقق للإيجار يمكنك اختيار عدد الغرف المطلوب داخل الوحدة عن طريق تحديد أقل عدد للغرف و أقصي عدد للغرف.
                    <br><br>
                    <a style="color: #a63082;" title="{{trans('lang.Contactus')}}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.contact_us') }}">
                        اذا واجهتك اى مشكلة لا تتردد في الاتصال بنا الآن.
                    </a>

                </p>
            </div>
        </div>
    </div>
</section>

{{-- contact us  --}}
{{-- <section class="companies py-5">
        <div class="container">
            <div class="title">
                <a class="nav-item nav-link active" title="{{trans('lang.Home Page')}}" href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.contact_us') }}"> <h3>{{trans('lang.Contactus')}}</h3></a>
</div>
</div>
</section> --}}
@endif
<!--===== Footer =====-->
<!--===== Footer =====-->
<footer class="pt-5">
    <div class="container">
        <div class="row pb-5">
            <div class="col-md-4 brand text-left my-2">
                <a href="{{route('user.index',app()->getLocale())}}"><img src="{{url('site')}}/icons/logo-sakenypng.png" alt=""></a>
            </div>

            <div class="col-md-4 text-left my-2">
            </div>

            <div class="col-md-4 text-left my-2">
                <h3 class="head">{{trans('lang.follow us')}}</h3>
                <ul class="footer-social-link list-unstyled list-inline pt-3">
                    <li class="list-inline-item"><a href="{{ $setting->facebook }}" target="_blank"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="{{ $setting->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="{{ $setting->linkedIn }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <li class="list-inline-item"><a href="{{ $setting->instgram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="list-inline-item"><a href="{{ $setting->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 text-left my-2">
                <h3 class="head">{{trans('lang.popular_search')}}</h3>
                <ul class="list-unstyled ">

                    {{-- @foreach($popular_ads as $ad)
                    <a href="{{route('user.ad.get',['id'=>$ad['id'],'lang'=>app()->getLocale(),'ad_name'=>str_replace('+','-',urlencode(str_replace('/','',$ad['title'])))])}}">
                    <li>{{$ad['title']}}</li>
                    </a>
                    @endforeach --}}

                    <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.properties_for_sale_apartments_only') }}">
                        <li>{{trans('lang.apartments_for_sale_url_title')}}</li>
                    </a>

                    <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.properties_for_rent_apartments_only') }}">
                        <li>{{trans('lang.apartments_for_rent_url_title')}}</li>
                    </a>


                    <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.properties_for_sale_apartments_only_by_district', ["id" => 74]) }}">
                        <li>{{trans('lang.apartments_for_sale_url_title_74')}}</li>
                    </a>

                    <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.properties_for_sale_apartments_only_by_district', ["id" => 85]) }}">
                        <li>{{trans('lang.apartments_for_sale_url_title_85')}}</li>
                    </a>

                    <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.properties_for_sale_apartments_only_by_district', ["id" => 31]) }}">
                        <li>{{trans('lang.apartments_for_sale_url_title_31')}}</li>
                    </a>

                    <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.properties_for_sale_apartments_only_by_district', ["id" => 68]) }}">
                        <li>{{trans('lang.apartments_for_sale_url_title_68')}}</li>
                    </a>


                </ul>
            </div>

            <div class="col-md-4 text-left my-2">
                <h3 class="head">{{trans('lang.popular_areas')}}</h3>
                <ul class="list-unstyled">


                    {{-- @foreach($popular_areas as $area)
                    <a href="{{route('user.district.ads',['area_id'=>$area->id,'lang'=>app()->getLocale()])}}">
                    <li>@if(app()->getLocale()=='en') {{$area->name_en}} @else {{$area->name_ar}} @endif</li>
                    </a>
                    @endforeach --}}
                    {{-- <a href="{{route('user.district.ads',['area_id'=> 23,'lang'=>app()->getLocale()])}}">
                    <li>{{trans('lang.properties_for_sale_url_title_23')}}</li>
                    </a> --}}

                    <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.search_ads_by_district', ["id" => 23]) }}">
                        <li>{{trans('lang.properties_for_sale_url_title_23')}}</li>
                    </a>


                    {{-- this will be when u sent that footer  research --}}
                    {{-- <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.search_ads_by_district', ["slug" => app()->getLocale() == 'ar' ? $name_ar :$name_en ]) }}">
                    <li>{{trans('lang.properties_for_sale_url_title_23')}}</li>
                    </a> --}}
                    {{-- <a href="{{route('user.district.ads',['area_id'=> 31,'lang'=>app()->getLocale()])}}">
                    <li>{{trans('lang.properties_for_sale_url_title_31')}}</li>
                    </a> --}}

                    <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.search_ads_by_district', ["id" => 31]) }}">
                        <li>{{trans('lang.properties_for_sale_url_title_31')}}</li>
                    </a>


                    {{-- <a href="{{route('user.district.ads',['area_id'=> 85,'lang'=>app()->getLocale()])}}">
                    <li>{{trans('lang.properties_for_sale_url_title_85')}}</li>
                    </a> --}}

                    {{-- <a href="{{route('user.district.ads',[ 'lang'=>app()->getLocale() , 'area_id'=> 74])}}">
                    <li>{{trans('lang.properties_for_sale_url_title_74')}}</li>
                    </a> --}}

                    <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.search_ads_by_district', ["id" => 74]) }}">
                        <li>{{trans('lang.properties_for_sale_url_title_74')}}</li>
                    </a>

                    <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.search_ads_by_district', ["id" => 85]) }}">
                        <li>{{trans('lang.properties_for_sale_url_title_85')}}</li>
                    </a>


                    <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.search_ads_by_district', ["id" => 68]) }}">
                        <li>{{trans('lang.properties_for_sale_page_title_68')}}</li>
                    </a>

                    <a href="{{ LaravelLocalization::getURLFromRouteNameTranslated( app()->getLocale() , 'routes.search_ads_by_district', ["id" => 29]) }}">
                        <li>{{trans('lang.properties_for_sale_url_title_29')}}</li>
                    </a>


                </ul>
            </div>

            <div class="col-md-4 text-left my-2 contact">
                <h3 class="head">{{trans('lang.contact_us')}}</h3>
                <aside class="text-white h5"> <i class="far fa-envelope"></i> info@sakeny.com </aside>
                {{--<aside class="text-white h5"> <i class="fas fa-phone"></i> 01551664466 </aside>--}}
            </div>

        </div>

        <div class="row">
            <div class="col-md-12 text-center pt-3 border-top">
                <p class=" text-light"> Copyright © 2019 Sakeny By <span style="color: #ce46ff">Minvotech</span></p>
            </div>
        </div>

    </div>
</footer>


<script src="{{url('site')}}/js/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js" integrity="sha256-uckMYBvIGtce2L5Vf/mwld5arpR5JuhAEeJyjPZSUKY=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" integrity="sha256-z6FznuNG1jo9PP3/jBjL6P3tvLMtSwiVAowZPOgo56U=" crossorigin="anonymous"></script>
<script src="{{url('site')}}/js/popper.js"></script>
<script src="{{url('site')}}/js/bootstrap.min.js"></script>
<script src="{{url('site')}}/js/index.js"></script>
@if(Session::has('need_to_assign_phone') || old('type')=='assign_phone')
<script>
    $('#assign-phone-modal').modal('show')
</script>
@endif
@if(Session::has('success_assign_phone'))
<script>
    console.log('dasda')
    $('#assign-phone-success').modal('show')
</script>
@endif
@yield('scripts')
</body>

</html>