@extends('layout.mainlayout')
@section('content')
<!-- Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">						
						<!-- left side -->
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm border">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="index.html" class="text-dark">Time</a></li>
															<li class="breadcrumb-item d-inline-block active">Project Info</li>
														</ol>
														<h4 class="text-dark">Projects</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm border">
									<div class="card-body">
										<!-- <h4 class="card-title"><i class="fa fa-search"></i> Search</h4><hr> -->
										<form id="searchProjects" method="GET" action="{{ route('projects.index') }}">

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Customer Name</label>
														<select class="customer_name form-control {{ $errors->has('customer_name') ? 'is-invalid' : ''}}" name="customer_name" id="customer_name">
															@if(Request::get('cust_name'))
																<option selected="selected" id="{{ Request::get('customer_id') }}">{{ Request::get('cust_name'), old('customer_name') }}</option>
															@endif
														</select>
														<input type="hidden" name="cust_name" id="cust_name" class="form-control" value="{{ (Request::get('cust_name')) ? Request::get('cust_name') : '' }}">
														<input type="hidden" name="customer_id" id="customer_id" class="form-control" value="{{ (Request::get('customer_id')) ? Request::get('customer_id') : '' }}">
													</div>														
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Project</label>
														<select class="project_name form-control {{ $errors->has('project_name') ? 'is-invalid' : ''}}" name="project_name" id="project_name">
															@if(Request::get('pro_name'))
																<option selected="selected" id="{{ Request::get('project_id') }}">{{ Request::get('pro_name'), old('project_name') }}</option>
															@endif
														</select>
														<input type="hidden" name="pro_name" id="pro_name" class="form-control" value="{{ (Request::get('pro_name')) ? Request::get('pro_name') : '' }}">
														<input type="hidden" name="project_id" id="project_id" class="form-control" value="{{ (Request::get('project_id')) ? Request::get('project_id') : '' }}">
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Project Admin</label>
														<select class="project_admin form-control {{ $errors->has('project_admin') ? 'is-invalid' : ''}}" name="project_admin" id="project_admin">
															@if(Request::get('admin_name'))
																<option selected="selected" id="{{ Request::get('admin_id') }}">{{ Request::get('admin_name'), old('project_admin') }}</option>
															@endif
														</select>
														<input type="hidden" name="admin_name" id="admin_name" class="form-control" value="{{ (Request::get('admin_name')) ? Request::get('admin_name') : '' }}">
														<input type="hidden" name="admin_id" id="admin_id" class="form-control" value="{{ (Request::get('admin_id')) ? Request::get('admin_id') : '' }}">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4"><i class="fa fa-search"></i> Search </button>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="button" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4" onclick="resetAllValues('searchProjects')"><i class="fa fa-refresh"></i> Reset </button>
												</div>
											</div>												
										</form>
									</div>
								</div>
							</aside>
						</div>
						<!-- left side end -->

						<!-- right side -->
						<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="card shadow-sm ctm-border-radius border">
								<div class="card-header">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-8 col-lg-7 col-xl-8">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2">Project List</h4>
											</div>
										</div>
										@hasrole('Admin')
											<div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
												<a href="{{ route('projects.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
											</div>
											<div class="col-sm-6 col-md-2 col-lg-3 col-xl-2">
												<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_projects_table','projects','{{ route('projects.deleteMultiple') }}')"><i class="fa fa-trash"></i> Delete</button>
											</div>
										@endrole
									</div>
								</div>
								<div class="card-body align-center">									
									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light">
													<th class="text-center">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_projects_table')">
													</th>
													<th>Project</th>
													<th>Customer Name</th>
													<th>project Admin</th>
												</tr>
											</thead>
											<tbody id="list_projects_table">
												@if(count($projects) > 0)
													@foreach ($projects as $project)
													<tr>
														<td class="text-center">
															<input type="checkbox" name="delete_ids" id="delete_ids" value="{{$project->project_id}}">
														</td>
														<td>
															<h2><u><a href="{{ route('projects.edit', $project->project_id) }}">{{$project->project_name}}</a></u></h2>
														</td>
														<td>{{$project->customer_name}}</td>
														<td>{{$project->admin_name}}</td>
													</tr>
													@endforeach
												@else
													<tr>
														<td colspan="5"><p class="text-center">No projects Found!</p></td>
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
			<!--/Content-->
			
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection
@push('scripts')
	<script>
		// ---------------- customer_name ----------------
	    $('#customer_name').select2({
			placeholder: 'Select a customer',
			allowClear: true,
			ajax: {
				url: "{{ route('ajax.customers_search') }}",
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
		$(document.body).on("change","#customer_name",function(){
		 	$('#customer_id').val(this.value);
		 	var cust_name = $("#customer_name option:selected").html();
		 	$('#cust_name').val(cust_name);
		}); 

		// ---------------- project_name ----------------
	    $('#project_name').select2({
			placeholder: 'Select a project',
			allowClear: true,
			ajax: {
				url: "{{ route('ajax.project_search') }}",
				dataType: 'json',
				delay: 250,
				processResults: function (data) {
					return {
						results:  $.map(data, function (item) {
							return {
								text: item.project_name,
								id: item.id
							}
						})
					};
				},
				cache: true
			}		
		});
		$(document.body).on("change","#project_name",function(){
		 	$('#project_id').val(this.value);
		 	var pro_name = $("#project_name option:selected").html();
		 	$('#pro_name').val(pro_name);
		});

		// ---------------- project_admin ----------------
		$('#project_admin').select2({
			placeholder: 'Select a Admin',
			allowClear: true,
			ajax: {
				url: "{{ route('ajax.project_admin_search') }}",
				dataType: 'json',
				delay: 250,
				processResults: function (data) {
					return {
						results:  $.map(data, function (item) {
							return {
								text: item.admin_name,
								id: item.admin_id
							}
						})
					};
				},
				cache: true
			}		
		});
		$(document.body).on("change","#project_admin",function(){
		 	$('#admin_id').val(this.value);
		 	var admin_name = $("#project_admin option:selected").html();
		 	$('#admin_name').val(admin_name);
		});

</script>
@endpush
