<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Yalla | Creator</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon-->
    <link rel="icon" href="{{asset('assets/favicon.ico')}}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap Core Css -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{asset('assets/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{asset('assets/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('assets/css/themes/all-themes.css')}}" rel="stylesheet" />
    <style>
        .bs-searchbox {
            max-width: 95% !important;
            padding-left: 15px !important;
        }
    </style>
    <link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{ route('user.my.profile') }}">My Profile</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- Horizontal Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        Create Idea
                    </h2>
                </div>
                <div class="body">
                    @include('admin.layouts.errors')
                    @include('admin.layouts.message')
                    <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('creator.create.post')}}">
                        {{ csrf_field() }}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>* English Name</b>
                                </p>
                                <textarea id="name_en" required type="text" value="{{old('name_en')}}" class="form-control editor" name="name_en">{{old('name_en')}}</textarea>
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>* Arabic Name</b>
                                </p>
                                <textarea id="name_ar" required type="text" value="{{old('name_ar')}}" class="form-control editor" name="name_ar">{{old('name_ar')}}</textarea>
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="col-md-12">
                            <p>
                                <b>* categories (up to 10)</b>
                            </p>
                            <select id="categories" required name="categories[]" class="form-control show-tick" multiple>
                                @foreach($categories as $category)
                                <option @if(old('categories')!==null) {{in_array($category->id,old('categories'))?'selected':''}} @endif value="{{$category->id}}">{{$category->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-float" style="width:90%">
                            <label class="form-label">* Idea image </label>
                            <div class="form-line">
                                <input style="margin-left: 50px;" type="file" multiple="multiple" id="uploadimgs" hidden class="form-control" name="idea_image" required>
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="images-preview" style="display: -webkit-box;"></div>
                        <!-- add paragraph -->
                        <hr>
                        <div id="paragraphs">
                            <h3>
                                New Paragraph
                            </h3>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <p>
                                        <b>English Title</b>
                                    </p>
                                    <textarea id="new_title_en" type="text" value="" class="form-control editor" name="paragraphs[0][title_en]"></textarea>
                                </div>
                                <div class="help-info"></div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <p>
                                        <b>Arabic Title</b>
                                    </p>
                                    <textarea id="new_title_ar" type="text" value="" class="form-control editor" name="paragraphs[0][title_ar]"></textarea>
                                </div>
                                <div class="help-info"></div>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label">English Description</label>
                                <div class="form-line">
                                    <textarea id="description_en" name="paragraphs[0][description_en]" cols="30" rows="5" class="form-control no-resize editor"></textarea>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label">Arabic Description</label>
                                <div class="form-line">
                                    <textarea id="description_ar" name="paragraphs[0][description_ar]" cols="30" rows="5" class="form-control no-resize editor"></textarea>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <p>
                                        <b>Youtube Link</b>
                                    </p>
                                    <input type="url" value="" class="form-control" name="paragraphs[0][youtube_link]">
                                </div>
                                <div class="help-info"></div>
                            </div>
                            <div class="form-group form-float" style="width:90%">
                                <label class="form-label">Paragraph image </label>
                                <div class="form-line">
                                    <input style="margin-left: 50px;" type="file" hidden class="form-control" name="paragraphs[0][image]">
                                </div>
                                <div class="help-info"></div>
                            </div>
                            <div class="col-md-12">
                                <p>
                                    <b>Image Position</b>
                                </p>
                                <select name="paragraphs[0][position]" required class="form-control show-tick">
                                    <option>top</option>
                                    <option>bottom</option>
                                    <option>left</option>
                                    <option>right</option>
                                </select>
                            </div>
                        </div>
                        <button data-number="1" class="btn btn-primary waves-effect" id="add-paragraph" type="button">Add Paragraph</button>
                        <button class="btn btn-primary waves-effect" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap Core Js -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.js')}}"></script>
    <!-- Select Plugin Js -->
    <script src="{{asset('assets/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('assets/plugins/node-waves/waves.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{asset('assets/js/admin.js')}}"></script>
    <script src="{{asset('assets/js/demo.js')}}"></script>

    {{-- sweetalert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <!-- Validation Plugin Js -->
    <script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>
    <script src="{{asset('assets/js/addIdea.js?rand=123')}}"></script>
    <script src="{{asset('assets/js/ckeditor/ckeditor.js?rand=123')}}"></script>
    <script>
        $('.editor').each(function() {
            var id = $(this).attr('id');
            var textarea = document.getElementById(id);
            CKEDITOR.replace(textarea);
        });
        $('.editor').each(function() {
            $(this).removeClass('editor')
        });
    </script>
</body>

</html>