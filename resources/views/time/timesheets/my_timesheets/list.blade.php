@extends('layout.mainlayout')
@section('content')
<!-- Content -->
<style type="text/css">
	.bootstrap-datetimepicker-widget tr:hover {
	    /*background-color: #eee;*/
	}
</style>
<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<!-- left side -->
						<div class=" col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card shadow-sm ctm-border-radius">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block"> Search</h4>
										<h4 class="float-right"><i class="fa fa-search"></i></h4>
									</div>
									<div class="card-body">
										<form method="GET" action="{{ route('myEntitlements.index') }}">
											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Employee Name</label>
														<input type="text" name="search" class="form-control">
		                                                {!! $errors->first('leave_period', '<span class="invalid-feedback" role="alert">:message</span>') !!}
		                                                <input type="hidden" name="from_date" id="from_date" class="form-control" value="{{ Request::get('from_date') }}">
		                                                <input type="hidden" name="to_date" id="to_date" class="form-control" value="{{ Request::get('to_date') }}">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Search</label>
														<input type="text" name="search" class="form-control">
		                                                {!! $errors->first('leave_type_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4"> Search </button>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<a href="{{ route('leaveEntitlement.index') }}" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4"> Cancel </a>
												</div>
											</div>												
										</form>
									</div>
									<div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
										<a href="javascript:void(0)" class="btn ctm-border-radius text-white btn-block btn-theme button-1" data-toggle="modal" data-target="#add_timesheet"><span><i class="fe fe-plus"></i></span> Create Timesheet</a>
									</div>
								</div>
								</div>
							</aside>
						</div>
						<!-- left side end -->

						<!-- right side -->				
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-body">
											<div class="col-md-12">
												<div class="row">												
													<div class="col-md-6">
														<div class="form-inline">
															<div id="daily_div">
																<button type="button" class="btn btn-lg text-left" style="width: 100px;">Day:</button>
																<button type="button" id="previous" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button>
																<input type="text" name="date" id="datepicker" class="form-control datetimepicker" required="">
																<button type="button" id="next" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button>
															</div>
															<div id="weekly_div" style="display: none;">
																<button type="button" class="btn btn-lg text-left" style="width: 100px;">Week:</button>
																<button type="button" id="previous" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button>
																<input type="text" name="date" id="weeklyDatePicker" class="form-control " required="">
																<button type="button" id="next" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button>
															</div>
															<div id="monthly_div" style="display: none;">
																<button type="button" class="btn btn-lg text-left" style="width: 100px;">Month:</button>
																<button type="button" id="previous" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button>
																<input type="text" id="month" name="month" class="form-control month" >
																<button type="button" id="next" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-inline float-right">
															<span class="mr-1">Search: </span>
															<input type="text" name="search" class="mr-5 form-control float-right" required="" autocomplete="off">
									                        <div class="btn-group">
									                            <a id="daily_button" class="btn btn-sm btn-outline-primary fc-state-active" href="#timesheets/day/2021-07-12">Daily</a>
									                            <a id="weekly_button" class="btn btn-sm btn-outline-primary" href="#timesheets/week/2021-07-01">Weekly</a>
									                            <a id="monthly_button" class="btn btn-sm btn-outline-primary" href="#timesheets/month/2021-07-01">Monthly</a>
									                        </div>
										                </div>
													</div>
												</div>
											</div>

											<hr><h4 class="card-title mb-0 ml-3" id="timesheet_table_header">Daily Timesheets</h4><hr>
											<div class="employee-timesheets">
												<div class="table-responsive">
													<table id="timesheets" class="table custom-table table-hover">
														<thead>
															<tr class="bg-light">
																<th>Employee</th>
																<th>Project</th>
																<th>Activity</th>
																<th>Comments</th>
																<th>Time spent</th>
															</tr>
														</thead>
														<tbody id="list_timesheet_table">
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
		
@endsection


@push('scripts')
<script type="text/javascript">

	function setCurrentDate(){
		var now = new Date();
		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var date = (day) + "/" + (month) + "/" + now.getFullYear() ;
		$('#datepicker').val(date);
	}

	function LoadData(){
		var date = $('#datepicker').val();
		$.ajax({
			method: 'POST',
			url: '/mytimesheets/getMyTimeSheets-ajax',
			data: JSON.stringify({'selected_date': date, '_token': '{{ csrf_token() }}' }),
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				// console.log('response : ', data);
				
				if(data.length > 0){
		            console.log(data);
		            var rows = '';
		            data.forEach(function (row,index) {
		              rows += '<tr>';
		              rows += '<td>' + row.employee_name + '</td>';
		              rows += '<td>' + row.project_name.project_name + '</td>';
		              rows += '<td>' + row.activity_name.activity_name + '</td>';
		              rows += '<td>' + row.comments + '</td>';
		              rows += '<td>' + row.duration + '</td>';
		            });
		            $('#timesheets > tbody').html(rows);
		        }
			}
		});
	}

	window.onload = function() {
		setCurrentDate();
		//Initialize the datePicker(I have taken format as mm-dd-yyyy, you can     //have your owh)
		$("#weeklyDatePicker").datetimepicker({
			format: 'MM-DD-YYYY'
		});
	   //Get the value of Start and End of Week
	   $('#weeklyDatePicker').on('dp.change', function (e) {
	   		var value = $("#weeklyDatePicker").val();
	   		var firstDate = moment(value, "MM-DD-YYYY").day(0).format("DD/MM/YYYY");
	   		var lastDate =  moment(value, "MM-DD-YYYY").day(6).format("DD/MM/YYYY");
	   		$("#weeklyDatePicker").val(firstDate + " - " + lastDate);
	   });   

	   LoadData();
	}

	function PreviousDate(date){
		// change format of input date
		var formated_date = moment(date, "DD/MM/YYYY").format("YYYY/MM/DD");
		var result = new Date(formated_date);
		// to add 1 days from the selected date
	    result.setDate(result.getDate() + -1);
	    // change format as per the datepicker
		var next_date = moment(result).format("DD/MM/YYYY")
		$('#datepicker').val(next_date);
	}

	function NextDate(date){
		// change format of input date
		var formated_date = moment(date, "DD/MM/YYYY").format("YYYY/MM/DD");
		var result = new Date(formated_date);
		// to add 1 days from the selected date
	    result.setDate(result.getDate() + +1);
	    // change format as per the datepicker
		var next_date = moment(result).format("DD/MM/YYYY")
		$('#datepicker').val(next_date);
	}	

	$('#previous').click(function(){
		PreviousDate($('#datepicker').val());
	});
	$('#next').click(function(){
		NextDate($('#datepicker').val());
	});


	$('#month').datetimepicker({
		format: "YYYY-MM", 
		maxDate: moment()
	});	

	/* to display the specific calendars according to the button click */
	$('#daily_button').on('click', function(){		
		$('#daily_button').addClass('fc-state-active');
		$('#weekly_button').removeClass('fc-state-active');
		$('#monthly_button').removeClass('fc-state-active');
		$('#daily_div').css('display', 'block');
		$('#weekly_div').css('display', 'none');
		$('#monthly_div').css('display', 'none');
		$('#timesheet_table_header').text('Daily Timesheets');
	});

	$('#weekly_button').on('click', function(){
		$('#daily_button').removeClass('fc-state-active');
		$('#weekly_button').addClass('fc-state-active');
		$('#monthly_button').removeClass('fc-state-active');
		$('#daily_div').css('display', 'none');
		$('#weekly_div').css('display', 'block');
		$('#monthly_div').css('display', 'none');
		$('#timesheet_table_header').text('Weekly Timesheets');
	});

	$('#monthly_button').on('click', function(){
		$('#daily_button').removeClass('fc-state-active');
		$('#weekly_button').removeClass('fc-state-active');
		$('#monthly_button').addClass('fc-state-active');
		$('#daily_div').css('display', 'none');
		$('#weekly_div').css('display', 'none');
		$('#monthly_div').css('display', 'block');
		$('#timesheet_table_header').text('Monthly Timesheets');
	});
</script>
@endpush
