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
													<u><a href="" data-toggle="modal" data-target="#add_customer" style="display: none;" id="add_customer">Add customer</a></u>
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
											<div class="col-sm-4">
												<div class="form-group">
													<u><a style="display: none;color: #007bff;" onclick="add_another()" id="add_admin">Add another</a></u>
												</div>
											</div>
										</div>

										<div id="admin_div">
											
										</div>										

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Description </label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<textarea class="form-control {{ $errors->has('project_description') ? 'is-invalid' : ''}}" rows="3" name="project_description" disabled="disabled" id="project_description">{{ old('project_description', $projects[0]->project_description) }}</textarea>{!! $errors->first('project_description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
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
												<a class="btn btn-success text-white ctm-border-radius" id="edit" onclick="enable_edit()">Edit</a>
												<button class="btn btn-success text-white ctm-border-radius" id="update" type="" style="display: none;">Save</button>
												<a href="{{ route('projects.index') }}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Currency Add -->
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
									<form method="POST" action="">
										@csrf
										<div class="row">
											<div class="col-sm-2 leave-col">
												<div class="form-group">
													<label>Activity <span class="text-danger">*</span></label>
													<input type="text" name="currency" class="form-control" placeholder="" required="">
												</div>
											</div>

											<div class="col-sm-2 leave-col">
												<div class="form-group">
													<label>.</label><br>
													<button class="btn btn-success text-white ctm-border-radius" id="save_activity">Save</button>
													<a id="currency_hide" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
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
				<!-- /Currency Add -->

				<!-- Currency List -->
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left ml-3">
										<h4 class="card-title mb-0">Activities</h4>
										<hr>
										<a id="activity_show" class="btn btn-success text-white ctm-border-radius"><span class="fa fa-plus"></span> Add</a>
										<a href="javascript:void(0);" class="btn btn-danger text-white ctm-border-radius"><span class="fa fa-trash"></span> Delete</a>
										<a href="javascript:void(0);" class="btn btn-secondary text-white ctm-border-radius"><span class="fa fa-copy"></span> Copy</a>
									</div>
								</div>
								<div class="card-body">
									<div class="employee-office-table">
										<div class="table-responsive">
											@if($message = Session::get('currency_success'))
												<div class="alert alert-success">
													<p>{{$message}}</p>
												</div>
											@endif
											<table class="table custom-table mb-0 table-hover table-striped table-bordered">
												<thead>
													<tr class="bg-blue-header text-white">
														<th class="text-center">
															<input type="checkbox" name="">
														</th>
														<th>Activity Name</th>
													</tr>
												</thead>
												<tbody>
													@if(count($activities) > 0)
														@foreach ($activities as $activity)
														<tr>
															<td class="text-center">
																<input type="checkbox" name="delete_ids" id="delete_ids" value="{{$activity->id}}">
															</td>
															<td>
																<h2><u><a href="{{ route('skills.edit', [$activity->id]) }}">{{$activity->activity_name}}</a></u></h2>
															</td>
														</tr>
														@endforeach
													@else
														<tr>
															<td colspan="5"><div class="alert alert-danger text-center">No activities ound!</div></td>
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
				</div>
				<!-- /Currency List -->
			</div>
			<!--/Content-->
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection

@push('scripts')
	<script type="text/javascript">
		function enable_edit(){
			document.getElementById('edit').style.display = "none";
			document.getElementById('update').style.display = "block";
			document.getElementById('customer_name').disabled = "";
			document.getElementById('project_name').disabled = "";
			document.getElementById('project_admin').disabled = "";
			document.getElementById('project_description').disabled = "";
			document.getElementById('add_customer').style.display = "block";
			document.getElementById('add_admin').style.display = "block";
		}

		$('#activity_show').on('click', function(){
			document.getElementById('activity_div').style.display = "block";
		});
	</script>
@endpush