@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('styles')
<link rel="stylesheet" href="{{asset('assets/site/css/jquery.fancybox.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/site/css/addProduct.css?rand=1234')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<meta property="og:title" content='topic'>
{{-- <meta property="og:image" content="{{ $topic->images[0]->image  }}"> --}}
<meta property="og:description" content="{{$topic->body}}">
<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@">
<meta name="twitter:title" content='topic'>
<link rel="stylesheet" href="{{asset('assets/site/css/topic-edit.css?rand=1234')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet"> 
{{-- <meta name="twitter:image" content="{{ $topic->images[0]->image  }}"> --}}
@endsection
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')

<div class="container">
    <h1 class="text-center mt-5">Editing Topic</h1>
    <section class="one-product showrooms mt-5">
        <div class="row">
            <div class="col-md-8 fullheight offset-md-2 mt-5 mb-5">
                <form method="POST" action="{{route('user.topic.update', $topic->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <h5 class="{{ $errors->has('others') ? 'text-danger' : ''}}">Body :</h5>
                        <div>
                            
                            {{-- value="@if(old('body')){{old('body')}}@else{!! $topic->body !!}@endif" --}}
                            {{-- @if(old('body')){{old('body')}} --}}
                            {{-- <div contenteditable="true" class="topic-body-div" id="topicBodyDiv">@if(old('body')){!!old('body')!!}@else{!! $topic->body  !!}@endif</div>  --}}
                            <textarea class="topic-body-textarea" rows="15" id="topicBody"  name="body" class="form-control" placeholder="body">@if($topic->body){!! $topic->body  !!}@endif</textarea>
                            {!! $errors->first('body', '<div class="text-danger small">:message</div>') !!}
                        </div>
                    </div>
 
                    <div class="d-flex align-items-center border my-2 rounded  categories-conatiner">
                        <p class="border-right px-1 {{ $errors->has('categories') || $errors->has('categories.*') ? 'text-danger' : ''}}"> <i class="bg-secondary py-1 px-2 mx-1 text-center text-white rounded-circle"> # </i> Choose up to 3 categories</p>
                        <select class="selectpicker mx-2" name="categories[]" id="" class="selectpicker" multiple data-hide-disabled="true" data-size="5">
                            @foreach($categories as $category)
                            <option @if(old('categories')!==null) {{in_array($category->id,old('categories'))?'selected':''}} @elseif( $selectCategories ) {{in_array($category->id ,$selectCategories->toArray())  ?'selected':''}} @endif value="{{$category->id}}"> {{$category->name_en}}
                            </option>
                            @endforeach
                        </select>
                        {!! $errors->first('categories', '<div class="text-danger small">:message</div>') !!}
                        {!! $errors->first('categories.*', '<div class="text-danger small">:message</div>') !!}
                    </div>
                     
                    <div class="d-flex align-items-center border my-2 rounded link-container">
                        <p class="border-right px-1 {{$errors->has('link') ? 'text-danger' : ''}}"> <i class="bg-secondary small p-2 mx-1 text-center text-white rounded-circle fas fa-link"> </i>Attach Link</p>
                        <input style="width:60%;" class="border-0 ml-2 form-control" value="@if(old('body')){{old('link')}}@elseif($topic->link){{$topic->link}}@endif" type="text" name="link" placeholder="Add Link here">
                        {!! $errors->first('link', '<div class="text-danger small">:message</div>') !!}
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-white border-0 pt-0 px-1">
                        <div>
                            <label for="uploadImg"> <i class="far fa-images"></i> Upload Photos (atleast one photo)</label>
                            <input type="file" name="images[]" multiple="multiple" class="d-none" id="uploadImg" placeholder="images">
                            {!! $errors->first('images', '<div class="text-danger small">:message</div>') !!}
                            {!! $errors->first('images.*', '<div class="text-danger small">:message</div>') !!}
                        </div>
                    </div>

                    <div class="text-center">
                        <input type="submit" class="btn btn-primary m-auto" value="Edit">
                        <a href="{{route('user.get.topics')}}" class="btn btn-danger m-auto" value="Edti">cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts') 
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script> 
    $(document).ready(function() {
        $('#topicBody').summernote({
            height: 500,  toolbar: false,
            popover: {
                image: [],
                link: [],
                air: []
            }
        }); 
       
    });
 
</script>
@endsection