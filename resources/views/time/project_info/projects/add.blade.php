@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left">
										<h4 class="card-title mb-0">Add Project</h4>
									</div>
								</div>
								<div class="card-body">
									<form id="add_project" method="POST" action="{{ route('projects.store') }}">
										@csrf
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Customer Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<select class="form-control select {{ $errors->has('customer') ? 'is-invalid' : ''}}" name="customer" id="customer" style="width: 100%">
														
													</select>
													{!! $errors->first('customer', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<u><a href="" data-toggle="modal" data-target="#add_customer">Add customer</a></u>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Project Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('project_name') ? 'is-invalid' : ''}}" placeholder="Enter Project Name" id="project_name" name="project_name" value="{{ old('project_name') }}" autocomplete="off">
													{!! $errors->first('project_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Project Admin </label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<select class="admin_id form-control {{ $errors->has('admin_id') ? 'is-invalid' : ''}}" name="admin_id" id="admin_id" style="width: 100%">
														
													</select>
													{!! $errors->first('admin_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}	
													
	                                    			{{-- <input type="hidden" name="admin_id" id="admin_id" value="">
													<input type="text" class="form-control {{ $errors->has('project_admin') ? 'is-invalid' : ''}}" placeholder="Type for hints.." name="project_admin" value="{{ old('project_admin') }}" autocomplete="off" id="project_admin">
													<div id="project_admins_list" class="autocomplete"></div> --}}
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Project Managers </label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
	                                    			<select class="managers form-control {{ $errors->has('managers') ? 'is-invalid' : ''}}" name="managers[]" id="manager_ids" multiple="multiple" style="width: 100%">
														@foreach ($managers as $item)
															<option value="{{ $item['id'] }}" selected> {{ $item['name'] }}</option>
														@endforeach
													</select>
													{!! $errors->first('managers', '<span class="invalid-feedback" role="alert">:message</span>') !!}														
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Project Employees </label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
	                                    			<select class="employee_name form-control {{ $errors->has('employees') ? 'is-invalid' : ''}}" name="employees[]" id="employee_ids" multiple="multiple" style="width: 100%">
														@foreach ($employees as $item)
															<option value="{{ $item['id'] }}" selected> {{ $item['name'] }}</option>
														@endforeach
													</select>
													{!! $errors->first('employees', '<span class="invalid-feedback" role="alert">:message</span>') !!}														
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Description </label>
												</div>
											</div>
											<div class="col-sm-3">
												<div class="form-group">
													<textarea class="form-control {{ $errors->has('project_description') ? 'is-invalid' : ''}}" rows="3" name="project_description">{{ old('project_description') }}</textarea>{!! $errors->first('project_description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
											<div class="col-sm-3 text-center">
												<div class="row">
													<div class="col-sm-6">
														<div class="submit-section text-center btn-add">
															<button type="button" onclick="submitProjectsForm()" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Save</button>
														</div>
													</div>
													<div class="col-sm-6">
														<a href="{{ route('projects.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
													</div>
												</div>
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

		<!--Customer The Modal -->
		<div class="modal fade" id="add_customer">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-1">Add customer</h4>
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
										<input type="text" class="form-control {{ $errors->has('modal_customer_name') ? 'is-invalid' : ''}}" placeholder="" name="modal_customer_name" value="{{ old('modal_customer_name') }}">
	                                    {!! $errors->first('modal_customer_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Description</label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<textarea class="form-control {{ $errors->has('modal_customer_description') ? 'is-invalid' : ''}}" rows="3" name="modal_customer_description">{{ old('modal_customer_description') }}</textarea>
										{!! $errors->first('modal_customer_description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
							<button class="btn btn-success text-white ctm-border-radius" onclick="save_customer()">Save</button>
					        <button type="button" class="btn btn-danger text-white ctm-border-radius" data-dismiss="modal" id="customer_model_cancel">Cancel</button>
					    </div>	
				</div>
			</div>
		</div>

		       <!--Delete The Modal -->
			   <div class="modal fade" id="reporting_information_modal">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					
						<!-- Modal body -->
						<div class="modal-body">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title mb-3">For Your Information</h4>
								<div class="row">
									<div class="col-md-12">
										<div id="reporting_information" class="mb-2"></div>
									</div>
								</div>
							<button type="button" onclick="submitForm()" class="btn btn-theme button-1 ctm-border-radius text-white text-center mb-2">Proceed</button>
							<button type="button" class="ml-3 btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3" data-dismiss="modal">Close</button>						
						</div>
					</div>
				</div>
			</div>
		
@endsection

@push('scripts')
<script type="text/javascript">
	function save_customer(){
		var modal_customer_name = $('input[name="modal_customer_name"]').val();
		var modal_customer_description = $('input[name="modal_customer_description"]').val();
		$.ajax({
		   url:"{{ route('project-save-customer') }}",
		   method:"POST",
		   data:JSON.stringify({modal_customer_name:modal_customer_name, modal_customer_description:modal_customer_description,  "_token": "{{ csrf_token() }}"}),
		   dataType: "json",
		   contentType: 'application/json',
		   success:function(data){
		    $('#customer_model_cancel').click();
			var respData = {
				id: data.customer_id, 
				text: data.customer_name
			};
			var newOption = new Option(respData.text, respData.id, false, false);
			$('#customer').append(newOption).trigger('change');
			console.log('customer id', $('#customer').val());
		  }
		});
	}

    function pass_customer_id(id){
    	document.getElementById('customer').value = id;
    }

    function pass_admin_id(id){
    	document.getElementById('admin_id').value = id;
    }

	$('.employee_name, .managers, #admin_id').select2({
		placeholder: 'Select',
		ajax: {
			url: '{{ route("ajax.employee_search") }}',
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
	
	$('#customer').select2({
		placeholder: 'Select Customer Name',
	    allowClear: false,
	    enable: true,
	    readonly: false,
	    multiple: false,

		ajax: {
			url: '{{ route("ajax.customers_search") }}',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results:  $.map(data, function (item) {
						return {
							text: item.customer_name,
							id: item.id
						}
					})
				};
			},
			cache: true
		}		
	});

	function submitForm() {
		$("#add_project").submit();
	}

	function submitProjectsForm() {
		var employeeIds = $('#employee_ids').val();
		var managerIds = $('#manager_ids').val();	

		var customer_name = $('#customer').val();
		var project_name = $('#project_name').val();

		if(!customer_name || !project_name) {
			submitForm();
		}else {
			//check assigned employees managers
			$.ajax({
				method: 'POST',
				url: '{{ route("project.checkEmployeeAjax") }}',
				data: JSON.stringify({"manager_ids": managerIds, "employee_ids": employeeIds, "_token": "{{ csrf_token() }}"}),
				dataType: "json",
				contentType: 'application/json',
				success: function(response){
					console.log('response : ', response);
					var html = '';	
					if(response && response.length)	{
						html += '<table class="table"><tr><th>Employee Name</th><th>Reporting Managers</th></tr>';
						response.forEach(element => {
							console.log(element.manager_name);
							html += '<tr><td>'+element.employee_name+'</td><td>'+element.manager_name+'</td></tr>';
							
						});
						html += '</table>';					
					} else {
						html += '<div class="alert alert-danger"><p>No Employees Assigned!</p></div>';
					}	
					$('#reporting_information').html(html);
					$('#reporting_information_modal').modal('show');	
				}					
			});			
		}
	}
</script>
@endpush