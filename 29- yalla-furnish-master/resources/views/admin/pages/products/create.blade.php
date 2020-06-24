@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">  
<link rel="stylesheet" href="{{asset('assets/site/css/addProduct.css?rand=1234')}}">
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
                    Create Product
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                @include('admin.layouts.message')
                <div class="alert alert-success" role="alert">
                </div>
                <div class="alert bg-red errors">
                </div>
                <form class="add-product" enctype="multipart/form-data" method="POST" action="{{route('admin.product.create.post')}}">
                    {{ csrf_field() }}
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="english_name" type="text" value="{{old('name_en')}}" class="form-control" name="name_en" maxlenght="200" >
                            <label class="form-label">* English name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="arabic_name" type="text" value="{{old('name_ar')}}" class="form-control" name="name_ar" maxlenght="200" >
                            <label class="form-label">* Arabic name</label>
                        </div>
                        <div class="help-info">Max. Char: 200</div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Frame Material</b>
                            </p>
                            <select id="material" name="material_id" class="form-control show-tick" data-live-search="true" >
                                @if(!old('material_id'))
                                <option disabled selected>* Frame material</option>
                                @endif
                                @foreach($materials as $material)
                                <option {{ old('material_id') == $material->id?'selected':''}} value="{{$material->id}}">{{$material->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Upholostery Material</b>
                            </p>
                            <select id="upholstery" name="upholstery_id" class="form-control show-tick" data-live-search="true" >
                                @if(!old('upholstery_id'))
                                <option disabled selected>* Upholostery Material</option>
                                @endif
                                @foreach($upholsteries as $upholstery)
                                <option {{ old('upholstery_id') == $upholstery->id?'selected':''}} value="{{$upholstery->id}}">{{$upholstery->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Color</b>
                            </p>
                            <select id="color" name="color_id" class="form-control show-tick" data-live-search="true" >
                                @if(!old('color_id'))
                                <option disabled selected>* Color</option>
                                @endif
                                @foreach($colors as $color)
                                <option {{ old('color_id') == $color->id?'selected':''}} value="{{$color->id}}">{{$color->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <p>
                            <b>* categories (up to 3)</b>
                        </p>
                        <select id="categories" name="categories[]" class="form-control show-tick" multiple>
                            @foreach($categories as $category)
                            <option @if(old('categories')!==null) {{in_array($category->id,old('categories'))?'selected':''}} @endif value="{{$category->id}}">{{$category->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">* English Description</label>
                        <div class="form-line">
                            <textarea id="english_description" name="description_en" value="{!!old('description_en')!!}" cols="30" rows="5" class="form-control no-resize" >{!!old('description_en')!!}</textarea>
                            <label class="form-label">* English Description</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <label class="form-label">* Arabic Description</label>
                        <div class="form-line">
                            <textarea id="arabic_description" name="description_ar" value="{!!old('description_ar')!!}" cols="30" rows="5" class="form-control no-resize" >{!!old('description_ar')!!}</textarea>
                            <label class="form-label">* Arabic Description</label>
                        </div>
                    </div>
                    <div class="form-group form-float" style="width:90%">
                        <label class="form-label">* Product images (up to 5 images)</label>
                        <div class="form-line">
                            <input style="margin-left: 50px;" type="file" multiple="multiple" id="uploadimgs" hidden class="form-control" name="images[]" >
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="images-preview" style="display: -webkit-box;"></div>
                    <div class="form-group form-float">
                        <label class="form-label">Other Details (optional)</label>
                        <div class="form-line">
                            <textarea id="others" name="others" value="{{old('others')}}" cols="30" rows="5" class="form-control no-resize">{{old('others')}}</textarea>
                            <label class="form-label">other details</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* showroom</b>
                            </p>
                            <select name="showroom_id" id="showroom" class="form-control show-tick" data-live-search="true" >
                                <option disabled selected>*please select your showroom</option>
                                @foreach($showrooms as $showroom)
                                <option {{ old('showroom_id') == $showroom->id?'selected':''}} value="{{$showroom->id}}">{{$showroom->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div>
                        <div class="branches-holder"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Style</b>
                            </p>
                            <select id="style" name="style_id" class="form-control show-tick" data-live-search="true" >
                                <option disabled selected>*please select style</option>
                                @foreach($styles as $style)
                                <option {{ old('style_id') == $style->id?'selected':''}} value="{{$style->id}}">{{$style->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* country</b>
                            </p>
                            <select id="country" name="country_id" class="form-control show-tick" data-live-search="true" >
                                @if(!old('country_id'))
                                <option disabled selected>*please select country</option>
                                @endif
                                @foreach($countries as $country)
                                <option {{ old('country_id') == $country->id?'selected':''}} value="{{$country->id}}">{{$country->name_en}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="price" type="number" value="{{old('price')}}" class="form-control" name="price" maxlenght="3" >
                            <label class="form-label">* Price (EGP)</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input id="guarantee" type="number" value="{{old('guarantee')}}" class="form-control" name="guarantee" >
                            <label class="form-label">* Guarantee (months)</label>
                        </div>
                        <div class="help-info"></div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input id="height" type="number" value="{{old('height')}}" class="form-control" name="height" >
                                <label class="form-label">* height (cm)</label>
                            </div>
                            <div class="help-info"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input id="width" type="number" value="{{old('width')}}" class="form-control" name="width" >
                                <label class="form-label">* width (cm)</label>
                            </div>
                            <div class="help-info"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input id="depth" type="number" value="{{old('depth')}}" class="form-control" name="depth" >
                                <label class="form-label">* depth (cm)</label>
                            </div>
                            <div class="help-info"></div>
                        </div>
                    </div>
                    <button id="create-product" class="btn btn-primary waves-effect" type="submit">Create</button>
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
<script src="{{asset('assets/js/addProduct.js')}}"></script>
<script type="text/javascript">
    $('#showroom').change(function() {
        var showroom = $(this).val();
        var url = "{{route('admin.branches.showroom.get',':showroom')}}".replace(":showroom", showroom);
        $.ajax({
            url: url,
        }).done(function(response) {
            var branches = response.branches;
            var branches_select = '<p><b>* branches</b></p><select id="branches" multiple="multiple" name="branches[]" style="width: 100%; height: 200px;">';
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
