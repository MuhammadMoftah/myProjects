<!DOCTYPE html>
<html>

<head lang="en">
    <!-- Google Tag Manager -->

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':

                    new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],

                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=%27+i+dl;f.parentNode.insertBefore(j,f)';
        })(window, document, 'script', 'dataLayer', 'GTM-TG799SB');
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/site/css/index.css?rand=4000')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/loader.css?rand=4000')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('assets/site/images/Fav-Icon.jpg?rand=300')}}" />

    <script src="{{asset('assets/site/js/jquery-3.1.1.js')}}"></script>

    @yield('styles')

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144259104-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-144259104-4');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '2165316983569493');
        fbq('track', 'PageView');
        @yield('fb_pixel_events')
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=2165316983569493&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->

    <title>@if(isset($pageTitle)) {{$pageTitle}} @else Yalla-furnish @endif</title>
    <meta name="ahrefs-site-verification" content="25e782f7f534f2ecb46f7a284a53f30f1b98728bd45367f659f21ade55c1854e">
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TG799SB" ; height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!--===== Loader =====-->
    <div class="loader">
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <header>
        <div class="upper-head py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 justify-content-start">
                        <a class="navbar-brand" href="{{route('user.index')}}">
                            <img src="{{asset('assets/site/images/Logo.png')}}" alt="">
                        </a>
                    </div>
                    @yield('search')
                    <div class="col-lg-4  justify-content-end">
                        @if(auth()->guard('user')->check())
                        <ul class="list-unstyled my-0">
                            <a href="{{ url('MyProfile?open=compare') }}" class="mr-2">
                                <li class="list-inline-item"><i class="fas fa-sync-alt"></i>
                                </li>
                            </a>
                            <a href="{{ route('user.background.set') }}" class="mr-2">
                                <li class="list-inline-item"><i class="fas fa-play"></i>
                                </li>
                            </a>
                            <a href="{{ route('user.my.messages') }}" class="mr-2">
                                <li class="list-inline-item"><i class="fas fa-envelope"></i></li>
                            </a>

                            <div class="dropdown">
                                @php $notifications = auth('user')->user()->unreadNotifications; @endphp
                                @if(count($notifications)>0)
                                <span class="badge badge-danger">{{$notifications->count()}}</span>
                                @endif
                                <li class="list-inline-item" id="notification" data-toggle="dropdown"><i class="fas fa-bell"></i></li>
                                <div class="dropdown-menu" aria-labelledby="notification" style="padding: 10px;">
                                    @if(count($notifications))
                                    @foreach ($notifications as $notification)
                                    <a title="{{$notification->data['message']}}" target="_blank" class="dropdown-item" href="{{route('user.read.notification',$notification->id)}}">
                                        {{$notification->data['message']}}
                                    </a>
                                    @endforeach
                                    @else
                                    No Notifications
                                    @endif
                                </div>
                            </div>

                            <div class="dropdown">
                                <li class="list-inline-item" id="dropdownMenuButton" data-toggle="dropdown"><i class="fas fa-user-tie"></i></li>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('user.my.profile')}}">My Profile</a>
                                    @if(count($user_showrooms))
                                    @foreach ($user_showrooms as $user_showroom)
                                    <a class="dropdown-item" href="{{route('user.my.dashboardChat',$user_showroom->id)}}">
                                        {{ $user_showroom->name_en }} Dashboard
                                    </a>
                                    @endforeach
                                    @endif
                                    <a class="dropdown-item" href="{{route('user.create.showroom')}}">Create a profile
                                        for
                                        your business</a>
                                    <a class="dropdown-item" href="{{route('user.logout')}}">Logout</a>
                                </div>
                            </div>
                        </ul>
                        @else
                        <div class="before-login">
                            <a href="{{ route('user.login.get') }}" class="btn main-btn border">Login</a>
                            <a href="{{ route('user.register.get') }}" class="btn main-btn border">Register</a>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>

        <!--===== NavBar =====-->
        <nav class="navbar navbar-expand-lg navbar-dark px-0 bg-white border">
            <div class="container px-0">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ">
                        <a class="nav-item nav-link" href="{{route('user.index')}}" @if(\Route::currentRouteName()=='user.index' ) style="color: var(--clr2) !important; font-weight: bold;" @endif>
                            Home
                        </a>
                        <a class="nav-item nav-link" href="{{route('user.get.products')}}" @if(\Route::currentRouteName()=='user.get.products' ) style="color: var(--clr2) !important; font-weight: bold;" @endif>
                            Products
                        </a>
                        <a class="nav-item nav-link" href="{{route('user.get.showrooms')}}" @if(\Route::currentRouteName()=='user.get.showrooms' ) style="color: var(--clr2) !important; font-weight: bold;" @endif>
                            Stores & Showrooms
                        </a>
                        <a class="nav-item nav-link" href="{{route('user.get.offers')}}" @if(\Route::currentRouteName()=='user.get.offers' ) style="color: var(--clr2) !important; font-weight: bold;" @endif>
                            Latest Offers
                        </a>
                        <a class="nav-item nav-link" href="{{ route('get_all_ideas') }}" @if(\Route::currentRouteName()=='get_all_ideas' ) style="color: var(--clr2) !important; font-weight: bold;" @endif>
                            News & Ideas
                        </a>
                        <a class="nav-item nav-link" href="{{route('user.get.topics')}}" @if(\Route::currentRouteName()=='user.get.topics' ) style="color: var(--clr2) !important; font-weight: bold;" @endif>
                            Community
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>