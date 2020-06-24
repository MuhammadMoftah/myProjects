@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet"> 
<style>
    form .note-editor {
        margin-top: 11px;
    }

</style>
@endsection
@section('body')
<!-- Horizontal Layout -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Edit Product
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                @include('admin.layouts.message')
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.product.edit.post',$product->id)}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="name_en" type="text" value="{{$product->name_en}}" class="form-control" name="name_en" maxlenght="200" required>
                            <label class="form-label">* English name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="name_ar" type="text" value="{{$product->name_ar}}" class="form-control" name="name_ar" maxlenght="200" required>
                            <label class="form-label">* Arabic name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Frame Material</b>
                            </p>
                            <select name="material_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($materials as $material)
                                <option {{ $product->material_id == $material->id?'selected':''}} value="{{$material->id}}">{{$material->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Upholostery Material</b>
                            </p>
                            <select name="upholstery_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($upholsteries as $upholstery)
                                <option {{ $product->upholstery_id == $upholstery->id?'selected':''}} value="{{$upholstery->id}}">{{$upholstery->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Color</b>
                            </p>
                            <select name="color_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($colors as $color)
                                <option {{ $product->color_id == $color->id?'selected':''}} value="{{$color->id}}">{{$color->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>
                            <b>* categories (up to 3)</b>
                        </p>
                        <select name="categories[]" class="form-control show-tick" multiple>
                            @foreach($categories as $category)
                            <option {{in_array($category->id,$product->categories->pluck('id')->all())?'selected':''}} value="{{$category->id}}">{{$category->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">* English Description</label>
                        <div class="form-line">
                            <textarea id="description_en" name="description_en" value="{!!$product->description_en!!}" cols="30" rows="5" class="form-control no-resize" required>{!!$product->description_en!!}</textarea>
                            <label class="form-label">* English Description</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">* Arabic Description</label>
                        <div class="form-line">
                            <textarea id="description_ar" name="description_ar" value="" cols="30" rows="5" class="form-control no-resize" required>{!!$product->description_ar!!}</textarea>
                            <label class="form-label">* Arabic Description</label>
                        </div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <label class="form-label">* Product images (up to 5 images)</label>
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" multiple="multiple" id="uploadimgs" hidden class="form-control" name="images[]">
                        </div>
                        <div class="help-info"></div><br>
                        <div class="row">
                            @foreach ($product->images as $key => $image)
                            <div class="col-lg-2" style="margin-left: 15px">
                                <img src="{{$image->image}}" alt="" height="130" width="150">
                                <a href="{{ route('product.remove.image',['id'=>$image->id,'product_id'=>$product->id]) }}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="images-preview" style="display: -webkit-box;"></div>
                    <div class="form-group form-float">
                        <label class="form-label">Other Details (optional)</label>
                        <div class="form-line">
                            <textarea id="others" name="others" value="{{$product->others}}" cols="30" rows="5" class="form-control no-resize">{{$product->others}}</textarea>
                            <label class="form-label">other details</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* showroom</b>
                            </p>
                            <select name="showroom_id" id="showroom" class="form-control show-tick" data-live-search="true" required>
                                @foreach($showrooms as $showroom)
                                <option {{ $product->showroom_id == $showroom->id?'selected':''}} value="{{$showroom->id}}">{{$showroom->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="branches-holder">
                            <p>
                                <b>* branches</b>
                            </p>
                            <select name="branches[]" class="form-control show-tick" multiple>
                                @foreach($branches as $branch)
                                <option {{in_array($branch->id,$product->branches->pluck('id')->all())?'selected':''}} value="{{$branch->id}}">{{$branch->address_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Style</b>
                            </p>
                            <select name="style_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($styles as $style)
                                <option {{ $product->style_id == $style->id?'selected':''}} value="{{$style->id}}">{{$style->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* country</b>
                            </p>
                            <select name="country_id" class="form-control show-tick" data-live-search="true" required>
                                @foreach($countries as $country)
                                <option {{ $product->country_id == $country->id?'selected':''}} value="{{$country->id}}">{{$country->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{$product->price}}" class="form-control" name="price" maxlenght="3">
                            <label class="form-label">* Price (EGP)</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="number" value="{{$product->guarantee}}" class="form-control" name="guarantee">
                            <label class="form-label">* Guarantee (months)</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" value="{{$product->height}}" class="form-control" name="height">
                                <label class="form-label">* height (cm)</label>
                            </div>
                            <div class="help-info"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" value="{{$product->width}}" class="form-control" name="width">
                                <label class="form-label">* width (cm)</label>
                            </div>
                            <div class="help-info"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="number" value="{{$product->depth}}" class="form-control" name="depth">
                                <label class="form-label">* depth (cm)</label>
                            </div>
                            <div class="help-info"></div>
                        </div>
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- Validation Plugin Js -->
<script src="{{asset('assets/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script src="{{asset('assets/js/pages/forms/form-validation.js')}}"></script>
   
<script src="{{asset('assets/js/editProduct.js')}}"></script>
<script type="text/javascript">
    $('#showroom').change(function() {
        var showroom = $(this).val();
        var url = "{{route('admin.branches.showroom.get',':showroom')}}".replace(":showroom", showroom);
        $.ajax({
            url: url,
        }).done(function(response) {
            var branches = response.branches;
            var branches_select = '<p><b>* branches</b></p><select multiple="multiple" name="branches[]" style="width: 100%; height: 200px;">';
            $.each(branches, function(index, branch) {
                branches_select = branches_select + '<option value="' + branch.id + '">' + branch.address_en + '</option>';
            });
            branches_select = branches_select + '</select>';
            $('.branches-holder').html(branches_select);
        });
    });

    $('textarea').summernote({ 
        toolbar: false,
        popover: {
            image: [],
            link: [],
            air: []
        } 
    }); 
</script>
@endsection