@extends('layout.mainlayout')
@section('content')
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
															<li class="breadcrumb-item d-inline-block"><a href="index" class="text-dark">Time</a></li>
															<li class="breadcrumb-item d-inline-block active">Timesheets</li>
														</ol>
														<h4 class="text-dark">My Timesheets</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
										<a href="javascript:void(0)" class="btn ctm-border-radius text-white btn-block btn-theme button-1" data-toggle="modal" data-target="#add_timesheet"><span><i class="fe fe-plus"></i></span> Create Timesheet</a>
									</div>
								</div>
							</aside>
						</div>
				
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">
												Timesheets
												<div class="fc-button-group float-right">
													<button type="button" class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active" id="daily_button">Daily</button>
													<button type="button" class="fc-agendaWeek-button fc-button fc-state-default" id="weekly_button">Weekly</button>
													<button type="button" class="fc-agendaDay-button fc-button fc-state-default fc-corner-right" id="monthly_button">Monthly</button>
												</div>
											</h4>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-sm-4">
													<div class="form-inline">
														<div class="form-group">
															<label>Date: </label>
															<div class="input-group mb-3">
																<div class="input-group-append">
																	<button class="btn btn-theme text-white" type="button" id="search">
																		<i class="fa fa-angle-left" aria-hidden="true" style="font-size: 25px;"></i>
																	</button>
																</div>
																	<input class="form-control datetimepicker1" type="text" id="datetimepicker" name="datetimepicker">
																	<input class="form-control month" type="text" id="month" name="month" style="display:none;">
																	<input class="form-control week" type="text" id="week" name="week" style="display:none;">
																<div class="input-group-append">
																	<button class="btn btn-theme text-white" type="button" id="search">
																		<i class="fa fa-angle-right" aria-hidden="true" style="font-size: 25px;"></i>
																	</button>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="col-sm-4"></div>

												<div class="col-sm-4">
													<div class="input-group mb-3">
														<input type="text" class="form-control" placeholder="Search" id="search_input" name="search_input">
														<div class="input-group-append">
															<button class="btn btn-theme text-white" type="button" id="search">
																<i class="fa fa-search" aria-hidden="true"></i>
															</button>
														</div>
													</div>
												</div>
											</div>											
										</div>
									</div>									
								</div>
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0" id="timesheet_table_header">Daily Timesheets</h4>
										</div>
										<div class="card-body">
											<div class="employee-timesheets">
												<div class="table-responsive">
													<table class="table custom-table mb-0 table-hover">
														<thead>
															<tr>
																<th>Employee</th>
																<th>Project</th>
																<th>Activity</th>
																<th>Comments</th>
																<th>Time spent</th>
																<th class="text-center">Action</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<a href="employment" class="avatar"><img alt="avatar image" src="img/profiles/img-5.jpg" class="img-fluid"></a>
																	<h2><a href="employment">Danny Ward</a></h2>
																</td>
																<td>CIT-HRM</td>
																<td>UI Designing</td>
																<td>all screens</td>
																<td>03:30</td>
																<td class="text-right text-danger">
																	<a href="javascript:void(0);" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#edit_timesheet">
																		<span class="lnr lnr-pencil"></span> Edit
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
																		<span class="lnr lnr-trash"></span> Delete
																	</a>
																</td>
															</tr>
															<tr>
																<td>
																	<a href="employment" class="avatar"><img alt="avatar image" src="img/profiles/img-5.jpg" class="img-fluid"></a>
																	<h2><a href="employment">Danny Ward</a></h2>
																</td>
																<td>CIT-HRM</td>
																<td>DB schema Designing</td>
																<td>MySQL</td>
																<td>04:30</td>
																<td class="text-right text-danger">
																	<a href="javascript:void(0);" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#edit_timesheet">
																		<span class="lnr lnr-pencil"></span> Edit
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
																		<span class="lnr lnr-trash"></span> Delete
																	</a>
																</td>
															</tr>
															<tr>
																<td>
																	<a href="employment" class="avatar"><img alt="avatar image" src="img/profiles/img-5.jpg" class="img-fluid"></a>
																	<h2><a href="employment">Danny Ward</a></h2>
																</td>
																<td>CIT-HRM</td>
																<td>Environment setup</td>
																<td>installation and configuration</td>
																<td>01:00</td>
																<td class="text-right text-danger">
																	<a href="javascript:void(0);" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#edit_timesheet">
																		<span class="lnr lnr-pencil"></span> Edit
																	</a>
																	<a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
																		<span class="lnr lnr-trash"></span> Delete
																	</a>
																</td>
															</tr>
															<tr>
																<td></td>
																<td></td>
																<td></td>
																<th>Total hours</th>
																<th>09:00</th>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											<hr>

											<div class="row">
												<div class="col-sm-3 text-center">
													<div class="row">
														<div class="col-sm-6">
															<button class="btn btn-theme text-white ctm-border-radius button-1" type="button">Export</button>
														</div>
													</div>
												</div>
											</div>											
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
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
		<!-- Add Timesheet Modal -->
		<div id="add_timesheet" class="modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Create Timesheet</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<!-- Modal body -->
						<div class="modal-body">

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Date of timesheet <span class="text-danger">*</span></label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<input class="form-control datetimepicker" type="text" name="datetimepicker" id="datetimepicker">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Project <span class="text-danger">*</span></label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Type for hints..." name="project" id="project" value="">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Activity <span class="text-danger">*</span></label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Type for hints..." id="activity" name="activity" value="">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Hours spent <span class="text-danger">*</span></label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="HH:MM" id="hours" name="hours" value="">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Note</label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<textarea class="form-control" rows="3" name="note"></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-center">
							<button type="button" class="btn btn-theme ctm-border-radius text-white save-event submit-btn button-1">Create</button>
						</div>
				</div>
			</div>
		</div>
		<!-- /Add Timesheet Modal -->

		<!-- Edit Timesheet Modal -->
		<div id="edit_timesheet" class="modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Edit Timesheet</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<!-- Modal body -->
						<div class="modal-body">

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Date of timesheet <span class="text-danger">*</span></label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<input class="form-control datetimepicker" type="text" name="datetimepicker" id="datetimepicker">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Project <span class="text-danger">*</span></label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Type for hints..." name="edit_project" id="edit_project" value="">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Activity <span class="text-danger">*</span></label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Type for hints..." id="edit_activity" name="edit_activity" value="">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Hours spent <span class="text-danger">*</span></label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="HH:MM" id="edit_hours" name="edit_hours" value="">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>Note</label>
									</div>
								</div>
								<div class="col-sm-8">
									<div class="form-group">
										<textarea class="form-control" rows="3" name="edit_note"></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-center">
							<button type="button" class="btn btn-theme ctm-border-radius text-white save-event submit-btn button-1">Update</button>
						</div>
				</div>
			</div>
		</div>
		<!-- /Edit Timesheet Modal -->
		
