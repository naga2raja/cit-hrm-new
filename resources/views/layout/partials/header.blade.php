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
                                <a href="index">
                                    <!-- <img src="{{ assetUrl('img/logo.png') }}" alt="logo image" class="img-fluid" width="100"> -->
                                    <h1 class="img-fluid text-white"><i>CIT-HRM</i></h1>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
                            <div class="user-block d-none d-lg-block">
                                <div class="row align-items-center">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="user-notification-block align-right d-inline-block">
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
                                        </div>
                                        <!-- /User notification-->
                                        <!-- user info-->
                                        <div class="user-info align-right dropdown d-inline-block header-dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class=" menu-style dropdown-toggle">
                                                <div class="user-avatar d-inline-block">
                                                    <img src="{{ assetUrl('img/profiles/profile.png') }}" alt="user avatar" class="rounded-circle img-fluid" width="55">
                                                </div>
                                            </a>
                                            <!-- Notifications -->
                                            <div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
                                                @if (!Auth::guest())
                                                <a class="dropdown-item p-2" href="employment">
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
                                                <img src="img/profiles/img-6.jpg" alt="user avatar" class="rounded-circle" width="50">
                                            </div>
                                        </a>
                                    </div>
                                    <div class="user-notification-block align-center">
                                        <div class="top-nav-search item-animated">
                                            <form>
                                                <input type="text" class="form-control" placeholder="Search here">
                                                <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Mobile Menu -->
                                    <div class="user-menu-items px-3 m-0">
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
            <nav class="navbar navbar-expand-md navbar-hover">
                <div class="collapse navbar-collapse header-menu-list d-flex bg-white rt_nav_header horizontal-layout nav-bottom" id="navbarHover" >
                    <div class="header-menu-list d-flex bg-white rt_nav_header horizontal-layout nav-bottom">
                        <div class="append mr-auto my-0 my-md-0 mr-auto">
                            <ul class="navbar-nav list-group list-group-horizontal-md mr-auto">
                                <li class="mr-1 {{ Request::is('','index','adminDashboard') ? 'active' : '' }}">
                                    @hasrole('Admin')
                                        <a class="nav-link" href="{{ route('adminDashboard') }}">                                            
                                    @endrole
                                    @hasrole('Employee')
                                        <a class="nav-link" href="/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                    @endrole
                                    @hasrole('Manager')
                                        <a class="nav-link" href="/" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                    @endrole
                                            <span class="lnr lnr-home pr-0 pr-lg-2"></span>
                                            <span class="d-none d-lg-inline">Dashboard</span>
                                        </a>
                                </li>
                                @hasrole('Admin')
                                <li class="mr-1 nav-item dropdown {{ Request::is('systemUsers*','jobTitles*','payGrades*','jobCategory*') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="employees" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="lnr lnr-users pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Admin</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item {{ Request::is('systemUsers*') ? 'active' : '' }}" href="{{ route('systemUsers.index') }}">User Management</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item dropdown-toggle {{ Request::is('jobTitles*','payGrades*','jobCategory*') ? 'active' : '' }}" href="#">Job</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item {{ Request::is('jobTitles*') ? 'active' : '' }}" href="{{ route('jobTitles.index') }}">Job Title</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item {{ Request::is('payGrades*') ? 'active' : '' }}" href="{{ route('payGrades.index') }}">Pay Grades</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item {{ Request::is('jobCategory*') ? 'active' : '' }}" href="{{ route('jobCategory.index') }}">Job Categories</a>
                                                </li>                                                
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="dropdown-item dropdown-toggle" href="#">Organization</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('company.index') }}">General Information</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('locations.index') }}">Locations</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="dropdown-item dropdown-toggle" href="#">Qualifications</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('skills.index') }}">Skills</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('configurations.index') }}">Punch In/Out Settings</a>
                                        </li>
                                    </ul>
                                </li>
                                @endrole
                                @hasrole('Admin|Manager')
                                <li class="mr-1 nav-item dropdown {{ Request::is('employees*') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="company" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="lnr lnr-apartment pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">PIM</span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item {{ Request::is('employees') ? 'active' : '' }}" href="{{ route('employees.index') }}">Employee List</a>
                                        </li>
                                        @hasrole('Admin')
                                        <li>
                                            <a class="dropdown-item {{ Request::is('employees/create') ? 'active' : '' }}" href="{{ route('employees.create') }}">Add Employee</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item {{ Request::is('employees-import') ? 'active' : '' }}" href="{{ route('employees.import') }}">Data Import</a>                                            
                                        </li>
                                        @endrole
                                    </ul>
                                </li>
                                @endrole
                                <li class="mr-1 {{ Request::is('leavePeriod*','leaveTypes*', 'holidays*', 'leaveEntitlement*', 'myEntitlements*', 'leave*') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)"><span class="lnr lnr-calendar-full pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Leave</span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item {{ Request::is('leave/create') ? 'active' : '' }}" href="{{ route('leave.create') }}">Apply Leave</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item {{ Request::is('leave') ? 'active' : '' }}" href="{{ route('leave.index') }}">My Leave</a>
                                        </li>
                                        
                                        <li>
                                            <a class="dropdown-item dropdown-toggle {{ Request::is('leaveEntitlement*', 'myEntitlements*') ? 'active' : '' }}" href="javascript:void(0)">Entitlements</a>
                                            <ul class="dropdown-menu">
                                                @hasanyrole('Admin|Manager')
                                                <li>
                                                    <a class="dropdown-item {{ Request::is('leaveEntitlement/create') ? 'active' : '' }}" href="{{ route('leaveEntitlement.create') }}">Add Entitlements</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item {{ Request::is('leaveEntitlement/index') ? 'active' : '' }}" href="{{ route('leaveEntitlement.index') }}">Employee Entitlements</a>
                                                </li>
                                                @endrole
                                                <li>
                                                    <a class="dropdown-item {{ Request::is('myEntitlements*') ? 'active' : '' }}" href="{{ route('myEntitlements.index') }}">My Entitlements</a>
                                                </li>
                                            </ul>
                                        </li>
                                        @hasrole('Admin')
                                        <li>
                                            <a class="dropdown-item dropdown-toggle {{ Request::is('leavePeriod*','leaveTypes*','holidays*') ? 'active' : '' }}" href="javascript:void(0)">Configuration</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item {{ Request::is('leavePeriod*') ? 'active' : '' }}" href="{{ route('leavePeriod.create') }}">Leave Period</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item {{ Request::is('leaveTypes*') ? 'active' : '' }}" href="{{ route('leaveTypes.index') }}">Leave Types</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item {{ Request::is('holidays*') ? 'active' : '' }}" href="{{ route('holidays.index') }}">Holidays</a>
                                                </li>
                                            </ul>
                                        </li>
                                        @endrole

                                        @hasanyrole('Admin|Manager')
                                        <li>
                                            <a class="dropdown-item {{ Request::is('leave/list') ? 'active' : '' }}" href="{{ route('leave.list') }}">Leave List</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('leave.assign') }}">Assign Leave</a>
                                        </li>
                                        @endrole
                                    </ul>
                                </li>
                                <li class="mr-1 {{ Request::is('mytimesheets*', 'timesheets*') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)"><span class="lnr lnr-briefcase pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Time</span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item dropdown-toggle {{ Request::is('mytimesheets*', 'timesheets*') ? 'active' : '' }}" href="#">Timesheets</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item {{ Request::is('mytimesheets*') ? 'active' : '' }}" href="{{ route('mytimesheets.index') }}">My Timesheets</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item {{ Request::is('timesheets*') ? 'active' : '' }}" href="{{ route('timesheets.index') }}">Employee Timesheets</a>
                                                </li>                                              
                                            </ul>
                                        </li>
                                        <li>
                                            <a class="dropdown-item dropdown-toggle" href="#">Attendance</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('punch.index') }}">My Records</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('punch.create') }}">Punch In/Out</a>
                                                </li>
                                                @hasanyrole('Admin|Manager')
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('punch.employee-records') }}">Employee Records</a>
                                                </li>                       
                                                @endrole                                                                         
                                            </ul>
                                        </li>
                                        @hasanyrole('Admin|Manager')
                                        <li>
                                            <a class="dropdown-item dropdown-toggle" href="#">Project Info</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('customers.index') }}">Customers</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('projects.index') }}">Projects</a>
                                                </li>
                                            </ul>
                                        </li>
                                        @endrole                                        
                                    </ul>
                                </li>
                                <li class="mr-1 {{ Request::is('my-info') ? 'active' : '' }}">
                                    <a class="nav-link {{ Request::is('my-info') ? 'active' : '' }}" href="{{ route('myinfo') }}"><span class="lnr lnr-star pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">My Info</span></a>                                    
                                </li>
                                @hasrole('Admin')
                                <li class="mr-1 {{ Request::is('reports','contact-reports','email-reports','leave-reports','payroll-reports','security-reports','work-from-home-reports') ? 'active' : '' }}">
                                    <a class="nav-link dropdown-toggle" href="reports"><span class="lnr lnr-rocket pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Reports</span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#">Employee List</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item dropdown-toggle" href="#">Configuration</a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="#">Job Title</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Pay Grades</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Employment Status</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Job Categories</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#">Work Shifts</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="mr-1 {{ Request::is('manage','admin','custom-timeoff-approver','line-manager','manage-leadership','payroll-admin','super-admin','team-lead','team-member') ? 'active' : '' }}">
                                    <a class="btn-ctm-space text-dark" href="manage"><span class="lnr lnr-sync pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Biomatric Data</span></a>
                                </li>
                                <li class="mr-1 {{ Request::is('settings','details','documents','employment','payroll','profile-reviews','profile-settings','settings-timeoff','time-off') ? 'active' : '' }}">
                                    <a class="btn-ctm-space text-dark" href="settings"><span class="lnr lnr-cog pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Settings</span></a>
                                </li>
                                @endrole
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- /Slide Nav -->
        </header> 
        <!-- /Header -->