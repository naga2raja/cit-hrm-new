@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<!-- left side -->
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="/" class="text-dark">PIM</a></li>
															<li class="breadcrumb-item d-inline-block active">Employees</li>
														</ol>
														<h4 class="text-dark">Employees</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
										<form method="GET" id="filter_form">
											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Employee Name</label>
														<input type="text" class="form-control" placeholder="First/Middle/Last Name" name="employee_name" value="{{ Request::get('employee_name') }}" autocomplete="off">
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Employee Id</label>
														<input type="text" class="form-control" placeholder="Employee Id" name="employee_id" value="{{ Request::get('employee_id') }}" autocomplete="off">
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Email</label>
														<input type="text" class="form-control" placeholder="Email" name="email" value="{{ Request::get('email') }}" autocomplete="off">
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Status</label>
														<select class="form-control select" name="status">
															<option value="">All</option>
															<option value="Active"  {{ Request::get('status') == 'Active' ? 'selected' : ''}}>Active</option>
															<option value="In active" {{ Request::get('status') == 'In active' ? 'selected' : ''}}>Inactive</option>
														</select>
													</div>
												</div>
											</div>											

											<div class="row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">													
													<button type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4" name="search"><span class="fa fa-search"></span> Search</button>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="button" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4" onclick="resetAllValues('filter_form')"><i class="fa fa-refresh"></i> Reset </button>
												</div>
											</div>

										</form>

									</div>
								</div>

							</aside>
						</div>
						<!-- Left side End -->

						<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-header">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-8 col-lg-7 col-xl-8">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2"> Employees </h4>
											</div>
										</div>
										@hasrole('Admin')
											<div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
												<a href="{{ route('employees.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><span class="fa fa-plus"></span> Add</a>												
											</div>
											<div class="col-sm-6 col-md-2 col-lg-3 col-xl-2">
												<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_emp_table','employees','{{ route('employees.deleteMultiple') }}')"><i class="fa fa-trash"></i> Delete</button>
											</div>
										@endrole
									</div>
									
								</div>
								<div class="card-body  align-center">
									@if($message = Session::get('success'))
										<div class="alert alert-success">
											<p>{{$message}}</p>
										</div>
									@endif	

									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light">
													<th class="text-center">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_emp_table')">
													</th>
													<th>Employee Id</th>
													<th>First Name</th>
													<th>Last Name</th>
													<th>Email</th>
													<th>Status</th>
													<!-- <th class="text-center">Action</th> -->
												</tr>
											</thead>
											<tbody id="list_emp_table">
												@foreach($employees as $employee)
												<tr>
													<td class="text-center">
														<input type="checkbox" name="chk_user" value="{{ $employee->id }}" {{ ($employee->user_id == auth()->user()->id || $employee->user_id == 1) ? 'disabled' : '' }}>
													</td>
													<td>
														<u><a href="{{ route('employees.edit', $employee->id) }}"> {{ $employee->employee_id }}  </a></u>
													</td>
													<td>
														{{ $employee->first_name }} 
													</td> 
													<td>
														{{ $employee->last_name }} 
													</td>
													<td>
														{{ $employee->email }} 
													</td> 
													<td>
														@if($employee->status == 'In active')
															<a class="btn btn-outline-danger btn-sm"> Inactive </a>
														@endif

														@if($employee->status == 'Active')
															<a class="btn  btn-outline-success btn-sm"> {{ $employee->status }} </a>
														@endif
														 
													</td> 
													<td>
														<div style="text-align: center;">
														@if($employee->user_id == auth()->user()->id || $employee->user_id == 1)

														@else
														<!-- <form onsubmit="return confirm('Are you sure?')" action="{{ route('employees.destroy', $employee->id)}}" method="post">
															@method('DELETE')
															@csrf
															<button class="btn-sm btn-danger" type="submit"> <i class="fa fa-trash"></i> </button>
														 </form> -->
														@endif
														<!-- <a class="btn-sm btn-success" href="{{ route('employees.show', $employee->id) }}"><i class="fa fa-eye"></i></a> -->
														</div>
													</td>
												</tr>														
												@endforeach

												@if(!count($employees)) 
													<tr>
														<td colspan="6">
															<div class="alert alert-danger"> No data found!</div>
														</td>
													</tr>
												@endif
												<tr>
													<td colspan="6">
														<div class="d-flex justify-content-center">
															{{ $employees->links() }}
														</div>
													</td>
												</tr>
													
												
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
		<!-- Inner Wrapper -->
		
		<!-- Create Reports The Modal -->
		<div class="modal fade" id="add_report">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create Report</h4>
						<form>
							<p class="mb-2">Select Report Type</p>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">Team Member</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio2">Time Off</label>
							</div>
							
							<div class="form-group">
								<label class="mt-3">What data would you like to include?</label>
								<!-- Multiselect dropdown -->
								<select multiple class="select w-100 form-control">
									<option>Full Name</option>
									<option>Working Days Off</option>
									<option>Booked By</option>
									<option>Start Date</option>
									<option>End Date</option>
									<option>Team Name</option>
									<option>First Name</option>
									<option>Last Name</option>
									<option>Email</option>
									<option>Date Of Birth</option>
									<option>Phone Number</option>
								</select><!-- End -->
							</div>
						</form>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
	        $(document).ready( function () {
			    $('#example').DataTable();
			} );
	    </script>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection

@push('scripts')
	<script type="text/javascript">
		function deleteAllSelected() {
			var selectedUserIds = [];
			$('#list_emp_table input[type="checkbox"]:checked').each(function(){
				var selected_user_ids = $(this).val();
				selectedUserIds.push(selected_user_ids);
			});                

			if(selectedUserIds.length == 0) {
				alert('Please select a employee');
				return false;
			}

			if (!confirm("Do you want to delete?")){
					return false;
			}
			console.log('delete', selectedUserIds);

			$.ajax({
                    method: 'POST',
                    url: '/employees/multiple-delete',
                    data: JSON.stringify({'delete_ids': selectedUserIds, "_token": "{{ csrf_token() }}" }),
                    dataType: "json",
                    contentType: 'application/json',
                    success: function(response){
                        console.log('response : ', response);
						alert('deleted successfully!');
						window.location.reload();                        
                    }					
                });
		}
	</script>
@endpush