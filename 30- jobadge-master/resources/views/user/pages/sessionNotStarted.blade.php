@extends('master')

@section('body')
<!--===== Session Waiting =====-->
<!--===== Session Waiting =====-->
<section class="session" style="background: linear-gradient(rgba(0, 0, 0, 0.78),
            rgba(0, 0, 0, 0.13)),
        url({{asset('site/images/waiting.png')}});background-position: center center !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-5">
                <h1 class=" text-center py-3">Your Session
                    hasn't started Yet !</h1>
            </div>
        </div>
    </div>
</section>
@endsection