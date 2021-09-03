@extends('layout.mainlayout')
@section('content')
<!-- Content -->
<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class=" col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="index" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Company</li>
														</ol>
														<h4 class="text-dark">Company</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card shadow-sm ctm-border-radius">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Overview </h4>
										<a href="{{ route('employees.index') }}" class="float-right text-primary">Manage Teams</a>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-6 col-6 text-center">
												<h5 class="btn btn-outline-primary mt-3"><b>{{$branches}}</b></h5>
												<p class="mb-3">Branches</p>
											</div>
											<div class="col-md-6 col-6 text-center">
												<h5 class="btn btn-outline-primary mt-3"><b>{{$employees}}</b></h5>
												<p class="mb-3">Employees</p>
											</div>
										</div>
										<div class="text-center">
											<a href="{{ route('employees.index') }}" class="btn btn-theme text-white ctm-border-radius mt-2 button-1">People Directory</a>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-header">
										<div class="d-inline-block">
											<h4 class="card-title mb-0">
												@if($company)
													{{ $company->company_name }}
												@endif
											</h4>
											<p class="mb-0 ctm-text-sm">Head Office</p>
										</div>
										<div class="d-inline-block float-right" data-toggle="modal" data-target="#editOffice">
											<a href="#" class="btn btn-theme mt-2 text-white float-right ctm-border-radius" title="Edit"><i class="fa fa-pencil"></i>	</a>
										</div>
									</div>
								</div>
							</aside>
						</div>
					
						<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="row">
								<div class="col-xl-7 col-lg-12 col-md-7 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">
												@if($company)
													{{ $company->company_name }}
												@endif
												<div class="d-inline-block float-right" data-toggle="modal" data-target="#editOffice">
													<a href="javascript:void(0)" class="float-right text-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
												</div>
											</h4>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-7">
													<h5 class="text-primary"><i class="fa fa-info-circle"></i> Details:</h5>
													@if($company && $company->incorporation_date)
														<p><span class="text-primary">Incorporation Date : </span>
															{{ date('d-F-Y', strtotime($company->incorporation_date)) }}
														</p>
													@endif

													<p><span class="text-primary">Register Number : </span>
														@if($company)
															{{ $company->registration_number }}
														@endif
													</p>
													<p><span class="text-primary">Tax ID : </span>
													@if($company)
														{{ $company->tax_id }}
													@endif
													</p>
												</div>
												<div class="col-md-5">
													<h5 class="text-primary"><i class="fa fa-home"></i> Address:</h5>
													<p class="ml-3">
														@if($company)
															{{ ($company->address_street_1) ? $company->address_street_1 . ', ' : '' }} <br>
															{{ ($company->address_street_2) ? $company->address_street_2 . ',' : '' }} 
															{{ ($company->city) ? $company->city . ',' : '' }}
															{{ ($company->state_province) ? $company->state_province . ',' : '' }}<br>
															{{ ($company->country) ? $company->country .' - ' : '' }}
															{{ $company->zip_code }}
														@endif
													</p>
													
												</div>
											</div>
											<hr>
											<div class="text-center mt-3">
												<div class="col-sm-12">
													<div class="row">
														<div class="col-sm-3"></div>
														<div class="col-sm-6">
															@if($company) 
																<button type="button" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" data-toggle="modal" data-target="#add-information"><i class="fa fa-edit"></i> Edit Company </button>
															@else
																<button type="button" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" data-toggle="modal" data-target="#add-information"><i class="fa fa-plus"></i> Add Company </button>
															@endif
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-5 col-lg-12 col-md-5 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">
												Contact
											</h4>
										</div>
										<div class="card-body">
											<div class="input-group mb-3">
												<input type="text" class="form-control numberonly" minlength="10" maxlength="10" placeholder="Phone Number..." value="@if($company && $company->phone_number != null) {{ $company->phone_number }} @endif" id="phone_number" name="phone_number" disabled="disabled">
												<div class="input-group-append">
													<button class="btn btn-theme text-white" type="button" id="phone_number_edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
												</div>
											</div>
											<div class="input-group mb-3">
												<input type="text" class="form-control" placeholder="Website..." value="@if($company && $company->website != null) {{ $company->website }} @endif" id="website" name="website" disabled="disabled">
												<div class="input-group-append">
													<button class="btn btn-theme text-white" type="button" id="website_edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
												</div>
											</div>
											<div class="input-group mb-0">
												<input type="email" class="form-control" placeholder="E-mail..." value="@if($company && $company->email != null) {{ $company->email }} @endif" id="email" name="email" disabled="disabled" maxlength="30">
												<div class="input-group-append">
													<button class="btn btn-theme text-white" type="button" id="email_edit"><i class="fa fa-pencil" aria-hidden="true"></i></button>
												</div>
											</div>
											<div class="alert alert-success pull-left mt-3" id="contact_form_success_message" style="display:none;"><p>Contact Info Update Successfully</p></div>

											<div class="text-center mt-3">
												<button class="btn btn-theme text-white ctm-border-radius button-1" disabled="disabled" id="contact_add">Add </button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
		<!--  add office The Modal -->
		<div class="modal fade" id="addOffice">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create a New Office</h4>
						<p>Offices allow you to group people by location. Offices can subscribe to different public holidays, helping you to localize people's time off allowances.</p>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="editOffice">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Edit Office</h4>
						<form>
							@csrf
							<div class="form-group">
								<input class="form-control" type="hidden" value="@if($company){{ $company->id }}@endif" id="modal_company_id" name="modal_company_id">
								<input type="text" class="form-control" placeholder="Office Name" value="@if($company && $company->company_name != null){{ $company->company_name }}@endif" id="modal_company_name" name="modal_company_name" maxlength="50" onkeypress="allowCharactersWithSpace('modal_company_name')">
							</div>
							<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-theme text-white ctm-border-radius float-right" id="update_company_name">Save</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!--Delete The Modal -->
		<div class="modal fade" id="delete">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-4">Are You Sure Want to Delete?</h4>
						<button type="button" class="btn btn-danger text-white text-center ctm-border-radius mb-2 mr-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme text-white text-center ctm-border-radius mb-2 button-1 button-1" data-dismiss="modal">Delete</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- New Team The Modal -->
		<div class="modal fade" id="add-information" role="document" data-backdrop="static">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body style-add-modal">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Add Company Information</h4>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="Company Name" value="@if($company && $company->company_name != null) {{ $company->company_name }} @endif" id="company_name" name="company_name" minlength="3" maxlength="255" onkeypress="allowCharactersWithSpace('company_name')">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="Registered Company Number" value="@if($company && $company->registration_number != null) {{ $company->registration_number }} @endif" id="registration_number" name="registration_number" minlength="3" maxlength="20">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control numberonly" type="text" placeholder="Tax Id" value="@if($company && $company->tax_id != null){{trim($company->tax_id)}}@endif" id="tax_id" name="tax_id" maxlength="9">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control datetimepicker1" type="text" placeholder="Incorporation Date" value="@if($company && $company->incorporation_date != null) {{date('d-m-Y', strtotime($company->incorporation_date))}} @endif" id="incorporation_date" name="incorporation_date">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="Address Line1" value="@if($company && $company->address_street_1 != null) {{ $company->address_street_1 }} @endif" id="address_street_1" name="address_street_1" maxlength="255">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="Address Line2" value="@if($company && $company->address_street_2 != null) {{ $company->address_street_2 }} @endif" id="address_street_2" name="address_street_2" maxlength="255">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="City" value="@if($company && $company->city != null) {{ $company->city }} @endif" id="city" name="city" maxlength="50" onkeypress="allowCharactersWithSpace('city')">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="State/Province" value="@if($company && $company->state_province != null) {{ $company->state_province }} @endif" id="state_province" name="state_province" maxlength="50"  onkeypress="allowCharactersWithSpace('state_province')">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<select class="form-control select" name="country" id="country">
									<option value="">-Select-</option>
									@foreach ($countries as $country)
									<option value="{{ $country->id }}" 
										@if($company) 
												@if($country->id == $company->country_id)
													{{ "selected" }}
												@else
													{{ "" }}
												@endif
										@endif
									>{{ $country->country }}
									</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control" type="text" placeholder="Post-Code" value="{{ ($company) ? $company->zip_code : '' }}" id="zip_code" name="zip_code" maxlength="7" onkeyup="allowOnlyNumbers('zip_code')">
							</div>
						</div>
						<div class="alert alert-success pull-left" id="modal_form_success_message" style="display:none;"><p>Company Info Update Successfully</p></div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1" id="update_company_info">Save</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- New Folder The Modal -->
		<div class="modal fade" id="NewFolder">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create New Folder</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- add document The Modal -->
		<div class="modal fade" id="addDocument">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Upload Document</h4>
						<div class="form-group">
							<input type="file" class="form-control">
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Upload</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- add office The Modal -->
		<div class="modal fade" id="addOffice1">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Add Office</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme ctm-border-radius text-white float-right button-1">Add</button>
					</div>
				</div>
			</div>
		</div>
				
