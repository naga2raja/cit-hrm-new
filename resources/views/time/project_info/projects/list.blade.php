@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm border">
										<div class="card-header">
											<h4 class="card-title mb-0">Projects</h4>
										</div>
										<div class="card-body">
											@if($message = Session::get('success'))
											<div class="alert alert-success">
												<p>{{$message}}</p>
											</div>
											@endif
											<form method="GET" action="{{ route('projects.index') }}">
												{{ csrf_field() }}
												<div class="row">
													<div class="col-sm-2 leave-col">
														<div class="form-group">
															<label>Customer Name</label>
															<input type="text" class="form-control" placeholder="Type for hint..." name="customer_name" value="{{ Request::get('customer_name') }}" autocomplete="off" id="customer_name">
															<div id="customers_list"></div>
														</div>
													</div>
													<div class="col-sm-2">
														<div class="form-group">
															<label>Project</label>
															<input type="text" class="form-control" placeholder="Type for hint..." name="project_name" value="{{ Request::get('project_name') }}" autocomplete="off" id="project_name">	
															<div id="projects_list"></div>						
														</div>
													</div>
													<div class="col-sm-2 leave-col">
														<div class="form-group">
															<label>Project Admin</label>
															<input type="text" class="form-control" placeholder="Type for hint..." name="project_admin" value="{{ Request::get('project_admin') }}" autocomplete="off" id="project_admin">	
															<div id="project_admins_list"></div>			
														</div>
													</div>	
													<div class="col-sm-2">
														<button type="submit" class="btn btn-success text-white ctm-border-radius mt-4"><span class="fa fa-search"></span> Search</button>
														<a href="{{ route('projects.index') }}" class="btn btn-danger text-white ctm-border-radius mt-4"><span class="fa fa-refresh"></span> Reset</a>
													</div>											
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="card ctm-border-radius shadow-sm border">
								<form method="POST" action="{{ route('projects.destroy', 1) }}">
									@csrf
									@method('DELETE')
									<div class="card-header">
										<div class="text-left ml-3">
											<a href="{{ route('projects.create') }}" class="btn btn-success text-white ctm-border-radius"><span class="fa fa-plus"></span> Add</a>
											<button class="btn btn-danger text-white ctm-border-radius" onclick="deleteAll('list_projects_table','projects')"><span class="fa fa-trash"></span> Delete</button>
										</div>
									</div>
									<div class="card-body">

										<div class="employee-office-table">
											<div class="table-responsive">
												<table class="table custom-table mb-0 table-hover table-striped table-bordered">
													<thead>
														<tr class="bg-blue-header text-white">
															<th class="text-center">
																<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_projects_table')">
															</th>
															<th>Customer Name</th>
															<th>Project</th>
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
																<td>{{$project->customer_name}}</td>
																<td><h2><u><a href="">{{$project->project_name}}</a></u></h2></td>
																<td>{{$project->admin_name}}</td>
															</tr>
															@endforeach
														@else
															<tr>
																<td colspan="5"><div class="alert alert-danger text-center">No projects Found!</div></td>
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
