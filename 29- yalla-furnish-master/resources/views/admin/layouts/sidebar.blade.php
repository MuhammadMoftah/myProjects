<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{asset('assets/images/user.png')}}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->guard('web')->user()->name}}</div>
                <div class="email">{{auth()->guard('web')->user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('admin.logout')}}"><i class="material-icons">input</i>Sign Out</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="{{route('admin.malls.get')}}">
                        <i class="material-icons">home_work</i>
                        <span>Malls</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.subadmins.get')}}">
                        <i class="material-icons">people</i>
                        <span>Sub Admins</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.users.get')}}">
                        <i class="material-icons">people</i>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.creators.get')}}">
                        <i class="material-icons">people</i>
                        <span>Content Creators</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.roles.get')}}">
                        <i class="material-icons">lock</i>
                        <span>Roles</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.topics.get')}}">
                        <i class="material-icons">note</i>
                        <span>Topics</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.uitilities.get')}}">
                        <i class="material-icons">note</i>
                        <span>Gallery</span>
                    </a>
                </li>
               
                <li>
                    <a href="{{route('admin.idea')}}">
                        <i class="material-icons">note</i>
                        <span>Ideas</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.products.index')}}">
                        <i class="material-icons">shop</i>
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.showrooms')}}">
                        <i class="material-icons">store</i>
                        <span>Showrooms</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.materials.get')}}">
                        <i class="material-icons">style</i>
                        <span>Frame Materials</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.categories.get')}}">
                        <i class="material-icons">style</i>
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.upholsteries.get')}}">
                        <i class="material-icons">style</i>
                        <span>Upholsteries Material</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.styles.get')}}">
                        <i class="material-icons">style</i>
                        <span>Styles</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.colors.get')}}">
                        <i class="material-icons">style</i>
                        <span>Colors</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.countries.get')}}">
                        <i class="material-icons">public</i>
                        <span>Countries</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.cities.get')}}">
                        <i class="material-icons">public</i>
                        <span>Cities</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.districts.get')}}">
                        <i class="material-icons">public</i>
                        <span>Districts</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.branches')}}">
                        <i class="material-icons">public</i>
                        <span>Branches</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>