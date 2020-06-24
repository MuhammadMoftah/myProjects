@extends('frontend.master')
@section('styles')
<style>
    .canvas-container {
        max-width: 100%;
        overflow: hidden
    }

    .product-modal .one-product .product-img {
        background-repeat: no-repeat;
        width: 100%;
        height: 200px;
        display: block;
        border: 1px solid #ebebeb;
        background-position: center;
        background-size: cover;
        margin: auto;
        border-radius: 10px;
    }

    .product-modal .one-product .product-img.active {
        border: 2px solid var(--clr1);
    }

    .product-modal .one-item {
        display: inline-block;
    }

    .product-modal .one-item .item-img {
        background-repeat: no-repeat;
        width: 200px;
        height: 200px;
        display: block;
        border: 1px solid #ebebeb;
        background-position: center;
        background-size: cover;
        margin: 5px;
        border-radius: 10px;

    }

    .product-modal .one-item .item-img:hover {
        cursor: pointer;
        box-shadow: 1px 1px 5px black;
    }
</style>
@endsection
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<div class="container mb-4">
    <h1 class="h3 py-3">Design Your Home</h1>
    <div class="my-2 p-2 bg-white rounded">
        <a download="MyDesign.jpg" href="" class="btn main-btn" id="save-download" onclick="download_img(this);"><i class="fas fa-cloud-download-alt"></i> <br> Download</a>
        <a  href="{{url('/')}}" class="btn main-btn" ><i class="fas fa-sign-out-alt"></i> <br> Exit</a>
        <button class="btn main-btn float-right mx-1" id="remove"> <i class="far fa-trash-alt"></i> <br> Remove</button>

        <button class="btn main-btn float-right mx-1" id="add-text"> <i class="fas fa-font"></i> <br> Add Text</button>
        <button class='btn main-btn pri-btn float-right mx-1' data-toggle="modal" data-target="#ProductModal"> <i class="fas fa-couch"></i> <br> Products</button>
        <button class='btn main-btn pri-btn float-right mx-1' data-toggle="modal" data-target="#listedProducts"> <i class="fas fa-couch"></i> <br> List Of Products</button>

        <div class="">
            <div class='tool-control'>
                <ul id='frameList' class="product-images">
                </ul>
            </div>
            <div id="download-link">

            </div>
            
        </div>
    </div>
    <canvas id="c"></canvas>
</div>
<div class="modal fade product-modal" id="ProductModal">
    <!-- Product Modal -->
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <input class="form-control w-75" data-href="{{route('user.design',['background'=>request('background'),'type'=>request('type')])}}" id="filter" type="text" placeholder='Keyword'>
                <input data-href="{{route('user.design',['background'=>request('background'),'type'=>request('type')])}}" type="number" class="form-control ml-2 price_id" id="max_price" min="0" placeholder="Max Price" max="{{ isset($max_price) ? $max_price : ' 1000000' }}">
                <input data-href="{{route('user.design',['background'=>request('background'),'type'=>request('type')])}}" type="number" class="form-control ml-2 price_id" id="max_height" min="0" placeholder="Max Height">
                <input data-href="{{route('user.design',['background'=>request('background'),'type'=>request('type')])}}" type="number" class="form-control ml-2 price_id" id="max_width" min="0" placeholder="Max Width">
                <input data-href="{{route('user.design',['background'=>request('background'),'type'=>request('type')])}}" type="number" class="form-control ml-2 price_id" id="max_depth" min="0" placeholder="Max Depth">
                <select id="style" data-href="{{route('user.design',['background'=>request('background'),'type'=>request('type')])}}" class="form-control ml-2 style_id">
                    <option value="">All Style</option>
                    @if ($styles)
                    @foreach ($styles as $style)
                    <option value="{{ $style->id }}">{{ $style->name_en }}</option>
                    @endforeach
                    @endif
                </select>
                <select id="category" data-href="{{route('user.design',['background'=>request('background'),'type'=>request('type')])}}" class="form-control ml-2 style_id">
                    <option value="">All Categories</option>
                    @if ($categories)
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name_en }}</option>
                    @endforeach
                    @endif
                </select>
                <select id="color" data-href="{{route('user.design',['background'=>request('background'),'type'=>request('type')])}}" class="form-control ml-2 style_id">
                    <option value="">All Colors</option>
                    @if ($colors)
                    @foreach ($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name_en }}</option>
                    @endforeach
                    @endif
                </select>
            </div>

            <div id="products_container">
                @include('frontend.includes.design_products')
            </div>
        </div>
    </div>
