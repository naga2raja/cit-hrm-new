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
											<img src="img/profiles/img-6.jpg" alt="User Avatar" class="img-fluid rounded-circle" width="100">
										</div>
										<div class="user-details">
											<h4><b>Welcome {{ Auth::user()->name }}</b></h4>
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

										  <form method="post" action="{{ route('change-password') }}">	
										  		@csrf
												<div class="form-group">
													<input type="password" name="current_password" class="form-control {{ $errors->has('current_password') ? 'is-invalid' : ''}}" required placeholder="Current Password">
													{!! $errors->first('current_password', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
												<div class="form-group">
													<input type="password" name="new_password"  class="form-control {{ $errors->has('new_password') ? 'is-invalid' : ''}}" required placeholder="New Password" id="pwd">
													{!! $errors->first('new_password', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
												<div class="form-group">
													<input type="password" name="confirm_password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : ''}}" placeholder="Repeat Password">
													{!! $errors->first('confirm_password', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
												<div class="text-center">
													<button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white text-center">Change My Password</button>
												</div>
											</form>
										</div>
									</div>
								</div>
								
								<div class="col-lg-6 d-flex">
									<div class="card reminder flex-fill ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Today's News</h4>
										</div>
										<div class="card-body">
											@if($message = Session::get('news_success'))
											<div class="alert alert-success">
												<p>{{$message}}</p>
											</div>
											@endif	

											<form method="POST" action="{{ route('news.store') }}">
												@csrf
												<div class="row filter-row">
													<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
														<div class="form-group">
															<label>Title</label>
															<input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" name="title" >
															{!! $errors->first('title', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row filter-row">
													<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
														<div class="form-group">
															<label>News <span class="text-danger">*</span></label>
															<textarea class="form-control {{ $errors->has('news') ? 'is-invalid' : ''}}" name="news" ></textarea>
															{!! $errors->first('news', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row filter-row">
													<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
														<div class="form-group">
															<label>Category <span class="text-danger">*</span></label>
															<select class="form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="category" id="category" style="width: 100%">
																<option value="Information">Information</option>
																<option value="Important">Important</option>
																<option value="Urgent">Urgent</option>
																<option value="Leave">Leave</option>
																<option value="Birtday">Birtday</option>
																<option value="Event">Event</option>
																<option value="Project">Project</option>
															</select>
															{!! $errors->first('category', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
														<button type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4"><i class="fa fa-paper-plane"></i> Post </button>
													</div>
													<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
														<button type="reset" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4"> Cancel </button>
													</div>
												</div>												
											</form>
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