@extends('admin.master')
@section('styles')
<link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

@endsection
@section('body')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    update Showroom
                </h2>
            </div>
            <div class="body">
                @include('admin.layouts.errors')
                @include('admin.layouts.message')
                <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="{{route('admin.showroom.update',['id' => $showroom->id])}}">
                    {{ csrf_field() }}

                    <div class="form-group form-float ">
                        <div class="form-line">
                            <input type="text" value="{{$showroom->name_ar}}" name="name_ar" class="form-control no-resize">
                            <label class="form-label">* Arabic Name</label>
                        </div>

                        <label for="arabic_name">
                            <p style="color: red">{{ $errors->has('name_ar')?$errors->first('name_ar'):'' }}
                            </p>
                        </label>

                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$showroom->name_en}}" name="name_en" class="form-control no-resize">
                            <label class="form-label">* English Name</label>
                        </div>
                        <label for="english_name">
                            <p style="color: red">{{ $errors->has('name_en')?$errors->first('name_en'):'' }}
                            </p>
                        </label>

                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$showroom->slug}}" name="slug" class="form-control no-resize">
                            <label class="form-label">* SLUG</label>
                        </div>
                        <label for="english_name">
                            <p style="color: red">{{ $errors->has('slug')?$errors->first('slug'):'' }}
                            </p>
                        </label>

                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$showroom->getOriginal('yt')}}" name="youtube" class="form-control no-resize">
                            <label class="form-label">* YouTube Link</label>
                        </div>
                        <label for="youtube_link">
                            <p style="color: red">{{ $errors->has('youtube')?$errors->first('youtube'):'' }}
                            </p>
                        </label>

                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$showroom->getOriginal('fb')}}" name="facebook" class="form-control no-resize">
                            <label class="form-label">* Facebook Link </label>
                        </div>
                        <label for="facebook_link">
                            <p style="color: red">{{ $errors->has('facebook')?$errors->first('facebook'):'' }}
                            </p>
                        </label>

                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$showroom->getOriginal('tw')}}" name="twitter" class="form-control no-resize">
                            <label class="form-label">* Twitter Link</label>
                        </div>
                        <label for="twitter_link">
                            <p style="color: red">{{ $errors->has('twitter')?$errors->first('twitter'):'' }}
                            </p>
                        </label>

                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$showroom->getOriginal('website')}}" name="website" class="form-control no-resize">
                            <label class="form-label">* Website Link</label>
                        </div>
                        <label for="website_link">
                            <p style="color: red">{{ $errors->has('website')?$errors->first('website'):'' }}
                            </p>
                        </label>

                    </div>

                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" value="{{$showroom->getOriginal('instgram')}}" name="instgram" class="form-control no-resize">
                            <label class="form-label">* Instgram Link </label>
                        </div>
                        <label for="instgram_link">
                            <p style="color: red">{{ $errors->has('instgram')?$errors->first('instgram'):'' }}
                            </p>
                        </label>

                    </div>


                    <div class="form-group form-float">
                        <div class="form-line">
                            <textarea name="about" cols="30" rows="5" class="form-control no-resize">{{$showroom->about}}</textarea>
                            <label class="form-label">* About</label>
                        </div>
                        <label for="about">
                            <p style="color: red">{{ $errors->has('about')?$errors->first('about'):'' }} </p>
                        </label>

                    </div>

                    @if ($users)
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Users</b>
                            </p>
                            <select name="user_id" class="form-control show-tick" data-live-search="true">
                                <option disabled selected>* Select User</option>

                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $showroom->user_id ==  $user->id  ? 'selected':'' }}>
                                    {{ $user->first_name.' '.$user->last_name }} - {{$user->email}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="users">
                            <p style="color: red">{{ $errors->has('users')?$errors->first('users'):'' }} </p>
                        </label>

                    </div>
                    @endif

                    @if ($malls)
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Malls</b>
                            </p>
                            <select name="malls[]" class="form-control show-tick" multiple data-live-search="true">
                                @foreach ($malls as $mall)
                                <option value="{{ $mall->id }}" {{ in_array($mall->id,$showroom->malls->pluck('id')->toArray()) ? 'selected':'' }}>
                                    {{ $mall->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="styles">
                            <p style="color: red">{{ $errors->has('malls')?$errors->first('malls'):'' }} </p>
                        </label>

                    </div>
                    @endif

                    @if ($styles)
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Styles</b>
                            </p>
                            <select name="styles[]" class="form-control show-tick" multiple data-live-search="true">
                                @foreach ($styles as $style)
                                <option value="{{ $style->id }}" {{ in_array($style->id,$showroom->styles->pluck('id')->toArray()) ? 'selected':'' }}>
                                    {{ $style->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="styles">
                            <p style="color: red">{{ $errors->has('styles')?$errors->first('styles'):'' }} </p>
                        </label>

                    </div>
                    @endif
                    @if ($categories)
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Categories</b>
                            </p>
                            <select name="categories[]" class="form-control show-tick" multiple data-live-search="true">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ in_array($category->id,$showroom->categories->pluck('id')->toArray()) ? 'selected':'' }}>
                                    {{ $category->name_en }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="category_id">
                            <p style="color: red">{{ $errors->has('category_id')?$errors->first('category_id'):'' }} </p>
                        </label>

                    </div>
                    @endif


                    @if ($districts)
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Districtes</b>
                            </p>
                            <select name="district_id" class="form-control show-tick" data-live-search="true">
                                <option disabled selected>* Select Districtes</option>

                                @foreach ($districts as $district)
                                <option value="{{ $district->id }}" {{ $showroom->district_id==  $district->id  ? 'selected':'' }}>{{ $district->name_en }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="districtes">
                            <p style="color: red">{{ $errors->has('districtes')?$errors->first('districtes'):'' }} </p>
                        </label>

                    </div>
                    @endif
                    <div class="form-group form-float">
                        <div class="form-line">
                            <p>
                                <b>* Active</b>
                            </p>
                            <select name="active" class="form-control show-tick" data-live-search="true">

                                <option value="1" {{ $showroom->active ==  1  ? 'selected':'' }}>
                                    Active
                                </option>
                                <option value="0" {{ $showroom->active ==  0  ? 'selected':'' }}>
                                    DisActive
                                </option>
                            </select>
                        </div>
                        <label for="active">
                            <p style="color: red">{{ $errors->has('active')?$errors->first('active'):'' }} </p>
                        </label>

                        <div class="form-group form-float" style="width:90%">
                            <div class="form-line">
                                <input style="margin-left: 120px;" type="file" hidden class="form-control" name="showroom_image">
                                <label class="form-label">Showroom Image</label>
                            </div>
                            <div class="help-info">jpg,png,jpeg</div>
                            <label for="showroom_image">
                                <p style="color: red">
                                    {{ $errors->has('showroom_image')?$errors->first('showroom_image'):'' }} </p>
                            </label>
                        </div><br>
                        <img src="{{ $showroom->showroom_image}}" alt="" width="50px" height="30px">

                        <div class="form-group form-float" style="width:90%">
                            <div class="form-line">
                                <input style="margin-left: 120px;" type="file" hidden class="form-control" name="background_image">
                                <label class="form-label">Background Image</label>
                            </div>
                            <div class="help-info">jpg,png,jpeg</div>
                            <label for="background_image">
                                <p style="color: red">
                                    {{ $errors->has('background_image')?$errors->first('background_image'):'' }} </p>
                            </label>

                        </div>
                        <img src="{{ $showroom->showroom_coverImage}}" alt="" width="50px" height="30px">


                        <button class="btn btn-primary waves-effect submmit" type="submit">update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script>
    $('form').bind('change keyup', function() {
        $('.submmit').prop('disabled', false); // update button
    });
</script>
@if(Session::has('success'))
<script>
    Swal.fire({
        position: 'center',
        type: 'success',
        title: 'showroom updated successfully',
        timer: 2500,
        showConfirmButton: true,
        showLoaderOnConfirm: true,
    });
</script>
@endif
@endsection