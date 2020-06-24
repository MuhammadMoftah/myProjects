@extends('admin.layouts.app')
@section('title',trans('lang.dashboard'))
@section('content')
    @section('breadcrumb')
    @stop
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="ti-user text-custom"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $num_registred_users }}</h2>
                <div class="text-muted m-t-5">@lang('lang.Number of registered Users')</div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-home text-pink"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $num_registred_companies }}</h2>
                <div class="text-muted m-t-5"> @lang('lang.Number of registered companies') </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="ti-gallery text-info"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $num_ads }}</h2>
                <div class="text-muted m-t-5"> @lang('lang.Number of units posted (individual / Company)') </div>
            </div>
        </div>
        <hr>
        <div class="col-md-8">
            <canvas id="myChart" width="300" height="200"></canvas>
        </div>
        <hr>

        <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="ti-thumb-up text-danger"></i>
                <h2 class="m-0 text-dark counter font-600">0</h2>
                <div class="text-muted m-t-5"> @lang('lang.Number of mobile users (Users & brokers)') </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-message text-custom"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $num_premium_ads }}</h2>
                <div class="text-muted m-t-5"> @lang('lang.Number of Premium ads') </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-message text-custom"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $active_ads }}</h2>
                <div class="text-muted m-t-5"> @lang('Active ads') </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-message text-custom"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $in_active_ads }}</h2>
                <div class="text-muted m-t-5"> @lang('in-Active ads') </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="md md-message text-custom"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $expired_ads }}</h2>
                <div class="text-muted m-t-5"> @lang('Expired ads') </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="ti-user text-pink"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $active_agents }}</h2>
                <div class="text-muted m-t-5"> @lang('Active agents') </div>
            </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="ti-user text-warning"></i>
                <h2 class="m-0 text-dark counter font-600">{{ $available_agents }}</h2>
                <div class="text-muted m-t-5"> @lang('Total agents') </div>
            </div>
        </div>

        {{-- <div class="col-md-4 col-lg-4 col-xl-3">
            <div class="widget-panel widget-style-2 bg-white">
                <i class="ti-comments text-custom"></i>
                <h2 class="m-0 text-dark counter font-600">12</h2>
                <div class="text-muted m-t-5">Mobile Brokers</div>
            </div>
        </div> --}}
    </div>
@stop


@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Users", "Companies"],
                datasets: [{
                    label: '# of daily registred users & companies',
                    data: [{{ $daily_registred_users }}, {{ $daily_registred_companies }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>
@endpush
