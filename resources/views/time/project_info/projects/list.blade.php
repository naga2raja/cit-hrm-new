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
										<form method="GET" action="{{ route('projects.index') }}">

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Customer Name</label>
														<input type="text" class="form-control" placeholder="Type for hint..." name="customer_name" value="{{ Request::get('customer_name') }}" autocomplete="off" id="customer_name">
														<div id="customers_list" class="autocomplete"></div>
													</div>														
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Project</label>
														<input type="text" class="form-control" placeholder="Type for hint..." name="project_name" value="{{ Request::get('project_name') }}" autocomplete="off" id="project_name">	
														<div id="projects_list" class="autocomplete"></div>						
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Project Admin</label>
														<input type="text" class="form-control" placeholder="Type for hint..." name="project_admin" value="{{ Request::get('project_admin') }}" autocomplete="off" id="project_admin">	
														<div id="project_admins_list" class="autocomplete"></div>			
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4"><i class="fa fa-search"></i> Search </button>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="reset" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4"><i class="fa fa-refresh"></i> Reset </button>
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
												<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_projects_table','projects')"><i class="fa fa-trash"></i> Delete</button>
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

	 	$('#customer_name').keyup(function(){ 
	        var customer_name = $(this).val();
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

	    $('#project_name').keyup(function(){ 
	        var project_name = $(this).val();
	        if(project_name != '')
	        {
	         var _token = $('input[name="_token"]').val();
	         $.ajax({
	          url:"{{ route('projects-search') }}",
	          method:"POST",
	          data:{project_name:project_name, _token:_token},
	          success:function(data){
	           $('#projects_list').fadeIn();
	           $('#projects_list').html(data);
	          }
	         });
	        } else{
	        	$('#projects_list').html('');	        	
	        }
	    });

	    $(document).on('click', '.project', function(){
	        $('#project_name').val($(this).text());  
	        $('#projects_list').fadeOut();  
	    }); 

	    $('#project_admin').keyup(function(){ 
	        var project_admin = $(this).val();
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

</script>
@endpush
