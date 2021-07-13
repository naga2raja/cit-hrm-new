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
										<!-- <div class="card-header">
											<h4 class="card-title mb-0">Employees</h4>
										</div> -->
										<div class="card-body">
											<form method="GET">
												<div class="row">
													<div class="col-sm-3 leave-col">
														<div>
															<!-- <label>Employee Name</label> -->
															<input type="text" class="form-control" placeholder="First/Middle/Last Name" name="employee_name" value="{{ Request::get('employee_name') }}">
														</div>
													</div>
													<div class="col-sm-2 leave-col">
														<div>
															<!-- <label>Employee Id</label> -->
															<input type="text" class="form-control" placeholder="Employee Id" name="employee_id" value="{{ Request::get('employee_id') }}">
														</div>
													</div>
													<div class="col-sm-2 leave-col">
														<div>
															<!-- <label>Email</label> -->
															<input type="text" class="form-control" placeholder="Email" name="email" value="{{ Request::get('email') }}">
														</div>
													</div>
													<div class="col-sm-2">
														<div>
															<!-- <label>
															Status
															<span class="text-danger">*</span>
															</label> -->
															<select class="form-control select" name="status">
																<option value="">Status</option>
																<option value="Active"  {{ Request::get('status') == 'Active' ? 'selected' : ''}}>Active</option>
																<option value="Inactive" {{ Request::get('status') == 'Inactive' ? 'selected' : ''}}>Inactive</option>
															</select>
														</div>
													</div>
													<div class="col-sm-3">														
														<button type="submit" class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" name="search"><span class="fa fa-search"></span> Search</button>
														<button type="reset" class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><span class="fa fa-refresh"></span> Reset</button>
													</div>
												</div>
												<div class="row">
																										
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="row">
										<div class="col-md-8">
											<h4 class="card-title mb-0">Employees</h4>
										</div>
										<div class="col-md-4">
											<div class="text-right">
												<a href="{{ route('employees.create') }}" class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><span class="fa fa-plus"></span> Add</a>
												<button class="btn btn-theme button-1 text-white p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll()"><span class="fa fa-trash"></span> Delete</button>
											</div>
										</div>
									</div>
									
								</div>
								<div class="card-body">
									@if($message = Session::get('success'))
										<div class="alert alert-success">
											<p>{{$message}}</p>
										</div>
									@endif	

									<div class="card-body align-center">
										<div class="table-responsive">
											<table class="table custom-table table-hover" >
												<thead>
													<tr>
														<th class="text-center">
															<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll()">
														</th>
														<th>Employee Id</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th>Email</th>
														<th>Status</th>
														<th class="text-center">Action</th>
													</tr>
												</thead>
												<tbody id="list_emp_table">
													@foreach($employees as $employee)
													<tr>
														<td class="text-center">
															<input type="checkbox" name="chk_user" value="{{ $employee->id }}">
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
															<!-- <a class="btn-sm btn-primary" href="{{ route('employees.edit', $employee->id) }}"><i class="fa fa-pencil"></i></a> -->

															<form onsubmit="return confirm('Are you sure?')" action="{{ route('employees.destroy', $employee->id)}}" method="post">
																@method('DELETE')
																@csrf
																<button class="btn-sm btn-danger" type="submit"> <i class="fa fa-trash"></i> </button>
															 </form>
															<!-- <a class="btn-sm btn-success" href="{{ route('employees.show', $employee->id) }}"><i class="fa fa-eye"></i></a> -->
															</div>
														</td>
													</tr>														
													@endforeach

													@if(!count($employees)) 
														<tr>
															<td colspan="7">
																<div class="alert alert-danger"> No data found!</div>
															</td>
														</tr>
													@endif
													<tr>
														<td colspan="7">
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
		function SelectAll() {
			var isCheckedAll = $('#select_checkAll').val();
			if ($('#select_checkAll').is(':checked')) {
				$('#list_emp_table input[type="checkbox"]').prop("checked", true);
			} else {
				$('#list_emp_table input[type="checkbox"]').prop("checked", false);
			}                
		}

		function deleteAll() {
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