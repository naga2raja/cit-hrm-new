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
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-body py-4">
											<div class="row">
												<div class="col-md-12 mr-auto text-left">
													<div class="custom-search input-group">
														<div class="custom-breadcrumb">
															<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
																<li class="breadcrumb-item d-inline-block"><a href="index.html" class="text-dark">Time</a></li>
																<li class="breadcrumb-item d-inline-block active">Timesheet</li>
															</ol>
															<h4 class="text-dark">My Timesheet</h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- <div class="card-header">
										<h4 class="card-title mb-0 d-inline-block"> Search</h4>
										<h4 class="float-right"><i class="fa fa-search"></i></h4>
									</div> -->
									<!-- <div class="card-body">
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
									</div> -->
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
																<button type="button" id="dailyPrevious" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button>
																<input type="text" name="date" id="dailyDatePicker" class="form-control" required="" autocomplete="off">
																<button type="button" id="dailyNext" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button>
															</div>
															<div id="weekly_div" style="display: none;">
																<button type="button" class="btn btn-lg text-left" style="width: 100px;">Week:</button>
																<button type="button" id="weeklyPrevious" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button>
																<input type="text" name="date" id="weeklyDatePicker" class="form-control weekly " required="" autocomplete="off">
																<button type="button" id="weeklyNext" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button>
															</div>
															<div id="monthly_div" style="display: none;">
																<button type="button" class="btn btn-lg text-left" style="width: 100px;">Month:</button>
																<button type="button" id="monthlyPrevious" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button>
																<input type="text" name="month" id="monthlyDatePicker" class="form-control month" required="" autocomplete="off">
																<button type="button" id="monthlyNext" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-inline float-right">
															<span class="mr-1">Search: </span>
															<input type="text" name="search" class="mr-5 form-control float-right" required="" autocomplete="off">
									                        <div class="btn-group">
									                            <a id="daily_button" class="btn btn-sm btn-outline-primary fc-state-active" href="javascript:void(0)">Daily</a>
									                            <a id="weekly_button" class="btn btn-sm btn-outline-primary" href="javascript:void(0)">Weekly</a>
									                            <a id="monthly_button" class="btn btn-sm btn-outline-primary" href="javascript:void(0)">Monthly</a>
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
	var prevWeekValue = '';
	function setCurrentDate(){
		var now = new Date();
		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var date = (day) + "/" + (month) + "/" + now.getFullYear() ;
		$('#dailyDatePicker').val(date);
	}

	function setCurrentWeek(){
		var now = new Date();
   		var firstDate = moment(now, "DD/MM/YYYY").day(1).format("DD/MM/YYYY");
   		var lastDate =  moment(now, "DD/MM/YYYY").day(7).format("DD/MM/YYYY");
   		$("#weeklyDatePicker").val(firstDate + " - " + lastDate);
   		prevWeekValue = $("#weeklyDatePicker").val();
	}

	function setCurrentMonth(){
		var now = new Date();
		// var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var date = now.getFullYear() + "/" + (month);
		$('#monthlyDatePicker').val(date);
	}

	// convert minutes to hours
	function getHours(totalMinutes) {
		var hours = ("0" + (Math.floor(totalMinutes / 60))).slice(-2);
    	var minutes = ("0" + (totalMinutes % 60)).slice(-2);;
    	return (hours + ":" + minutes);
	}

	function LoadData(date, key){
		$.ajax({
			method: 'POST',
			url: '/mytimesheets/getMyTimeSheets-ajax',
			data: JSON.stringify({'selected_date': date, 'key':key, '_token': '{{ csrf_token() }}' }),
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				// console.log('response : ', data);
				var thead = '<tr class="bg-light">';
	              	thead += '<th>Employee</th>';
	              	thead += '<th>Project</th>';
	              	thead += '<th>Activity</th>';
	              	thead += '<th>Comments</th>';
	              	thead += '<th>Date</th>';
	              	thead += '<th>Duration</th>';
	              	thead += '</tr>';
	            var total = 0;
				var tbody = '';
				if(data.length > 0){
		            // console.log(data);
		            data.forEach(function (row,index) {
		            	tbody += '<tr>';
				        tbody += '<td>' + row.employee_name + '</td>';
				        tbody += '<td>' + row.project_name.project_name + '</td>';
				        tbody += '<td>' + row.activity_name.activity_name + '</td>';
				        tbody += '<td>' + (row.comments ? row.comments : '-') + '</td>';
		              	if(key == "daily"){		            		
				            tbody += '<td>' + moment(row.date).format("DD/MM/YYYY") + '</td>';
			            }
						else if(key == "weekly"){
							tbody += '<td>' + moment(row.date).format("DD/MM/YYYY") + '</td>';
						}
						else if(key == "monthly"){
							tbody += '<td>' + moment(row.date).format("DD/MM/YYYY") + '</td>';
						}
				        // calculating total minutes
				        total = total + row.duration;
				        tbody += '<td>' + getHours(row.duration) + ' hrs</td>';
				        tbody += '</tr>';
		            });
		            tbody += '<tr class="bg-light font-weight-bold">';
		            tbody += '<td colspan="5">Total</td>';
		            tbody += '<td>' + getHours(total) + ' hrs</td>';
		            tbody += '</tr>';
		        }else{
		        	tbody += '<tr>';
		        	tbody += '<td colspan="6"><p class="text-center">No data found in selected date</p></td>';
		        	tbody += '</tr>';
		        }
		        $('#timesheets > thead').html(thead);
		        $('#timesheets > tbody').html(tbody);
			}
		});
	}

	window.onload = function() {
		setCurrentDate();
		setCurrentWeek();
		setCurrentMonth();
		// to load the data
	   	LoadData($('#dailyDatePicker').val(),'daily');
	}

	//Date picker's format
	$("#dailyDatePicker").datetimepicker({
		format: 'DD-MM-YYYY',
		locale:  moment.locale('en', {
			week: { dow: 1 }
		}),		
		maxDate: moment(),
        icons: {
            up: "fa fa-angle-up",
            down: "fa fa-angle-down",
            next: 'fa fa-angle-right',
            previous: 'fa fa-angle-left'
        },
        daysOfWeekDisabled: [0,6],
	});

	$("#weeklyDatePicker").datetimepicker({
		format: 'DD-MM-YYYY',
		maxDate: moment(),
		minDate: '2021-01-01',
        icons: {
            up: "fa fa-angle-up",
            down: "fa fa-angle-down",
            next: 'fa fa-angle-right',
            previous: 'fa fa-angle-left'
        }
	});

	$('#monthlyDatePicker').datetimepicker({
		format: "YYYY/MM",
		maxDate: moment(),
        icons: {
            up: "fa fa-angle-up",
            down: "fa fa-angle-down",
            next: 'fa fa-angle-right',
            previous: 'fa fa-angle-left'
        }
	});


	$('#dailyDatePicker').on('dp.change', function(e){
		// Load table data
		LoadData($('#dailyDatePicker').val(),'daily');
	});


	$('#weeklyDatePicker').click(function() {
		var value = $("#weeklyDatePicker").val();
		$("#weeklyDatePicker").val(prevWeekValue);
		console.log(prevWeekValue, 'value', value);
	})
	//Get the value of Start and End of Week
   	$('#weeklyDatePicker').on('dp.change', function(e) {
   		prevWeekValue = $("#weeklyDatePicker").val();
   		// console.log('change', moment(e.date).format("DD/MM/YYYY"));
   		var value = $("#weeklyDatePicker").val();
   		var firstDate = moment(value, "DD-MM-YYYY").day(1).format("DD/MM/YYYY");
   		var lastDate =  moment(value, "DD-MM-YYYY").day(7).format("DD/MM/YYYY");
   		// console.log(value);
   		$("#weeklyDatePicker").val(firstDate + " - " + lastDate);
   		
   		// Load table data
   		LoadData($('#weeklyDatePicker').val(),'weekly');
   	});

   	$('#monthlyDatePicker').on('dp.change', function(e){
		// Load table data
		LoadData($('#monthlyDatePicker').val(),'monthly');
	});

	function PreviousDate(date){
		// change format of input date
		var formated_date = moment(date, "DD/MM/YYYY").format("YYYY/MM/DD");
		var result = new Date(formated_date);
		// to minus 1 days from the selected date
	    result.setDate(result.getDate() + -1);
	    // change format as per the datepicker
		var next_date = moment(result).format("DD/MM/YYYY");
		$('#dailyDatePicker').val(next_date);
	}

	function NextDate(date){
		// change format of input date
		var formated_date = moment(date, "DD/MM/YYYY").format("YYYY/MM/DD");
		var result = new Date(formated_date);
		// to add 1 days from the selected date
	    result.setDate(result.getDate() + +1);
	    // change format as per the datepicker
		var next_date = moment(result).format("DD/MM/YYYY");
		$('#dailyDatePicker').val(next_date);
	}

	function PreviousWeek(date){
		var first = date.split(" - ");
		var formated_first = moment(first[0], "DD/MM/YYYY").format("YYYY/MM/DD");
		var result = new Date(formated_first);
		// to add 7 days from the selected date
	    result.setDate(result.getDate() + -7);
	    // change format as per the datepicker
		var next_week = moment(result).format("DD-MM-YYYY");
   		var firstDate = moment(next_week, "DD-MM-YYYY").day(1).format("DD/MM/YYYY");
   		var lastDate =  moment(next_week, "DD-MM-YYYY").day(7).format("DD/MM/YYYY");
   		// console.log(value);
   		$("#weeklyDatePicker").val(firstDate + " - " + lastDate);
	}

	function NextWeek(date){
		var first = date.split(" - ");
		var formated_first = moment(first[0], "DD/MM/YYYY").format("YYYY/MM/DD");
		var result = new Date(formated_first);
		// to add 7 days from the selected date
	    result.setDate(result.getDate() + +7);
	    // change format as per the datepicker
		var next_week = moment(result).format("DD-MM-YYYY");
   		var firstDate = moment(next_week, "DD-MM-YYYY").day(1).format("DD/MM/YYYY");
   		var lastDate =  moment(next_week, "DD-MM-YYYY").day(7).format("DD/MM/YYYY");
   		// console.log(value);
   		$("#weeklyDatePicker").val(firstDate + " - " + lastDate);
	}

	function PreviousMonth(date){
		var result = new Date(date);
		// to minus 1 month from the selected date
	    result.setMonth(result.getMonth() + -1);
	    // change format as per the datepicker
		var next_month = moment(result).format("YYYY/MM");
		$('#monthlyDatePicker').val(next_month);
	}

	function NextMonth(date){
		var result = new Date(date);
		// to add 1 month from the selected date
	    result.setMonth(result.getMonth() + +1);
	    // change format as per the datepicker
		var next_month = moment(result).format("YYYY/MM");
		$('#monthlyDatePicker').val(next_month);
	}

	$('#dailyPrevious').on('click', function(){
		PreviousDate($('#dailyDatePicker').val());
		LoadData($('#dailyDatePicker').val(),'daily');
	});
	$('#dailyNext').on('click', function(){
		NextDate($('#dailyDatePicker').val());
		LoadData($('#dailyDatePicker').val(),'daily');
	});

	$('#weeklyPrevious').on('click', function(){
		PreviousWeek($('#weeklyDatePicker').val());
		LoadData($('#weeklyDatePicker').val(),'weekly');
	});
	$('#weeklyNext').on('click', function(){
		NextWeek($('#weeklyDatePicker').val());
		LoadData($('#weeklyDatePicker').val(),'weekly');
	});

	$('#monthlyPrevious').on('click', function(){
		// PreviousMonth($('#monthlyDatePicker').val());
		LoadData($('#monthlyDatePicker').val(),'monthly');
	});
	$('#monthlyNext').on('click', function(){
		NextMonth($('#monthlyDatePicker').val());
		LoadData($('#monthlyDatePicker').val(),'monthly');
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
		LoadData($('#dailyDatePicker').val(),'daily');
	});

	$('#weekly_button').on('click', function(){
		$('#daily_button').removeClass('fc-state-active');
		$('#weekly_button').addClass('fc-state-active');
		$('#monthly_button').removeClass('fc-state-active');
		$('#daily_div').css('display', 'none');
		$('#weekly_div').css('display', 'block');
		$('#monthly_div').css('display', 'none');
		$('#timesheet_table_header').text('Weekly Timesheets');
		LoadData($('#weeklyDatePicker').val(),'weekly');
	});

	$('#monthly_button').on('click', function(){
		$('#daily_button').removeClass('fc-state-active');
		$('#weekly_button').removeClass('fc-state-active');
		$('#monthly_button').addClass('fc-state-active');
		$('#daily_div').css('display', 'none');
		$('#weekly_div').css('display', 'none');
		$('#monthly_div').css('display', 'block');
		$('#timesheet_table_header').text('Monthly Timesheets');
		LoadData($('#monthlyDatePicker').val(),'monthly');
	});
</script>
@endpush
