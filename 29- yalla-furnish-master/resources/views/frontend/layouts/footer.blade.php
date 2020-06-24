<footer class="py-2 shadow bg-white"  >
    <section class="scrollToTop">
        <button class="btn btn-info"><i class="fas fa-chevron-up"></i></button>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-2 px-2">
                <a href=""> <img class="footer-logo" src="{{asset('assets/site/images/yalla-footer.png')}}"  alt=""></a>
            </div>
            <div class="col-md-7 footer-links d-flex flex-column px-0">
                <div class="d-flex align-items-center">
                    <a href="{{route('user.get.about')}}" class="main-link mx-3 ">About Us</a>
                    <a href="{{route('user.get.terms')}}" class="main-link mx-3 text-bold">Terms & Privacy</a>
                    <a href="{{route('user.create.showroom')}}" class="main-link mx-3">Create Profile For Your Buisness</a>
                    <a href="{{route('user.get.contact')}}" class="main-link mx-3">Contact Us</a>
                    <!-- <a href="" class="main-link mx-3">five number </a> -->
                </div>
                <p class="pl-3 small text-muted">Yalla Furnish	&copy; 2020 All rights Reserved. Developed By <a target="_blank" href="http://www.minvotech.com/">Minvotech</a></p>
            </div>
            <div class="col-md-3 links social-links d-flex flex-column align-items-end px-2">
                <div class="d-flex align-items-center text-center justify-content-center flex-column">
                    <p class="d-inline small pb-1">Follow Us</p>
                    <div class="all-links">
                        <a target="_balnk" href="https://www.facebook.com/yallafurnish/" rel="noopener noreferrer" class="fab fa-facebook-f"></a>
                        <a target="_balnk" href="https://www.instagram.com/yallafurnish/" rel="noopener noreferrer" class="fab fa-instagram"></a>
                        <a target="_balnk" href="https://www.youtube.com/channel/UCym1Ssz-Vm4AXO_pJ_rZ6Dg" rel="noopener noreferrer" class="fab fa-youtube"></a>
                    </div>
                    
                    {{--<a href="" class="fab fa-youtube"></a>
                    <a href="" class="fab fa-twitter"></a>--}}
                </div>
                

                <!-- <p class="small text-muted text-center mt-1">Need Help <i class="fa fa-phone"></i> 0100 511 2392 </p> -->
            </div>

        </div>
    </div>
</footer>

<!--===== JavaScript Includes =====-->
<!--===== JavaScript Includes =====-->
<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  ></script>-->

{{-- <script src="{{asset('assets/site/js/jquery-3.1.1.js')}}"></script> --}}
<!--    popper-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<!--    bootstrap-->
<script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>
{{-- sweetalert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script src="{{asset('assets/site/js/bootstrap-select.min.js')}}"></script>
<!--    custome-->
<script src="{{asset('assets/site/js/index.js?rand?1234')}}"></script>
<script src="{{asset('assets/site/js/loader.js?rand=1234')}}"></script>
<script src="{{asset('assets/site/js/back-end.js?rand=1234')}}"></script>
<script src="{{asset('assets/site/js/jquery.disableAutoFill.min.js')}}"></script>
@yield('scripts')
@stack('scripts_stack') {{-- for showroom details page we need to push scripts in more than one way --}}
</body> 
</html>