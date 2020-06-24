<div class="left side-menu">
    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 339px;">
         <div class="sidebar-inner slimscrollleft" style="overflow: auto; width: auto; height: 339px;">
                <div class="dashboard-name">
                    <img src="{{ asset('backend/assets/images/robust-logo-light.png') }}">
                </div>
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>
                        <li class="text-muted menu-title"> </li>
                        <li>
                            <a href="{{ url(ADMIN_PATH."/") }}" class="waves-effect"><i class="ti-stats-up"></i> <span> @lang('lang.Dashboard')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/covers") }}" class="waves-effect"><i class="ti-settings"></i> <span> covers</span></a>
                       </li>
                        <li>
                            <a href="{{ url(ADMIN_PATH."/settings") }}" class="waves-effect"><i class="ti-settings"></i> <span> @lang('lang.Site Settings')</span></a>
                       </li>

                        <li>
                            <a href="{{ url(ADMIN_PATH."/template") }}" class="waves-effect"><i class="ti-stats-up"></i> <span> @lang('lang.Seo Search Templates')</span></a>
                       </li>
                        <li>
                            <a href="{{ url(ADMIN_PATH."/user") }}" class="waves-effect"><i class="ti-user"></i> <span> @lang('lang.Users')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/admin") }}" class="waves-effect"><i class="ti-user"></i> <span> @lang('lang.Admins')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/developer") }}" class="waves-effect"><i class="ti-ruler-pencil"></i> <span> @lang('lang.Developers')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/company") }}" class="waves-effect"><i class="ti-briefcase"></i> <span> @lang('lang.Companies')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/ads") }}" class="waves-effect"><i class="ti-announcement"></i> <span> @lang('lang.Ads')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/expired") }}" class="waves-effect"><i class="ti-announcement"></i> <span> Expired Ads</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/repeated") }}" class="waves-effect"><i class="ti-announcement"></i> <span> Repeated Ads</span></a>
                       </li>
					   <li>
                            <a href="{{ url(ADMIN_PATH."/special") }}" class="waves-effect"><i class="ti-announcement"></i> <span> Special Ads</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/property-type") }}" class="waves-effect"><i class="ti-home"></i> <span> @lang('lang.Property Type')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/level-of-finished") }}" class="waves-effect"><i class="ti-home"></i> <span> @lang('level of finished')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/amenities") }}" class="waves-effect"><i class="ti-home"></i> <span> @lang('Amenities')</span></a>
                       </li>


                       <li>
                            <a href="{{ url(ADMIN_PATH."/offer-type") }}" class="waves-effect"><i class="ti-home"></i> <span> @lang('lang.Offer Type')</span></a>
                       </li>
                        <li>
                            <a href="{{ url(ADMIN_PATH."/unit-view") }}" class="waves-effect"><i class="ti-map-alt"></i> <span> @lang('lang.Unit View')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/country") }}" class="waves-effect"><i class="ti-flag"></i> <span> @lang('lang.Countries')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/city") }}" class="waves-effect"><i class="ti-flag"></i> <span> @lang('lang.Cities')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/districts") }}" class="waves-effect"><i class="ti-settings"></i> <span> Districts</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/blog") }}" class="waves-effect"><i class="ti-map-alt"></i> <span> @lang('lang.Blog')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/life-style-category") }}" class="waves-effect"><i class="ti-map-alt"></i> <span> @lang('lang.Life Style Categories')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/life-style") }}" class="waves-effect"><i class="ti-map-alt"></i> <span> @lang('lang.Life Style')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/notification/create") }}" class="waves-effect"><i class="fa fa-bell"></i> <span> @lang('lang.Notifications')</span></a>
                       </li>
                       <li>
                            <a href="{{ route('admin.durations.all') }}" class="waves-effect"><i class="ti-announcement"></i> <span> Durations</span></a>
                       </li>

                        <li>
                            <a href="{{ route('admin.ad_type.all') }}" class="waves-effect"><i class="ti-announcement"></i> <span> ad Type</span></a>
                       </li>

                       <li>
                            <a href="{{ route('admin.durationtypes.all') }}" class="waves-effect"><i class="ti-announcement"></i> <span> Duration Types</span></a>
                       </li>

                       <li>
                            <a href="{{ route('admin.packages.all') }}" class="waves-effect"><i class="ti-announcement"></i> <span> @lang('lang.Packages')</span></a>
                       </li>
                       <li>
                            <a href="{{ route('admin.subscriptions.all') }}" class="waves-effect"><i class="ti-announcement"></i> <span> subscriptions</span></a>
                       </li>
                       {{--<li>
                            <a href="{{ url(ADMIN_PATH."/package") }}" class="waves-effect"><i class="fa fa-shopping-bag"></i> <span> @lang('lang.Packages')</span></a>
                       </li>--}}
                       <li>
                            <a href="{{ url(ADMIN_PATH."/reports") }}" class="waves-effect"><i class="fa fa-bug"></i> <span> @lang('lang.Reports')</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/banner") }}" class="waves-effect"><i class="ti-announcement"></i> <span> @lang('Banners')</span></a>
                       </li>
                       {{--<li>
                            <a href="{{ url(ADMIN_PATH."/company_package") }}" class="waves-effect"><i class="ti-announcement"></i> <span> @lang('CompanyPackages')</span></a>
                       </li>--}}
                       <li>
                            <a href="{{ url(ADMIN_PATH."/home_banners") }}" class="waves-effect"><i class="ti-announcement"></i> <span> Home Banners</span></a>
                       </li>
                       <li>
                            <a href="{{ url(ADMIN_PATH."/videos") }}" class="waves-effect"><i class="ti-announcement"></i> <span> Home Videos</span></a>
                       </li>

                    {{--    <li class="has_sub">
                          <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-dashboard"></i> <span> @lang('Development') </span> <span class="menu-arrow"></span></a>
                          <ul class="list-unstyled">
                              <!-- Permission -->
                              <li class="has_sub">
                                  <a href="javascript:void(0);" class="waves-effect"><span> <i class="fa fa-shield" aria-hidden="true"></i> @lang('Permissions') </span> <span class="menu-arrow"></span></a>
                                  <ul class="list-unstyled">
                                       <li class="has_sub">
                                          <a href="javascript:void(0);" class="waves-effect"><span> @lang('Modules') </span> <span class="menu-arrow"></span></a>
                                          <ul class="list-unstyled">
                                              <li><a href="{{ url(ADMIN_PATH."/development/permission/module") }}">@lang('View Modules')</a></li>
                                              <li><a href="{{ url(ADMIN_PATH."/development/permission/protected-url") }}">@lang('Urls And actions')</a></li>
                                          </ul>
                                      </li>
                                  </ul>
                              </li>
                              <!-- /Permission -->


                              <!-- localization -->
                              <li class="has_sub">
                                  <a href="javascript:void(0);" class="waves-effect"><span> <i class="fa fa-globe" aria-hidden="true"></i> @lang('localization') </span> <span class="menu-arrow"></span></a>
                                  <ul class="list-unstyled">
                                       <li>
                                          <a href="{{ url(ADMIN_PATH."/development/localization/language") }}" class="waves-effect"><span> <span class="fa fa-language"></span> @lang('Languages') </span> </a>
                                      </li>
                                       <li>
                                          <a href="{{ url(ADMIN_PATH."/development/localization/translation") }}" class="waves-effect"><span> <span class="fa fa-file-word-o"></span> @lang('Translation') </span> </a>
                                      </li>

                                  </ul>
                              </li>
                              <!-- /localization -->

                              <!-- Crud -->
                              <li class="has_sub">
                                  <a href="javascript:void(0);" class="waves-effect"><span> <i class="fa fa-globe" aria-hidden="true"></i> @lang('Crud') </span> <span class="menu-arrow"></span></a>
                                  <ul class="list-unstyled">
                                       <li>
                                          <a href="{{ url(ADMIN_PATH."/development/crud/crud/create") }}" class="waves-effect"><span> <span class="fa fa-language"></span> @lang('Create') </span> </a>
                                      </li>
                                  </ul>
                              </li>
                              <!-- /Crud -->
                          </ul>
                      </li> --}}
                    </ul>
                    <div class="clearfix"></div>
                </div>
         </div>
    </div>
</div>
 </div><div class="slimScrollBar" style="background: rgb(152, 166, 173); width: 5px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 105.335px; visibility: visible;"></div><div class="slimScrollRail" style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div></div>
