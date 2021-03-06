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
											@if(!Request::is('my-info'))
											<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
												<li class="breadcrumb-item d-inline-block"><a href="{{ route('index') }}" class="text-dark">Home</a></li>												
												<li class="breadcrumb-item d-inline-block active">
													PIM
												</li>												
											</ol>
											@endif
											<h4 class="text-dark">
												@if(Request::is('my-info'))
													My Profile
												@else
													Edit Employee
												@endif
											</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="user-card card shadow-sm bg-white text-center ctm-border-radius">
						<div class="user-info card-body">
							@if(session()->has('message'))
								<div class="alert alert-success profile_img_success">
									{{ session()->get('message') }}
								</div>
							@endif

							<div class="user-avatar mb-4" onclick="openProfileImageModal()" style="cursor: pointer;">
								<div id="preview_user_profile_image" style="position: relative;">
									@if($employee->profile_photo)												
										<img src="{{ assetUrl($employee->profile_photo) }}" alt="{{ $employee->first_name }}" class="img-fluid rounded-circle" width="100">
									@else
										<img src="{{ assetUrl('img/profiles/img-1.jpg') }}" alt="User Avatar" class="img-fluid rounded-circle" width="100">
									@endif
									<a class="btn-sm btn-primary fa fa-pencil" style="cursor:pointer;color:#FFF;position: absolute;" onclick="openProfileImageModal()"></a>
								</div>
							</div>
							<div class="user-details">
								<h4><b>Hi {{ $employee->first_name }} {{ $employee->last_name }} </b></h4>
								{{-- <p>{{ $employee->employee_id }}</p> --}}
							</div>
						</div>
					</div>

					<div class="card ctm-border-radius shadow-sm">
						<div class="card-header">
							<h4 class="card-title mb-0">Details Content</h4>
						</div>
						<div class="card-body">
							<div id="user_profile_list" class="list-group border-none">
								<a class="list-group-item list-group-item-action border-none active" href="#personal">Personal Details</a>
								<a class="list-group-item list-group-item-action border-none" href="#contact">Contact Details</a>
								<a class="list-group-item list-group-item-action border-none" href="#jobDetails">Job Details</a>
								<a class="list-group-item list-group-item-action border-none" href="#reportTo">Report To</a>
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
				<input type="hidden" name="my_info" value="{{ (Request::is('my-info')) ? 'yes' : 'no'}}">

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
											<p class="mb-2">First Name <span class="text-danger">*</span></p>
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}" placeholder="First Name" name="first_name" id="first_name" required value="{{ old('first_name', $employee->first_name) }}" maxlength="30" onfocus="allowOnlyCharacters('first_name')">
													{!! $errors->first('first_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
											<div class="col-sm-4">
												<p class="mb-2">Middle Name</p>
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Middle Name" name="middle_name" id="middle_name" value="{{ old('middle_name', $employee->middle_name) }}" maxlength="30" onfocus="allowOnlyCharacters('middle_name')">
												</div>
											</div>
											<div class="col-sm-4">
												<p class="mb-2">Last Name <span class="text-danger">*</span></p>
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}" placeholder="Last Name" required name="last_name" id="last_name" value="{{ old('last_name', $employee->last_name) }}" maxlength="30" onfocus="allowOnlyCharacters('last_name')">
													{!! $errors->first('last_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>

										<div class="col-12 form-group">
											<p class="mb-2">Email Address <span class="text-danger">*</span></p>
											<input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="" required name="email" value="{{ old('email', $employee->email) }}" @if(Request::is('my-info')) readonly @endif maxlength="30" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
											{!! $errors->first('email', '<span class="invalid-feedback" role="alert">:message</span>') !!}
										</div>

										<div class="col-sm-6">
											<div class="form-group">
												<p class="mb-2">Employee Id <span class="text-danger">*</span></p>
												<input type="text" class="form-control {{ $errors->has('employee_id') ? 'is-invalid' : ''}}" placeholder="" required name="employee_id" value="{{ old('employee_id', $employee->employee_id) }}" @if(Request::is('my-info')) readonly @endif minlength="3" maxlength="8" onfocus="allowCharactersAndNumbers('employee_id')" id="employee_id">
												{!! $errors->first('employee_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<p class="mb-2">Status</p>
												<select class="form-control select {{ $errors->has('status') ? 'is-invalid' : ''}}" name="status" required value="{{ old('status') }}" @if(Request::is('my-info')) disabled @endif>
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
											<p class="mb-2">Date of Birth</p>
											<div class="cal-icon">
												<input class="form-control datetimepicker1 cal-icon-input" type="text" placeholder="Date of Birth" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth) }}" id="datetimepicker1" autocomplete="off">
											</div>
										</div>

										<div class="col-md-6">
												<p class="mb-2">Profile image</p>
												@if($employee->profile_photo)
													<div id="preview_profile_image" style="max-width:150px;position: relative;">
														<img src="{{ assetUrl($employee->profile_photo) }}" style="max-width:100%">
														<a class="btn-sm btn-primary fa fa-pencil" style="cursor:pointer;color:#FFF;position: absolute;right: 0px;" onclick="editImage()"></a>
													</div>	
												@endif
												<div class="form-group" style="{{ ($employee->profile_photo) ? 'display:none' : '' }}" id="upload_profile_image">
													<input type='file' name="profile_photo" class="form-control {{ $errors->has('profile_photo') ? 'is-invalid' : ''}}" accept=".png, .jpg, .jpeg" />
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
										<div class="col-md-6">											
											<p class="mb-2">Resume</p>
											@if($employee->resume_document)
												<div id="preview_resume_document" style="max-width:200px;position: relative;">
													<a href="{{ assetUrl($employee->resume_document) }}" download=""> Download Resume </a>
													<a class="btn-sm btn-primary fa fa-pencil" style="cursor:pointer;color:#FFF;position: absolute;right: 0px;" onclick="editResume()"></a>
												</div>	
											@endif
											<div class="form-group" style="{{ ($employee->resume_document) ? 'display:none' : '' }}" id="upload_resume_document">
												<input type='file' name="resume_document" class="form-control {{ $errors->has('resume_document') ? 'is-invalid' : ''}}" accept=".pdf, .doc, .docx" />
												<label class="mb-2">Accepts pdf, .doc, .docx up to 1MB.</label>													
												{!! $errors->first('resume_document', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
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
									<div class="row">
										<div class="col-sm-2">
											<div class="form-group">
												<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
											</div>
										</div>
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
										<div class="col-md-6">
											<div class="form-group">
												<p class="mb-2">Street Address 1</p>
												<input type="text" class="form-control" placeholder="" name="street_address_1" maxlength="150" value="{{ old('street_address_1', @$contactInfo->street_address_1) }}">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<p class="mb-2">Street Address 2</p>
												<input type="text" class="form-control" placeholder="" name="street_address_2" maxlength="150" value="{{ old('street_address_2', @$contactInfo->street_address_2) }}">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<p class="mb-2">City</p>
												<input type="text" class="form-control" placeholder="" name="city" id="city" maxlength="50" value="{{ old('city', @$contactInfo->city) }}" autocomplete="off" onfocus="allowOnlyCharacters('city')">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<p class="mb-2">State/Province</p>
												<input type="text" class="form-control" placeholder="" name="state" id="state" maxlength="50" value="{{ old('state', @$contactInfo->state) }}" autocomplete="off" onfocus="allowOnlyCharacters('state')">
											</div>
										</div>

										<div class="col-md-6 form-group">
											<p class="mb-2">Country</p>
											<select class="form-control select" name="country" id="country">
												<option value="">Select </option>
												@foreach ($countries as $country)
													<option value="{{ $country->country }}" {{old ('country', @$contactInfo->country) == $country->country ? 'selected' : ''}}> {{ $country->country }}</option>
												@endforeach
											</select>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<p class="mb-2">Zip/Postal Code</p>
												<input type="text" class="form-control" placeholder="" maxlength="7" name="zip_code" value="{{ old('zip_code', @$contactInfo->zip_code) }}" id="zip_code" onfocus="allowOnlyNumbers('zip_code')" autocomplete="off" maxlength="7">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<p class="mb-2">Home Telephone</p>
												<input type="text" class="form-control" placeholder="" maxlength="11" name="home_telephone" value="{{ old('home_telephone', @$contactInfo->home_telephone) }}" onfocus="allowOnlyNumbers('home_telephone')" id="home_telephone">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<p class="mb-2">Work Telephone</p>
												<input type="text" class="form-control" placeholder="" maxlength="11" name="work_telephone" value="{{ old('work_telephone', @$contactInfo->work_telephone) }}"  onfocus="allowOnlyNumbers('work_telephone')" id="work_telephone">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<p class="mb-2">Mobile</p>
												<input type="text" class="form-control" placeholder="" maxlength="11" name="mobile" value="{{ old('mobile', @$contactInfo->mobile) }}" id="mobile" onfocus="allowOnlyNumbers('mobile')">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<p class="mb-2">Alternate Email</p>
												<input type="email" class="form-control {{ $errors->has('alternate_email') ? 'is-invalid' : ''}}"  placeholder="" name="alternate_email" value="{{ old('alternate_email', @$contactInfo->alternate_email) }}" maxlength="30"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
												{!! $errors->first('alternate_email', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
									</div>

							</div>
						</div>
					</div>

					<!-- Job Details Start -->
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
									<div class="col-12 form-group">
										<p class="mb-2">Date of Join</p>
										<input class="form-control datetimepicker2 cal-icon-input" type="text" placeholder="Date" name="joined_date" value="{{ old('joined_date', $employee->joined_date) }}" @if(Request::is('my-info')) disabled @endif autocomplete="off">
									</div>

									<div class="col-md-12 form-group">
										<p class="mb-2">Job Title</p>
										<select class="form-control select" name="job_id" id="job_id" @if(Request::is('my-info')) disabled @endif>
											<option value="">Select </option>
											@foreach ($jobTitles as $job)
												<option value="{{ $job->id }}" {{old ('job_id', @$employee->job_id) == $job->id ? 'selected' : ''}}> {{ $job->job_title }}</option>
											@endforeach
										</select>
									</div>

									<div class="col-md-12 form-group">
										<p class="mb-2">Job Description</p>
										<input type="text" name="job_specification" id="job_specification" class="form-control" value="{{ @$jobDetails->job_description }}" readonly="" @if(Request::is('my-info')) disabled @endif>
									</div>
									<div class="col-md-12 form-group">
										<p class="mb-2">Job Category</p>
										<select class="form-control select" name="job_category_id" @if(Request::is('my-info')) disabled @endif>
											<option value="">Select </option>
											@foreach ($jobCategories as $job)
												<option value="{{ $job->id }}" {{old ('job_category_id', @$employee->job_category_id) == $job->id ? 'selected' : ''}}> {{ $job->name }}</option>
											@endforeach
										</select>												
									</div>
									<div class="col-md-12 form-group mb-0">
										<p class="mb-2">Job Location <sapn class="text-danger">*</sapn></p>
										<select class="form-control select {{ $errors->has('company_location_id') ? 'is-invalid' : ''}}" name="company_location_id" required="" @if(Request::is('my-info')) disabled @endif>
											<option value="">Select </option>
											@foreach ($locations as $item)
												<option value="{{ $item->id }}" {{ old ('company_location_id', @$employee->company_location_id) == $item->id ? 'selected' : ''}}> {{ $item->company_name }} - {{ $item->country }}</option>
											@endforeach
										</select>
										{!! $errors->first('company_location_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
									</div>
								</div>
								@if(count($jobDetailsHistory))
									<div class="row">
										<div class="col-md-2 pull-right">
											<a class="btn btn-theme button-1 text-white btn-block p-2 mt-3" data-toggle="modal" data-target="#job_history_modal">Job History</a>
										</div>
									</div>
								@endif

								<div class="row">
									<div class="col-sm-2 mt-3">
										<div class="form-group">
											<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Job Details End -->

					<div class="card shadow-sm ctm-border-radius">
						<div class="card-header" id="reportTo">
							<h4 class="cursor-pointer mb-0">
								<a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#emp_report_to">
									Report To
								<br><span class="ctm-text-sm">Reporting Manager of the employee</span>
								</a>
							</h4>
						</div>
						<div class="card-body p-0">
							<div id="emp_report_to" class="collapse show ctm-padding" aria-labelledby="reportTo" data-parent="#accordion-details">
								<div class="row">
									@hasrole('Admin')
									@if(!Request::is('my-info'))
									<div class="col-md-12 pull-right">
										<a class="btn btn-theme button-1 text-white p-2" data-toggle="modal" data-target="#assign_manager" onclick="openModalpopup()" style="float: right;">Add</a>
									</div>
									@endif
									@endrole 
									
									<input type="hidden" id="assigned_managers" name="assigned_managers" value="{{ $assigned_managers }}">
									<div class="col-md-12 form-group">
										<!--  <p class="mb-2">Select Manager</p> -->
										<div id="selected_managers">
											@if($reportTo)
												@foreach ($reportTo as $manager)
													{{ $manager->name }} 
													@hasrole('Admin')
														<i class="fa btn-primary p-1 fa-close" onclick="removeAssignedEmployee({{ $manager->id }})"></i>
													@endrole
													<hr>
												@endforeach
											@endif
										</div>
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
								<br><span class="ctm-text-sm">Keep things tidy ??? and save time setting approvers and public holidays.</span>
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
					<div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
						<button class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" type="submit">Update</button>
					</div>
					<div class="col-sm-6 col-md-2 col-lg-3 col-xl-2">									
						<a href="{{ route('employees.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">Cancel</a>
					</div>
					<div class="col-12">
						<div class="submit-section text-center btn-add">
							
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
												<input type="text" class="form-control {{ $errors->has('employee_id') ? 'is-invalid' : ''}}" minlength="3" maxlength="8" placeholder="" required name="employee_id" value="{{ old('employee_id', $employee->employee_id) }}"  onfocus="allowCharactersAndNumbers('employee_id')" id="employee_id">
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

								<div id="existing_manager_ids">{{ json_encode($reportTo) }}</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/Content-->
			
	</div>
	
	<div class="sidebar-overlay" id="sidebar_overlay"></div>

	<div class="modal fade" id="assign_manager">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title mb-1">Assign Manager</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
					<!-- Modal body -->
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label>Name <span class="text-danger">*</span></label>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="form-group">										
									<select class="itemName form-control" name="itemName" id="itemName" style="width: 100%"></select>
									<div class="assign_user_error invalid-feedback" style="display: none;">Please select a manager</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-4">
								<div class="form-group">
									<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="assignEmployee()">Assign</button>
				        <button type="button" class="btn btn-danger text-white ctm-border-radius" data-dismiss="modal" id="customer_model_cancel">Cancel</button>						
				    </div>	
			</div>
		</div>
	</div>

	<!-- Job History Modal Start -->
	<div class="modal fade" id="job_history_modal">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title mb-1">Job Detials History</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Modal body -->
				<div class="modal-body">
					<div class="row">
						<div class="table-responsive">
							<table class="table custom-table table-hover">
								<thead>
									<tr class="bg-light">
										<th>Start Date</th>
										<th>End Date</th>
										<th>Job Title</th>
										<th>Job Category</th>
										<th>Location</th>
									</tr>
								</thead>
								<tbody>
									@if(count($jobDetailsHistory))
										@foreach($jobDetailsHistory as $jobHistory)
										<tr>
											<td>{{ $jobHistory->start_date }}</td>
											<td>{{ $jobHistory->end_date }}</td>
											<td>{{ $jobHistory->job_title }}</td>
											<td>{{ $jobHistory->name }}</td>
											<td>{{ $jobHistory->company_name }} - {{ $jobHistory->country }}</td>
										</tr>
										@endforeach
									@else
										<tr>
											<td colspan="5">
												<div class="alert alert-danger"> No Job History found!</div>
											</td>
										</tr>
									@endif
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="modal-footer">
			        <button type="button" class="btn btn-danger text-white ctm-border-radius" data-dismiss="modal" id="customer_model_cancel">Close</button>						
			    </div>
			</div>
		</div>
	</div>
	<!-- Job History Modal End -->

	<!--  Profile image Modal -->
	<div class="modal fade" id="profile_image">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">		
				<!-- Modal body -->
				<div class="modal-body">
					<form method="POST" enctype="multipart/form-data" action="{{ route('profile.image') }}">
						@csrf
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title mb-3" style="word-break: break-all;">Update your profile image </h5><hr>
						<p class="modal-message" style="word-break: break-all;">
							
							<input type="hidden" name="emp_user_id" value="{{ $employee->user_id }}">
							<div class="form-group mt-3">
								<input type='file' name="profile_photo" class="form-control {{ $errors->has('profile_photo') ? 'is-invalid' : ''}}" accept=".png, .jpg, .jpeg" required />
								<label class="mb-2">Accepts jpg, .png, .gif up to 1MB.</label>
							</div>

						</p>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3 mt-4" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-theme ctm-border-radius float-right ml-3 mt-4" style="color: #fff;">Upload</button>						
					</form>	

				</div>
			</div>
		</div>
	</div>
	
<style>
#selected_managers i.fa.btn-primary.p-1.fa-close{	
    font-size: 13px;
    cursor: pointer;
	margin-left: 10px;
}
</style>
@endsection

@section('my-scripts')
<script type="text/javascript"> 
	$(document.body).on("change","#job_id",function(){		
		var jobId = this.value;
		console.log(jobId);
		if(jobId > 0) {
			var route = "{{ route('jobTitles.update', ':id') }}";
				route = route.replace(':id', jobId);

			$.ajax({
				method: 'GET',
				url: route,
				dataType: "json",
				contentType: 'application/json',
				success: function(response){
						console.log('response : ', response);
						var job_specification = '';     
						if(response && response.job_description) {
							job_specification = response.job_description;
						}
						$('#job_specification').val(job_specification);
					}					
			});
		}else{
			$('#job_specification').val("");
		}
		
	});

	date_of_birth = '';
	var dob = '{{ (@$employee->date_of_birth) }}'
	if(dob != "1970-01-01"){
		date_of_birth = '{{ (@$employee->date_of_birth) }}';
	}
	var startYear = moment().format("YYYY") - 100 +"-01-01";
	$('#datetimepicker1').datetimepicker({
		date: date_of_birth,
		format: "YYYY-MM-DD", 
		minDate: moment(startYear).format("YYYY-MM-DD"),
		maxDate: moment(),
		icons: {
			up: "fa fa-angle-up",
			down: "fa fa-angle-down",
			next: 'fa fa-angle-right',
			previous: 'fa fa-angle-left'
		}
	});

	var preJoinDate = '{{ @$employee->joined_date }}';
	var minDate = moment().format("YYYY") - 100 +"-01-01";
	if(preJoinDate) {
		minDate = moment(preJoinDate).format("YYYY-MM-DD")
	}

	$('.datetimepicker2').datetimepicker({
		date: '{{ (@$employee->joined_date) }}',
		format: "YYYY-MM-DD",
		minDate: minDate,
		icons: {
			up: "fa fa-angle-up",
			down: "fa fa-angle-down",
			next: 'fa fa-angle-right',
			previous: 'fa fa-angle-left'
		}
	});

	$("#user_profile_list a.list-group-item").click(function() {
		var acc_section = $(this).attr('href'); 
		if($(acc_section + ' a').hasClass( "collapsed" )) {
			$(acc_section + ' a').trigger('click');
		}
    	
    	$(this).addClass('active').siblings().removeClass('active');    	
    });

	function editImage() {
		$('#preview_profile_image').hide();
		$('#upload_profile_image').show();
	}

	function editResume() {
		$('#preview_resume_document').hide();
		$('#upload_resume_document').show();
	}
	var assigned_managers = [];
	var existing_manager_ids = $('#existing_manager_ids').html();
	if(existing_manager_ids) {
		assigned_managers = JSON.parse(existing_manager_ids);
		console.log(JSON.parse(existing_manager_ids));
	}	

	var list_managers = [];
	var assigned_managers_final = [];
	// Autocomplete ajax call
	function assignEmployee () {
		var managerId = $('#itemName').val();
		if(managerId) {
			$('.assign_user_error').hide();
			var name = $('#select2-itemName-container').html();
			assigned_managers.push({'id':managerId, 'name': name});
			console.log(managerId, name, assigned_managers);
			
			var result = uniqueArray(assigned_managers);
			console.log(result);
			var selected_managers_html = '';
			var empIds = [];
			result.forEach(element => {
				console.log(element.name);
				empIds.push(element.id);
				selected_managers_html += element.name + '<i class="fa btn-primary p-1 fa-close" onclick="removeAssignedEmployee('+element.id+')"></i> <hr>';
			});
			$('#selected_managers').html(selected_managers_html);
			$('#assigned_managers').val(empIds);
			assigned_managers_final = empIds;
			$('#assign_manager').modal('hide');	
		} else {
			$('#itemName').addClass('is-invalid');
			$('.assign_user_error').show();
		}
	}

	function openModalpopup(){
		$('#itemName').val('');
		$('.itemName').select2({
			placeholder: 'Select',
			ajax: {
				url: '{{ route("ajax.employee_search") }}'+'?managers_only=1&mgids='+$("#assigned_managers").val(),
				dataType: 'json',
				delay: 250,
				processResults: function (data) {
				return {
					results:  $.map(data, function (item) {
						return {
							text: item.name,
							id: item.id
						}
					})
				};
				},
				cache: true
			}
		});
	}
		
	function uniqueArray(arr) {
		return arr.reduce(function(memo, e1){
		var matches = memo.filter(function(e2){
			return e1.name == e2.name
		})
		if (matches.length == 0)
			memo.push(e1)
			return memo;
		}, []);
	}

	function removeAssignedEmployee(id) {
		console.log('emP dELETE', id, assigned_managers);
		assigned_managers = assigned_managers.filter(function( obj ) {
			return obj.id != id;
		});
		console.log(assigned_managers);
		var selected_managers_html = '';
		var empIds = [];
		assigned_managers.forEach(element => {
			console.log(element.name);
			empIds.push(element.id);
			selected_managers_html += element.name + '<i class="fa btn-primary p-1 fa-close" onclick="removeAssignedEmployee('+element.id+')"></i> <hr>';
		});
		$('#selected_managers').html(selected_managers_html);
		$('#assigned_managers').val(empIds);
		assigned_managers_final = empIds;
	}

	$('#country').select2();

</script>
@endsection