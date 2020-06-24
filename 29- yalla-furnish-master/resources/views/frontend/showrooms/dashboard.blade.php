@extends('frontend.master')
@section('styles')
<link rel="stylesheet" href="{{asset('assets/site/css/addProduct.css?rand=1234')}}"> 
<script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCiSj64wEyRti_DeuBJQRkOVSO7M3cJtRY'></script>
@endsection
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('body')
<div class="showrooms dashboard">
    <div class="container head">
        {{-- alerts --}}
        <div class="mt-5">
            @include('frontend.layouts.messages')
            @include('frontend.layouts.errors')
        </div>
    
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-10">
                <div class="pt-3">
                    {{-- <h4 class="d-inline-block mr-5"> --}}
                        {{-- <a href="{{ route('user.get.showroom_detailes',$showroom->id) }}">
                            {{ $showroom->name_en }}
                        </a> --}}
                    {{-- </h4> --}}
                </div>
            </div>
        </div>
    </div>
    

    <section class="dash-details px-3">
        <div class="container px-0">
            <div class="row mb-3">
                <div class="col-xl-2 side-menu mt-2 pt-2">
                    <div class="h-100 p-1 rounded bg-white">
                        <select id="dashboard_links" class="form-control mb-3 px-0">
                            @if ($showrooms)
                            @foreach ($showrooms as $item)
                            <option value="{{route('user.my.dashboardChat',['id'=>$item->id])}}"
                                {{ $showroom->id == $item->id ? 'selected': '' }}>
                                {{ $item->name_en }}</option>
                            @endforeach
                            @endif
                        </select>
                        <figure class="img mx-auto" style="background-image:url({{ $showroom->showroom_image }})">
                        </figure>
                        <p class="font-weight-bold border-bottom pb-3">
                            <a href="{{ route('user.get.singleShowroom',['slug' => $showroom->slug ]) }}">
                                {{ $showroom->name_en }}
                            </a>
                        </p> 
                        <div class="showroom-nav my-4">
                            <a href="{{route("user.my.dashboardChat", $showroom->id )}}" 
                                class="main-link py-2 @if(\Route::current()->getName() === 'user.my.dashboardChat') active @endif"  style="display:block;">Message</a>
                            <a href="{{route("user.my.dashboardProducts", $showroom->id )}}" 
                                class="main-link py-2 @if (\Route::current()->getName() === 'user.my.dashboardProducts') active @endif "   style="display:block;">Products</p>
                            <a href="{{route("user.my.dashboardOffers", $showroom->id )}}" 
                                class="main-link py-2 @if (\Route::current()->getName() === 'user.my.dashboardOffers') active @endif"   style="display:block;">Offers</a>
                            <a href="{{route("user.my.dashboardInfo", $showroom->id )}}" 
                                class="main-link py-2 @if (\Route::current()->getName() === 'user.my.dashboardInfo') active @endif"  style="display:block;"> Information  </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 mt-2"> 
                    @yield('dashboard-main') 
                 </div>
            </div>
        </div>
    </section>
</div>

 
<!--End Showrooms-->
@endsection
@push('scripts_stack')
<script type="text/javascript">
   
    $('.text-input #chooseImg').change(function() {
        $('.text-input figure').fadeIn()
    }) 
    $('#dashboard_links').change(function(e) {
        let link = $('#dashboard_links').val();
        location.href = link;
    }) 
    $(document).ready(function() { 
        $('.tab-pane').scrollTop($('.tab-pane')[0].scrollHeight); 
            $("#city").on('change', function() {
            var city_id = $(this).val();
            var url2 = "{{route('user.get.districts')}}"; 
            $.ajax({
                type: "GET",
                url: url2,
                data: {
                    city_id: city_id
                },
                success: function(data) {
                    var districts = data.districts;
                    var data = "<h5>* District:</h5>" +
                        "<div> <select  name='district_id' id='district' class='form-control-sm form-control p-0 '>";
                    $.each(districts, function(index, value) {
                        data = data + "<option value=" + value['id'] + ">" + value['name_en'] + "</option>";
                    });
                    data = data + "</select></div>";
                    $('#district-content').html(data);
                    $('.loader').hide();
                }
            });
        });   
    }); 
</script>  
<!--End Showrooms-->  
@endpush