@endsection


@push('scripts')
<script type="text/javascript">
	$('#update_company_name').on('click', function(){
		var modal_company_id = $('#modal_company_id').val();
		var modal_company_name = $('#modal_company_name').val();
		$.ajax({
		   url: "{{ route('update-company-name') }}",
		   method:"POST",
		   data:JSON.stringify({'modal_company_id':modal_company_id, 'modal_company_name':modal_company_name, "_token": "{{ csrf_token() }}"}),
		   dataType: "json",
		   contentType: 'application/json',
		   success:function(data){		
		   		console.log(data);
		   		window.location = data.url;
		  },
		  error:function(data){
		  	console.log(data.responseJSON.errors.modal_company_name);
		  	$('#modal_company_name').addClass('is-invalid');          		
		   		$('<span id="modal_company_name_error" class="invalid-feedback" role="alert">The company name should not exceed 255 characters.</span>').insertAfter('#modal_company_name');
		  }
		});
	});

	$('#update_company_info').on('click', function(){
		var modal_company_id = $('#modal_company_id').val();
		var company_name = $('#company_name').val();
		var tax_id = $('#tax_id').val();
		var registration_number = $('#registration_number').val();
		var incorporation_date = $('#incorporation_date').val();
		var address_street_1 = $('#address_street_1').val();
		var address_street_2 = $('#address_street_2').val();
		var city = $('#city').val();
		var state_province = $('#state_province').val();
		var country = $('#country').val();
		var zip_code = $('#zip_code').val();

		$.ajax({
		   url: "{{ route('update-company-info') }}",
		   method:"POST",
		   data:JSON.stringify({modal_company_id:modal_company_id,company_name:company_name,tax_id:tax_id,registration_number:registration_number,incorporation_date:incorporation_date,
		   	address_street_1:address_street_1,address_street_2:address_street_2,city:city,state_province:state_province,country:country,zip_code:zip_code, "_token": "{{ csrf_token() }}"}),
		   dataType: "json",
		   contentType: 'application/json',
		   success:function(data){
		   	console.log(data);
			$('#modal_form_success_message').show();
		   	window.location =  data.url;
		  },
		  error:function(data){
		  	console.log(data.responseJSON.errors);
		  	if(data.responseJSON.errors.company_name){     		
		  		$('#company_name').addClass('is-invalid');          		
		   		$('<span id="company_name_info_error" class="invalid-feedback" role="alert">The company name should not exceed 255 characters.</span>').insertAfter('#company_name');
		   	}
		   	if(data.responseJSON.errors.registration_number){
		  		$('#registration_number').addClass('is-invalid');          		
		   		$('<span id="registration_number_info_error" class="invalid-feedback" role="alert">The registration number should not exceed 20 characters.</span>').insertAfter('#registration_number');
		   	}
		   	if(data.responseJSON.errors.tax_id){
		  		$('#tax_id').addClass('is-invalid');    
				$('#tax_id_info_error').hide();
		   		$('<span id="tax_id_info_error" class="invalid-feedback" role="alert">'+data.responseJSON.errors.tax_id[0]+'</span>').insertAfter('#tax_id');
		   	}
		   	if(data.responseJSON.errors.address_street_1){
		  		$('#address_street_1').addClass('is-invalid');          		
		   		$('<span id="address_street_1_info_error" class="invalid-feedback" role="alert">The address street 1 should not exceed 255 characters.</span>').insertAfter('#address_street_1');
		   	}
		   	if(data.responseJSON.errors.address_street_2){
		  		$('#address_street_2').addClass('is-invalid');          		
		   		$('<span id="address_street_2_infor_error" class="invalid-feedback" role="alert">The address street 2 should not exceed 255 characters.</span>').insertAfter('#address_street_2');
		   	}
		   	if(data.responseJSON.errors.city){
		  		$('#city').addClass('is-invalid');          		
		   		$('<span id="city_info_error" class="invalid-feedback" role="alert">The city should not exceed 64 characters.</span>').insertAfter('#city');
		   	}
		   	if(data.responseJSON.errors.state_province){
		  		$('#state_province').addClass('is-invalid');          		
		   		$('<span id="state_province_info_error" class="invalid-feedback" role="alert">The state should not exceed 64 characters.</span>').insertAfter('#state_province');
		   	}
		   	if(data.responseJSON.errors.zip_code){
		  		$('#zip_code').addClass('is-invalid');          		
		   		$('<span id="zip_code_info_error" class="invalid-feedback" role="alert">The zip code should not exceed 7 characters.</span>').insertAfter('#zip_code');
		   	}
		  }
		});
	});
	

	$('#phone_number_edit').on('click', function(){
		$('#contact_add').prop('disabled', false);
		$('#phone_number').prop('disabled', false);
	});
	$('#website_edit').on('click', function(){
		$('#contact_add').prop('disabled', false);
		$('#website').prop('disabled', false);
	});
	$('#email_edit').on('click', function(){
		$('#contact_add').prop('disabled', false);
		$('#email').prop('disabled', false);
	});

	$('#contact_add').on('click', function(){
		var modal_company_id = $('#modal_company_id').val();
		var phone_number = $('#phone_number').val();
		var website = $('#website').val();
		var email = $('#email').val();
		$.ajax({
		   url: "{{ route('update-company-contact') }}",
		   method:"POST",
		   data:JSON.stringify({modal_company_id:modal_company_id,phone_number:phone_number, website:website, email:email, "_token": "{{ csrf_token() }}"}),
		   dataType: "json",
		   contentType: 'application/json',
		   success:function(data){
		   	console.log(data);
			$('#contact_form_success_message').show();
		   	window.location =  data.url;
		  },
		  error:function(data){
		  	console.log(data.responseJSON.errors);
		  	if(data.responseJSON.errors.phone_number){
		  		$('#phone_number_edit').remove();          		
		  		$('#phone_number').addClass('is-invalid');   
				$('#phone_number_error').remove();       		
		   		$('<span id="phone_number_error" class="invalid-feedback" role="alert">The phone number should not exceed 20 characters.</span>').insertAfter('#phone_number');
		   	}
		   	if(data.responseJSON.errors.website){
		   		$('#website_edit').remove();     
		  		$('#website').addClass('is-invalid');     
				$('#website_error').remove();
		   		$('<span id="website_error" class="invalid-feedback" role="alert">'+data.responseJSON.errors.website+'</span>').insertAfter('#website');
		   	}
		   	if(data.responseJSON.errors.email){
		   		$('#email_edit').remove();     
		  		$('#email').addClass('is-invalid');          		
				  $('#email_error').remove();
		   		$('<span id="email_error" class="invalid-feedback" role="alert">'+data.responseJSON.errors.email+'</span>').insertAfter('#email');
		   	}
		  }
		});
	});

	$('.datetimepicker1').datetimepicker({
		date: '{{ (@$company->incorporation_date) }}',
		format: "DD-MM-YYYY", 
		maxDate: moment(),
		icons: {
			up: "fa fa-angle-up",
			down: "fa fa-angle-down",
			next: 'fa fa-angle-right',
			previous: 'fa fa-angle-left'
		}
	});


</script>
@endpush