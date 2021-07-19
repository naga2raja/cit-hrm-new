<!DOCTYPE html>
<html lang="en">
	<head>
	
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php if(!Route::is(['employees.create', 'employees.edit', 'employees.index', 'admin','calendar','company','contact-reports','create-review','custom-timeoff-approver','details','documents','edit-review','email-reports','employees-dashboard','employees-list','employees-offices-list','employees-offices','employees-team','employees','employment','forgot-password','leave-reports','leave','line-manager','login','manage-leadership','manage','payroll-admin','payroll-reports','payroll','profile-reviews','profile-settings','register','reports','reviews','security-reports','settings-timeoff','settings','super-admin','team-lead','team-member','time-off','work-from-home-reports'])): ?>
		<title>Dashboard Page</title>
		<?php endif; ?>
		
		<?php if(Route::is(['employees.create'])): ?>
		<title>Add Employee</title>
		<?php endif; ?>
		<?php if(Route::is(['employees.edit'])): ?>
		<title>Edit Employee</title>
		<?php endif; ?>
		<?php if(Route::is(['admin'])): ?>
		<title>Manage Page</title>
		<?php endif; ?>
		<?php if(Route::is(['calendar'])): ?>
		<title>Calendar Page</title>
		<?php endif; ?>
		<?php if(Route::is(['company'])): ?>
		<title>Company Page</title>
		<?php endif; ?>
		<?php if(Route::is(['contact-reports'])): ?>
		<title>Reports Page</title>
		<?php endif; ?>
		<?php if(Route::is(['create-review'])): ?>
		<title>Create Review Page</title>
		<?php endif; ?>
		<?php if(Route::is(['custom-timeoff-approver'])): ?>
		<title>Manage Page</title>
		<?php endif; ?>
		<?php if(Route::is(['details'])): ?>
		<title>Profile Page</title>
		<?php endif; ?>
		<?php if(Route::is(['documents'])): ?>
		<title>Profile Page</title>
		<?php endif; ?>
		<?php if(Route::is(['edit-review'])): ?>
		<title>Edit Review Page</title>
		<?php endif; ?>
		<?php if(Route::is(['email-reports'])): ?>
		<title>Reports Page</title>
		<?php endif; ?>
		<?php if(Route::is(['employees-dashboard'])): ?>
		<title>index Page</title>
		<?php endif; ?>
		<?php if(Route::is(['employees'])): ?>
		<title>Employees Page</title>
		<?php endif; ?>
		<?php if(Route::is(['employees-offices-list'])): ?>
		<title>Employees Page</title>
		<?php endif; ?>
		<?php if(Route::is(['employees.index'])): ?>
		<title>Employees</title>
		<?php endif; ?>
		<?php if(Route::is(['employees-team'])): ?>
		<title>Employees Page</title>
		<?php endif; ?>
		<?php if(Route::is(['employees'])): ?>
		<title>Employees Page</title>
		<?php endif; ?>
		<?php if(Route::is(['employment'])): ?>
		<title>Profile Page</title>
		<?php endif; ?>
		<?php if(\Request::is('password/reset/*')): ?>
		<title>Reset Password</title>
		<?php endif; ?>
		<?php if(Route::is(['leave-reports'])): ?>
		<title>Reports Page</title>
		<?php endif; ?>
		<?php if(Route::is(['leave'])): ?>
		<title>Leave Page</title>
		<?php endif; ?>
		<?php if(Route::is(['line-manager'])): ?>
		<title>Manage Page</title>
		<?php endif; ?>
		<?php if(Route::is(['login'])): ?>
		<title>Login Page</title>
		<?php endif; ?>
		<?php if(Route::is(['manage-leadership'])): ?>
		<title>Manage Page</title>
		<?php endif; ?>
		<?php if(Route::is(['manage'])): ?>
		<title>Manage Page</title>
		<?php endif; ?>
		<?php if(Route::is(['payroll-admin'])): ?>
		<title>Manage Page</title>
		<?php endif; ?>
		<?php if(Route::is(['payroll-reports'])): ?>
		<title>Reports Page</title>
		<?php endif; ?>
		<?php if(Route::is(['payroll'])): ?>
		<title>Profile Page</title>
		<?php endif; ?>
		<?php if(Route::is(['profile-reviews'])): ?>
		<title>Profile Page</title>
		<?php endif; ?>
		<?php if(Route::is(['profile-settings'])): ?>
		<title>Profile Page</title>
		<?php endif; ?>
		<?php if(Route::is(['register'])): ?>
		<title>Register Page</title>
		<?php endif; ?>
		<?php if(Route::is(['reports'])): ?>
		<title>Reports Page</title>
		<?php endif; ?>
		<?php if(Route::is(['reviews'])): ?>
		<title>Reviews Page</title>
		<?php endif; ?>
		<?php if(Route::is(['security-reports'])): ?>
		<title>Reports Page</title>
		<?php endif; ?>
		<?php if(Route::is(['settings-timeoff'])): ?>
		<title>Settings Page</title>
		<?php endif; ?>
		<?php if(Route::is(['settings'])): ?>
		<title>Settings Page</title>
		<?php endif; ?>
		<?php if(Route::is(['super-admin'])): ?>
		<title>Manage Page</title>
		<?php endif; ?>
		<?php if(Route::is(['team-lead'])): ?>
		<title>Manage Page</title>
		<?php endif; ?>
		<?php if(Route::is(['team-member'])): ?>
		<title>Manage Page</title>
		<?php endif; ?>
		<?php if(Route::is(['time-off'])): ?>
		<title>Profile Page</title>
		<?php endif; ?>
		<?php if(Route::is(['work-from-home-reports'])): ?>
		<title>Reports Page</title>
		<?php endif; ?>
		<!-- Favicon -->
		<link rel="icon" type="image/x-icon" href="img/favicon.png">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="<?php echo e(assetUrl('css/bootstrap.min.css')); ?>">
		<!-- Linearicon Font -->
		<link rel="stylesheet" href="<?php echo e(assetUrl('css/lnr-icon.css')); ?>">
				
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="<?php echo e(assetUrl('css/font-awesome.min.css')); ?>">
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="<?php echo e(assetUrl('css/bootstrap-datetimepicker.min.css')); ?>">
		<!-- Tagsinput CSS -->
		<link rel="stylesheet" href="<?php echo e(assetUrl('plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')); ?>">
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="<?php echo e(assetUrl('plugins/select2/select2.min.css')); ?>">
		
		<!-- Full Calander CSS -->
        <link rel="stylesheet" href="<?php echo e(assetUrl('plugins/fullcalendar/fullcalendar.min.css')); ?>">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="<?php echo e(assetUrl('css/style.css')); ?>">
		<!-- Multi select checkbox -->		

        <script src="<?php echo e(asset('js/locations.js')); ?>"></script>        
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	</head><?php /**PATH D:\xampp\htdocs\cit-hrm-new\resources\views/layout/partials/head.blade.php ENDPATH**/ ?>