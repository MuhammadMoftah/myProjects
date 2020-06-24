@extends('frontend.showrooms.dashboard') 
@section('dashboard-main')
  
<div class="container">
    <div class="row bg-white rounded p-2">
        {{-- success Msgs --}}
        <div style="width: 100%;" class="alert alert-success" role="alert">
            @include('frontend.layouts.messages') 
        </div>
        {{-- Error Msgs --}}
        <div style="width: 100%;" class="alert bg-red errors">
            @include('frontend.layouts.errors') 
        </div> 
        {{-- Update showroom Form --}}
        <form method="POST" enctype="multipart/form-data" action="{{route('user.update.showroom',$showroom->id)}}" style="max-width:100%; width: 100%;">
            @csrf   
            <article class="border-bottom w-100 py-2">
                <h6 class="h5 w-100">Profile Photo</h6>
                <hgroup>
                    <label for="uploadlogo">
                        <span class="btn main-btn rounded">Upload</span>
                        <span class="text-muted">Best Size 150 X 150 Pixels</span>
                        <input class="d-none" type="file" id="uploadlogo" name="showroom_image">
                    </label>
                    <aside class="d-flex align-items-center">
                        <figure id="logo-preview" class="img rounded d-inline-block mr-2 my-2 border"
                            style="background-image:url('{{$showroom->showroom_image}}'); height: 150px; width: 150px; background-size: cover; background-position: center;">
                        </figure>
                        <button class="btn btn-danger" id="deleteImage">X</button>
                    </aside>
                </hgroup>
            </article>

            <article class="border-bottom w-100 py-2">
                <h6 class="h5 w-100">Cover Photo</h6>
                <hgroup>
                    <label for="uploadcover">
                        <span class="btn main-btn rounded">Upload</span>
                        <span class="text-muted">Best Size 1140 X 250 Pixels</span>
                        <input class="d-none" type="file" id="uploadcover" name="background_image">
                    </label>
                    <aside class="d-flex align-items-center">
                        <figure id="cover-preview" class="img rounded d-inline-block mr-2 my-2 border"
                            style="background-image:url('{{$showroom->showroom_coverImage}}'); height: 250px; width: 100%; background-size: cover; background-position: center;">
                        </figure>
                        <button class="btn btn-danger" id="deleteCover">X</button>
                    </aside>
                </hgroup>
            </article>
 
            <article class="w-100 py-2">
                <div class="form-group">
                    <h6 class="d-inline-block" style="width:100px">English Name: </h6>
                    <input id="name_en" value="{{$showroom->name_en}}" type="text"
                        class="form-control d-inline-block"  name="name_en">
                </div>
            </article>

            <article class="w-100 py-2">
                <div class="form-group">
                    <h6 class="d-inline-block" style="width:100px">Arabic Name: </h6>
                    <input id="name_ar" value="{{$showroom->name_ar}}" type="text"
                        class="form-control d-inline-block"  name="name_ar">
                </div>
            </article>

            <article class="w-100 py-2">
                <div class="form-group d-flex justify-content-between">
                    <h5>* Showroom Style:</h5>
                    <div>
                        <select id="styles" name="styles[]" class="form-control-sm form-control p-0 selectpicker" multiple data-hide-disabled="true" data-size="5" >
                            @foreach($styles as $style)
                            <option {{in_array($style->id,$showroom->styles->pluck('id')->toArray())?'selected':''}}
                                value="{{$style->id}}">{{$style->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </article>

            <article class="w-100 py-2">
                <div class="form-group d-flex justify-content-between">
                    <h5>* Showroom Category:</h5>
                  
                    <div style="color:#ccc1c1">
                       
                        @forelse ($showroom->categories as $category)
                            {{$category->name_en}}
                            @if(!$loop->last)
                                ,
                            @endif
                        @empty
                           <span style="color:red"> no categories </span>
                        @endforelse
                    </div>
                    {{-- <div>
                        <select id="categories" name="categories[]"
                            class="form-control-sm form-control p-0 selectpicker" multiple data-hide-disabled="true" data-size="5">
                            @foreach($categories as $category)
                            <option {{in_array($category->id,$showroom->categories->pluck('id')->toArray())?'selected':''}}
                                value="{{$category->id}}">{{$category->name_en}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                </div>
            </article> 

            <article class="w-100 py-2">
                <div class="form-group d-flex justify-content-between">
                    <h5>* Showroom City:</h5>
                    <div>
                        <select id="city" name="city_id" class="form-control-sm form-control p-0">    
                            @foreach($cities as $city)
                            <option {{$city->id==$showroom->district->city_id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </article> 

            <article class="w-100 py-2">
                <div class="form-group d-flex justify-content-between" id="district-content"> 
                <h5>* Showroom District:</h5>
                    <div>
                        <select id="district" name="district_id" class="form-control-sm form-control p-0">    
                            @foreach($districts as $district)
                            <option {{$district->id==$showroom->district_id?'selected':''}} value="{{$district->id}}">{{$district->name_en}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </article> 

            <article class="border-bottom w-100 py-2">
                <h6 class="h5 w-100 py-2">Update Your Story</h6>
                <textarea value="{{$showroom->about}}" class="form-control my-2" name="about" id="about"
                    cols="30" rows="7" placeholder="Type here ..."
                    style="resize:none">{{$showroom->about}}</textarea>
            </article>

            <article class="border-bottom w-100 py-2">
                <h6 class="h5 w-100 py-2">Social Network</h6>
                <div class="form-group">
                    <h6 class="d-inline-block" style="width:100px">Website: </h6>
                    <input id="website" value="{{$showroom->getOriginal('website')}}" type="text"
                        class="form-control d-inline-block"  name="website">
                </div>
    
                <div class="form-group">
                    <h6 class="d-inline-block" style="width:100px">Facebook: </h6>
                    <input id="facebook" value="{{$showroom->getOriginal('fb')}}" type="text"
                        class="form-control d-inline-block"  name="facebook">
                </div>
    
                <div class="form-group">
                    <h6 class="d-inline-block" style="width:100px">Twitter: </h6>
                    <input id="twitter" value="{{$showroom->getOriginal('tw')}}" type="text"
                        class="form-control d-inline-block"  name="twitter">
                </div>
    
                <div class="form-group">
                    <h6 class="d-inline-block" style="width:100px">Instagram: </h6>
                    <input id="instgram" value="{{$showroom->getOriginal('instgram')}}" type="text"
                        class="form-control d-inline-block"  name="instgram">
                </div>
    
                <div class="form-group">
                    <h6 class="d-inline-block" style="width:100px">Youtube: </h6>
                    <input id="youtube" value="{{$showroom->getOriginal('yt')}}" type="text"
                        class="form-control d-inline-block"  name="youtube">
                </div>
    
                <button data-href="{{route('user.update.showroom',$showroom->id)}}" id="update-showroom"
                    class="btn main-btn my-2" type="submit">
                    Update
                </button>
            </article>

        </form>
        <form method="POST" action="{{ route('user.showroom.request.slug', $showroom->id)}}" style="max-width:100%; width: 100%;">
            @csrf  
            <article class="border-bottom w-100 py-2">
                <h6 class="h5 w-100 py-2">Request To Change Showroom Slug</h6>
                <div class="container">
                    <div class="row single border rounded px-0">
                        <div class="col-lg-6 py-2">
                            <div class="form-group">
                                <label for="slug">New Slug</label>
                                <input id="slug" value="{{old('slug')}}" type="text" class="form-control" name="slug">
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn main-btn my-2" type="submit">Send Request</button>
            </article>  
        </form>
        {{-- Update OR Delete Branch Form  --}}
        @if($showroom->branches)
            @foreach($showroom->branches as $branch)
                <form method="POST" action="{{ route('user.update.branch', $branch->id)}}" style="max-width:100%; width: 100%;">
                    @csrf  
                    <article class="border-bottom w-100 py-2">
                        <h6 class="h5 w-100 py-2">Your Branch info</h6>
                        <div class="container">
                            <div class="row single border rounded px-0">
                                <div class="col-lg-6 py-2">
                                    <input type="hidden" name="lat_{{$branch->id}}" value="{{$branch->lat}}" id="lat_{{$branch->id}}"/>
                                    <input type="hidden" name="lng_{{$branch->id}}" value="{{$branch->lang}}" id="lng_{{$branch->id}}"/>
                                    <div class="form-group">
                                        <label for="title_{{$branch->id}}">Title</label>
                                        <input id="title_{{$branch->id}}" value="{{$branch->title}}"
                                            type="text" class="form-control" name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="address_en_{{$branch->id}}">English Address</label>
                                        <input id="address_en_{{$branch->id}}" value="{{$branch->address_en}}"
                                            type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="address_ar_{{$branch->id}}">Arabic Address</label>
                                        <input id="address_ar_{{$branch->id}}" value="{{$branch->address_ar}}"
                                            type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="d-inline" for="mob1_{{$branch->id}}">Phone1: </label>
                                        <input id="mob1_{{$branch->id}}" value="{{$branch->mob1}}" type="text"
                                            class="form-control w-50 d-inline">
                                    </div>
                                    <div class="form-group">
                                        <label class="d-inline" for="mob2_{{$branch->id}}">Phone2: </label>
                                        <input id="mob2_{{$branch->id}}" value="{{$branch->mob2}}" type="text"
                                            class="form-control w-50 d-inline">
                                    </div>

                                    <div class="form-group d-flex justify-content-between">
                                    <h5 class="{{ $errors->has('branch_city') ? 'text-danger' : ''}}">* City:</h5>
                                        <div>
                                            <select id="branch_city_{{$branch->id}}" class="form-control-sm form-control p-0 branch_city" data-branch="{{$branch->id}}">
                                                <option disabled selected>Select your city</option>
                                                @foreach($cities as $city)
                                                <option {{$branch->city_id==$city->id?'selected':''}} value="{{$city->id}}">{{$city->name_en}}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('branch_city', '<div class="text-danger small">:message</div>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group d-flex justify-content-between" id="branch_districts_{{$branch->id}}">
                                        <h5 class="{{ $errors->has('branch_district') ? 'text-danger' : ''}}">* District:</h5>
                                        <div>
                                            <select id="district" class="form-control-sm form-control p-0">
                                                <option disabled selected>Select your district</option>
                                                @foreach($districts as $district)
                                                <option {{$branch->district_id==$district->id?'selected':''}} value="{{$district->id}}">{{$district->name_en}}</option>
                                                @endforeach
                                            </select>
                                            {!! $errors->first('branch_district', '<div class="text-danger small">:message</div>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group new-create-showroom"> 
                                        <label class="d-block" for="">Working Hours: </label>

                                        <div class="row categories mb-2">
                                            <div class="col-sm-4 my-1">
                                                <input class="d-none" id="sunday_{{$branch->id}}" @foreach($branch->info as $info)
                                                @if($info->day == 'sunday')
                                                checked
                                                @endif
                                                @endforeach
                                                type="checkbox" value="" id="Sunday">
                                                <label class="form-check-label single-cate" for="sunday_{{$branch->id}}">
                                                    Sunday
                                                </label>
                                            </div>
                                            @include('frontend.includes.times',['day' =>
                                            'sunday','showroom_branch'=>$branch])
                                        </div>

                                        <div class="row categories mb-2">
                                            <div class="col-sm-4 my-1">
                                                <input class="d-none" id="monday_{{$branch->id}}" @foreach($branch->info as $info)
                                                @if($info->day == 'monday')
                                                checked
                                                @endif
                                                @endforeach
                                                type="checkbox" value="" id="Monday">
                                                <label class="form-check-label single-cate" for="monday_{{$branch->id}}">
                                                    Monday
                                                </label>
                                            </div>
                                            @include('frontend.includes.times',['day' =>
                                            'monday','showroom_branch'=>$branch])
                                        </div>

                                        <div class="row categories mb-2">
                                            <div class="col-sm-4 my-1">
                                                <input class="d-none" id="tuesday_{{$branch->id}}" @foreach($branch->info as $info)
                                                @if($info->day == 'tuesday')
                                                checked
                                                @endif
                                                @endforeach
                                                type="checkbox" value="" id="Tuesday">
                                                <label class="form-check-label single-cate" for="tuesday_{{$branch->id}}">
                                                    Tuesday
                                                </label>
                                            </div>
                                            @include('frontend.includes.times',['day' =>
                                            'tuesday','showroom_branch'=>$branch])
                                        </div>

                                        <div class="row categories mb-2">
                                            <div class="col-sm-4 my-1">
                                                <input class="d-none" id="wednesday_{{$branch->id}}" @foreach($branch->info as
                                                $info)
                                                @if($info->day == 'wednesday')
                                                checked
                                                @endif
                                                @endforeach
                                                type="checkbox" value="" id="Wednesday">
                                                <label class="form-check-label single-cate" for="wednesday_{{$branch->id}}">
                                                    Wednesday
                                                </label>
                                            </div>
                                            @include('frontend.includes.times',['day' =>
                                            'wednesday','showroom_branch'=>$branch])
                                        </div>

                                        <div class="row categories mb-2">
                                            <div class="col-sm-4 my-1">
                                                <input class="d-none" id="thursday_{{$branch->id}}" @foreach($branch->info as
                                                $info)
                                                @if($info->day == 'thursday')
                                                checked
                                                @endif
                                                @endforeach
                                                type="checkbox" value="" id="Thursday">
                                                <label class="form-check-label single-cate" for="thursday_{{$branch->id}}">
                                                    Thursday
                                                </label>
                                            </div>
                                            @include('frontend.includes.times',['day' =>
                                            'thursday','showroom_branch'=>$branch])
                                        </div>

                                        <div class="row categories mb-2">
                                            <div class="col-sm-4 my-1">
                                                <input class="d-none" id="friday_{{$branch->id}}" @foreach($branch->info as $info)
                                                @if($info->day == 'friday')
                                                checked
                                                @endif
                                                @endforeach
                                                type="checkbox" value="" id="Friday">
                                                <label class="form-check-label single-cate" for="friday_{{$branch->id}}">
                                                    Friday
                                                </label>
                                            </div>
                                            @include('frontend.includes.times',['day' =>
                                            'friday','showroom_branch'=>$branch])
                                        </div>

                                        <div class="row categories mb-2">
                                            <div class="col-sm-4 my-1">
                                                <input class="d-none" id="saturday_{{$branch->id}}" @foreach($branch->info as
                                                $info)
                                                @if($info->day == 'saturday')
                                                checked
                                                @endif
                                                @endforeach
                                                type="checkbox" value="" id="Saturday">
                                                <label class="form-check-label single-cate" for="saturday_{{$branch->id}}">
                                                    Saturday
                                                </label>
                                            </div>
                                            @include('frontend.includes.times',['day' =>
                                            'saturday','showroom_branch'=>$branch])
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 py-2">
                                    <div class="form-group d-flex justify-content-between">
                                        <input type="text" class="form-control" id="search_on_map_{{$branch->id}}" placeholder="search in map...">
                                    </div>
                                    <div class="mapouter mt-3">
                                        <div id="map-{{$branch->id}}" style="width: 100%;height: 500px"></div>
                                        <style>
                                            .mapouter {
                                                position: relative;
                                                height: 500px;
                                            }
                                        </style>
                                    </div>
                                </div>
                                @include('frontend.includes.edit_branch_map')
                            </div>

                        </div>
                        <button data-href="{{ route ('user.update.branch',$branch->id)}}"
                            class="update-branch btn main-btn my-2" type="submit">Update Branch</button>
                        <button class="btn btn-danger  my-2" id="DeleteBranchButton">delete Branch</button>
                    </article>  
                </form>
                <form method="POST" action="{{route('user.delete.branch',$branch->id)}}" id="DeleteBranchForm">@csrf</form>  
            @endforeach
        @endif 
        {{--  Create Branch Form  --}}
        <form method="POST" action="{{route('user.store.branch',$showroom->id)}}" style="max-width:100%; width: 100%;">
            @csrf
            <article class="border-bottom w-100 py-2">
                <h6 class="h5 w-100 py-2">Your Branch info</h6>
                <div class="container">
                    <div class="row single border rounded px-0">
                        <div class="col-lg-6 py-2"> 
                            <input type="hidden" name="new_lat" id="new_lat"/>
                            <input type="hidden" name="new_lng" id="new_lng"/>
                            <div class="form-group">
                                <label for="titleCreated">Title</label>
                                <input  type="text" class="form-control" name="title" id="titleCreated" />
                                {!! $errors->first('title', '<div class="text-danger small">:message</div>') !!} 
                            </div>

                            <div class="form-group">
                                <label for="new_address_en">English Address</label>
                                <input id="new_address_en" type="text" class="form-control" name="address_en">
                                {!! $errors->first('address_en', '<div class="text-danger small">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <label for="new_address_ar">Arabic Address</label>
                                <input id="new_address_ar" type="text" class="form-control"  name="address_ar">
                                {!! $errors->first('address_ar', '<div class="text-danger small">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <label class="d-inline" for="new_mob1">Phone1: </label>
                                <input id="new_mob1" type="text" class="form-control w-50 d-inline" name="mob1">
                                {!! $errors->first('mob1', '<div class="text-danger small">:message</div>') !!}
                            </div>

                            <div class="form-group">
                                <label class="d-inline" for="new_mob2">Phone2: </label>
                                <input id="new_mob2" type="text" class="form-control w-50 d-inline" name="mob2">
                                {!! $errors->first('mob2', '<div class="text-danger small">:message</div>') !!}
                            </div>
    
                            <div class="form-group d-flex justify-content-between">
                                 <h5 class="{{ $errors->has('branch_city') ? 'text-danger' : ''}}">* City:</h5>
                                <div>
                                    <select id="branch_city" class="form-control-sm form-control p-0" name="branch_city">
                                        <option disabled selected>Select your city</option>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name_en}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('branch_city', '<div class="text-danger small">:message</div>') !!}
                                </div>
                            </div>
    
                            <div class="form-group d-flex justify-content-between" id="branch_districts"> 
                                  {!! $errors->first('district_id', '<div class="text-danger small">:message</div>') !!}
                            </div>
                            
                            <div class="form-group new-create-showroom">
                                <label class="d-block" for="">Working Hours: </label>
    
                                <div class="row categories mb-2">
                                <div class="col-sm-4 my-1">
                                    <input class="d-none" type="checkbox" value="" id="new_sunday"  name="sunday">
                                    <label class="form-check-label single-cate" for="new_sunday">
                                        Sunday
                                    </label>
                                </div>
                                    @include('frontend.includes.times',['day' => 'sunday'])
                                </div>
    
                                <div class="row categories mb-2">
                                <div class="col-sm-4 my-1">
                                    <input class="d-none" type="checkbox" value="" id="new_monday" name="monday">
                                    <label class="form-check-label single-cate" for="new_monday">
                                        Monday
                                    </label>
                                </div>
                                    @include('frontend.includes.times',['day' => 'monday'])
                                </div>
    
                                <div class="row categories mb-2">
                                <div class="col-sm-4 my-1">
                                    <input class="d-none" type="checkbox" value="" id="new_tuesday" name="tuesday">
                                    <label class="form-check-label single-cate"
                                        for="new_tuesday">
                                        Tuesday
                                    </label>
                                </div>
                                    @include('frontend.includes.times',['day' => 'tuesday'])
                                </div>
    
                                <div class="row categories mb-2">
                                <div class="col-sm-4 my-1">
                                    <input class="d-none" type="checkbox" value="" id="new_wednesday" name="wednesday">
                                    <label class="form-check-label single-cate"
                                        for="new_wednesday">
                                        Wednesday
                                    </label>
                                </div>
                                    @include('frontend.includes.times',['day' => 'wednesday'])
                                </div>
    
                                <div class="row categories mb-2">
                                <div class="col-sm-4 my-1">
                                    <input class="d-none" type="checkbox" value="" id="new_thursday" name="thursday">
                                    <label class="form-check-label single-cate"
                                        for="new_thursday">
                                        Thursday
                                    </label>
                                </div>
                                    @include('frontend.includes.times',['day' => 'thursday'])
                                </div>
    
                                <div class="row categories mb-2">
                                <div class="col-sm-4 my-1">
                                    <input class="d-none" type="checkbox" value="" id="new_friday" name="friday">
                                    <label class="form-check-label single-cate" for="new_friday">
                                        Friday
                                    </label>
                                </div>
                                    @include('frontend.includes.times',['day' => 'friday'])
                                </div>
    
                                <div class="row categories mb-2">
                                <div class="col-sm-4 my-1">
                                    <input class="d-none" type="checkbox" value="" id="new_saturday" name="saturday">
                                    <label class="form-check-label single-cate"
                                        for="new_saturday">
                                        Saturday
                                    </label>
                                </div>
                                    @include('frontend.includes.times',['day' => 'saturday'])
                                </div>
                                
                                {!! $errors->first('sunday', '<div class="text-danger small">:message</div>') !!}
                                {!! $errors->first('monday', '<div class="text-danger small">:message</div>') !!}
                                {!! $errors->first('tuesday', '<div class="text-danger small">:message</div>') !!}
                                {!! $errors->first('wednesday', '<div class="text-danger small">:message</div>') !!}
                                {!! $errors->first('thursday', '<div class="text-danger small">:message</div>') !!}
                                {!! $errors->first('friday', '<div class="text-danger small">:message</div>') !!}
                                {!! $errors->first('saturday', '<div class="text-danger small">:message</div>') !!}
                            </div>
                        </div>

                        <div class="col-lg-6 py-2">
                            <div class="form-group d-flex justify-content-between">
                                <input type="text" class="form-control" id="search_on_map" placeholder="search in map...">
                            </div>
                            <div class="mapouter mt-3">
                                <div id="map" style="width: 100%;height: 500px"></div>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        height: 500px;
                                    }
                                </style>
                            </div>
                        </div>
                        @include('frontend.includes.new_branch_map')
                    </div> 
                </div> 
                <button class="btn main-btn my-2" type="submit" id="add_new_branch">Add New Branch</button>
            </article> 
        </form>
     </div>
</div>
@push('scripts_stack')
<script src="{{asset('assets/site/js/editShowroom.js')}}"></script>

<script> 
    $(document).ready(function() {
        //  on change city  reflect on discret 
        $("#branch_city").on('change',function() {
            var city_id = $(this).val();
            var url2 = "{{route('user.get.districts')}}"; 
            $.ajax({
                type: "GET",
                url: url2,
                async: true,
                data: {
                    city_id: city_id
                },
                success: function(data) {
                    var districts = data.districts;
                    if(districts.length==0){
                        $('#branch_districts').html('');
                        return;
                    }
                    var data = "<h5>* District:</h5>" +
                        "<div> <select  name='district_id' id='district' class='form-control-sm form-control p-0 '>";
                    $.each(districts, function(index, value) {
                        data = data + "<option value=" + value['id'] + ">" + value['name_en'] + "</option>";
                    });
                    data = data + "</select></div>";
                    $('#branch_districts').html(data);
                }
            });
        });

        //  on change city  reflect on discret 
        $('.branch_city').on('change',function(){
            var city_id = $(this).val();
            var districts_holder=$(this).attr('data-branch')
            var url2 = "{{route('user.get.districts')}}"; 
            $.ajax({
                type: "GET",
                url: url2,
                async: true,
                data: {
                    city_id: city_id
                },
                success: function(data) {
                    var districts = data.districts;
                    if(districts.length==0){
                        $('#branch_districts_' + districts_holder + '').html('');
                        return;
                    }
                    var data = "<h5>* District:</h5>" +
                        "<div> <select  name='district_id' id='district' class='form-control-sm form-control p-0 '>";
                    $.each(districts, function(index, value) {
                        data = data + "<option value=" + value['id'] + ">" + value['name_en'] + "</option>";
                    });
                    data = data + "</select></div>";
                    $('#branch_districts_' + districts_holder + '').html(data);
                }
            });
        });

        $('#city').on('change',function(){
            var city_id = $(this).val();
            var url2 = "{{route('user.get.districts')}}"; 
            $.ajax({
                type: "GET",
                url: url2,
                async: true,
                data: {
                    city_id: city_id
                },
                success: function(data) {
                    var districts = data.districts;
                    if(districts.length==0){
                        $('#district-content').html('');
                        return;
                    }
                    var data = "<h5>* District:</h5>" +
                        "<div> <select  name='district_id' id='district' class='form-control-sm form-control p-0 '>";
                    $.each(districts, function(index, value) {
                        data = data + "<option value=" + value['id'] + ">" + value['name_en'] + "</option>";
                    });
                    data = data + "</select></div>";
                    $('#district-content').html(data);
                }
            });
        });

        // Delete Branch 
        $('#DeleteBranchButton').on('click', function(e) {
            e.preventDefault();
            $('#DeleteBranchForm').submit();
        });
    })
</script>
@endpush {{-- end scripts Section --}}
@endsection {{-- end dashboard-main Section --}}