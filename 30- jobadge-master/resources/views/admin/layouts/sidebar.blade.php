<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{auth()->guard('admin')->user()->getAdminImage()}}" width="50" height="50" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->guard('admin')->user()->name}}</div>
                <div class="email">{{auth()->guard('admin')->user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{route('admin.get.profile')}}"><i class="material-icons">person</i>Profile</a></li>
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
                    <a href="{{route('admin.contents')}}">
                        <i class="material-icons">note</i>
                        <span>Site Contents</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.users')}}">
                        <i class="material-icons">people</i>
                        <span>Job Seekers</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.companies')}}">
                        <i class="material-icons">business</i>
                        <span>Companies</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.jobs')}}">
                        <i class="material-icons">work</i>
                        <span>Jobs</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.categories')}}">
                        <i class="material-icons">view_module</i>
                        <span>Categories</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.countries')}}">
                        <i class="material-icons">public</i>
                        <span>Countries</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.industries')}}">
                        <i class="material-icons">card_travel</i>
                        <span>Industries</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.nationalities')}}">
                        <i class="material-icons">perm_identity</i>
                        <span>Nationalities</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.joblevels')}}">
                        <i class="material-icons">horizontal_split</i>
                        <span>Job Levels</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.jobtypes')}}">
                        <i class="material-icons">horizontal_split</i>
                        <span>Job Types</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.sizes')}}">
                        <i class="material-icons">reorder</i>
                        <span>Companies Sizes</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.packages')}}">
                        <i class="material-icons">style</i>
                        <span>Packages</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.posts')}}">
                        <i class="material-icons">description</i>
                        <span>Posts</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.blogs.index')}}">
                        <i class="material-icons">description</i>
                        <span>Blogs</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.feedbacks')}}">
                        <i class="material-icons">feedback</i>
                        <span>Feedbacks</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.descriptions')}}">
                        <i class="material-icons">description</i>
                        <span>Job Descriptions</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.visitors')}}">
                        <i class="material-icons">people</i>
                        <span>Visitors</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.ads')}}">
                        <i class="material-icons">add_to_photos</i>
                        <span>Ads</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.subscriptions.get')}}">
                        <i class="material-icons">feedback</i>
                        <span>Subscriptions</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
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