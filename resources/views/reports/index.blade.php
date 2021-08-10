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
										<ul class="list-group" id="reports_list">
											<li class="list-group-item text-center employee_report_li {{ (!Request::get('report') || Request::get('report') == 'employee_report') ? 'active' : '' }}"><a href="#employee_report" class="text-dark">Employee Report</a></li>
											<li class="list-group-item text-center leave_report_li {{ (Request::get('report') == 'leave_report') ? 'active' : '' }}"><a class="text-dark" href="#leave_report">Leave Report</a></li>
											<li class="list-group-item text-center attendance_report_li {{ (Request::get('report') == 'attendance_report') ? 'active' : '' }}"><a class="text-dark" href="#attendance_report">Attendance Report</a></li>
											<li class="list-group-item text-center timesheet_report_li {{ (Request::get('report') == 'timesheet_report') ? 'active' : '' }}"><a class="text-dark" href="#timesheet_report">Timesheet Report</a></li>
											<li class="list-group-item text-center productivity_report_li {{ (Request::get('report') == 'productivity_report') ? 'active' : '' }}"><a class="text-dark" href="#productivity_report">Productivity Report</a></li>
											<li class="list-group-item text-center leave_balance_report_li {{ (Request::get('report') == 'leave_balance_report') ? 'active' : '' }}"><a class="text-dark" href="#leave_balance_report">Leave Balance Report</a></li>
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
													<select class="form-control select" name="report" id="report" onchange="selectReportName()">
														<option>Select</option>
														<option value="employee_report" @if(!Request::get('report') || Request::get('report') == 'employee_report') selected @endif >Employee Report</option>
														<option value="leave_report" @if(Request::get('report') == 'leave_report') selected @endif>Leave Report</option>
														<option value="attendance_report" @if(Request::get('report') == 'attendance_report') selected @endif>Attendance Report</option>
														<option value="timesheet_report" @if(Request::get('report') == 'timesheet_report') selected @endif>Timesheet Report</option>
														<option value="productivity_report" @if(Request::get('report') == 'productivity_report') selected @endif">Productivity Report</option>
														<option value="leave_balance_report" @if(Request::get('report') == 'leave_balance_report') selected @endif">Leave Balance Report</option>
													</select>
												</div>
											</div>	
											
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 cit_filter_box leave_report_filter attendance_report_filter timesheet_report_filter">  
												<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
													<label>Employee</label> 
													<select class="form-control select" name="employee_id" id="employee_id">
														<option value="">All</option>
														@foreach ($employees as $item)
															<option value="{{ $item->id }}" @if(Request::get('employee_id') == $item->id) selected @endif> {{ $item->name }} </option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 cit_filter_box leave_report_filter">  
												<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
													<label>Leave Status</label> 
													<select class="form-control select" name="leave_status" id="leave_status">
														<option value="">All</option>
														@foreach ($leaveStatus as $item)
															<option value="{{ $item->id }}" @if(Request::get('leave_status') == $item->id) selected @endif> {{ $item->name }} </option>
														@endforeach
													</select>
												</div>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 cit_filter_box leave_report_filter">  
												<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
													<label>Leave Type</label> 
													<select class="form-control select" name="leave_type" id="leave_type">
														<option value="">All</option>
														@foreach ($leaveType as $item)
															<option value="{{ $item->id }}" @if(Request::get('leave_type') == $item->id) selected @endif> {{ $item->name }} </option>
														@endforeach
													</select>
												</div>
											</div>
										
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 cit_filter_box employee_report_filter timesheet_report_filter">  
												<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
													<label>Job Title</label> 
													<select class="form-control select" name="job_title" id="job_title">
														<option value="">All</option>
														@foreach ($jobTitle as $item)
															<option value="{{ $item->id }}" @if(Request::get('job_title') == $item->id) selected @endif> {{ $item->job_title }} </option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 cit_filter_box timesheet_report_filter productivity_report_filter">  
												<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
													<label>Project</label> 
													<select class="form-control select" name="project_id" id="project_id">
														<option value="">All</option>
														@foreach ($projects as $item)
															<option value="{{ $item->id }}" @if(Request::get('project_id') == $item->id) selected @endif> {{ $item->project_name }} </option>
														@endforeach
													</select>
												</div>
											</div>

											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 cit_filter_box employee_report_filter leave_report_filter attendance_report_filter timesheet_report_filter productivity_report_filter">  
												<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
													<label> From Date</label>
													<input type="text" class="form-control datetimepicker" placeholder="From" name="from_date" id="from_date" value="{{ Request::get('from_date') }}">
												</div>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 cit_filter_box employee_report_filter leave_report_filter attendance_report_filter timesheet_report_filter productivity_report_filter">  
												<div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
													<label>	 To Date</label>
													<input type="text" class="form-control datetimepicker" placeholder="To" name="to_date" id="to_date" value="{{ Request::get('to_date') }}">
												</div>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 cit_filter_box employee_report_filter">  
												<div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
													<label>Status</label>
													<select class="form-control select" name="status">
														<option value="">All</option>
														<option value="Active"  {{ Request::get('status') == 'Active' ? 'selected' : ''}}>Active</option>
														<option value="Inactive" {{ Request::get('status') == 'Inactive' ? 'selected' : ''}}>Inactive</option>
													</select>
												</div>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 cit_filter_box attendance_report_filter">  
												<div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
													<label>Type</label>
													<select class="form-control select" name="is_import">
														<option value="">All</option>
														<option value="0"  {{ Request::get('is_import') == '0' ? 'selected' : ''}}>Manual</option>
														<option value="1" {{ Request::get('is_import') == '1' ? 'selected' : ''}}>Import</option>
													</select>
												</div>
											</div>
											
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">  
												<label> &nbsp; </label>
												<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Apply Filter </button>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">  
												<label> &nbsp; </label>
												<button type="reset" class="btn btn-danger ctm-border-radius text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Reset </button>
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
											  @if(!Request::get('report') || Request::get('report') == 'employee_report')
												<thead>
													<tr class="bg-light">
														<th>Employee Id</th>
														<th>First Name</th>
														<th>Middle Name</th>
														<th>Last Name</th>
														<th>Email</th>
														<th>Date of Birth</th>
														<th>Gender</th>
														<th>Date of Joining</th>
														<th>Marital Status</th>
														<th>Status</th>
														<th> Street address1 </th>
														<th> Street address2 </th>
														<th> City </th>
														<th> State </th>
														<th> Country </th>
														<th> Zip code </th>
														<th> Home Telephone </th>
														<th> Mobile </th>
														<th> Work Telephone </th>
														<th> Alternate Email </th>
														<th>Job Title</th>
														<th>Report to</th>
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
														<td> {{ $item['marital_status'] }} </td>
														<td> {{ $item['status'] }} </td>
														<td> {{ $item['street_address_1'] }}</td>
														<td> {{ $item['street_address_2'] }}</td>
														<td> {{ $item['city'] }}</td>
														<td> {{ $item['state'] }}</td>
														<td> {{ $item['country'] }}</td>
														<td> {{ $item['zip_code'] }}</td>
														<td> {{ $item['home_telephone'] }}</td>
														<td> {{ $item['mobile'] }}</td>
														<td> {{ $item['work_telephone'] }}</td>
														<td> {{ $item['alternate_email'] }}</td>
														<td> {{ $item['job_title'] }}</td>
														<td> {{ $item['report_to'] }}</td>
														<td> {{ date('Y-m-d H:i:s a', strtotime($item['created_at'])) }} </td>
													</tr>														
													@endforeach
												@endif
												
												@if(Request::get('report') == 'leave_report')
												<thead>
													<tr class="bg-light">
														<th>Employee Name</th>
														<th>Leave Type</th>
														<th>From</th>
														<th>To</th>
														<th>Days</th>																
														<th>Notes</th>
														<th>Status</th>	
														<th>Created At</th>														
													</tr>
												</thead>
												<tbody>
													@foreach ($data as $leave)
													<tr>                                                                    
														<td> {{ $leave['emp_name'] }} </td>
														<td> {{ $leave['name'] }} </td>
														<td> {{ $leave['from_date'] }} </td>
														<td> {{ $leave['to_date'] }} </td>
														<td> 
															{{ $leave['my_leave_duration']}}
														</td>                                                                    
														<td> {{ $leave['comments'] }}</td>
														<td> 															
															{{ $leave['my_leave_status'] }}
														</td>
														<td> {{ date('Y-m-d H:i:s a', strtotime($item['created_at'])) }} </td>
														
													</tr>
												@endforeach

												</tbody>
												@endif

												@if(Request::get('report') == 'attendance_report')
												<thead>
													<tr class="bg-light">														
														<th> Name </th>
														<th>Punch in</th>		
														<th>Punch out</th>
														<th>Duration</th>
														<th>Status</th>
														<th>Type</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($data as $attendance)
													<tr>
														<td> {{ $attendance['emp_name'] }} </td>
														<td>
															<h2>{{ $attendance['punch_in_user_time'] }}</h2>
														</td>													
														<td>
															<h2>{{ $attendance['punch_out_user_time'] }}</h2>
														</td>
														<td>
															<h2>{{ hoursAndMins($attendance['duration']) }}</h2>
														</td>
														<td>
															{{ $attendance['current_status'] }} 
														</td>
														<td>
															{{ ($attendance['is_import']) ? 'Import' : 'Manual' }}
														</td>
													</tr>
													@endforeach

												</tbody>
												@endif
												
												@if(Request::get('report') == 'timesheet_report')
												<thead>
													<tr class="bg-light">														
														<th>Employee Name </th>
														<th>Project Name</th>		
														<th>Date</th>
														<th>Duration</th>
														<th>Status</th>
														<th>Create At</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($data as $timesheet)
													<tr>
														<td> {{ $timesheet['employee_name'] }} </td>
														<td> {{ $timesheet['project_name'] }} </td>
														<td> {{ $timesheet['date'] }} </td>
														<td> {{ hoursAndMins($timesheet['duration']) }} </td>
														<td> {{ currentPunchStatus($timesheet['status']) }} </td>
														<td> {{ date('Y-m-d H:i:s a', strtotime($timesheet['created_at'])) }} </td>
													@endforeach
												</tbody>
												@endif

												@if(Request::get('report') == 'productivity_report')
												<thead>
													<tr class="bg-light">														
														<th>Project Name </th>
														<th>Customer Name</th>																
														<th>Duration (HH:MM)</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($data as $timesheet)
													<tr>
														<td> <b>{{ $timesheet['project_name'] }} </b></td>
														<td> {{ $timesheet['customer_name'] }} </td>
														<td> {{ hoursAndMins($timesheet['duration']) }} </td>
													</tr>
														@foreach ($timesheet['activities'] as $activity)
														<tr>
															<td> </td>
															<td> {{ $activity['activity_name'] }} </td>
															<td> {{ hoursAndMins($activity['duration']) }} </td>
														</tr>
														@endforeach
														<tr>
															<td colspan="3"> <hr> </td>
														</tr>

													@endforeach
												</tbody>
												@endif

													@if(count($data) < 1)
														<tr>
															<td colspan="100%">
																<div class="alert alert-danger text-left">No Data Found</div>
															</td>
														</tr>
													@endif
													
													{{--
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

		$("#reports_list li.list-group-item").click(function() {
			$(this).addClass('active').siblings().removeClass('active');
			var href = $('#reports_list li.list-group-item.active a').attr('href');
			href = href.replace('#', '');
			$('[name=report]').val(href).trigger('change');
			manageSearchBox(href);
		});

		$('#employee_id').select2();
		var report = "{{ Request::get('report') }}";
		manageSearchBox(report);

		function manageSearchBox(report) {
			$('.cit_filter_box').hide();
			if(!report || report == 'employee_report') {
				$('.employee_report_filter').show();
			} else if(report == 'leave_report') {
				$('.leave_report_filter').show();
			} else if(report == 'attendance_report') {
				$('.attendance_report_filter').show();
			} else if(report == 'timesheet_report') {
				$('.timesheet_report_filter').show();
			} else if(report == 'productivity_report') {
				$('.productivity_report_filter').show();
			}
		}

		function selectReportName() {
			var seletedReport = $('#report').val();
			manageSearchBox(seletedReport);
		}
		
	</script>
@endsection