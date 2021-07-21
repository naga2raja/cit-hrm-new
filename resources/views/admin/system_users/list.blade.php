@extends('layout.mainlayout')
@section('content')
<!-- Content -->

<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">						
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="card shadow-sm ctm-border-radius border">
								<div class="card-body align-center">
									<form method="GET" action="{{ route('systemUsers.index') }}">
										<div class="row filter-row">

											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">  
												<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
													<input type="text" name="email" class="form-control" placeholder="Username" value="{{ Request::get('email') }}" autocomplete="off">
												</div>
											</div>

											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2"> 
												<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
													<select class="form-control select {{ $errors->has('role') ? 'is-invalid' : ''}} select2-hidden-accessible" name="role" tabindex="-1" aria-hidden="true">
															<option value="" selected="">User Role</option>
															<option value="all" {{ Request::get('role') == 'all' ? 'selected' : '' }}>All</option>
	                                                    @foreach ($roles as $role)
	                                                        <option value='{{ $role->name }}' {{ Request::get('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
	                                                    @endforeach
	                                                </select>
	                                                {!! $errors->first('role', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>

											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">  
												<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
													<input type="text" name="name" id="employee_name" class="form-control" placeholder="Employee Name" value="{{ Request::get('name') }}" autocomplete="off">
													<div id="employees_list" class="autocomplete"></div>
												</div>
											</div>

											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2"> 
												<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
													<select class="form-control select" name="status">
														<option value="">Status</option>
													    <option value='Active' {{ Request::get('status') == "Active" ? 'selected' : '' }}>Active</option>
													    <option value='In active' {{ Request::get('status') == "In active" ? 'selected' : '' }}>In-active</option>
													</select>
												</div>
											</div>
											
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">  
												<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Search </button>  
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">  
												<a href="{{ route('systemUsers.index') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel </a>  
											</div>
										
										</div>
									</form>
								</div>
							</div>

							<div class="card shadow-sm ctm-border-radius border">
								<div class="card-header">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-10">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2">System Users </h4>
											</div>
										</div>										
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-1">  
											<a href="{{ route('systemUsers.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-1">  
											<button class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_user_table','systemUsers')"><i class="fa fa-trash"></i> Delete</button>
										</div>
									</div>
								</div>
								
								<div class="card-body align-center">									
									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr>
													<th class="text-center">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_user_table')">
													</th>
													<th>Username</th>
													<th>User Role</th>
													<th>Employee Name</th>
													<th>Status</th>
													<!-- <th class="text-right">Action</th> -->
												</tr>
											</thead>
											<tbody id="list_user_table">
												@if(count($users) > 0)
													@foreach ($users as $user)
													<tr>
														<td class="text-center">
															@if($user->user_id != auth()->user()->id || $user->user_id == 1)
																<input type="checkbox" name="user_id" value="{{ $user->user_id }}">
															@endif
														</td>
														<td>
															<h2><u><a href="{{ route('systemUsers.edit', $user->user_id) }}">{{ $user->email }}</a></u></h2>
														</td>
														<td>{{ $user->role_name }}</td>
														<td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
														<td>
															@if($user->emp_status == 'In active')
																<a class="btn btn-outline-danger btn-sm"> Inactive </a>
															@elseif($user->emp_status == 'Active')
																<a class="btn  btn-outline-success btn-sm"> Active </a>
															@endif
													</tr>
													@endforeach
												@else
													<tr>
														<td colspan="5"><p class="text-center">No Data Found</p></td>
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

		<!--  Validation Modal -->
		<div class="modal fade" id="validation_message">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">		
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title mb-3"></h5><hr>
						<p class="modal-message"></p>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3 mt-4" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
@endsection

@push('scripts')
<script type="text/javascript">
	// Autocomplete ajax call
	$('#employee_name').keyup(function(){ 
		var employee_name = $(this).val();
		if(employee_name != '')
		{
			var _token = $('input[name="_token"]').val();
			$.ajax({
				method:"POST",
				url: '/employeeNameSearch',
				data:{
					employee_name:employee_name,
					_token:_token
				},
				success:function(data){
					$('#employee_name').removeClass('is-invalid');
					$("#not_exist").remove();

					if(data != ""){					
						$('#employees_list').fadeIn();
						$('#employees_list').html(data);
					}else{
						var exists = ($("#not_exist").length == 0);
					    if (exists) {
					        $('#employee_name').addClass('is-invalid');
							$('#employees_list').fadeOut();
							$('<span id="not_exist" class="invalid-feedback" role="alert">Employee does not exist</span>').insertAfter('#employee_name');
					    }
					}
				}
			});
		} else{
			$('#employees_list').html('');	        	
		}
	});

	$(document).on('click', '.employees', function(){
		$('#employee_name').val($(this).text());
		$('#employees_list').fadeOut();
		$('#employee_name').removeClass('is-invalid');
		$("#not_exist").remove();
	});

	function validation_popup_msg(){
		@if (Session::get('success'))
			 title = 'Success'; msg = '{{ Session::get("success") }}';
		@elseif (Session::get('error'))
			 title = 'Failed'; msg = '{{ Session::get("error") }}';
		@endif

		@if ((Session::get('success'))||(Session::get('error')))
			$('#validation_message').modal('toggle');
			$('.modal-title').html(title);
			$('.modal-message').html(msg);
		@endif
	}

	window.onload = function() {
		// calling validation_popup_msg
		validation_popup_msg();
	}
</script>    
    <!-- <script src="{{ asset('js/system_users.js')}}"></script> -->
@endpush