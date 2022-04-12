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
															<li class="breadcrumb-item d-inline-block"><a href="{{ route('index') }}" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">PIM</li>
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
											<a class="list-group-item list-group-item-action border-none active" href="#personal">Personal Details</a>
											<a class="list-group-item list-group-item-action border-none" href="#contact">Contact Details</a>
											<a class="list-group-item list-group-item-action border-none" href="#jobDetails">Job Details</a>
											<a class="list-group-item list-group-item-action border-none" href="#reportTo">Report To</a>
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
							@if($errorMessage = Session::get('error'))
								<div class="alert alert-danger">
									<p>{{$errorMessage}}</p>
								</div>
							@endif
							<form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
								@csrf
							
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
												<div class="row">													
													<div class="col-sm-4">
														<div class="form-group">
															<label>First Name <span class="text-danger">*</span></label>

															<input type="text" class="form-control {{ $errors->has('first_name') ? 'is-invalid' : ''}}" placeholder="First Name" id="first_name" name="first_name" maxlength="30" required value="{{ old('first_name') }}" onfocus="allowOnlyCharacters('first_name')">
															{!! $errors->first('first_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>Middle Name</label>
															<input type="text" class="form-control" placeholder="Middle Name" name="middle_name" id="middle_name" maxlength="30" value="{{ old('middle_name') }}" onfocus="allowOnlyCharacters('middle_name')">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>Last Name <span class="text-danger">*</span></label>
															<input type="text" class="form-control {{ $errors->has('last_name') ? 'is-invalid' : ''}}" placeholder="Last Name" required  maxlength="30" name="last_name" id="last_name" value="{{ old('last_name') }}" onfocus="allowOnlyCharacters('last_name')">
															{!! $errors->first('last_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>

												<div class="row">													
													<div class="col-sm-12">
														<div class="form-group">
															<label>Email Address <span class="text-danger">*</span></label>
															<input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" placeholder="yourname@gmail.com" required name="email" value="{{ old('email') }}" maxlength="30" autocomplete="off" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
															{!! $errors->first('email', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>										

												<div class="row">													
													<div class="col-sm-6">
														<div class="form-group">
															<label>Employee Id <span class="text-danger">*</span></label>

															<input type="text" class="form-control {{ $errors->has('employee_id') ? 'is-invalid' : ''}}" placeholder="" required name="employee_id" value="{{ old('employee_id') }}" minlength="3" maxlength="8" onfocus="allowCharactersAndNumbers('employee_id')" id="employee_id">
															{!! $errors->first('employee_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>

													<div class="col-sm-6">
														<div class="form-group">
															<label>Status</label>
															<select class="form-control select {{ $errors->has('status') ? 'is-invalid' : ''}}" name="status" required value="{{ old('status') }}">
																<option value="Active" {{old ('status') == 'Active' ? 'selected' : ''}}>Active</option>
																<option value="In active" {{old ('status') == 'In active' ? 'selected' : ''}}>Inactive</option>
															</select>
															{!! $errors->first('status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>

													<div class="col-6 form-group mb-0">
														<p class="mb-2">Gender</p>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input" id="Male" name="gender" {{old ('gender') == 'Male' ? 'checked' : ''}} value="Male">
															<label class="custom-control-label" for="Male">Male</label>
														</div>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input" id="Female" name="gender" {{old ('gender') == 'Female' ? 'checked' : ''}} value="Female">
															<label class="custom-control-label" for="Female">Female</label>
														</div>
													</div>
			
													<div class="col-sm-6">
														<div class="form-group">
															<p class="mb-2">Marital Status</p>
															<select class="form-control select {{ $errors->has('marital_status') ? 'is-invalid' : ''}}" name="marital_status" required value="{{ old('marital_status') }}">
																<option value="0" {{old ('marital_status') == '0' ? 'selected' : ''}}>Single</option>
																<option value="1" {{old ('marital_status') == '1' ? 'selected' : ''}}>Married</option>
															</select>
															{!! $errors->first('marital_status', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
			
													<div class="col-md-6">
														<div class="form-group">
															<p class="mb-2">Date of Birth	</p>																														
															<input autocomplete="off" type='text' class="form-control " id='datetimepicker1' name="date_of_birth" value="{{ old('date_of_birth') }}"/>
														</div>
													</div>

													<div class="col-md-6">
											
														<p class="mb-2">Profile image</p>
														<div class="form-group" id="upload_profile_image">
															<input type='file' name="profile_photo" class="form-control {{ $errors->has('profile_photo') ? 'is-invalid' : ''}}" accept=".png, .jpg, .jpeg" />
															<label class="mb-2">Accepts jpg, .png, .gif up to 1MB.</label>
		
															{!! $errors->first('profile_photo', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>

													<div class="col-md-6">											
														<p class="mb-2">Resume</p>
														<div class="form-group" id="upload_resume_document">
															<input type='file' name="resume_document" class="form-control {{ $errors->has('resume_document') ? 'is-invalid' : ''}}" accept=".pdf, .doc, .docx" />
															<label class="mb-2">Accepts pdf, .doc, .docx up to 1MB.</label>		
															{!! $errors->first('resume_document', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>

												</div>

												<div class="row">
													<div class="col-sm-12">
														<div class=" custom-control custom-checkbox mb-0">
															<input type="checkbox" id="create_login" name="create_login" class="custom-control-input" value="1" {{old ('create_login') == '1' ? 'checked' : ''}}>
															<label class="mb-0 custom-control-label" for="create_login">Create Login Details</label>
														</div>
													</div>
												</div>
												<div id="new_user_login_details" style="{{old ('create_login') == '1' ? '' : 'display: none;'}} ">
													<div class="row">
														<div class="col-sm-2">
															<div class="form-group">
																<label>Password <span class="text-danger">*</span></label>
															</div>
														</div>
														<div class="col-sm-4">
															<div class="form-group">
																<input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : ''}}" placeholder="" maxlength="12">
																{!! $errors->first('password', '<span class="invalid-feedback" role="alert">:message</span>') !!}
															</div>													
														</div>
														<div class="col-sm-3">
															<div class=" custom-control custom-checkbox mb-0">
																<input type="checkbox" onclick="showPassword('password')" id="show_password" class="custom-control-input">
																<label class="mb-0 custom-control-label" for="show_password">Show Password</label>
															</div>
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
																<input type="password" name="confirm_password" id="confirm_password" class="form-control {{ $errors->has('confirm_password') ? 'is-invalid' : ''}}" placeholder="" maxlength="12">
																{!! $errors->first('confirm_password', '<span class="invalid-feedback" role="alert">:message</span>') !!}
															</div>	
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
														<input type="text" class="form-control" placeholder="" name="street_address_1" value="{{ old('street_address_1') }}" maxlength="150">
													</div>
												</div>
		
												<div class="col-md-6">
													<div class="form-group">
														<p class="mb-2">Street Address 2</p>
														<input type="text" class="form-control" placeholder="" name="street_address_2" value="{{ old('street_address_2') }}" maxlength="150">
													</div>
												</div>
		
												<div class="col-md-6">
													<div class="form-group">
														<p class="mb-2">City</p>
														<input type="text" class="form-control" placeholder="" name="city" id="city" value="{{ old('city') }}" maxlength="50" onfocus="allowOnlyCharacters('city')">
													</div>
												</div>
		
												<div class="col-md-6">
													<div class="form-group">
														<p class="mb-2">State/Province</p>
														<input type="text" class="form-control" placeholder="" name="state" id="state" value="{{ old('state') }}" maxlength="50" onfocus="allowOnlyCharacters('state')">
													</div>
												</div>

												<div class="col-md-6 form-group">
													<p class="mb-2">Country</p>
													<select class="form-control select" name="country" id="country">
														<option value="">Select </option>
														@foreach ($countries as $country)
															<option value="{{ $country->country }}" {{old ('country') == $country->country ? 'selected' : ''}}> {{ $country->country }}</option>
														@endforeach
													</select>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<p class="mb-2">Zip/Postal Code</p>
														<input type="text" class="form-control" placeholder="" id="zip_code" name="zip_code" value="{{ old('zip_code') }}" maxlength="7" autocomplete="off" onfocus="allowOnlyNumbers('zip_code')">
													</div>
												</div>
		
												<div class="col-md-6">
													<div class="form-group">
														<p class="mb-2">Home Telephone</p>
														<input type="text" class="form-control" placeholder="" id="home_telephone" name="home_telephone" value="{{ old('home_telephone') }}" maxlength="11" onfocus="allowOnlyNumbers('home_telephone')">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<p class="mb-2">Work Telephone</p>
														<input type="text" class="form-control" placeholder="" id="work_telephone" name="work_telephone" value="{{ old('work_telephone') }}" maxlength="11" onfocus="allowOnlyNumbers('work_telephone')">
													</div>
												</div>
		
												<div class="col-md-6">
													<div class="form-group">
														<p class="mb-2">Mobile</p>
														<input type="text" class="form-control" placeholder="" name="mobile" value="{{ old('mobile') }}" id="mobile" maxlength="11" onfocus="allowOnlyNumbers('mobile')">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<p class="mb-2">Alternate Email</p>
														<input type="email" class="form-control {{ $errors->has('alternate_email') ? 'is-invalid' : ''}}" placeholder="" name="alternate_email" value="{{ old('alternate_email') }}"  maxlength="30"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
														{!! $errors->first('alternate_email', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													</div>
												</div>	
												
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
											<div class="col-12 form-group">
												<p class="mb-2">Date of Join</p>
												<input autocomplete="off" class="form-control datetimepicker2 cal-icon-input" type="text" placeholder="Date" name="joined_date" value="{{ old('joined_date') }}">
											</div>

											<div class="col-md-12 form-group">
												<p class="mb-2">Job Title</p>
												<select class="form-control select" name="job_id" id="job_id">
													<option value="">Select </option>
													@foreach ($jobTitles as $job)
														<option value="{{ $job->id }}" {{old ('job_id') == $job->id ? 'selected' : ''}}> {{ $job->job_title }}</option>
													@endforeach
												</select>
											</div>
		
											<div class="col-md-12 form-group">
												<p class="mb-2">Job Description</p>
												<input type="text" name="job_specification" id="job_specification" class="form-control" value="" readonly="">
											</div>
											<div class="col-md-12 form-group">
												<p class="mb-2">Job Category</p>
												<select class="form-control select" name="job_category_id">
													<option value="">Select </option>
													@foreach ($jobCategories as $job)
														<option value="{{ $job->id }}" {{old ('job_category_id') == $job->id ? 'selected' : ''}}> {{ $job->name }}</option>
													@endforeach
												</select>												
											</div>
											<div class="col-md-12 form-group mb-0">
												<p class="mb-2">Job Location <sapn class="text-danger">*</sapn></p>
												<select class="form-control select {{ $errors->has('company_location_id') ? 'is-invalid' : '' }}" name="company_location_id">
													<option value="">Select </option>
													@foreach ($locations as $item)
														<option value="{{ $item->id }}" {{old ('company_location_id') == $item->id ? 'selected' : ''}}> {{ $item->company_name }}</option>
													@endforeach
												</select>
												{!! $errors->first('company_location_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
											</div>
										</div>
									</div>
								</div>
								

							</div>	

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
											<div class="col-md-12 pull-right">
												<a class="btn btn-theme button-1 text-white p-2" data-toggle="modal" data-target="#assign_manager" style="float: right;" onclick="openModalpopup()">Add</a>
											</div>
											
											<input type="hidden" id="assigned_managers" name="assigned_managers" value="">
											<div class="col-md-12 form-group">
												<!--  <p class="mb-2">Select Manager</p> -->
												<div id="selected_managers">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">																			
									<button class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" type="submit">Add </button>
								</div>
								<div class="col-sm-6 col-md-2 col-lg-3 col-xl-2">									
									<a href="{{ route('employees.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0">Cancel</a>
								</div>

								<div class="col-sm-12">
									<div class="submit-section text-center btn-add">										
										
									</div>
								</div>
							</div>	 						
					</div>
				</form>
				
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
		<style>
		#selected_managers i.fa.btn-primary.p-1.fa-close{	
			font-size: 13px;
			cursor: pointer;
			margin-left: 10px;
		}
		#datetimepicker1 + .bootstrap-datetimepicker-widget.dropdown-menu{ position: inherit;}
		</style>
		
@endsection

@push('scripts')
	<script>
		$(document.body).on("change","#job_id",function(){		
		var jobId = this.value;				
		if(jobId > 0) {
			$.ajax({
			method: 'GET',
			url: '{{ URL::to("/") }}'+'/jobTitles/'+ jobId,
			dataType: "json",
			contentType: 'application/json',
			success: function(response){
					console.log('job_description : ', response);
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

	var startYear = moment().format("YYYY") - 100 +"-01-01";

	$('#datetimepicker1').datetimepicker({
		format: "YYYY-MM-DD", 
		minDate: moment(startYear).format("YYYY-MM-DD"),
		maxDate: moment(),
		icons: {
			up: "fa fa-angle-up",
			down: "fa fa-angle-down",
			next: 'fa fa-angle-right',
			previous: 'fa fa-angle-left'
		},
		debug: false,
	});

	$('.datetimepicker2').datetimepicker({
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

	$("#user_profile_list a.list-group-item").click(function() {
		var acc_section = $(this).attr('href'); 
		if($(acc_section + ' a').hasClass( "collapsed" )) {
			$(acc_section + ' a').trigger('click');
		}
    	$(this).addClass('active').siblings().removeClass('active');
    });

		function showPassword() {
            var temp = document.getElementById("password");
            if (temp.type === "password") {
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }

		$('#create_login').click(function() {
			$('#new_user_login_details').toggle();
		})

var assigned_managers = [];	

var list_managers = [];
var assigned_managers_final = [];
// Autocomplete ajax call
function assignEmployee () {
	var managerId = $('#itemName').val();
	console.log('managerId', managerId);
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
		//please select a manager
		$('#itemName').addClass('is-invalid');
		$('.assign_user_error').show();
	}
}
		
function openModalpopup() {
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
			console.log(id);
			assigned_managers = assigned_managers.filter(function( obj ) {
				return obj.id != id;
			});

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
@endpush