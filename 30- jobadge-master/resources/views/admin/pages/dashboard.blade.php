@extends('admin.master')
@section('styles')
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
@endsection
@section('body')
<div class="block-header">
    <h2>DASHBOARD</h2>
</div>
<!-- Widgets -->
<div class="row clearfix">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">business</i>
            </div>
            <div class="content">
                <div class="text">Companies</div>
                <div class="number count-to" data-from="0" data-to="{{$companies}}" data-speed="100" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
                <i class="material-icons">people</i>
            </div>
            <div class="content">
                <div class="text">Job Seekers</div>
                <div class="number count-to" data-from="0" data-to="{{$users}}" data-speed="100" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
                <i class="material-icons">work</i>
            </div>
            <div class="content">
                <div class="text">Jobs</div>
                <div class="number count-to" data-from="0" data-to="{{$jobs}}" data-speed="100" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">group_add</i>
            </div>
            <div class="content">
                <div class="text">Today Job Seekers</div>
                <div class="number count-to" data-from="0" data-to="{{$today_users}}" data-speed="100" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
                <i class="material-icons">group_add</i>
            </div>
            <div class="content">
                <div class="text">Today Companies</div>
                <div class="number count-to" data-from="0" data-to="{{$today_companies}}" data-speed="100" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-indigo hover-expand-effect">
            <div class="icon">
                <i class="material-icons">verified_user</i>
            </div>
            <div class="content">
                <div class="text">Active Job Seekers</div>
                <div class="number count-to" data-from="0" data-to="{{$active_users}}" data-speed="100" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-indigo hover-expand-effect">
            <div class="icon">
                <i class="material-icons">verified_user</i>
            </div>
            <div class="content">
                <div class="text">Active Companies</div>
                <div class="number count-to" data-from="0" data-to="{{$active_companies}}" data-speed="100" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">people</i>
            </div>
            <div class="content">
                <div class="text">Today Visitors</div>
                <div class="number count-to" data-from="0" data-to="{{$today_visitors}}" data-speed="100" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
                <i class="material-icons">people</i>
            </div>
            <div class="content">
                <div class="text"> {{ Carbon\Carbon::now()->format("M")}} Jobs Apply</div>
                <div class="number count-to" data-from="0" data-to="{{$apply_job_this_month}}" data-speed="100" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>

    
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-indigo hover-expand-effect">
            <div class="icon">
                <i class="material-icons">people</i>
            </div>
            <div class="content">
                
                <div class="text"> Today Jobs Apply</div>
                <div class="number count-to" data-from="0" data-to="{{$apply_job_this_day}}" data-speed="100" data-fresh-interval="20"></div>
            </div>
        </div>
    </div>
   

    
</div>
{{-- charts --}}
<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Companies</h2>
            </div>
            <div class="body">
                <canvas id="company_stats" height="150"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Job Seekers</h2>
            </div>
            <div class="body">
                <canvas id="user_stats" height="150"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>Jobs</h2>
            </div>
            <div class="body">
                <canvas id="job_stats" height="150"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>{{ Carbon\Carbon::now()->format("M")}} Jobs Apply</h2>
            </div>
            <div class="body">
                <canvas id="apply_stats" height="150"></canvas>
            </div>
        </div>
    </div>

</div>
<!-- #END# Widgets -->
@endsection
@section('scripts')
<!-- Jquery CountTo Plugin Js -->
<script src="{{asset('assets/plugins/chartjs/Chart.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-countto/jquery.countTo.js')}}"></script>
<script type="text/javascript">
    $(function() {
        new Chart(document.getElementById("company_stats").getContext("2d"), getChartJs('company_stats'));
        new Chart(document.getElementById("user_stats").getContext("2d"), getChartJs('user_stats'));
        new Chart(document.getElementById("job_stats").getContext("2d"), getChartJs('job_stats'));
        new Chart(document.getElementById("apply_stats").getContext("2d"), getChartJs('apply_stats'));
    });

    function getChartJs(type) {
        var config = null;

        if (type === 'company_stats') {
            config = {
                type: 'line',
                data: {
                    labels: {!! json_encode($months) !!},
                    datasets: [{
                        label: "registered companies",
                        data: {!! json_encode($company_counts) !!},
                        borderColor: 'rgba(0, 188, 212, 0.75)',
                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                        pointBorderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    legend: false
                }
            }
        } else if (type === 'user_stats') {
            config = {
                type: 'line',
                data: {
                    labels: {!! json_encode($months) !!},
                    datasets: [{
                        label: "registered users",
                        data: {!! json_encode($user_counts) !!},
                        borderColor: 'rgba(0, 188, 212, 0.75)',
                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                        pointBorderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    legend: false
                }
            }
        } else if (type === 'job_stats') {
            config = {
                type: 'line',
                data: {
                    labels: {!! json_encode($months) !!},
                    datasets: [{
                        label: "jobs created",
                        data: {!! json_encode($job_counts) !!},
                        borderColor: 'rgba(0, 188, 212, 0.75)',
                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                        pointBorderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    legend: false
                }
            }
        }
        else if (type === 'apply_stats') {
            config = {
                type: 'line',
                data: {
                    labels: {!! json_encode($daysApply) !!},
                    datasets: [{
                        label: "jobs created",
                        data: {!! json_encode($jobseekerApply) !!},
                        borderColor: 'rgba(0, 188, 212, 0.75)',
                        backgroundColor: 'rgba(0, 188, 212, 0.3)',
                        pointBorderColor: 'rgba(0, 188, 212, 0)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 0.9)',
                        pointBorderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    legend: false
                }
            }
        }
        return config;
    }
</script>
<script src="{{asset('assets/js/pages/index.js')}}"></script>
@endsection