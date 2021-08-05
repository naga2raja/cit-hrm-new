@extends('layout.mainlayout')
@section('content')
<!-- Page Wrapper -->
<!-- Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="index" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Reports</li>
														</ol>
														<h4 class="text-dark">Reports</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
									<div class="card-body">
										<ul class="list-group">
											<li class="list-group-item text-center active"><a href="employee_report" class="text-white">Employee Reports</a></li>
											<li class="list-group-item text-center "><a class="text-dark" href="leave-reports">Leave Reports</a></li>
											<li class="list-group-item text-center"><a class="text-dark" href="payroll-reports">Payroll reports</a></li>
											<li class="list-group-item text-center"><a class="text-dark" href="contact-reports">Contact reports</a></li>
											<li class="list-group-item text-center"><a class="text-dark" href="email-reports">Email Reports</a></li>
											<li class="list-group-item text-center"><a class="text-dark" href="security-reports">Security Reports</a></li>
											<li class="list-group-item text-center"><a class="text-dark" href="work-from-home-reports">Working From Home Reports</a></li>
										</ul>
									</div>
								</div>
							</aside>
						</div>
				
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<form method="GET" id="reportForm">
										<input type="hidden" name="export" value="0" id="export">
									<div class="row filter-row">
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3"> 
												<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
													<label>Report</label>
													<select class="form-control select" name="report">
														<option>Select</option>
														<option value="employee_report" @if(Request::get('report') == 'employee_report') selected @endif >Employee Report</option>
														<option value="leave_report" @if(Request::get('report') == 'leave_report') selected @endif>Leave Report</option>
														<option>Attendance Report</option>
														<option>Timesheet Report</option>
														<option>Project Report</option>
													</select>
												</div>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">  
												<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
													<label>Created From Date</label>
													<input type="text" class="form-control datetimepicker" placeholder="From" name="from_date" id="from_date" value="{{ Request::get('from_date') }}">
												</div>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">  
												<div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
													<label>Created To Date</label>
													<input type="text" class="form-control datetimepicker" placeholder="To" name="to_date" id="to_date" value="{{ Request::get('to_date') }}">
												</div>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">  
												<div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
													<label>Status</label>
													<select class="form-control select" name="status">
														<option value="">All</option>
														<option value="Active"  {{ Request::get('status') == 'Active' ? 'selected' : ''}}>Active</option>
														<option value="Inactive" {{ Request::get('status') == 'Inactive' ? 'selected' : ''}}>Inactive</option>
													</select>
												</div>
											</div>
											
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">  
												<label> &nbsp; </label>
												<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Apply Filter </button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<div class="employee-office-table">
										<div class="table-responsive">
											<table class="table custom-table table-hover">
												<thead>
													<tr>
														<th>Employee Id</th>
														<th>First Name</th>
														<th>Middle Name</th>
														<th>Last Name</th>
														<th>Email</th>
														<th>Date of Birth</th>
														<th>Gender</th>
														<th>Date of Joining</th>
														<th>Status</th>
														<th>Created At</th>
													</tr>
												</thead>
												<tbody>

													@foreach ($data as $item)
													<tr>
														<td> {{ $item['employee_id'] }} </td>
														<td> {{ $item['first_name'] }} </td>
														<td> {{ $item['middle_name'] }} </td>
														<td> {{ $item['last_name'] }} </td>
														<td> {{ $item['email'] }} </td>														
														<th> {{ $item['date_of_birth'] }}</th>
														<td> {{ $item['gender'] }} </td>
														<td> {{ $item['joined_date'] }} </td>
														<td> {{ $item['status'] }} </td>
														<td> {{ $item['created_at'] }} </td>
													</tr>														
													@endforeach

													@if(count($data) < 1)
														<tr>
															<td colspan="100%">
																<div class="alert alert-danger text-center">No Data Found</div>
															</td>
														</tr>
													@endif
													
													{{-- <tr>
														<td>
															<a href="employment" class="avatar"><img alt="avatar image" src="img/profiles/img-5.jpg" class="img-fluid"></a>
															<h2><a href="employment">Danny Ward</a></h2>
														</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> Active <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																</div>
															</div>
														</td>
														<td>danyward@example.com</td>
														<td>12</td>
														<td>2</td>
														<td>0</td>
														<td>1</td>
														<td>10</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img class="img-fluid" alt="avatar image" src="img/profiles/img-4.jpg"></a>
															<h2><a href="employment"> Linda Craver</a></h2>
														</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> Active <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																</div>
															</div>
														</td>
														<td>lindacraver@example.com</td>
														<td>12</td>
														<td>3</td>
														<td>1</td>
														<td>1</td>
														<td>8</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img class="img-fluid" alt="avatar image" src="img/profiles/img-3.jpg"></a>
															<h2><a href="employment">Jenni Sims</a></h2>
														</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> Active <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																</div>
															</div>
														</td>
														<td>jennisims@example.com</td>
														<td>12</td>
														<td>2</td>
														<td>0</td>
														<td>1</td>
														<td>10</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img alt="avatar image" src="img/profiles/img-6.jpg" class="img-fluid"></a>
															<h2><a href="employment"> Maria Cotton</a></h2>
														</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> Active <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																</div>
															</div>
														</td>
														<td>mariacotton@example.com</td>
														<td>12</td>
														<td>3</td>
														<td>0</td>
														<td>1</td>
														<td>9</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img class="img-fluid" alt="avatar image" src="img/profiles/img-2.jpg"></a>
															<h2><a href="employment"> John Gibbs</a></h2>
														</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> Active <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																</div>
															</div>
														</td>
														<td>johndrysdale@example.com</td>
														<td>12</td>
														<td>8</td>
														<td>0</td>
														<td>1</td>
														<td>3</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img class="img-fluid" alt="avatar image" src="img/profiles/img-10.jpg"></a>
															<h2><a href="employment"> Richard Wilson</a></h2>
														</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> Active <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																</div>
															</div>
														</td>
														<td>richardwilson@example.com</td>
														<td>12</td>
														<td>5</td>
														<td>0</td>
														<td>1</td>
														<td>6</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img class="img-fluid" alt="avatar image" src="img/profiles/img-8.jpg"></a>
															<h2><a href="employment">Stacey Linville</a></h2>
														</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> Active <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																</div>
															</div>
														</td>
														<td>staceylinville@example.com</td>
														<td>12</td>
														<td>5</td>
														<td>0</td>
														<td>2</td>
														<td>5</td>
													</tr> --}}
												</tbody>
											</table>
										</div>
									</div>
									<div class="text-center mt-3">
										<button onclick="downloadExcel()" class="btn btn-theme button-1 ctm-border-radius text-white">Download Report</button>
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
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
@endsection

@section('my-scripts')
	<script type="text/javascript">
		function downloadExcel() {
			$('#export').val(1);
			$('#reportForm').submit();
			$('#export').val(0);

		}
	</script>
@endsection