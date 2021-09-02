	<!-- Inner wrapper -->
    <div class="inner-wrapper">
		<!-- Loader -->
		<div id="loader-wrapper">
			<div class="loader">
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			</div>
		</div>
    <!-- Header -->
    <header class="header">
            <!-- Top Header Section -->
            <div class="top-header-section">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                            <div class="logo my-3 my-sm-0">
                                <a href="javascript::void(0)">
                                    <!-- <img src="{{ assetUrl('img/logo.png') }}" alt="logo image" class="img-fluid" width="100"> -->
                                    <h2 class="img-fluid text-white">CIT-HRM</h2>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                            <div class="user-block d-none d-lg-block">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        {{-- <div class="user-notification-block align-right d-inline-block">
                                            <div class="top-nav-search item-animated">
                                                <form>
                                                    <input type="text" class="form-control" placeholder="Search here">
                                                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- User notification-->
                                        <div class="user-notification-block align-right d-inline-block">
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item item-animated" data-toggle="tooltip" data-placement="top" title="" data-original-title="Apply Leave">
                                                    <a href="leave" class="font-23 menu-style text-white align-middle">
                                                        <span class="lnr lnr-briefcase position-relative"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> --}}
                                        {{-- <div class="user-notification-block align-right d-inline-block">
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item item-animated" data-toggle="tooltip" data-placement="top" title="" data-original-title="Apply Leave">
                                                    <a href="{{ route('leave.create') }}" class="font-23 menu-style text-white align-middle">
                                                        <span class="lnr lnr-calendar-full position-relative"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>  --}}
                                        <!-- /User notification-->
                                        <!-- user info-->
                                        <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class=" menu-style dropdown-toggle">
                                                <div class="user-avatar d-inline-block">
                                                    <img src="{{ getProfileImage() }}" alt="user avatar" class="rounded-circle img-fluid" width="55">
                                                </div>
                                            </a>
                                            <!-- Notifications -->
                                            <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
                                                @if (!Auth::guest())
                                                <a class="dropdown-item p-2" href="{{ route('myinfo') }}">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-user mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">{{ Auth::user()->name }}</span>
                                                        </span>
                                                    </span>
                                                </a>
                                                @endif
                                                <a class="dropdown-item p-2" href="{{ route('profile-settings') }}">
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-cog mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">Settings</span>
                                                        </span>
                                                    </span>
                                                </a>

                                                <a class="dropdown-item p-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                                                    <span class="media align-items-center">
                                                        <span class="lnr lnr-power-switch mr-3"></span>
                                                        <span class="media-body text-truncate">
                                                            <span class="text-truncate">Logout</span>
                                                        </span>
                                                    </span>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>

                                            </div>
                                            <!-- Notifications -->
                                        </div>
                                        <!-- /User info-->
                                    </div>
                                </div>
                            </div>
                            <div class="d-block d-lg-none">
                                <a href="javascript:void(0)">
                                    <span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
                                </a>
                                <!-- Offcanvas menu -->
                                    <div class="offcanvas-menu" id="offcanvas_menu">
                                    <span class="lnr lnr-cross float-left display-6 position-absolute t-1 l-1 text-white" id="close_navSidebar"></span>
                                    <div class="user-info align-center bg-theme text-center">
                                        <a href="javascript:void(0)" class="d-block menu-style text-white">
                                            <div class="user-avatar d-inline-block mr-3">
                                                {{-- <img src="{{ assetUrl('img/profiles/img-6.jpg') }}" alt="user avatar" class="rounded-circle" width="50"> --}}
                                                <img src="{{ getProfileImage() }}" alt="user avatar" class="rounded-circle" width="50">
                                            </div>
                                        </a>
                                    </div>
                                    {{-- <div class="user-notification-block align-center">
                                        <div class="top-nav-search item-animated">
                                            <form>
                                                <input type="text" class="form-control" placeholder="Search here">
                                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr> --}}
                                    <!-- Mobile Menu -->
                                    <div class="user-menu-items px-3 m-0" id="cithrm_mobile_menu">
                                        @include('layout/partials/navigation')
                                        {{-- 
                                        <a class="px-0 pb-2 pt-0" href="index">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-home mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Dashboard</span>
                                                </span>
                                            </span>
                                        </a>
                                        @hasrole('Admin')
                                        <a class="p-2" href="employees">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-users mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Employees</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="company">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-apartment mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Company</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="calendar">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-calendar-full mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Calendar</span>
                                                </span>
                                            </span>
                                        </a>
                                        @endrole
                                        <a class="p-2" href="leave">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-briefcase mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Leave</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="reviews">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-star mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Reviews</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="reports">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-rocket mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Reports</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="manage">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-sync mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Manage</span>
                                                </span>
                                            </span>
                                        </a>
                                        
                                        <a class="p-2" href="settings">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-cog mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Settings</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="employment">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-user mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Profile</span>
                                                </span>
                                            </span>
                                        </a>
                                        <a class="p-2" href="login">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-power-switch mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Logout</span>
                                                </span>
                                            </span>
                                        </a>

                                        @hasrole('Admin')
                                        <a class="p-2" href="/admin-page">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-users mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Admin demo</span>
                                                </span>
                                            </span>
                                        </a>
                                        @endrole
                                        @hasrole('Employee')
                                        <a class="p-2" href="/emp-page">
                                            <span class="media align-items-center">
                                                <span class="lnr lnr-users mr-3"></span>
                                                <span class="media-body text-truncate text-left">
                                                    <span class="text-truncate text-left">Employees Demo</span>
                                                </span>
                                            </span>
                                        </a>
                                        @endrole
                                    --}}
                                    </div>
                                </div>
                                <!-- /Offcanvas menu --> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Top Header Section -->
            <!-- Slide Nav -->
            <nav class="navbar navbar-expand-md navbar-hover" id="cithrm_desktop_menu_section">
                <div class="collapse navbar-collapse header-menu-list d-flex bg-white rt_nav_header horizontal-layout nav-bottom" id="navbarHover">
                    <div class="header-menu-list d-flex bg-white rt_nav_header horizontal-layout nav-bottom">
                        <div class="append mr-auto my-0 my-md-0 mr-auto">
                            @include('layout/partials/navigation')
                        </div>
                    </div>
                </div>
            </nav>
            <!-- /Slide Nav -->
        </header> 
        <!-- /Header -->