</div>
<div class="modal fade product-modal" id="listedProducts">
    <!-- Product Modal -->
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div id="listed_container">
                @include('frontend.includes.user_products')
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/site/js/fabric.min.js')}}"></script>
<script type="text/javascript">
    var canvas = new fabric.Canvas('c');

    var background = "{{$background}}";

    function setBackground(background) {
        fabric.Image.fromURL(background, function(img) {
            img.set({
                scaleX: 0.9,
                width: 1200,
                height: 700
            });

            canvas.setBackgroundImage(img, canvas.renderAll.bind(canvas));
            canvas.setWidth(1200);
            canvas.setHeight(700);
        });

        fabric.Image.fromURL("{{asset('assets/site/images/Logo.png')}}", function(myImg) {
            var img1 = myImg.set({
                top: 650,
                left: 5,
                scaleX: 0.3,
                scaleY: 0.3,
            });
            img1.selectable = false;
            canvas.add(img1);
            canvas.calcOffset();
            canvas.renderAll();
            setTimeout(function() {
                $('.loader').hide();
            }, 3500);
        });
    }

    function storeImage(type, background, id = null) {
        $('.loader').show();
        var url = "{{route('user.storeBackground')}}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: url,
            data: {
                image: background,
                type: type
            },
            success: function(data) {
                if (type == 'background' && !id) {
                    setBackground(data);
                } else {
                    addImageToCanvas(data, id);
                }
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    storeImage('background', background);

    function addImageToCanvas(url, id) {
        fabric.Image.fromURL(url, function(xImg) {
            xImg.set({
                scaleX: 0.5,
                scaleY: 0.5,
                id: id
            });
            canvas.add(xImg);
        });
        canvas.setWidth(1200);
        canvas.setHeight(700);
        canvas.calcOffset();
        canvas.renderAll();
        setTimeout(function() {
            $('.loader').hide();
        }, 3500);
    }

    function deleteObject() {
        var object = canvas.getActiveObject();
        if (!object) {
            alert('Please select the element to remove');
            return '';
        }
        let product_id = object.id;
        if (product_id) {
            removeProductForUser(product_id);
        }
        canvas.remove(object);
        canvas.setWidth(1200);
        canvas.setHeight(700);
        canvas.calcOffset();
        canvas.renderAll();
    }

    $('#remove').click(function(id) {
        deleteObject();
    });

    $('#add-text').click(function() {
        addText();
    });

    $('body').on('click', '.drop-image', function(e) {
        var url = $(this).css('background-image');
        url = url.replace('url(', '').replace(')', '').replace(/\"/gi, "");
        let id = $(this).attr('data-id');
        dropProductImage(url, id);
        storeProductForUser(id);
    });

    function dropProductImage(url, id) {
        storeImage('product', url, id);
        $('#ProductModal').modal('toggle');
    }

    function addText() {
        canvas.add(new fabric.IText('Tap and Type', {
            left: 50,
            top: 50,
            fontFamily: 'arial black',
            fill: '#333',
            fontSize: 20
        })).setActiveObject();
        canvas.setWidth(1200);
        canvas.setHeight(700);
        canvas.calcOffset();
        canvas.renderAll();
    }

    function download_img(e) {
        e.href = canvas.toDataURL();
    }

    canvas.on('object:selected', function(o) {
        var activeObj = o.target;
        activeObj.set({
            'borderColor': '#3AB1B7',
            'cornerColor': '#3AB1B7'
        });
        canvas.renderAll();
    });

    let keyword = '';
    let category = '';
    let max_price = '';
    let max_height = '';
    let max_width = '';
    let max_depth = '';
    let color = '';
    let style = '';
    let tempurl = '';

    $(document).on('keyup', '#filter', function(e) {
        keyword = $.trim($('#filter').val());
        tempurl = $(this).attr('data-href');
        fetch_data();
    });

    $(document).on('keyup', '#max_width', function(e) {
        max_price = $.trim($('#max_width').val());
        tempurl = $(this).attr('data-href');
        fetch_data();
    });

    $(document).on('keyup', '#max_height', function(e) {
        max_price = $.trim($('#max_height').val());
        tempurl = $(this).attr('data-href');
        fetch_data();
    });

    $(document).on('keyup', '#max_depth', function(e) {
        max_price = $.trim($('#max_depth').val());
        tempurl = $(this).attr('data-href');
        fetch_data();
    });

    $(document).on('keyup', '#max_price', function(e) {
        max_price = $.trim($('#max_price').val());
        tempurl = $(this).attr('data-href');
        fetch_data();
    });

    $(document).on('change', '#category', function(e) {
        category = $.trim($('#category').val());
        tempurl = $(this).attr('data-href');
        fetch_data();
    });

    $(document).on('change', '#color', function(e) {
        color = $.trim($('#color').val());
        tempurl = $(this).attr('data-href');
        fetch_data();
    });

    $(document).on('change', '#style', function(e) {
        style = $.trim($('#style').val());
        tempurl = $(this).attr('data-href');
        fetch_data();
    });

    function fetch_data() {
        var url = tempurl + '?keyword=' + keyword + '&max_price=' + max_price +
            '&category_id=' + category + '&style_id=' + style + '&color_id=' + color +
            '&max_height=' + max_height + '&max_width=' + max_width + '&max_depth=' + max_depth;
        $.ajax({
            type: "GET",
            url: url,
            success: function(data) {
                $('#products_container').html(data);
            }
        });
    }

    function storeProductForUser(id) {
        var url = "{{route('user.products.session',':id')}}".replace(":id", id);
        $.ajax({
            type: "GET",
            url: url,
            success: function(data) {
                $('#listed_container').html(data);
            }
        });
    }

    function removeProductForUser(id) {
        var url = "{{route('user.products.remove.session',':id')}}".replace(":id", id);
        $.ajax({
            type: "GET",
            url: url,
            success: function(data) {
                $('#listed_container').html(data);
            }
        });
    }

    function clearSession() {
        var url = "{{route('user.products.session.clear')}}";
        $.ajax({
            type: "GET",
            url: url,
            success: function(data) {
                console.log(data);
            }
        });
    }

    window.addEventListener('beforeunload', (event) => {
        event.preventDefault();
        event.returnValue = `Are You Sure You Want To Leave?`;
        clearSession();
    });

    $('body').keydown(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '46') {
            deleteObject();
        }
    });
</script>
@endsection