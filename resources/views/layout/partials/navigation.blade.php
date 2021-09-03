<ul class="navbar-nav list-group list-group-horizontal-md mr-auto">
    <li class="mr-1 {{ Request::is('/','index','adminDashboard') ? 'active' : '' }}">
        @hasrole('Admin')
            <a class="nav-link" href="{{ route('adminDashboard') }}">                                            
        @endrole
        @hasrole('Employee')
            <a class="nav-link" href="{{ route('index') }}"> 
        @endrole
        @hasrole('Manager')
            <a class="nav-link" href="{{ route('index') }}"> 
        @endrole
                <span class="lnr lnr-home pr-0 pr-lg-2"></span>
                <span class="d-none d-lg-inline">Dashboard</span>
            </a>
    </li>
    @hasrole('Admin')
    <li class="mr-1 nav-item dropdown {{ Request::is('systemUsers*','jobTitles*','payGrades*','jobCategory*','company*', 'locations*', 'skills*','configurations*') ? 'active' : '' }}">
        <a class="nav-link dropdown-toggle" href="javascript:void(0)">
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
                <a class="dropdown-item dropdown-toggle {{ Request::is('company*', 'locations*') ? 'active' : '' }}" href="#">Organization</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item {{ Request::is('company*') ? 'active' : '' }}" href="{{ route('company.index') }}">General Information</a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ Request::is('locations*') ? 'active' : '' }}" href="{{ route('locations.index') }}">Locations</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="dropdown-item dropdown-toggle {{ Request::is('skills*') ? 'active' : '' }}" href="#">Qualifications</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item {{ Request::is('skills*') ? 'active' : '' }}" href="{{ route('skills.index') }}">Skills</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="dropdown-item {{ Request::is('configurations*') ? 'active' : '' }}" href="{{ route('configurations.index') }}">Punch In/Out Settings</a>
            </li>
        </ul>
    </li>
    @endrole
    @hasrole('Admin|Manager')
    <li class="mr-1 nav-item dropdown {{ Request::is('employees*') ? 'active' : '' }}">
        <a class="nav-link dropdown-toggle" href="company" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="lnr lnr-exit pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">PIM</span></a>
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
                    @hasanyrole('Admin')
                    <li>
                        <a class="dropdown-item {{ Request::is('leaveEntitlement/create') ? 'active' : '' }}" href="{{ route('leaveEntitlement.create') }}">Add Entitlements</a>
                    </li>
                    @endrole
                    <li>
                        <a class="dropdown-item {{ Request::is('myEntitlements*') ? 'active' : '' }}" href="{{ route('myEntitlements.index') }}">My Entitlements</a>
                    </li>
                    @hasanyrole('Admin|Manager')
                    <li>
                        <a class="dropdown-item {{ Request::is('leaveEntitlement') ? 'active' : '' }}" href="{{ route('leaveEntitlement.index') }}">Employee Entitlements</a>
                    </li>
                    @endrole
                </ul>
            </li>
            @hasrole('Admin')
            <li>
                <a class="dropdown-item dropdown-toggle {{ Request::is('leavePeriod*','leaveTypes*','holidays*') ? 'active' : '' }}" href="javascript:void(0)">Configuration</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item {{ Request::is('leavePeriod*') ? 'active' : '' }}" href="{{ route('leavePeriod.index') }}">Leave Period</a>
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
                <a class="dropdown-item {{ Request::is('leave-list') ? 'active' : '' }}" href="{{ route('leave.list') }}">Leave List</a>
            </li>
            <li>
                <a class="dropdown-item {{ Request::is('leave-assign') ? 'active' : '' }}" href="{{ route('leave.assign') }}">Assign Leave</a>
            </li>
            @endrole
        </ul>
    </li>
    <li class="mr-1 {{ Request::is('mytimesheets*', 'timesheets*', 'punch*', 'employee-records', 'customers*', 'projects*') ? 'active' : '' }}">
        <a class="nav-link dropdown-toggle" href="javascript:void(0)"><span class="lnr lnr-clock pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Time</span></a>
        <ul class="dropdown-menu">
            <li>
                <a class="dropdown-item dropdown-toggle {{ Request::is('mytimesheets*', 'timesheets*') ? 'active' : '' }}" href="#">Timesheets</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item {{ Request::is('mytimesheets*') ? 'active' : '' }}" href="{{ route('mytimesheets.index') }}">My Timesheets</a>
                    </li>
                    @hasrole('Admin|Manager')
                    <li>
                        <a class="dropdown-item {{ Request::is('timesheets') ? 'active' : '' }}" href="{{ route('timesheets.index') }}">Employee Timesheets</a>
                    </li>
                    @endrole                                             
                </ul>
            </li>
            <li>
                <a class="dropdown-item dropdown-toggle {{ Request::is('punch*', 'employee-records') ? 'active' : '' }}" href="#">Attendance</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item {{ Request::is('punch') ? 'active' : '' }}" href="{{ route('punch.index') }}">My Records</a>
                    </li>
                    @if(isPunchInEnabled())
                    <li>
                        <a class="dropdown-item {{ Request::is('punch/create') ? 'active' : '' }}" href="{{ route('punch.create') }}">Punch In/Out</a>
                    </li>
                    @endif
                    @hasanyrole('Admin|Manager')
                    <li>
                        <a class="dropdown-item {{ Request::is('employee-records') ? 'active' : '' }}" href="{{ route('punch.employee-records') }}">Employee Records</a>
                    </li>                       
                    @endrole                                                                         
                </ul>
            </li>
            @hasanyrole('Admin')
            <li>
                <a class="dropdown-item dropdown-toggle {{ Request::is('customers*', 'projects*') ? 'active' : '' }}" href="#">Project Info</a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item {{ Request::is('customers*') ? 'active' : '' }}" href="{{ route('customers.index') }}">Customers</a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ Request::is('projects') ? 'active' : '' }}" href="{{ route('projects.index') }}">Projects</a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ Request::is('projects-import') ? 'active' : '' }}" href="{{ route('projects.import') }}">Projects Import</a>
                    </li>
                </ul>
            </li>
            @endrole                                        
        </ul>
    </li>
    <li class="mr-1 {{ Request::is('my-info') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('my-info') ? 'active' : '' }}" href="{{ route('myinfo') }}"><span class="lnr lnr-user pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">My Info</span></a>                                    
    </li>
    @hasrole('Admin')
    <li class="mr-1 {{ Request::is('reports') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('reports.index') }}"><span class="lnr lnr-download pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Reports</span></a>
        
    </li>
    <li class="mr-1 {{ Request::is('import-biometric-data') ? 'active' : '' }}">
        <a class="nav-link btn-ctm-space {{ Request::is('import-biometric-data') ? 'active' : '' }}" href="{{ route('upload.biometric') }}">
            <span class="lnr lnr-sync pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Biomatric Data</span>
        </a>
    </li>
    @endrole
    <li class="mr-1 {{ Request::is('payslips*') ? 'active' : '' }}">
        <a class="nav-link btn-ctm-space {{ Request::is('payslips') ? 'active' : '' }} " href="{{ route('payslips.index') }}"><span class="lnr lnr-briefcase pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Payroll</span></a>
    </li>
    @hasrole('Admin')
    <li class="mr-1 {{ Request::is('news') ? 'active' : '' }}">
        <a class="nav-link btn-ctm-space {{ Request::is('news') ? 'active' : '' }} " href="{{ route('news.index') }}"><span class="lnr lnr-bullhorn pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">News</span></a>
    </li>
    @endrole
    <li class="mr-1 cit_logout_mobile_menu" style="display: none;">
        <a class="nav-link btn-ctm-space" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="lnr lnr-power-switch pr-0 pr-lg-2"></span><span class="d-none d-lg-inline">Logout</span></a>
    </li>
</ul>