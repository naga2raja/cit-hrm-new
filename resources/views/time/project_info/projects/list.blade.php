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
												<div class="row">
													<div class="col-sm-2 leave-col">
														<div class="form-group">
															<label>Customer Name</label>
															<input type="text" class="form-control" placeholder="Type for hint..." name="customer_name" value="{{ Request::get('customer_name') }}">
														</div>
													</div>
													<div class="col-sm-2">
														<div class="form-group">
															<label>Project</label>
															<input type="text" class="form-control" placeholder="Type for hint..." name="project_name" value="{{ Request::get('project_name') }}">							
														</div>
													</div>
													<div class="col-sm-2 leave-col">
														<div class="form-group">
															<label>Project Admin</label>
															<input type="text" class="form-control" placeholder="Type for hint..." name="project_admin" value="{{ Request::get('project_admin') }}">		
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
										<div class="text-left">
											<a href="{{ route('projects.create') }}" class="btn btn-success text-white ctm-border-radius"><span class="fa fa-plus"></span> Add</a>
											<button type="submit" class="btn btn-danger text-white ctm-border-radius"><span class="fa fa-trash"></span> Delete</button>
										</div>
									</div>
									<div class="card-body">

										<div class="employee-office-table">
											<div class="table-responsive">
												<table class="table custom-table mb-0 table-hover table-striped table-bordered">
													<thead>
														<tr class="bg-blue-header text-white">
															<th class="text-center">
																<input type="checkbox" name="select_all" onclick="select_deselect()">
															</th>
															<th>Customer Name</th>
															<th>Project</th>
															<th>project Admin</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td class="text-center">
																<input type="checkbox" name="checkbox" value="">
															</td>
															<td></td>
															<td></td>
															<td></td>
														</tr>												
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
