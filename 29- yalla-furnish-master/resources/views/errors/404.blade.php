@extends('frontend.master')
@section('styles')
<style>
    .error-page {
        text-align: center;
    }

    .error-page img {
        width: 100%;
        max-width: 800px;
    }

    .error-box {
        position: absolute;
        top: 30%;
        margin: auto;
        right: 0;
        left: 0;
    }

    .error-box a {
        max-width: 150px;
        margin: auto;
        font-weight: bold;
        color: #01BABD;
        border-radius: 20px;
        background-color: white;
    }

    .error-box a:hover {
        background-color: #f2f2f2;
        color: #01BABD;
    }

    body {
        background-color: #01BABD;
    }

    header,
    footer {
        display: none
    }

</style>
@endsection
@section('body')
<section class="error-page">
    <div class="error-box">
        <img src="{{asset('assets/site/images/404.jpg?rand=1234')}}" alt="">
        <a href="/" class="btn d-block">Go Home</a>
    </div>
</section>
@endsection

@section('scripts')
<script>
    $('.error-page').css({
        'height': ($(document).height()) + 'px'
    });

    $(window).resize(function() {
        $('.error-page').css({
            'height': ($(document).height()) + 'px'
        })
    });

</script>
@endsection
