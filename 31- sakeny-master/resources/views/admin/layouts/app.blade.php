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

    <link href="{{ url('backend') }}/assets/plugins/custombox/css/custombox.css" rel="stylesheet">

    <link href="{{url('backend') }}/assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('backend')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('backend')}}/assets/css/core.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('backend')}}/assets/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('backend')}}/assets/css/icons.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('backend')}}/assets/css/pages.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('backend')}}/assets/plugins/summernote/summernote.css" rel="stylesheet" />
     <link href="{{url('backend')}}/assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    {{-- <link href="{{url('backend')}}/assets/css/menu.css" rel="stylesheet" type="text/css"/> --}}

    <link href="{{ url('backend') }}/assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ url('backend') }}/assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ url('backend') }}/assets/plugins/datatables/fixedHeader.bootstrap.min.css" rel="stylesheet" type="text/css"/>
     <link href="{{ url('backend') }}/assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ url('backend') }}/assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ url('backend') }}/assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
    <link href="{{ url('backend') }}/assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ url('backend') }}/assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ url('backend') }}/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="{{ url('backend_general') }}/simple-line-icons.min.css" rel="stylesheet">
    <link href="{{ url('backend_general') }}/themify-icons.css" rel="stylesheet">
    <link href="{{ url('backend_general') }}/custom.style.css" rel="stylesheet">

    <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" />

    <link href="{{url('backend')}}/assets/css/responsive.css" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <script src="{{url('backend')}}/assets/js/modernizr.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>

    <style type="text/css">
        .btn-as-a{
            background: none;
            border: none;
        }
        .select2-close-mask{
            z-index: 2099099;
        }
        .select2-dropdown{
            z-index: 3051099;
        }
    </style>

    @yield('head')
    @stack('head')
</head>

<body class="fixed-left">


    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        @include('admin.layouts.header')
         <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->

       @include('admin.layouts.menu')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">

                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="btn-group pull-right m-t-15">
                            @yield('btn-actons')
                            <!-- <button type="button" class="btn btn-default dropdown-toggle waves-effect"
                                        data-toggle="dropdown"
                                        aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span>
                                </button>
                                <ul class="dropdown-menu drop-menu-right" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul> -->
                            </div>

                            <h4 class="page-title">@yield('title','Dashboard')</h4>
                            <ol class="breadcrumb">
                                <li> <i class="icon-home" style="margin-right: 5px"></i><a href="{{ url('/admin') }}">@lang('lang.dashboard')</a> </li>
                                @yield('breadcrumb','<li class="active">'.(@$module_name ? $module_name : 'Module').'</li>')
                            </ol>
                            <div class="container">
                                @include('admin.layouts.errors')
                            </div>
                            @yield('content')
                        </div>
                    </div>

                </div> <!-- container -->

            </div> <!-- content -->

            @include('admin.layouts.footer')

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

    <!-- jQuery  -->
    <script src="{{url('backend')}}/assets/js/jquery.min.js"></script>
    <script src="{{url('backend')}}/assets/js/bootstrap.min.js"></script>
    <script src="{{url('backend')}}/assets/js/detect.js"></script>
    <script src="{{url('backend')}}/assets/js/fastclick.js"></script>
    <script src="{{url('backend')}}/assets/js/jquery.slimscroll.js"></script>
    <script src="{{url('backend')}}/assets/js/jquery.blockUI.js"></script>
    <script src="{{url('backend')}}/assets/js/waves.js"></script>
    <script src="{{url('backend')}}/assets/js/wow.min.js"></script>
    <script src="{{url('backend')}}/assets/js/jquery.nicescroll.js"></script>
    <script src="{{url('backend')}}/assets/js/jquery.scrollTo.min.js"></script>
    <script src="{{url('backend')}}/assets/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

    <script src="{{ url('backend') }}/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- App core js -->
    <script src="{{url('backend')}}/assets/js/jquery.core.js"></script>
    <script src="{{url('backend')}}/assets/js/jquery.app.js"></script>

    <!-- plugins -->
    <script src="{{ url('backend') }}/assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>

    <script src="{{ url('backend') }}/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('backend') }}/assets/plugins/datatables/dataTables.bootstrap.js"></script>

    <script src="{{ url('backend') }}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

    <script src="{{url('backend')}}/assets/js/custom.js"></script>

    <!-- Modal-Effect -->
    <script src="{{ url('backend') }}/assets/plugins/custombox/js/custombox.min.js"></script>
    <script src="{{ url('backend') }}/assets/plugins/custombox/js/legacy.min.js"></script>

    <!--form summernote init-->
    <script src="{{ url('backend') }}/assets/plugins/summernote/summernote.min.js"></script>

    <!-- By: Mark Rady Dont remove this section  -->
    <script src="{{ url('backend') }}/assets/js/settings.js"></script>
    <script src="{{ url('backend') }}/assets/mark/prototype/string.js"></script>
    <script src="{{ url('backend') }}/assets/mark/ajax.js"></script>
    <script src="{{ url('backend') }}/assets/mark/helpers.js"></script>

    <script>
        $(document).ready(function() {
            
            $(".submit-form").submit(function(){
                $(this).find("button").append('<i class="fa fa-spinner fa-pulse"></i>').attr('disabled','disabled');
            });
        });

        $("#districts").dataTable();

    </script>
    
<script>
    $(document).ready(function() {
        $('.deleteProduct').on('click', function(e){
            e.preventDefault();
            var token = $(this).data("token");
            $href = $(this).attr("href");
            $(this).parent().fadeOut(500);
            $.ajax(
            {
                url: $href,
                type: 'DELETE',
                dataType: "JSON",
                data: {
                    "_token": token,
                },
                success: function (data)
                {
                    // location.reload();
                }
            });
            return false;
            console.log("It failed");
        });
    });
</script>
<script>
  // change and uppercase or space with [-] in page url input
  $(document).ready(function() {
    $('#page_url').bind('keyup keypress blur', function() {
        var myStr = $(this).val()
        myStr=myStr.toLowerCase();
        myStr=myStr.replace(/(^\s+|[^a-zA-Z0-9 ]+|\s+$)/g,"-");
        myStr = myStr.toLowerCase().replace(/ /g, '-');
        $(this).val(myStr); 
      });
  });
</script>

@yield('script')
@stack('script')

</body>
</html>