@endsection


@push('scripts')
<script type="text/javascript">
	$('#datetimepicker1').datetimepicker({
		format: "YYYY-MM-DD", 
		maxDate: moment()
	});

	$('#datetimepicker').datetimepicker({
		format: "YYYY-MM-DD", 
		maxDate: moment()
	});

	$('#week').datetimepicker({
		format: "YYYY-MM-DD", 
		maxDate: moment()
	});

	$('#month').datetimepicker({
		format: "YYYY-MM", 
		maxDate: moment()
	});	

	/* to display the specific calendars according to the button click */
	$('#monthly_button').on('click', function(){
		$('#daily_button').removeClass('fc-state-active');
		$('#weekly_button').removeClass('fc-state-active');
		$('#monthly_button').addClass('fc-state-active');
		$('#datetimepicker').css('display', 'none');
		$('#week').css('display', 'none');
		$('#month').css('display', 'block');
		$('#timesheet_table_header').text('Monthly Timesheets');
	});

	$('#daily_button').on('click', function(){
		$('#monthly_button').removeClass('fc-state-active');
		$('#weekly_button').removeClass('fc-state-active');
		$('#daily_button').addClass('fc-state-active');
		$('#week').css('display', 'none');
		$('#month').css('display', 'none');
		$('#datetimepicker').css('display', 'block');
		$('#timesheet_table_header').text('Daily Timesheets');
	});

	$('#weekly_button').on('click', function(){
		$('#monthly_button').removeClass('fc-state-active');
		$('#daily_button').removeClass('fc-state-active');
		$('#weekly_button').addClass('fc-state-active');
		$('#month').css('display', 'none');
		$('#datetimepicker').css('display', 'none');
		$('#week').css('display', 'block');
		$('#timesheet_table_header').text('Weekly Timesheets');
	});
</script>
@endpush
