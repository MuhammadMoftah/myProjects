<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Yalla | Creator</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <meta name="admin-token" content="{{ auth()->guard('web')->user()->id }}"> --}}

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
                        Update Idea
                    </h2>
                </div>
                <div class="body">
                    @include('admin.layouts.message')
                    @include('admin.layouts.errors')
                    <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('creator.update',['id' => $idea->id])}}">
                        {{ csrf_field() }}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>* English Name</b>
                                </p>
                                <textarea required id="name_en" type="text" value="{{$idea->name_en}}" class="form-control editor" name="name_en">{{$idea->name_en}}</textarea>
                                <p style="color: red">{{ $errors->has('name_en')?$errors->first('name_en'):'' }}
                                </p>
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>* Arabic Name</b>
                                </p>
                                <textarea required id="name_ar" type="text" value="{{$idea->name_ar}}" class="form-control editor" name="name_ar">{{$idea->name_ar}}</textarea>
                                <p style="color: red">{{ $errors->has('name_ar')?$errors->first('name_ar'):'' }}
                                </p>
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="col-md-12">
                            <p>
                                <b>* categories (up to 10)</b>
                            </p>
                            <select required name="categories[]" class="form-control show-tick" multiple>
                                @foreach($categories as $category)
                                <option {{in_array($category->id,$idea->categories->pluck('id')->all())?'selected':''}} value="{{$category->id}}">{{$category->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        <img src="{{ $idea->idea_image }}" width="200px" height="160px" alt="">
                        <div class="form-group form-float" style="width:90%">
                            <label class="form-label">* Idea image </label>
                            <div class="form-line">
                                <input style="margin-left: 50px;" type="file" multiple="multiple" id="uploadimgs" hidden class="form-control" name="idea_image">
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="images-preview" style="display: -webkit-box;"></div>
                        <button class="btn btn-primary waves-effect submmit" type="submit">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
                <div class="header">
                    <h2>
                        New Paragraph
                    </h2>
                </div>
                <div class="body">

                    <form id="form_advanced_validation" enctype="multipart/form-data" action="{{route('creator.paragraphs.post',$idea->id)}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>English Title</b>
                                </p>
                                <textarea id="new_title_en" type="text" value="" class="form-control editor" name="title_en"></textarea>
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>Arabic Title</b>
                                </p>
                                <textarea id="new_title_ar" type="text" value="" class="form-control editor" name="title_ar"></textarea>
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">English Description</label>
                            <div class="form-line">
                                <textarea id="description_en" name="description_en" cols="30" rows="5" class="form-control no-resize editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Arabic Description</label>
                            <div class="form-line">
                                <textarea id="description_ar" name="description_ar" cols="30" rows="5" class="form-control no-resize editor"></textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>Youtube Link</b>
                                </p>
                                <input type="url" class="form-control" name="youtube_link">
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="form-group form-float" style="width:90%">
                            <label class="form-label">Paragraph image </label>
                            <div class="form-line">
                                <input style="margin-left: 50px;" type="file" hidden class="form-control" name="image">
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="form-group form-float">
                            <p>
                                <b>Image Position</b>
                            </p>
                            <select required name="position" class="form-control show-tick">
                                <option>top</option>
                                <option>bottom</option>
                                <option>left</option>
                                <option>right</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="active" name="active">
                            <label for="active">Active</label>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach($idea->paragraphs as $paragraph)
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <div class="card">
                <div class="header">
                    <h2>
                        Edit Paragraph
                    </h2>
                </div>
                <div class="body">

                    <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('creator.paragraphs.update',$paragraph->id)}}">
                        {{csrf_field()}}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>English Title</b>
                                </p>
                                <textarea id="title_en_{{$paragraph->id}}" type="text" value="{{$paragraph->title_en}}" class="form-control editor" name="title_en">{{$paragraph->title_en}}</textarea>
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>Arabic Title</b>
                                </p>
                                <textarea id="title_ar_{{$paragraph->id}}" type="text" value="{{$paragraph->title_ar}}" class="form-control editor" name="title_ar">{{$paragraph->title_ar}}</textarea>
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">English Description</label>
                            <div class="form-line">
                                <textarea id="description_en_{{$paragraph->id}}" id="description_en" value="{{$paragraph->description_en}}" name="description_en" cols="30" rows="5" class="form-control no-resize editor">{{$paragraph->description_en}}</textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <label class="form-label">Arabic Description</label>
                            <div class="form-line">
                                <textarea id="description_ar_{{$paragraph->id}}" name="description_ar" value="{{$paragraph->description_ar}}" cols="30" rows="5" class="form-control no-resize editor">{{$paragraph->description_ar}}</textarea>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>
                                    <b>Youtube Link</b>
                                </p>
                                <input type="url" value="{{$paragraph->youtube_link}}" class="form-control" name="youtube_link">
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <img src="{{ $paragraph->image }}" width="200px" height="160px" alt="">
                        <div class="form-group form-float" style="width:90%">
                            <label class="form-label">Paragraph image </label>
                            <div class="form-line">
                                <input style="margin-left: 50px;" type="file" hidden class="form-control" name="image">
                            </div>
                            <div class="help-info"></div>
                        </div>
                        <div class="form-group form-float">
                            <p>
                                <b>Image Position</b>
                            </p>
                            <select required name="position" class="form-control show-tick">
                                <option {{$paragraph->position=='top'?'selected':''}}>top</option>
                                <option {{$paragraph->position=='bottom'?'selected':''}}>bottom</option>
                                <option {{$paragraph->position=='left'?'selected':''}}>left</option>
                                <option {{$paragraph->position=='right'?'selected':''}}>right</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input {{$paragraph->active==1?'checked':''}} type="checkbox" id="active_{{$paragraph->id}}" name="active">
                            <label for="active_{{$paragraph->id}}">Active</label>
                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">Update</button>
                        <a class="btn btn-danger waves-effect" href="{{route('creator.paragraphs.delete',$paragraph->id)}}">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

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

    <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    <script src="{{asset('assets/js/notification.js')}}"></script>
    {{-- sweetalert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <!-- Validation Plugin Js -->
    <script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
    <script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>
    <script src="{{asset('assets/js/addIdea.js')}}"></script>
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