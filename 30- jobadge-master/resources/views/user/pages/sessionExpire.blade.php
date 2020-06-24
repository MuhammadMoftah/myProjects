@extends('master')

@section('body')
<!--===== Session Waiting =====-->
<!--===== Session Waiting =====-->
<section class="session" style="background: linear-gradient(rgba(0, 0, 0, 0.78),
            rgba(0, 0, 0, 0.13)),
        url({{asset('site/images/expired.png')}});">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-5">
                <h1 class=" text-center py-3">Your Session
                    has been Expired !</h1>
            </div>
        </div>
    </div>
</section>
@endsection