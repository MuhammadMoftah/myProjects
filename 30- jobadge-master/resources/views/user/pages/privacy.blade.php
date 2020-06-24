@extends('master')

@section('body')
<!--===== About Us =====-->
<!--===== About Us =====-->
<div class="container-blog-posts">
    <div class="blog-posts-header">
        <div class="container">
            <h2 class="section-title">Terms & Conditions </h2>
        </div>
    </div>

    <section class="about py-5">
        <div class="container">
            {!! $privacy->body_en !!}
        </div>
    </section>
</div>
@endsection