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
															<li class="breadcrumb-item d-inline-block active">Employees</li>
														</ol>
														<h4 class="text-dark">Add Employee</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-header">
										<h4 class="card-title mb-0">Details Content</h4>
									</div>
									<div class="card-body">
										<div id="user_profile_list" class="list-group border-none">
											<a class="list-group-item list-group-item-action border-none" href="#personal">Personal Details</a>
											<!-- <a class="list-group-item list-group-item-action border-none" href="#contact">Contact Details</a>
											<a class="list-group-item list-group-item-action border-none" href="#jobDetails">Job Details</a>
											 <a class="list-group-item list-group-item-action border-none" href="javascript:void(0)">Salary</a> -->
										</div>
									</div>
								</div>
							</aside>
						</div>

						<div class="col-xl-9 col-lg-8 col-md-12">
							@if($message = Session::get('success'))
								<div class="alert alert-success">
									<p>{{$message}}</p>
								</div>
							@endif
							
							<div class="accordion add-employee" id="accordion-details">
								<div class="card shadow-sm ctm-border-radius">
									<div class="card-header" id="personal">
										<h4 class="cursor-pointer mb-0">
											<a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
												Personal Details
											<br><span class="ctm-text-sm">Organized and secure.</span>
											</a>
										</h4>
									</div>

									
						<div class="card-body p-0">
							<div id="basic-one" class="collapse show ctm-padding" aria-labelledby="personal" data-parent="#accordion-details">
								<div>																		

											<form method="POST" action="{{ route('employees.store') }}">
												@csrf
												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label>Employee Name <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}" placeholder="First Name" name="first_name" required value="{{ old('first_name') }}">
															{!! $errors->first('first_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{ old('middle_name') }}">
														</div>
													</div>
													<div class="col-sm-3">
														<div class="form-group">
															<input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}" placeholder="Last Name" required name="last_name" value="{{ old('last_name') }}">
															{!! $errors->first('last_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label>Email Address <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="" required name="email" value="{{ old('email') }}">
															{!! $errors->first('email', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>										

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label>Employee Id <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<input type="text" class="form-control {{ $errors->has('employee_id') ? 'is-invalid' : ''}}" placeholder="" required name="employee_id" value="{{ old('employee_id') }}">
															{!! $errors->first('employee_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label>Status <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<select class="form-control select {{ $errors->has('status') ? 'is-invalid' : ''}}" name="status" required value="{{ old('status') }}">
																<option value="Active" {{old ('status') == 'Active' ? 'selected' : ''}}>Active</option>
																<option value="In active" {{old ('status') == 'In active' ? 'selected' : ''}}>Inactive</option>
															</select>
															{!! $errors->first('status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label>Password <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="" required>
															{!! $errors->first('password', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>													
													</div>
													<div class="col-sm-3">
														<input type="checkbox" onclick="showPassword('password')">  <b>Show Password</b>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label>Confirm Password <span class="text-danger">*</span></label>
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<input type="password" name="confirm_password" id="confirm_password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : ''}}" placeholder="" required>
															{!! $errors->first('confirm_password', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>	
													</div>
												</div>

												<div class="row">
													<div class="col-sm-2">
														<div class="form-group">
															<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
														</div>
													</div>
												</div>
												<hr>

												<div class="row">
													<div class="col-sm-2"></div>
													<div class="col-sm-4 text-center">
														<button class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" type="submit">Save</button>
														<a href="{{ route('employees.index') }}" class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">Cancel</a>
													</div>
												</div>

											</form>
										
									</div>
								</div>
							</div>	

						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection

@push('scripts')
	<script>
		function showPassword() {
            var temp = document.getElementById("password");
            if (temp.type === "password") {
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }
	</script>
@endpush