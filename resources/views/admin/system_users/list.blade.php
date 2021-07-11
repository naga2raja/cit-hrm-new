@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm border">
										<!-- <div class="card-header shadow-sm">
											<h4 class="card-title mb-0 ml-2">Search User</h4>
										</div> -->
										<div class="card-body">
											<form method="GET" action="{{ route('systemUsers.index') }}">
												<div class="row">
													<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2"> 
														<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
															<!-- <label>Username</label> -->
															<input type="text" name="email" class="form-control" placeholder="Username" value="{{ Request::get('email') }}" autocomplete="off">
														</div>
													</div>
													<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2"> 
														<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
															<!-- <label> User Role <span class="text-danger">*</span> </label> -->
															<select class="form-control select {{ $errors->has('role') ? 'is-invalid' : ''}} select2-hidden-accessible" name="role" tabindex="-1" aria-hidden="true">
																	<option value="" selected="">User Role</option>
																	<option value="">All</option>
		                                                        @foreach ($roles as $role)
		                                                            <option value='{{ $role->name }}' {{ Request::get('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
		                                                        @endforeach
		                                                    </select>
		                                                    {!! $errors->first('role', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
													<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2"> 
														<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
															<!-- <label>Employee Name</label> -->
															<input type="text" name="name" id="employee_name" class="form-control" placeholder="Employee Name" value="{{ Request::get('name') }}" autocomplete="off">
															<div id="employees_list" class="autocomplete"></div>
														</div>
													</div>
													<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2"> 
														<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
															<!-- <label>Status</label> -->
															<select class="form-control select" name="status">
																<option value="">Status</option>
															    <option value='1' {{ old('status') == "1" ? 'selected' : '' }}>Enabled</option>
															    <option value='0' {{ old('status') == "0" ? 'selected' : '' }}>Disabled</option>
															</select>
														</div>
													</div>

													<div class="col-sm-6 col-md-6 col-lg-6 col-xl-1"> 
														<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
															<button type="submit" class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-search"></i> Search</button>
														</div>
													</div>
													<div class="col-sm-6 col-md-6 col-lg-6 col-xl-1"> 
														<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
															<a href="{{ route('systemUsers.index') }}" class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-times"></i> Cancel</a>
														</div>
													</div>								
												</div>													
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header shadow-sm">
									<div class="row">
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6"> 
											<div class="text-left">
												<h4 class="card-title mb-0 ml-2 mt-2">System Users </h4>
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<div class="mb-0 float-right">
												<a href="{{ route('systemUsers.create') }}" class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
												<button class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_user_table','systemUsers')"><i class="fa fa-trash"></i> Delete</button>
											</div>
										</div>
									</div>
								</div>
								<div class="card-body">
									
									<div class="employee-office-table">
										<div class="table-responsive">
											<table class="table custom-table mb-0 table-hover table-striped table-bordered">
												<thead>
													<tr class="bg-blue-header text-white">
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
																<input type="checkbox" name="user_id" value="{{ $user->id }}">
															</td>
															<td>
																<h2><u><a href="{{ route('systemUsers.edit', $user->id) }}">{{ $user->email }}</a></u></h2>
															</td>
															<td>{{ $user->role_name }}</td>
															<td>{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
															<td>{{ $user->emp_status }}</td>
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
			</div>
			<!--/Content-->			
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
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
					if(data != ""){
						$('#employees_list').fadeIn();
						$('#employees_list').html(data);
						$('#employee_name').removeClass('is-invalid');
					}else{
						$('#employee_name').addClass('is-invalid');
						$('#employees_list').fadeOut();
						$('<span class="invalid-feedback" role="alert">Employee does not exist</span>').insertAfter('#employee_name');
					}
				}
			});
		} else{
			$('#employees_list').html('');	        	
		}
	});

	$(document).on('click', '.employees', function(){
		$('#employee_name').val($(this).text());
		$('#employee_name').removeClass('is-invalid');
		$('#employees_list').fadeOut();
	});
</script>    
    <!-- <script src="{{ asset('js/system_users.js')}}"></script> -->
@endpush