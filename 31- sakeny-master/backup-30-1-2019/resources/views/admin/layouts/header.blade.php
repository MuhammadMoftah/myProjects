<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            {{-- <a href="{{ url('') }}" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Intc<i class="md md-album"></i>re</span></a> --}}
            <!-- Image Logo here -->
            <!--<a href="index.html" class="logo">-->
                <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
                <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
            <!--</a>-->
        </div>
    </div>


    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <i style="color: #000;" class="md md-menu"></i>
                    </button>
                    <button class="button-menu-mobile open-left waves-effect waves-light">
                        <a href="#" id="btn-fullscreen" class="waves-effect waves-light">
                            <i style="color: #000;" class="icon-size-fullscreen"></i>
                        </a>
                    </button>

                    <span class="clearfix"></span>
                </div>


                <ul class="nav navbar-nav navbar-right pull-right">
                    @inject('ads_notifications', 'App\Models\Ads');
                    @inject('company_notifications', 'App\Models\Company');
                    @inject('ads_history', 'App\Models\AdsEditHistory');
                    @inject('projects', 'App\Models\Project');
                    @inject('ad_payments', 'App\Models\AdsPaymentsApprovals');
                    @inject('approval_packages', 'App\Models\PackagePayment');
                    @php
                        $needed_ads = $ads_notifications->TimeArrange('week')->where("status",0);
                        $ads_notification_count = $needed_ads->count();
                        $ads_notification_loop = $needed_ads->latest()->get();

                        $ads_edit_history = $ads_history->latest()->get();
                        $ads_edit_history_count = $ads_history->count();

                        $needed_company = $company_notifications->TimeArrange('week')->where("status",0);
                        $company_notification_count = $needed_company->count();
                        $company_notification_loop = $needed_company->latest()->get();

                        $all_projects = $projects->whereHas('contacts', function($query){
                            $query->where('seen' , 1 );
                        })->latest();
                        $all_projects_have_contacts = $all_projects->get();
                        $projects_count = $all_projects->count();
                        // Ads Special Approvals
                        $ad_special_count = $ad_payments->where('type',1)->count();
                        $ad_bump_up_count = $ad_payments->where('type',0)->count();
                        // company/view/approval-packages
                        $company_approval_packages_count = $approval_packages->where('status',0)->count();

                    @endphp
                    <li class="dropdown top-menu-item-xs">
                        <a  style="color: #000 !important; font-weight: 700;" class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ti-briefcase"></i>
                                <span class="badge badge-pink noti-icon-badge">{{ $company_approval_packages_count }}</span>
                            </a>
                        <ul class="dropdown-menu">
                            <li style="box-shadow: 1px 3px 20px 1px;"><a href="{{ url(ADMIN_PATH."/company/view/approval-packages") }}"><i class="ti-announcement text-custom m-r-10"></i> Company Packages Approvals</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown top-menu-item-xs">
                        <a  style="color: #000 !important; font-weight: 700;" class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ti-announcement"></i>
                                <span class="badge badge-pink noti-icon-badge">{{ $ad_bump_up_count }}</span>
                            </a>
                        <ul class="dropdown-menu">
                            <li style="box-shadow: 1px 3px 20px 1px;"><a href="{{ url(ADMIN_PATH."/ads-bump-up") }}"><i class="ti-announcement text-custom m-r-10"></i> Ads Bump Up Approvals</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown top-menu-item-xs">
                        <a  style="color: #000 !important; font-weight: 700;" class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ti-announcement"></i>
                                <span class="badge badge-pink noti-icon-badge">{{ $ad_special_count }}</span>
                            </a>
                        <ul class="dropdown-menu">
                            <li style="box-shadow: 1px 3px 20px 1px;"><a href="{{ url(ADMIN_PATH."/ads-premium") }}"><i class="ti-announcement text-custom m-r-10"></i> Ads Special Approvals</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown top-menu-item-xs">
                        <a  style="color: #000 !important; font-weight: 700;" class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ti-ruler-pencil"></i>
                                <span class="badge badge-pink noti-icon-badge">{{ $projects_count }}</span>
                            </a>
                        <ul class="dropdown-menu">
                            <li style="box-shadow: 1px 3px 20px 1px;"><a href="#"><i class="ti-ruler-pencil text-custom m-r-10"></i> @lang('lang.Projects have new contacts')</a>
                            </li>
                            @foreach ($all_projects_have_contacts as $project)
                                <li><a href="{{ url(ADMIN_PATH."/project/{$project->id}/contact") }}"><i class="ti-ruler-pencil text-custom m-r-10"></i> {{ $project->title_en }} - ( {{ $project->contacts->where('seen',1)->count() }} new )</a>
                            </li>
                            @endforeach

                        </ul>
                    </li>

                    <li class="dropdown top-menu-item-xs">
                        <a  style="color: #000 !important; font-weight: 700;" class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="fa fa-history"></i>
                                <span class="badge badge-pink noti-icon-badge">{{ $ads_edit_history_count }}</span>
                            </a>
                        <ul class="dropdown-menu">
                            <li style="box-shadow: 1px 3px 20px 1px;"><a href="#"><i class="fa fa-history text-custom m-r-10"></i> @lang('lang.New Edit Ads Need approval')</a>
                            </li>
                            @foreach ($ads_edit_history as $ad)
                                <li><a href="{{ url(ADMIN_PATH."/ads/{$ad->ad_id}/update-history") }}"><i class="fa fa-history text-custom m-r-10"></i> {{ $ad->title }}</a>
                            </li>
                            @endforeach

                        </ul>
                    </li>

                    <li class="dropdown top-menu-item-xs">
                        <a  style="color: #000 !important; font-weight: 700;" class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ti-announcement"></i>
                                <span class="badge badge-pink noti-icon-badge">{{ $ads_notification_count }}</span>
                            </a>
                        <ul class="dropdown-menu">
                            <li style="box-shadow: 1px 3px 20px 1px;"><a href="{{ url(ADMIN_PATH."/ads?status=0") }}"><i class="ti-announcement text-custom m-r-10"></i> @lang('lang.Ads Need approval')</a>
                            </li>
                            @foreach ($ads_notification_loop as $ad)
                                <li><a href="{{ url(ADMIN_PATH."/ads/{$ad->id}/edit") }}"><i class="ti-announcement text-custom m-r-10"></i> {{ $ad->title }}</a>
                            </li>
                            @endforeach

                        </ul>
                    </li>

                    <li class="dropdown top-menu-item-xs">
                        <a  style="color: #000 !important; font-weight: 700;" class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="ti-briefcase"></i>
                                <span class="badge badge-pink noti-icon-badge">{{ $company_notification_count }}</span>
                            </a>
                        <ul class="dropdown-menu">
                            <li style="box-shadow: 1px 3px 20px 1px;"><a href="{{ url(ADMIN_PATH."/company?activation=0") }}"><i class="ti-briefcase text-custom m-r-10"></i> @lang('Companies need approval')</a>
                            </li>
                            @foreach ($company_notification_loop as $company)
                                <li><a href="{{ url(ADMIN_PATH."/company/{$company->id}/edit") }}"><i class="ti-briefcase text-custom m-r-10"></i> {{ @$company->user->name }}</a>
                            </li>
                            @endforeach

                        </ul>
                    </li>

                   <li class="dropdown top-menu-item-xs">
                        <a href="" style="color: #000 !important; font-weight: 700;" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="{{url(auth()->guard('admin')->user()->image)}}" alt="user-img" class="img-circle"> {{ auth()->guard('admin')->user()->name }}  <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url(ADMIN_PATH.'/profile') }}"><i class="ti-user text-custom m-r-10"></i> @lang('lang.Profile')</a>
                            </li>

                            <li class="divider"></li>
                            <li><a onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();" href="{{ route('admin.logout') }}"><i class="ti-power-off text-danger m-r-10"></i> {{ trans('lang.logout') }}</a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->
