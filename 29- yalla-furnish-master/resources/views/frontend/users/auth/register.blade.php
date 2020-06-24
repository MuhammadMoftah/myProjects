@extends('frontend.master')
@section('search')
@include('frontend.search_layouts.search')
@endsection
@section('styles')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('fb_pixel_events')
fbq('track', 'InitiateCheckout');
@endsection
@section('body')
<section class="trending">
    <div class="container">
        <h3 class="title">Registration</h3>

        <div class="row">
            <div class="col-lg-7 col-sm-12 mx-auto">
                <form class="account border" action="{{route('user.register.post')}}" method="POST">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <label for="first_name">* First Name</label>
                        <input name="first_name" value="{{old('first_name')}}" type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}" id="first_name" placeholder="First Name">
                        {!! $errors->first('first_name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <label for="last_name">* Last Name</label>
                        <input name="last_name" value="{{old('last_name')}}" type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}" id="last_name" placeholder="Last Name">
                        {!! $errors->first('last_name', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label for="email">* Email address</label>
                        <input type="email" value="{{old('email')}}" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" placeholder="Email">
                        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">* Country</label>
                        <div>
                            <select id="country" name="country_id" class="form-control-sm form-control p-0">
                                <option disabled selected>Select your country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->name_en}}</option>
                                @endforeach
                            </select>

                            {!! $errors->first('country_id', '<div class="text-danger small">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group" id="cities-content">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">* Gender</label>
                        <div>
                            <label for="male"> Male</label> <input {{old('gender')=='male'?'checked':''}} type="radio" name="gender" value="male" id="male">
                            <label for="female"> Female</label> <input {{old('gender')=='female'?'checked':''}} type="radio" name="gender" value="female" id="female">

                            {!! $errors->first('gender', '<div class="text-danger small">:message</div>') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">* Date Of Birth</label>
                        <div>
                            <input readonly value="{{old('date_of_birth')}}" type="text" name="date_of_birth" id="datepicker" class="form-control">
                        </div>
                        {!! $errors->first('date_of_birth', '<div class="text-danger small">:message</div>') !!}

                    </div>


                    <div class="form-group">
                        <label for="password">* Password</label>
                        <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password" placeholder="Password" autocomplete="new-password">
                        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">* Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" id="password_confirmation" placeholder="Password">
                        {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control w-50 mx-auto main-btn" value="Submit">
                    </div>
                    Already on Yalla Furnish? <a href="{{route('user.login.get')}}">Login</a>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        $("#country").on('change', function() {
            var country_id = $(this).val();
            var url = "{{route('user.get.cities')}}";
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    country_id: country_id
                },
                success: function(data) {
                    $('#cities-content').html(data);
                    $('.loader').hide();
                }
            });
        })
    })
</script>
<script>
    $(function() {
        var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());

        $("#datepicker").datepicker({
            maxDate: today,
            changeYear: true,
            changeMonth: true,
            dateFormat: "dd-mm-yy",
            yearRange: "-70:+0"
        });
    });
</script>
@endsection