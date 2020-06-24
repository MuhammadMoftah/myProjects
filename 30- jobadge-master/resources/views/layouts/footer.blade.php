<!-- ===== Footer ===== -->
<!-- ===== Footer ===== -->
<footer class="container-footer">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6 col-lg-3">
                <div class="footer-about-us">
                    <img src="{{ asset('site/images/logo/logo-white.png') }}" width="100px" style="position:absolute"
                        alt="">
                    <p class="about-us-desc">
                        Established in 2017 we’re one of the leading job boards in MENA region that help companies reach
                        qualified candidates and provide a large pool of opportunities for job seekers.
                        “find the best, keep the best “
                    </p>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <h5 style="font-weight:bold; color:#828128;">Employers</h5>
                <ul class="footer-menu">
                    <li><a href="{{route('company.job.create')}}" title="">Post a job</a></li>
                    <li><a href="{{route('company.cvs.get')}}" title="">Search CVs</a></li>
                    {{--<li><a href="#" title="">Pricing</a></li>--}}
                </ul>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <h5 style="font-weight:bold; color:#828128;">Contact Us</h5>
                <div class="footer-contact-info">
                    <div class="contact-info">
                        {{-- <span class="icon icon-at"></span> --}}
                        <a href="{{route('user.contactus')}}">
                            Need help? Contact us now
                        </a>
                        <ul class="footer-social-media my-2">
                            <li>
                                <a target="_blank" href="https://www.facebook.com/jobadge.rec/" title="">
                                    <span style="font-size: 20px;" class="fab fa-facebook-square"></span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://twitter.com/jobadge_rec" title="">
                                    <span style="font-size: 20px;" class="fab fa-twitter-square"></span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://www.linkedin.com/company/jobadge/" title="">
                                    <span style="font-size: 20px;" class="fab fa-linkedin"></span>
                                </a>
                            </li>
                            <li>
                                <a target="_blank" href="https://www.instagram.com/jobadge.rec/" title="">
                                    <span style="font-size: 20px;" class="fab fa-instagram"></span>
                                </a>
                            </li>
                        </ul>
                        
                        {{-- <span class="contact-info-text">info@jobadge.com</span> --}}
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <h5 style="font-weight:bold; color:#828128;">Our Profile</h5>
                <ul class="footer-menu">
                    <li><a href="{{route('user.aboutus')}}" title="">About Us</a></li>
                    <li><a href="{{route('web.blog.user.home')}}" target="_blank"  title="">Blog</a></li>
                    <!-- <li><a href="{{route('user.contactus')}}" title="">Contact Us</a></li> -->
                    {{--<li><a href="#" title="">Feedback</a></li>--}}
                </ul>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="footer-line"></div>
        <div class="row">

            <!-- <div class="col-12 col-md-6">
                <ul class="footer-social-media">
                    <li><a target="_blank" href="https://www.facebook.com/jobadge.rec/" title=""><span
                                class="icon icon-facebook-logo"></span></a></li>
                    <li><a target="_blank" href="https://twitter.com/jobadge_rec" title=""><span
                                class="icon icon-twitter-logo"></span></a></li>
                    <li><a target="_blank" href="https://www.linkedin.com/company/jobadge/" title=""><span
                                style="font-size: 20px;" class="fab fa-linkedin"></span></a></li>
                    <li><a target="_blank" href="https://www.instagram.com/jobadge.rec/" title=""><span
                                style="font-size: 20px;" class="fab fa-instagram"></span></a></li>
                </ul>
            </div> -->

            <div class="col-12">
                <p class="footer-copyright text-center">
                    Copyright 2019 <span>JoBadge</span>. All rights reserved.
                </p>
            </div>

        </div>
    </div>
</footer>





<!--===== JavaScript Includes =====-->
<!--===== JavaScript Includes =====-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<!--    script-->
<script src="{{asset('site/js/script.min.js')}}"></script>
<!--    popper-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<!--    bootstrap-->
<script src="{{asset('site/js/bootstrap.min.js')}}"></script>
@yield('modal_scripts')
<!-- loader -->
<script src="{{asset('site/js/loader.js')}}"></script>
<script type="text/javascript" src="{{asset('site/js/customerSupport.js')}}"></script>
@yield('scripts')
@if(Route::currentRouteName()!='user.index')
<!-- for pushing notification -->
<script src="https://www.gstatic.com/firebasejs/5.9.4/firebase.js"></script>
<script type="text/javascript">
    var url = "{{route('user.setFcm')}}";

</script>
{{-- sweetalert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script type="text/javascript" src="{{asset('site/js/notification.js')}}"></script>
<script type="text/javascript" src="{{asset('site/js/index.js')}}"></script>
@endif
</body>
@if(auth("user")->check() && auth("user")->user()->full_register == false && Route::current()->getName() != "user.profile.manage" && Route::current()->getName() !="user.profile" )
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
   toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": true,
        "onclick": ()=> window.location.href = "{{ route('user.profile')}}" ,
        "showDuration": "30000",
        "hideDuration": "10000",
        "timeOut": "90000",
        "extendedTimeOut": "10000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
     }
     toastr.warning(' click to complete!', 'Complete Basic information')

</script>

@endif
</html>
