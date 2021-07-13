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
											<div class="col-sm-4">
												<div class="form-group">
	                                    			<input type="hidden" name="customer" id="customer" value="{{ $projects[0]->customer_id }}">
													<input type="text" class="form-control {{ $errors->has('customer') ? 'is-invalid' : ''}}" placeholder="Type for hints.." name="customer_name" value="{{ old('customer_name', $projects[0]->customer_name) }}" id="customer_name" autocomplete="off" disabled="disabled">
													{!! $errors->first('customer', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													<div id="customers_list" class="autocomplete"></div>
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
													<label>Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control {{ $errors->has('project_name') ? 'is-invalid' : ''}}" placeholder="" name="project_name" id="project_name" value="{{ old('project_name', $projects[0]->project_name) }}" disabled="disabled">
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
											<div class="col-sm-4">
												<div class="form-group">
	                                    			<input type="hidden" name="admin_id" id="admin_id" value="{{ $projects[0]->admin_id }}">
													<input type="text" class="form-control {{ $errors->has('project_admin') ? 'is-invalid' : ''}}" placeholder="Type for hints.." name="project_admin" value="{{ old('project_admin', $projects[0]->admin_name) }}" autocomplete="off" id="project_admin" disabled="disabled">
													{!! $errors->first('project_admin', '<span class="invalid-feedback" role="alert">:message</span>') !!}	
													<div id="project_admins_list" class="autocomplete"></div>
												</div>
											</div>
										</div>

									

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Description </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<textarea class="form-control {{ $errors->has('project_description') ? 'is-invalid' : ''}}" rows="3" disabled="disabled" id="project_description" name="project_description">{{ old('project_description', $projects[0]->project_description) }}</textarea>{!! $errors->first('project_description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
												<a class="btn btn-success text-white ctm-border-radius" id="update" data-action="0">Edit</a>
												<!-- <a class="btn btn-success text-white ctm-border-radius" id="update">Update</a> -->
												<a href="{{ route('projects.index') }}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
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
										<h4 class="card-title mb-0">Add Activity</h4> 
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
													<input type="text" name="activity_name" id="activity_name" class="form-control {{ $errors->has('activity_name') ? 'is-invalid' : ''}}" placeholder="" value="{{ old('activity_name') }}">
													{!! $errors->first('activity_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>

											<div class="col-sm-2 leave-col">
												<div class="form-group">
													<label>.</label><br>
													<a class="btn btn-success text-white ctm-border-radius" id="save_activity" data-action=""></a>
													<a id="activity_hide" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
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
							<div class="card ctm-border-radius shadow-sm border">
								<form>
									@csrf
									@method('DELETE')
									<div class="card-header">
										<div class="text-left ml-3">
											<h4 class="card-title mb-0">Activities</h4>
											<hr>
											<a id="activity_show" class="btn btn-success text-white ctm-border-radius"><span class="fa fa-plus"></span> Add</a>
											<button class="btn btn-danger text-white ctm-border-radius" onclick="deleteAll('list_activities_table','activities')"><span class="fa fa-trash"></span> Delete</button>
										</div>
									</div>
									<div class="card-body">
										<div class="employee-office-table">
											<div class="table-responsive">
												<table class="table custom-table mb-0 table-hover table-striped table-bordered">
													<thead>
														<tr class="bg-blue-header text-white">
															<th class="text-center">
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
																<td colspan="5"><div class="alert alert-danger text-center">No activities found!</div></td>
															</tr>
														@endif
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</form>
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
			$('#add_customer').css("display", "none");
			$('#add_admin').css("display", "none");
		}

		$('#activity_show').on('click', function(){
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
			if(action == '0'){
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
				   	window.location.href = data.url;
				  }
				});
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
				   	window.location.href = data.url;
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
				var customer = $('input[name="customer"]').val();
				var admin_id = $('input[name="admin_id"]').val();
				$.ajax({
	               method: 'POST',
	               url: "{{ route('update-project') }}",
				   data:JSON.stringify({'project_id':project_id, 'project_name':project_name, 'project_description':project_description, 'customer':customer, 'admin_id':admin_id, "_token": "{{ csrf_token() }}"}),
				   dataType: "json",
				   contentType: 'application/json',
				   success:function(data){
				   	console.log(data);
				   	disable_edit();
				  }
				});
			} else{
				$('#update').html("Update");
				$('#update').attr('data-action', 1);
				$('#customer_name').prop('disabled', false);
				$('#project_name').prop('disabled', false);
				$('#project_admin').prop('disabled', false);
				$('#project_description').prop('disabled', false);
				$('#add_customer').css("display", "block");
				$('#add_admin').css("display", "block");
			}
		});

		function edit_activity(id, name){
			$('#activity_name').val(name);
			$('#activity_id').val(id);
			$('#save_activity').html("Update");
			$('#save_activity').attr('data-action', 1);
			$('#activity_div').css("display", "block");
		}

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
			   	console.log(data.customer_name, data.customer_id);
			    $('#customer_model_cancel').click();
			    $('#customer_name').val(data.customer_name);
			    $('#customer').val(data.customer_id);
			  }
			});
		}

		$('#customer_name').keyup(function(){ 
	        var customer_name = $(this).val();
	        $('#customer').val('');
	        if(customer_name != '')
	        {
	         var _token = $('input[name="_token"]').val();
	         $.ajax({
	          url:"{{ route('customers-search') }}",
	          method:"POST",
	          data:{customer_name:customer_name, _token:_token},
	          success:function(data){
	           $('#customers_list').fadeIn();
	           $('#customers_list').html(data);
	          }
	         });
	        } else{
	        	$('#customers_list').html('');	        	
	        }
	    });

	    $(document).on('click', '.customer', function(){  
	        $('#customer_name').val($(this).text());  
	        $('#customers_list').fadeOut();  
	    });

	    $('#project_admin').keyup(function(){ 
	        var project_admin = $(this).val();
	        $('#admin_id').val('');
	        if(project_admin != '')
	        {
	         var _token = $('input[name="_token"]').val();
	         $.ajax({
	          url:"{{ route('project-admin-search') }}",
	          method:"POST",
	          data:{project_admin:project_admin, _token:_token},
	          success:function(data){
	           $('#project_admins_list').fadeIn();
	           $('#project_admins_list').html(data);
	          }
	         });
	        } else{
	        	$('#project_admins_list').html('');	        	
	        }
	    });

	    $(document).on('click', '.admin', function(){
	        $('#project_admin').val($(this).text()); 
	        $('#project_admins_list').fadeOut();  
	    });

	    function pass_customer_id(id){
	    	document.getElementById('customer').value = id;
	    }

	    function pass_admin_id(id){
	    	document.getElementById('admin_id').value = id;
	    }
	</script>
@endpush