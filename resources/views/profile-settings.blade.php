@extends('layout.mainlayout')
@section('content')
<!-- Content -->
<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="index" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Profile</li>
														</ol>
														<h4 class="text-dark">Profile</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="user-card shadow-sm bg-white p-4 text-center ctm-border-radius card">
									<div class="user-info">
										<div class="user-avatar mb-4">
											<img src="{{ getProfileImage() }}" alt="{{ Auth::user()->name }}" class="img-fluid rounded-circle" width="100">
										</div>
										<div class="user-details">
											<h4>Welcome</h4>
											<h4><b>@if (!Auth::guest()) {{ Auth::user()->name }} @endif</b></h4>
											<span class="ctm-text-sm">{{ Auth::user()->email }}</span>
										</div>
									</div>
								</div>
								<!--
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white p-4 mb-4 card">
									<ul class="list-group">
										<li class="list-group-item text-center button-6"><a href="employment" class="text-dark">Employement</a></li>
										<li class="list-group-item text-center button-6"><a href="details" class="text-dark">Detail</a></li>
										<li class="list-group-item text-center button-6"><a href="documents" class="text-dark">Document</a></li>
										<li class="list-group-item text-center button-6"><a href="payroll" class="text-dark">Payroll</a></li>
										<li class="list-group-item text-center button-6"><a href="time-off" class="text-dark">Timeoff</a></li>
										<li class="list-group-item text-center button-6"><a href="profile-reviews" class="text-dark">Reviews</a></li>
										<li class="list-group-item text-center button-5 active"><a class="text-white" href="profile-settings">Settings</a></li>
									</ul>
								</div> -->
							</aside>
						</div>
				
						<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="row">
								<div class="col-lg-6 d-flex">
									<div class="card flex-fill ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Change Password</h4>
											<span class="ctm-text-sm">Your password needs to be at least 8 characters long.</span>
										</div>
										<div class="card-body">
											@if($message = Session::get('success'))
											<div class="alert alert-success">
												<p>{{$message}}</p>
											</div>
											@endif										

										  <form id="changePasswordFrom" method="post" action="{{ route('change-password') }}">	
										  		@csrf
												<div class="form-group">
													<label>Current Password <span class="text-danger">*</span></label>
													<input type="password" name="current_password"  id="current_password" class="form-control {{ $errors->has('current_password') ? 'is-invalid' : ''}}" required placeholder="Current Password">
													{!! $errors->first('current_password', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
												<div class="form-group">
													<label>New Password <span class="text-danger">*</span></label>
													<input type="password" name="new_password"  id="new_password"  class="form-control {{ $errors->has('new_password') ? 'is-invalid' : ''}}" required placeholder="New Password" id="pwd">
													{!! $errors->first('new_password', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
												<div class="form-group">
													<label>Repeat Password <span class="text-danger">*</span></label>
													<input type="password" name="confirm_password"  id="confirm_password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : ''}}" placeholder="Repeat Password">
													{!! $errors->first('confirm_password', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
												<div class="text-center">
													<button id="change_password" type="button" class="btn btn-theme button-1 ctm-border-radius text-white text-center">Change My Password</button>
												</div>
											</form>
										</div>
									</div>
								</div>

								<div class="col-lg-6 d-flex">
									<div class="card flex-fill ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Change Password Criteria</h4>
											<span class="ctm-text-sm">Guidelines for Strong Passwords</span>
										</div>
										<div class="card-body">
											<ul class="list-group">
												<li class="list-group-item"> - Must be at least 8 characters in length</li>
												<li class="list-group-item"> - Must contain at least one uppercase letter</li>
												<li class="list-group-item"> - Must contain at least one lowercase letter</li>
												<li class="list-group-item"> - Must contain a special character</li>
												<li class="list-group-item"> - Must contain at least one digit</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!--
							<div class="row">
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Team Member Notification Settings</h4>
											<p class="ctm-text-sm">You will receive notifications only for Team Leads.</p>
										</div>
										<div class="card-body">
											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="birthday" checked>
												<label class="custom-control-label" for="birthday"><span class="h6">Birthdays</span><br><span class="ctm-text-sm">Reasons to party with reminders a week and a day before a team member’s birthday.</span></label>
											</div>
											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="Work" checked>
												<label class="custom-control-label" for="Work"><span class="h6">Work Anniversaries</span><br><span class="ctm-text-sm">Never miss work anniversaries with reminders the week and the day before.</span></label>
											</div>
											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="Key1" checked>
												<label class="custom-control-label" for="Key1"><span class="h6">Key Dates</span><br><span class="ctm-text-sm">Informs and notify the day before key dates for each team member.</span></label>
											</div>
											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="Offboardings" checked>
												<label class="custom-control-label" for="Offboardings"><span class="h6">Off Boardings</span><br><span class="ctm-text-sm">Informs you when a team member has a leaving date set and reminds you the day before.</span></label>
											</div>
											<div class="custom-control custom-checkbox mb-3">
												<input type="checkbox" class="custom-control-input" id="Home" checked>
												<label class="custom-control-label" for="Home"><span class="h6">Work From Home Notifications</span><br><span class="ctm-text-sm">Never miss a notification that someone will be working from home.</span></label>
											</div>
											<div class="text-center">
												<button class="btn btn-theme button-1 ctm-border-radius text-white">Update Notification Settings</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						-->

						</div>
					</div>
				</div>
			</div>
						
			<!--/Content-->
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
@endsection
@push('scripts')
<script type="text/javascript">
	$('#change_password').on('click', function(){

		// alert($('#current_password').val());

		if (!$('#current_password').val()){
			alert("Current Password is required");
			$('#current_password').focus();
		}
		else if (!$('#new_password').val()){
			alert("New Password is required");
			$('#new_password').focus();
		}
		else if (!$('#confirm_password').val()){
			alert("Confirm Password is required");
			$('#confirm_password').focus();
		}
		else {
			if ($('#new_password').val() != $('#confirm_password').val()){
				alert("The confirm password and new password must match.");
				$('#confirm_password').focus();
			}
			if (!confirm("Aru you sure Change Password?")){
				return false;
			}
			$('#changePasswordFrom').submit();
		}		
	});

	$('#calendar_icon').on('click', function(){
		$('#in_date').datetimepicker("show");
	});
</script>
@endpush