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
										<a href="javascript:void(0)" class="btn ctm-border-radius text-white btn-block btn-theme button-1" data-toggle="modal" data-target="#add_event"><span><i class="fe fe-plus"></i></span> Create Timesheet</a>
									</div>
								</div>
							</aside>
						</div>
				
						<div class="col-xl-9 col-lg-8  col-md-12">
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
													<div class="input-group-append">
														<button class="btn btn-theme text-white" type="button" id="search">
															<a href="#" class="fa fa-angle-left"></a>
														</button>
													</div>
													<input class="form-control datetimepicker1" type="text" id="datetimepicker" name="datetimepicker">
													<input class="form-control month" type="text" id="month" name="month" style="display:none;">
													<input class="form-control week" type="text" id="week" name="week" style="display:none;">
													<div class="input-group-append">
														<button class="btn btn-theme text-white" type="button" id="search">
															<a href="#" class="fa fa-angle-right"></a>
														</button>
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
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
		<!-- Add Event Modal -->
		<div id="add_event" class="modal fade" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Timesheet</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label>Select a date to create timesheet <span class="text-danger">*</span></label>
								<input class="form-control datetimepicker1" type="text" id="datetimepicker1" name="datetimepicker1">
							</div>
							<div class="submit-section text-center">
								<button class="btn btn-theme ctm-border-radius text-white submit-btn button-1">Create</button>
								<button class="btn btn-theme ctm-border-radius text-white submit-btn button-1">Cancel</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Event Modal -->
		
		<!-- Add Event Modal -->
		<div class="modal fade none-border" id="my_event" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add Event</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer justify-content-center">
						<button type="button" class="btn btn-theme ctm-border-radius text-white save-event submit-btn button-1">Create event</button>
						<button type="button" class="btn btn-danger ctm-border-radius delete-event submit-btn" data-dismiss="modal">Delete</button>
					</div>
				</div>
			</div>
		</div>
		<!-- /Add Event Modal -->
		
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
	});

	$('#daily_button').on('click', function(){
		$('#monthly_button').removeClass('fc-state-active');
		$('#weekly_button').removeClass('fc-state-active');
		$('#daily_button').addClass('fc-state-active');
		$('#week').css('display', 'none');
		$('#month').css('display', 'none');
		$('#datetimepicker').css('display', 'block');
	});

	$('#weekly_button').on('click', function(){
		$('#monthly_button').removeClass('fc-state-active');
		$('#daily_button').removeClass('fc-state-active');
		$('#weekly_button').addClass('fc-state-active');
		$('#month').css('display', 'none');
		$('#datetimepicker').css('display', 'none');
		$('#week').css('display', 'block');
	});
</script>
@endpush
