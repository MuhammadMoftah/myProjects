<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="author" content="Mark Rady"> -->
    <!-- App Favicon icon -->
    <link rel="shortcut icon" href="{{url('backend')}}/assets/images/favicon.ico">
    <!-- App Title -->
    <title>@yield('title','Dashboard')</title>
    <link href="{{url('backend') }}/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('backend')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('backend')}}/assets/css/core.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('backend')}}/assets/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('backend')}}/assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('backend')}}/assets/css/pages.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('backend')}}/assets/css/menu.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('backend')}}/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('css')}}/mystyle.css" rel="stylesheet" type="text/css"/>
    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="{{url('backend')}}/assets/js/modernizr.min.js"></script>
</head>

<body>

    <div class="wrapper">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- Validation Messages -->
                    <div class="clearfix"></div>
                      @include('layouts.errors')
                    <div class="clearfix"></div>
                </div>
            </div>

        </div> <!-- end container -->
    </div>
    @yield('content')
</body>
</html>
