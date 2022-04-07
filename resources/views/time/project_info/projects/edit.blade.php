@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">				

					<div class="row">
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left ml-2">
										<h4 class="card-title mb-0">Project</h4>
									</div>
								</div>
								<div class="card-body">								

									@if($message = Session::get('success'))
										<div class="alert alert-success">
											<p>{{$message}}</p>
										</div>
									@endif
									<form method="" action="">
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
														<option value="{{ $projects[0]->customer_id }}" selected> {{ $projects[0]->customer_name }}</option>
													</select>
													{!! $errors->first('customer', '<span class="invalid-feedback" role="alert">:message</span>') !!}	

	                                    			{{-- <input type="hidden" name="customer" id="customer" value="{{ $projects[0]->customer_id }}">
													<input type="text" class="form-control {{ $errors->has('customer') ? 'is-invalid' : ''}}" placeholder="Type for hints.." name="customer_name" value="{{ old('customer_name', $projects[0]->customer_name) }}" id="customer_name" autocomplete="off" disabled="disabled">
													{!! $errors->first('customer', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													<div id="customers_list" class="autocomplete"></div> --}}
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<u><a href="" data-toggle="modal" data-target="#customer_model" style="display: none;" id="add_customer">Add customer</a></u>
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
													<input type="text" class="form-control {{ $errors->has('project_name') ? 'is-invalid' : ''}}" placeholder="" name="project_name" id="project_name" value="{{ old('project_name', $projects[0]->project_name) }}" maxlength="30">
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
														<option value="{{ $projects[0]->admin_id }}" selected> {{ $projects[0]->admin_name }}</option>														
													</select>
													{!! $errors->first('admin_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
													<textarea class="form-control {{ $errors->has('project_description') ? 'is-invalid' : ''}}" rows="3" id="project_description" name="project_description" maxlength="255">{{ old('project_description', $projects[0]->project_description) }}</textarea>{!! $errors->first('project_description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
															<button id="update" type="button" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" data-action="1"> Update</button>
														</div>
													</div>
													<div class="col-sm-6">
														<a href="{{ route('projects.index') }}" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
													</div>													
												</div>
											</div>
											<div class="col-sm-6" id="success_message_info" style="display: none;">
												<div class="alert alert-success"><p> Project Info Updated Successfully</p></div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Activity Add -->
				<div class="container-fluid" id="activity_div" style="display: none">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left ml-2">
										<h4 class="card-title mb-0" id="edit_activity_title">Add Activity</h4> 
									</div>
								</div>
								<div class="card-body">
									@if($message = Session::get('activity_success'))
									<div class="alert alert-success">
										<p>{{$message}}</p>
									</div>
									@endif
									<form>
										@csrf
										<div class="row">
											<div class="col-sm-2 leave-col">
												<div class="form-group">
													<label>Activity <span class="text-danger">*</span></label>
													<input type="hidden" name="project_id" value="{{ $projects[0]->id }}">
													<input type="hidden" name="activity_id" id="activity_id" value="">
													<input type="text" name="activity_name" id="activity_name" class="form-control {{ $errors->has('activity_name') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('activity_name') }}" required="">
													{!! $errors->first('activity_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>

											<div class="col-sm-1 leave-col">
												<div class="form-group">
													<br>
													<button type="button" id="save_activity" class="mt-2 btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-save"></i> Save</button>
												</div>
											</div>
											<div class="col-sm-1 leave-col">
												<div class="form-group">
													<br>
													<a id="activity_hide" href="javascript:void(0)" class="mt-2 btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel</a>
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

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Activity Add -->

				<!-- Activity List -->
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div id="alert_success_message_info" style="display: none;">
								<div class="alert alert-success"><p> Project Info Updated Successfully </p></div>
							</div>

							<div class="card shadow-sm ctm-border-radius border">
								<div class="card-header">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-8 col-lg-7 col-xl-10">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2">Activities</h4>
											</div>
										</div>
										@hasrole('Admin')
											<div class="col-sm-6 col-md-2 col-lg-2 col-xl-1">
												<a id="activity_show" href="javascript:void(0)" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
											</div>
											<div class="col-sm-6 col-md-2 col-lg-3 col-xl-1">
												<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_activities_table','activities', '{{ route('activities.deleteMultiple') }}')"><i class="fa fa-trash"></i> Delete</button>
											</div>
										@endrole
									</div>
								</div>
								<div class="card-body align-center">
									<div class="table-responsive">
										@if($message = Session::get('success'))
											<div class="alert alert-success">
												<p>{{$message}}</p>
											</div>
										@endif
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light">
													<th class="text-center" style="width: 10%">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_activities_table')">
													</th>
													<th>Activity Name</th>
												</tr>
											</thead>
											<tbody id="list_activities_table">
												@if(count($activities) > 0)
													@foreach ($activities as $activity)
													<tr>
														<td class="text-center">
															<input type="checkbox" name="delete_ids" id="delete_ids" value="{{ $activity->id }}">
														</td>
														<td>
															<h2><u><a id="{{ $activity->id }}" name="{{$activity->activity_name}}" onclick="edit_activity(this.id, this.name)">{{$activity->activity_name}}</a></u></h2>
														</td>
													</tr>
													@endforeach
												@else
													<tr>
														<td colspan="5"><p class="text-center">No activities found!</p></td>
													</tr>
												@endif
											</tbody>
										</table>
									</div>
								</div>
							</div>							
						</div>
					</div>
				</div>
				<!-- /activity List -->
			</div>
			<!--/activity-->
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>

		<!--Customer The Modal -->
		<div class="modal fade" id="customer_model">
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
										<input type="text" class="form-control {{ $errors->has('modal_customer_name') ? 'is-invalid' : ''}}" placeholder="" name="modal_customer_name" value="{{ old('modal_customer_name') }}" maxlength="30">
	                                    <div id="validation_message_name" style="display: none;">
											<label class="ctm-text-sm"><span class="text-danger"><p> The Name field is required </p></span></label>
										</div>
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
										<textarea class="form-control {{ $errors->has('modal_customer_description') ? 'is-invalid' : ''}}" rows="3" name="modal_customer_description" maxlength="255">{{ old('modal_customer_description') }}</textarea>
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
		
@endsection

@push('scripts')
	<script type="text/javascript">
		function disable_edit(){
			$('#update').html("Edit");
			$('#update').attr('data-action', 0);
			$('#customer_name').prop('disabled', true);
			$('#project_name').prop('disabled', true);
			$('#project_admin').prop('disabled', true);
			$('#project_description').prop('disabled', true);
			$('#manager_ids').prop('disabled', true);
			$('#employee_ids').prop('disabled', true);
			$('#admin_id').prop('disabled', true);
			$('#add_customer').css("display", "none");
			$('#add_admin').css("display", "none");
		}

		$('#activity_show').on('click', function(){
			$('#edit_activity_title').html("Add Activity");
			$('#activity_name').val("");
			$('#activity_id').val("");
			$('#save_activity').html("Save");
			$('#save_activity').attr('data-action', 0);
			$('#activity_div').css("display", "block");
		});

		$('#activity_hide').on('click', function(){
			$('#activity_div').css("display", "none");
		});
		
		$('#save_activity').on('click', function(){
			var action = $(this).attr('data-action');
			$('#activity_name').removeClass('is-invalid');
			if(action == '0'){				
				if($('#activity_name').val() != ""){
					var project_id = $('input[name="project_id"]').val();
					var activity_name = $('input[name="activity_name"]').val();
					$.ajax({
					   url:"{{ route('activities.store') }}",
					   method:"POST",
					   data:JSON.stringify({project_id:project_id, activity_name:activity_name,  "_token": "{{ csrf_token() }}"}),
					   dataType: "json",
					   contentType: 'application/json',
					   success:function(data){
					   	console.log(data);
					   	window.location.href = data.url + '?message=true';
					  }
					});
				}else{
					$('#activity_name').addClass('is-invalid');
				}				
			} else{
				var activity_id = $('input[name="activity_id"]').val();
				var project_id = $('input[name="project_id"]').val();
				var activity_name = $('input[name="activity_name"]').val();
				$.ajax({
	               method: 'POST',
	               url: "{{ route('update-activity') }}",
				   data:JSON.stringify({'activity_id':activity_id,'project_id':project_id,'activity_name':activity_name,"_token": "{{ csrf_token() }}"}),
				   dataType: "json",
				   contentType: 'application/json',
				   success:function(data){
				   	console.log(data);
				   	window.location.href = data.url + '?message=true';
				  }
				});
			}
		});

		$('#update').on('click', function(){
			var action = $(this).attr('data-action');
			if(action == '1'){
				var project_id = $('input[name="project_id"]').val();
				var project_name = $('input[name="project_name"]').val();
				var project_description = $('#project_description').val();
				var customer = $('#customer').val();
				var admin_id = $('select[name="admin_id"]').val();
				
				$.ajax({
	               method: 'POST',
	               url: "{{ route('update-project') }}",
				   data:JSON.stringify({'project_id':project_id, 'project_name':project_name, 'project_description':project_description, 'customer':customer, 'admin_id':admin_id, 'employees':$('#employee_ids').val(), 'managers':$('#manager_ids').val(), "_token": "{{ csrf_token() }}"}),
				   dataType: "json",
				   contentType: 'application/json',
				   success:function(data){
				   	console.log(data);					  
				   	// disable_edit();
					// $('#success_message_info').show();
					// setTimeout(function(){
					// 	$("#success_message_info").hide();
					// }, 2500);
					window.location.href = '{{ route("projects.index") }}?updated=success';					
				  }
				});
			} else{
				$('#update').html("Update");
				$('#update').attr('data-action', 1);
				$('#customer_name').prop('disabled', false);
				$('#project_name').prop('disabled', false);
				$('#project_admin').prop('disabled', false);
				$('#project_description').prop('disabled', false);				
				$('#manager_ids').prop('disabled', false);
				$('#employee_ids').prop('disabled', false);
				$('#admin_id').prop('disabled', false);
				$('#add_customer').css("display", "block");
				$('#add_admin').css("display", "block");
			}
		});

		function edit_activity(id, name){
			$('#edit_activity_title').html("Edit Activity");
			$('#activity_name').val(name);
			$('#activity_id').val(id);
			$('#save_activity').html("Update");
			$('#save_activity').attr('data-action', 1);
			$('#activity_div').css("display", "block");
		}

		function save_customer(){
			var modal_customer_name = $('input[name="modal_customer_name"]').val();
			var modal_customer_description = $('input[name="modal_customer_description"]').val();
			if(modal_customer_name != ""){
				$.ajax({
				   url:"{{ route('project-save-customer') }}",
				   method:"POST",
				   data:JSON.stringify({modal_customer_name:modal_customer_name, modal_customer_description:modal_customer_description,  "_token": "{{ csrf_token() }}"}),
				   dataType: "json",
				   contentType: 'application/json',
				   success:function(data){
				   	console.log(data.customer_name, data.customer_id);
				    $('#customer_model_cancel').click();
				    // $('#customer_name').val(data.customer_name);
				    // $('#customer').val(data.customer_id);
					var dropdownval = $( "#customer" ).val();
	  				$("#customer option[value='"+dropdownval+"']").remove();
					var respData = {
						id: data.customer_id, 
						text: data.customer_name
					};
					var newOption = new Option(respData.text, respData.id, false, false);
					$('#customer').append(newOption).trigger('change');
					$("#customer option[value='"+respData.id+"']").attr("selected","selected");
					console.log('New customer added, ', respData);
				  }
				});
			}else{
				$('#validation_message_name').show();
				setTimeout(function(){
					$("#validation_message_name").hide();
				}, 2500);
			}
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

		var urlParams = new URLSearchParams(window.location.search);
		console.log('URL PARAM:: ', urlParams.has('message')); 
		if(urlParams.has('message')) {
			$('#update').focus();
			$('#alert_success_message_info').show();
			setTimeout(function(){
				$("#alert_success_message_info").hide();
			}, 6000);
		}

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
	</script>
@endpush