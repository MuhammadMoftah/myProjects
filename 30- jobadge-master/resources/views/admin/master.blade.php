
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
<section class="content">
    <div class="container-fluid">
        @yield('body')
    </div>
</section>
@include('admin.layouts.footer')