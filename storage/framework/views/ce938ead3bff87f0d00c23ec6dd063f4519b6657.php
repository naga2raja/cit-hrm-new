<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <?php if(!Route::is(['products','product-details','orders','customers','invoice','chat','calendar','inbox','profile','login','register','forgot-password','lock-screen','error-404','error-500','users','blank-page','maps-vector','components','form-basic-inputs','form-input-groups','form-horizontal','form-vertical','form-mask','form-validation','tables-basic','data-tables'])): ?>
        <title>Ventura - Dashboard</title>
        <?php endif; ?>
        <?php if(Route::is(['products'])): ?>
        <title>Ventura - Products</title>
		<?php endif; ?>
        <?php if(Route::is(['product-details'])): ?>
        <title>Ventura - Product Details</title>
        <?php endif; ?>
        <?php if(Route::is(['orders'])): ?>
        <title>Ventura - Orders</title>
        <?php endif; ?>
        <?php if(Route::is(['customers'])): ?>
        <title>Ventura - Customers</title>
        <?php endif; ?>
        <?php if(Route::is(['invoice'])): ?>
        <title>Ventura - Invoice</title>
        <?php endif; ?>
        <?php if(Route::is(['chat'])): ?>
        <title>Ventura - Chat</title>
        <?php endif; ?>
        <?php if(Route::is(['calendar'])): ?>
        <title>Ventura - Calendar</title>
        <?php endif; ?>
        <?php if(Route::is(['inbox'])): ?>
        <title>Ventura - Inbox</title>
        <?php endif; ?>
        <?php if(Route::is(['profile'])): ?>
        <title>Ventura - Profile</title>
        <?php endif; ?>
        <?php if(Route::is(['login'])): ?>
        <title>Ventura - Login</title>
        <?php endif; ?>
        <?php if(Route::is(['register'])): ?>
        <title>Ventura - Register</title>
        <?php endif; ?>
        <?php if(Route::is(['forgot-password'])): ?>
        <title>Ventura - Forgot Password</title>
        <?php endif; ?>
        <?php if(Route::is(['lock-screen'])): ?>
        <title>Ventura - Lock Screen</title>
        <?php endif; ?>
        <?php if(Route::is(['error-404'])): ?>
        <title>Ventura - Error 404</title>
        <?php endif; ?>
        <?php if(Route::is(['error-500'])): ?>
        <title>Ventura - Error 500</title>
        <?php endif; ?>
        <?php if(Route::is(['users'])): ?>
        <title>Ventura - Users</title>
        <?php endif; ?>
        <?php if(Route::is(['blank-page'])): ?>
        <title>Ventura - Blank Page</title>
        <?php endif; ?>
        <?php if(Route::is(['maps-vector'])): ?>
        <title>Ventura - Vector Maps</title>
        <?php endif; ?>
        <?php if(Route::is(['components'])): ?>
        <title>Ventura - Components</title>
        <?php endif; ?>
        <?php if(Route::is(['form-basic-inputs'])): ?>
        <title>Ventura - Basic Inputs</title>
        <?php endif; ?>
          <?php if(Route::is(['form-input-groups'])): ?>
        <title>Ventura - Form Input Groups</title>
        <?php endif; ?>
        <?php if(Route::is(['form-horizontal'])): ?>
        <title>Ventura - Horizontal Form</title>
        <?php endif; ?>
        <?php if(Route::is(['form-vertical'])): ?>
        <title>Ventura - Vertical Form</title>
        <?php endif; ?>
        <?php if(Route::is(['form-mask'])): ?>
        <title>Ventura - Form Mask</title>
        <?php endif; ?>
        <?php if(Route::is(['form-validation'])): ?>
        <title>Ventura - Form Validation</title>
        <?php endif; ?>
        <?php if(Route::is(['tables-basic'])): ?>
        <title>Ventura - Tables Basic</title>
        <?php endif; ?>
        <?php if(Route::is(['data-tables'])): ?>
        <title>Ventura - Data Tables</title>
        <?php endif; ?>
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		
		<!-- Feathericon CSS -->
        <link rel="stylesheet" href="css/feathericon.min.css">

        <link rel="stylesheet" href="css/style-orange.css">
        <link rel="stylesheet" href="css/style-red.css">
        <link rel="stylesheet" href="css/style-teal.css">
        <!-- Datatables CSS -->
		<link rel="stylesheet" href="plugins/datatables/datatables.min.css">
        <!-- Select2 CSS -->
		<link rel="stylesheet" href="css/select2.min.css">
        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-2.0.3.css">
        <!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
		
		<!-- Full Calander CSS -->
        <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
        <!-- Light Gallery CSS -->
		<link rel="stylesheet" href="plugins/light-gallery/css/lightgallery.min.css">
        <?php if(Route::is(['index'])): ?>
		<link rel="stylesheet" href="plugins/morris/morris.css">
		<?php endif; ?>
		<!-- Main CSS -->
        <link rel="stylesheet" href="css/style.css">
    </head><?php /**PATH C:\xampp\htdocs\ventura_landing\template\resources\views/layout/partials/head.blade.php ENDPATH**/ ?>