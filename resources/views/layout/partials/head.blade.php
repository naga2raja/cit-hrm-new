<!DOCTYPE html>
<html lang="en">
	<head>
	
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		@if(!Route::is(['employees.create', 'employees.edit', 'employees.index', 'admin','calendar','company','contact-reports','create-review','custom-timeoff-approver','details','documents','edit-review','email-reports','employees-dashboard','employees-list','employees-offices-list','employees-offices','employees-team','employees','employment','forgot-password','leave-reports','leave','line-manager','login','manage-leadership','manage','payroll-admin','payroll-reports','payroll','profile-reviews','profile-settings','register','reports','reviews','security-reports','settings-timeoff','settings','super-admin','team-lead','team-member','time-off','work-from-home-reports']))
		<title>Dashboard Page</title>
		@endif
		
		@if(Route::is(['employees.create']))
		<title>Add Employee</title>
		@endif
		@if(Route::is(['employees.edit']))
		<title>Edit Employee</title>
		@endif
		@if(Route::is(['admin']))
		<title>Manage Page</title>
		@endif
		@if(Route::is(['calendar']))
		<title>Calendar Page</title>
		@endif
		@if(Route::is(['company']))
		<title>Company Page</title>
		@endif
		@if(Route::is(['contact-reports']))
		<title>Reports Page</title>
		@endif
		@if(Route::is(['create-review']))
		<title>Create Review Page</title>
		@endif
		@if(Route::is(['custom-timeoff-approver']))
		<title>Manage Page</title>
		@endif
		@if(Route::is(['details']))
		<title>Profile Page</title>
		@endif
		@if(Route::is(['documents']))
		<title>Profile Page</title>
		@endif
		@if(Route::is(['edit-review']))
		<title>Edit Review Page</title>
		@endif
		@if(Route::is(['email-reports']))
		<title>Reports Page</title>
		@endif
		@if(Route::is(['employees-dashboard']))
		<title>index Page</title>
		@endif
		@if(Route::is(['employees']))
		<title>Employees Page</title>
		@endif
		@if(Route::is(['employees-offices-list']))
		<title>Employees Page</title>
		@endif
		@if(Route::is(['employees.index']))
		<title>Employees</title>
		@endif
		@if(Route::is(['employees-team']))
		<title>Employees Page</title>
		@endif
		@if(Route::is(['employees']))
		<title>Employees Page</title>
		@endif
		@if(Route::is(['employment']))
		<title>Profile Page</title>
		@endif
		@if(\Request::is('password/reset/*'))
		<title>Reset Password</title>
		@endif
		@if(Route::is(['leave-reports']))
		<title>Reports Page</title>
		@endif
		@if(Route::is(['leave']))
		<title>Leave Page</title>
		@endif
		@if(Route::is(['line-manager']))
		<title>Manage Page</title>
		@endif
		@if(Route::is(['login']))
		<title>Login Page</title>
		@endif
		@if(Route::is(['manage-leadership']))
		<title>Manage Page</title>
		@endif
		@if(Route::is(['manage']))
		<title>Manage Page</title>
		@endif
		@if(Route::is(['payroll-admin']))
		<title>Manage Page</title>
		@endif
		@if(Route::is(['payroll-reports']))
		<title>Reports Page</title>
		@endif
		@if(Route::is(['payroll']))
		<title>Profile Page</title>
		@endif
		@if(Route::is(['profile-reviews']))
		<title>Profile Page</title>
		@endif
		@if(Route::is(['profile-settings']))
		<title>Profile Page</title>
		@endif
		@if(Route::is(['register']))
		<title>Register Page</title>
		@endif
		@if(Route::is(['reports']))
		<title>Reports Page</title>
		@endif
		@if(Route::is(['reviews']))
		<title>Reviews Page</title>
		@endif
		@if(Route::is(['security-reports']))
		<title>Reports Page</title>
		@endif
		@if(Route::is(['settings-timeoff']))
		<title>Settings Page</title>
		@endif
		@if(Route::is(['settings']))
		<title>Settings Page</title>
		@endif
		@if(Route::is(['super-admin']))
		<title>Manage Page</title>
		@endif
		@if(Route::is(['team-lead']))
		<title>Manage Page</title>
		@endif
		@if(Route::is(['team-member']))
		<title>Manage Page</title>
		@endif
		@if(Route::is(['time-off']))
		<title>Profile Page</title>
		@endif
		@if(Route::is(['work-from-home-reports']))
		<title>Reports Page</title>
		@endif
		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="img/favicon.png">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ assetUrl('css/bootstrap.min.css') }}">
		<!-- Linearicon Font -->
		<link rel="stylesheet" href="{{ assetUrl('css/lnr-icon.css') }}">
				
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ assetUrl('css/font-awesome.min.css') }}">
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="{{ assetUrl('css/bootstrap-datetimepicker.min.css') }}">
		<!-- Tagsinput CSS -->
		<link rel="stylesheet" href="{{ assetUrl('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{ assetUrl('plugins/select2/select2.min.css') }}">
		
		<!-- Full Calander CSS -->
        <link rel="stylesheet" href="{{ assetUrl('plugins/fullcalendar/fullcalendar.min.css') }}">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="{{ assetUrl('css/style.css') }}">

        <script src="{{ asset('js/locations.js')}}"></script>        
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	</head>