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
											<h4 class="text-dark">Edit Employee</h4>
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
								<a class="list-group-item list-group-item-action border-none" href="#contact">Contact Details</a>
								<a class="list-group-item list-group-item-action border-none" href="#jobDetails">Job Details</a>
								<!-- <a class="list-group-item list-group-item-action border-none" href="javascript:void(0)">Salary</a> -->
							</div>
						</div>
					</div>
				</aside>
			</div>
			
			<div class="col-xl-9 col-lg-8  col-md-12">

			@if($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{$message}}</p>
				</div>
				@endif	

			<form method="POST" action="{{ route('employees.update', $id) }}" enctype="multipart/form-data">
				@csrf
				{{ method_field('PUT') }}

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
								
									<div class="row">
										<!-- <div class="col form-group">
											<input type="text" class="form-control" placeholder="First Name">
										</div>
										<div class="col form-group">
											<input type="text" class="form-control" placeholder="Last Name">
										</div> -->
										<div class="col-sm-4">
											<p class="mb-2">First Name</p>
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}" placeholder="First Name" name="first_name" required value="{{ old('first_name', $employee->first_name) }}">
													{!! $errors->first('first_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
											<div class="col-sm-4">
												<p class="mb-2">Middle Name</p>
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{ old('middle_name', $employee->middle_name) }}">
												</div>
											</div>
											<div class="col-sm-4">
												<p class="mb-2">Last Name</p>
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}" placeholder="Last Name" required name="last_name" value="{{ old('last_name', $employee->last_name) }}">
													{!! $errors->first('last_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>

										<div class="col-12 form-group">
											<p class="mb-2">Email Address</p>
													<input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="" required name="email" value="{{ old('email', $employee->email) }}">
													{!! $errors->first('email', '<span class="invalid-feedback" role="alert">:message</span>') !!}
										</div>

										<div class="col-sm-6">
											<div class="form-group">
												<p class="mb-2">Employee Id</p>
												<input type="text" class="form-control {{ $errors->has('employee_id') ? 'is-invalid' : ''}}" placeholder="" required name="employee_id" value="{{ old('employee_id', $employee->employee_id) }}">
												{!! $errors->first('employee_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<p class="mb-2">Status</p>
												<select class="form-control select {{ $errors->has('status') ? 'is-invalid' : ''}}" name="status" required value="{{ old('status') }}">
													<option value="Active" {{old ('status', $employee->status) == 'Active' ? 'selected' : ''}}>Active</option>
													<option value="In active" {{old ('status', $employee->status) == 'In active' ? 'selected' : ''}}>Inactive</option>
												</select>
												{!! $errors->first('status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>

										<div class="col-6 form-group mb-0">
											<p class="mb-2">Gender</p>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="Male" name="gender" {{old ('gender', $employee->gender) == 'Male' ? 'checked' : ''}} value="Male">
												<label class="custom-control-label" for="Male">Male</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="Female" name="gender" {{old ('gender', $employee->gender) == 'Female' ? 'checked' : ''}} value="Female">
												<label class="custom-control-label" for="Female">Female</label>
											</div>
										</div>

										<div class="col-sm-6">
											<div class="form-group">
												<p class="mb-2">Marital Status</p>
												<select class="form-control select {{ $errors->has('marital_status') ? 'is-invalid' : ''}}" name="marital_status" required value="{{ old('marital_status') }}">
													<option value="0" {{old ('marital_status', $employee->marital_status) == '0' ? 'selected' : ''}}>Single</option>
													<option value="1" {{old ('marital_status', $employee->marital_status) == '1' ? 'selected' : ''}}>Married</option>
												</select>
												{!! $errors->first('marital_status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>

										<div class="col-md-6 form-group mb-0">
											<p class="mb-2">Date of Birth	</p>
											<div class="cal-icon">
												<input class="form-control datetimepicker1 cal-icon-input" type="text" placeholder="Date" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth) }}" id="datetimepicker1">
											</div>
										</div>

										<div class="col-md-6">
											
												<p class="mb-2">Profile image</p>
												@if($employee->profile_photo)
												<div id="preview_profile_image" style="max-width:200px;position: relative;">
													<img src="{{$employee->profile_photo}}" style="max-width:100%">
													<a class="btn-sm btn-primary fa fa-pencil" style="cursor:pointer;color:#FFF;position: absolute;right: 0px;" onclick="editImage()"></a>
												</div>	
												@endif
												<div class="form-group" style="{{ ($employee->profile_photo) ? 'display:none' : '' }}" id="upload_profile_image">
													<input type='file' name="profile_photo" class="{{ $errors->has('profile_photo') ? 'is-invalid' : ''}}" accept=".png, .jpg, .jpeg" />
													<label class="mb-2">Accepts jpg, .png, .gif up to 1MB.</label>

													{!! $errors->first('profile_photo', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>

												<!-- <div class="avatar-upload">
													<div class="avatar-edit">
														<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
														<label for="imageUpload"></label>
													</div>
													<div class="avatar-preview">
														<div id="imagePreview">
														</div>
													</div>
												</div>
											-->
											
										</div>

										
										<!--
										<div class="col-md-12">
											<div class=" custom-control custom-checkbox mb-0">
												<input type="checkbox" id="send-email" name="send-email" class="custom-control-input">
												<label class="mb-0 custom-control-label" for="send-email">Send them an invite email so they can log in immediately</label>
											</div>
										</div>
									<div class="row">
										<div class="col-sm-4 text-center">
											<p class="mb-2">  </p>
											<button class="btn btn-success text-white ctm-border-radius" type="submit">Save</button>
											 <a href="{{ route('employees.index') }}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
										</div>
									</div>
								-->

									</div>

							</div>
						</div>
					</div>
					<div class="card shadow-sm ctm-border-radius">
						<div class="card-header" id="contact">
							<h4 class="cursor-pointer mb-0">
								<a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#employee-det">
									Contact Details
								<br><span class="ctm-text-sm">Let everyone know the essentials so they're fully prepared.</span>
								</a>
							</h4>
						</div>
						<div class="card-body p-0">
							<div id="employee-det" class="collapse show ctm-padding" aria-labelledby="contact" data-parent="#accordion-details">
								
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<p class="mb-2">Street Address 1</p>
												<input type="text" class="form-control" placeholder="" name="street_address_1" value="{{ old('street_address_1', @$contactInfo->street_address_1) }}">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<p class="mb-2">Street Address 2</p>
												<input type="text" class="form-control" placeholder="" name="street_address_2" value="{{ old('street_address_2', @$contactInfo->street_address_2) }}">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<p class="mb-2">City</p>
												<input type="text" class="form-control" placeholder="" name="city" value="{{ old('city', @$contactInfo->city) }}">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<p class="mb-2">State/Province</p>
												<input type="text" class="form-control" placeholder="" name="state" value="{{ old('state', @$contactInfo->state) }}">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<p class="mb-2">Zip/Postal Code</p>
												<input type="text" class="form-control" placeholder="" name="zip_code" value="{{ old('zip_code', @$contactInfo->zip_code) }}">
											</div>
										</div>
										<div class="col-md-12 form-group">
											<p class="mb-2">Country</p>
											<select class="form-control select" name="country">
												<option value="">Select </option>
												@foreach ($countries as $country)
													<option value="{{ $country->country }}" {{old ('country', @$contactInfo->country) == $country->country ? 'selected' : ''}}> {{ $country->country }}</option>
												@endforeach
											</select>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<p class="mb-2">Home Telephone</p>
												<input type="text" class="form-control" placeholder="" name="home_telephone" value="{{ old('home_telephone', @$contactInfo->home_telephone) }}">
											</div>
										</div>

										<div class="col-md-12">
											<div class="form-group">
												<p class="mb-2">Mobile</p>
												<input type="text" class="form-control" placeholder="" name="mobile" value="{{ old('mobile', @$contactInfo->mobile) }}">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<p class="mb-2">Work Telephone</p>
												<input type="text" class="form-control" placeholder="" name="work_telephone" value="{{ old('work_telephone', @$contactInfo->work_telephone) }}">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<p class="mb-2">Alternate Email</p>
												<input type="email" class="form-control" placeholder="" name="alternate_email" value="{{ old('alternate_email', @$contactInfo->alternate_email) }}">
											</div>
										</div>

										<!--
										<div class="col-md-12 form-group">
											<div class="cal-icon">
												<input class="form-control datetimepicker cal-icon-input" type="text" placeholder="Start Date">
											</div>
										</div>
										<div class="col-12 form-group">
											<input type="text" class="form-control" placeholder="Job Title">
										</div>
										<div class="col-12 form-group mb-0">
											<p class="mb-2">Employment Type</p>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="Permanent" name="Permanent" checked>
												<label class="custom-control-label" for="Permanent">Permanent</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input type="radio" class="custom-control-input" id="Freelancer" name="Permanent">
												<label class="custom-control-label" for="Freelancer">Freelancer</label>
											</div>
										</div> -->
									</div>

							</div>
						</div>
					</div>

					<div class="card shadow-sm ctm-border-radius">
						<div class="card-header" id="jobDetails">
							<h4 class="cursor-pointer mb-0">
								<a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#emp_job_det">
								Job Details
								<br><span class="ctm-text-sm">Stored securely, only visible to Super Admins, Payroll Admins, and themselves.</span>
								</a>
							</h4>
						</div>
						<div class="card-body p-0">
							<div id="emp_job_det" class="collapse show ctm-padding" aria-labelledby="jobDetails" data-parent="#accordion-details">
								<div class="row">
									<div class="col-md-12 form-group">
										<p class="mb-2">Job Title</p>
										<select class="form-control select" name="job_id" id="job_id">
											<option value="">Select </option>
											@foreach ($jobTitles as $job)
												<option value="{{ $job->id }}" {{old ('job_id', @$employee->job_id) == $job->id ? 'selected' : ''}}> {{ $job->job_title }}</option>
											@endforeach
										</select>
									</div>

									<div class="col-md-12 form-group">
										<p class="mb-2">Job Specification</p>
										<div id="job_specification" style="font-weight: bold;"> {{ @$jobDetails->job_description }}</div>
									</div>
									<div class="col-md-12 form-group">
										<p class="mb-2">Job Category</p>
										<select class="form-control select" name="job_category_id">
											<option value="">Select </option>
											@foreach ($jobCategories as $job)
												<option value="{{ $job->id }}" {{old ('job_category_id', @$employee->job_category_id) == $job->id ? 'selected' : ''}}> {{ $job->name }}</option>
											@endforeach
										</select>												
									</div>
									<div class="col-12 form-group">
										<p class="mb-2">Date of Join</p>
										<input class="form-control datetimepicker2 cal-icon-input" type="text" placeholder="Date" name="joined_date" value="{{ old('joined_date', $employee->joined_date) }}">
										
									</div>
									<div class="col-md-12 form-group mb-0">
										<p class="mb-2">Location</p>
										<select class="form-control select" name="company_location_id">
											<option value="">Select </option>
											@foreach ($locations as $item)
												<option value="{{ $item->id }}" {{old ('company_location_id', @$employee->job_category_id) == $item->id ? 'selected' : ''}}> {{ $item->company_name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--
					<div class="card shadow-sm ctm-border-radius">
						<div class="card-header" id="headingThree">
							<h4 class="cursor-pointer mb-0">
								<a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#term-office">
								Teams and Offices
								<br><span class="ctm-text-sm">Keep things tidy — and save time setting approvers and public holidays.</span>
								</a>
							</h4>
						</div>
						<div class="card-body p-0">
							<div id="term-office" class="collapse show ctm-padding" aria-labelledby="headingThree" data-parent="#accordion-details">
								<div class="row">
									<div class="col-md-12 form-group">
										<select class="form-control select">
											<option selected>Teams </option>
											<option value="1">PHP</option>
											<option value="2">Android</option>
											<option value="3">Testing</option>
											<option value="3">Designing</option>
											<option value="3">IOS</option>
											<option value="3">Business</option>
										</select>
									</div>
									<div class="col-md-12 form-group">
										<select class="form-control select">
											<option selected>Line Manager</option>
											<option value="1">Robert Wilson</option>
											<option value="2">Maria Cotton</option>
											<option value="3">Danny Ward</option>
											<option value="4">Linda Craver</option>
											<option value="5">Jenni Sims</option>
											<option value="6">John Gibbs</option>
											<option value="7">Stacey Linville</option>
										</select>
									</div>
									<div class="col-12 form-group mb-0">
										<select class="form-control select">
											<option selected>Office Name</option>
											<option value="1">Focus Technology</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="card shadow-sm ctm-border-radius">
						<div class="card-header" id="headingFour">
							<h4 class="cursor-pointer mb-0">
								<a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#salary_det">
								Salary Details
								<br><span class="ctm-text-sm">Stored securely, only visible to Super Admins, Payroll Admins, and themselves.</span>
								</a>
							</h4>
						</div>
						<div class="card-body p-0">
							<div id="salary_det" class="collapse show ctm-padding" aria-labelledby="headingFour" data-parent="#accordion-details">
								<div class="row">
									<div class="col-md-12 form-group">
										<select class="form-control select">
											<option selected>Currency </option>
											<option value="1">$</option>
										</select>
									</div>
									<div class="col-md-12 form-group">
										<input type="text" class="form-control" placeholder="Amount">
									</div>
									<div class="col-12 form-group">
										<select class="form-control select">
											<option selected>Frequency</option>
											<option value="1">Annualy</option>
											<option value="2">Monthly</option>
											<option value="3">Weekly</option>
											<option value="4">Daily</option>
											<option value="5">Hourly</option>
											<option value="6">Fixed</option>
										</select>
									</div>
									<div class="col-md-12 form-group mb-0">
										<div class="cal-icon">
											<input class="form-control datetimepicker cal-icon-input" type="text" placeholder="Start Date">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				-->
				</div>
				<div class="row">
					<div class="col-12">
						<div class="submit-section text-center btn-add">
							<!-- <button class="btn btn-theme text-white ctm-border-radius button-1">Add Team Member</button> -->
							<button class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" type="submit">Save</button>
							<a href="{{ route('employees.index') }}" class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">Cancel</a>
						</div>
					</div>
				</div>
			</form>	
			</div>
		</div>
	</div>
</div>
<!--/Content-->

</div>
<!-- Inner Wrapper -->


			<div class="page-wrapper" style="display: none;">
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left">
										<h4 class="card-title mb-0 text-left ml-3">Edit Employee</h4>
									</div>
								</div>
								<div class="card-body">
									@if($message = Session::get('success'))
											<div class="alert alert-success">
												<p>{{$message}}</p>
											</div>
											@endif	

									<form method="POST" action="{{ route('employees.update', $id) }}">
										@csrf
										{{ method_field('PUT') }}
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Employee Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}" placeholder="First Name" name="first_name" required value="{{ old('first_name', $employee->first_name) }}">
													{!! $errors->first('first_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Middle Name" name="middle_name" value="{{ old('middle_name', $employee->middle_name) }}">
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}" placeholder="Last Name" required name="last_name" value="{{ old('last_name', $employee->last_name) }}">
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
													<input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="" required name="email" value="{{ old('email', $employee->email) }}">
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
													<input type="text" class="form-control {{ $errors->has('employee_id') ? 'is-invalid' : ''}}" placeholder="" required name="employee_id" value="{{ old('employee_id', $employee->employee_id) }}">
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
														<option value="Active" {{old ('status', $employee->status) == 'Active' ? 'selected' : ''}}>Active</option>
														<option value="In active" {{old ('status', $employee->status) == 'In active' ? 'selected' : ''}}>Inactive</option>
													</select>
													{!! $errors->first('status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
												<button class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0 " type="submit">Save</button>
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
			<!--/Content-->
			
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection

@push('custom-scripts')
<script type="text/javascript"> 
	$(document.body).on("change","#job_id",function(){		
		var jobId = this.value;
		console.log(jobId);
		if(jobId > 0) {
			$.ajax({
			method: 'GET',
			url: '/jobTitles/'+ jobId,
			dataType: "json",
			contentType: 'application/json',
			success: function(response){
					console.log('response : ', response);
					var job_specification = '';     
					if(response && response.job_description) {
						job_specification = response.job_description;
					}
					$('#job_specification').html(job_specification);
				}					
			});
		}		
		
	});
	
	$('#datetimepicker1').datetimepicker({
		date: '{{ (@$employee->date_of_birth) }}',
		format: "YYYY-MM-DD", 
		maxDate: moment()
	});

	$('.datetimepicker2').datetimepicker({
		date: '{{ (@$employee->joined_date) }}',
		format: "YYYY-MM-DD", 
		maxDate: moment()
	});

	$("#user_profile_list a.list-group-item").click(function() {
    	$(this).addClass('active').siblings().removeClass('active');
    });

	function editImage() {
		$('#preview_profile_image').hide();
		$('#upload_profile_image').show();
	}
</script>
@endpush