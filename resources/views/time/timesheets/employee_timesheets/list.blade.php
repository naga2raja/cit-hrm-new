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
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
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
														<h4 class="text-dark">Employee Timesheet</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- <div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
										<a href="javascript:void(0)" class="btn ctm-border-radius text-white btn-block btn-theme button-1" data-toggle="modal" data-target="#add_event"><span><i class="fe fe-plus"></i></span> Create New</a>
									</div>
								</div> -->
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
										<!-- <h4 class="card-title"><i class="fa fa-search"></i> Search</h4><hr> -->
										<form id="searchEmployeeTimesheet" method="GET" action="">
											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Employee Name</label>
														<select class="employee_name form-control {{ $errors->has('employee_name') ? 'is-invalid' : ''}}" name="employee_name" id="employee_name" required="" style="width: 100%" >
															@if(Request::get('emp_name'))
																<option selected="selected" id="{{ Request::get('emp_number') }}">{{ Request::get('emp_name'), old('emp_name') }}</option>
															@endif
														</select>
														{!! $errors->first('employee_name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														<input type="hidden" name="employee_id" id="employee_id" class="form-control" value="{{ (Request::get('employee_id')) ? Request::get('employee_id') : '' }}">
														<input type="hidden" name="emp_name" id="emp_name" class="form-control" value="{{ (Request::get('emp_name')) ? Request::get('emp_name') : '' }}">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button id="search" type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4"><i class="fa fa-search"></i> Search </button>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="reset" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4" onclick="resetAllValues('searchEmployeeTimesheet')"><i class="fa fa-refresh"></i> Reset </button>
												</div>
											</div>												
										</form>
									</div>
								</div>
							</aside>
						</div>
						<!-- left side end -->

						<!-- right side -->				
						<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-body">
											<div class="col-md-12">
												<div class="row">												
													<div class="col-md-6">
														<div class="form-inline">
															<div id="daily_div" style="display: none;">
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
															<div id="monthly_div">
																<button type="button" class="btn btn-lg text-left" style="width: 100px;">Month:</button>
																<button type="button" id="monthlyPrevious" class="fc-prev-button fc-button fc-state-default fc-corner-left"><span class="fc-icon fc-icon-left-single-arrow"></span></button>
																<input type="text" name="month" id="monthlyDatePicker" class="form-control month" required="" autocomplete="off">
																<button type="button" id="monthlyNext" class="fc-next-button fc-button fc-state-default fc-corner-right"><span class="fc-icon fc-icon-right-single-arrow"></span></button>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-inline float-right">
															<input type="hidden" name="employee_id" id="employee_id" value="{{ auth()->user()->id }}">
															<input type="hidden" name="key" id="key" value="">
									                        <div class="btn-group">
									                            <a id="daily_button" class="btn btn-sm btn-outline-primary" href="javascript:void(0)">Daily</a>
									                            <a id="weekly_button" class="btn btn-sm btn-outline-primary" href="javascript:void(0)">Weekly</a>
									                            <a id="monthly_button" class="btn btn-sm btn-outline-primary fc-state-active" href="javascript:void(0)">Monthly</a>
									                        </div>
										                </div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="card shadow-sm ctm-border-radius">
										<div class="card-header">
											<div class="row filter-row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-10">  
													<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
														<h4 class="card-title mt-3 mb-0 ml-3" id="timesheet_table_header">Monthly Timesheets</h4>
													</div>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">
													<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('timesheets','timesheets')"><i class="fa fa-trash"></i> Delete</button>
												</div>
											</div>
										</div>

										<div class="card-body employee-timesheets">
											@if($message = Session::get('success'))
												<div class="col-md-12">
													<div class="alert alert-success">
														<p>{{ $message }}</p>
													</div>
												</div>
											@endif
											<div class="table-responsive">
												<table id="timesheets" class="table custom-table table-hover">
													<thead>
														 <tr class="bg-light">
		              										<th>Employee</th>
		              										<th>Timesheet</th>
		              										<th>Duration (HH:MM)</th>
		              										<th>Status</th>
		              										<th>Action</th>
		              									</tr>
													</thead>
													<tbody id="list_timesheet_table">
														<tr>
															<td colspan="5"><p class="text-center">No data found in selected date</p></td>
														</tr>
													</tbody>
												</table>
											</div>
											<hr>
											<div class="row">
												<div class="col-sm-12">
													<div class="row">
														<div class="col-sm-11 float-right">
															<button type="button" class="btn btn-theme button-1 text-white pull-right p-2" id="approve_action" data-toggle="modal" data-target="#approve_modal" style="display: none;" ><i class="fa fa-save"></i> Save</button>
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

		<!--Approve The Modal -->
		<div class="modal fade" id="approve_modal">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Are you sure want to update the status?</h4>
                        <form method="POST" action="{{ route('timesheets.action') }}">
                            @csrf                            
                            <input type="hidden" id="timesheet_id_update" name="timesheet_id_update">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group mb-2">
										<label>Your Comments:</label>
										<textarea class="form-control " rows="3" id="comments" name="comments"></textarea>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-2"></div>
										<div class="col-sm-4">
											<button type="submit" class="btn btn-theme button-1 ctm-border-radius btn-block text-white text-center mb-2">Save</button>
										</div>
										<div class="col-sm-4">
											<button type="button" class="btn btn-danger ctm-border-radius btn-block text-white text-center mb-2 mr-3" data-dismiss="modal">Cancel</button>
										</div>
									</div>
								</div>
							</div>						
                        </form>
					</div>
				</div>
			</div>
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection


@push('scripts')
<script type="text/javascript">
	function downloadExcel() {
		$('#export').val(1);
		$('#empTimesheetForm').submit();
		$('#export').val(0);
	}

	// Autocomplete ajax call
	$('.employee_name').select2({
		placeholder: 'Select a employee',
		allowClear: true,
		ajax: {
			url: '{{ route("ajax.employee_search") }}',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results:  $.map(data, function (item) {
						return {
							text: item.name,
							id: item.id
						}
					})
				};
			},
			cache: true
		}		
	});

	$(document.body).on("change","#employee_name",function(){
	 	$('#employee_id').val(this.value);
	 	var emp_name = $("#employee_name option:selected").html();
	 	$('#emp_name').val(emp_name);
	});

	function compareDate(date){
		var start = moment(date, "DD/MM/YYYY").format("YYYY/MM/DD");
		var end = moment(new Date(), "DD/MM/YYYY").format("YYYY/MM/DD");

		if(start <= end){
			return true;
		}else{
			return false;
		}
	}

	var prevWeekValue = '';
	function setCurrentDate(){
		var now = new Date();
		var day = ("0" + now.getDate()).slice(-2);
		var month = ("0" + (now.getMonth() + 1)).slice(-2);
		var date = (day) + "/" + (month) + "/" + now.getFullYear();
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
		$("#key").val(key);
		var employee_id = $("#employee_id").val();
		$.ajax({
			method: 'POST',
			url: "{{ route('getEmployeeTimeSheets-ajax') }}",
			data: JSON.stringify({'selected_date': date, 'employee_id': employee_id, 'key':key, '_token': '{{ csrf_token() }}' }),
			dataType: "json",
			contentType: 'application/json',
			success: function(data){
				console.log('response : ', data);
				var thead = '<tr class="bg-light">';
					thead += '<th class="text-center">'
					thead += '<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick=SelectAll("timesheets")>';
					thead += '</th>';
	              	thead += '<th>Employee</th>';
	              	thead += '<th>Timesheet Period</th>';
	              	thead += '<th>Duration (HH:MM)</th>';
	              	thead += '<th>Status</th>';
	              	thead += '<th>Action</th>';
	              	thead += '</tr>';
	            var total = 0;
				var tbody = '';
				var selected_date = '';
				if(data.length > 0){
		            // console.log("Employee Timesheet", data);
		            data.forEach(function (row,index) {
		            	// enable edit link
				    	var urlParams = new Array( 'employee_id=' + row.employee_id, 'date='+ row.start_date );
				    	var url = '{{ route("timesheets.create") }}' + '?' + urlParams.join('&');

				    	tbody += '<tr>';
		            	if(row.status == '0'){
		            		tbody += '<td class="text-center"><input type="checkbox" name="timesheet_id" value='+row.id+'></td>'
		            	}else{
		            		tbody += '<td></td>';
		            	}
				        tbody += '<td><h2><u><a href="'+url+'">' + row.employee_name + '</a></u></h2></td>';
		              	tbody += '<td><h2><u><a href="'+url+'">' + moment(row.start_date).format("DD/MM/YYYY") + '</a></u></h2></td>';
				        var duration = 0;
						for (var i = 0; i < row.all_timesheet_item.length; i++) {
						    duration += row.all_timesheet_item[i].duration << 0;
						}
						total += duration;
						tbody += '<td>'+ getHours(duration) +' Hrs</td>';

						var status ='';
		              	if(row.status == '0'){
		              		status = 'Not Submitted';
		              	}else if(row.status == '1'){
		              		status = '<b><span class="text-warning"> Submitted </span></b>';
		              	}else if(row.status == '2'){
		              		status = '<b><span class="text-success"> Approved </span></b>';
		              	}else if(row.status == '3'){
		              		status = '<b><span class="text-danger"> Rejected </span></b>';
		              	}
				        tbody += '<td><b>' + status + '</b></td>';

				        var action = '';
			            if((row.status != 0) && (row.status != 2) && (row.status == 1)  ){
				        	action += '<select class="form-control select" data-minimum-results-for-search="Infinity" onchange="getTimeSheetStatus('+ row.id+')" id="timesheet_'+ row.id+'">';
							action += '<option value="">Select Action</option>';
							action += '<option value="2">Approve</option>';
							action += '<option value="3">Reject</option>';
							action += '</select>';
				        }
				    	tbody += '<td>' + action + '</td>';
				        tbody += '</tr>';
		            });
		            // tbody += '<tr class="bg-light font-weight-bold">';
		            // tbody += '<td></td>';
		            // tbody += '<td class="text-center">Total :</td>';
		            // tbody += '<td>' + getHours(total) + ' Hrs</td>';
		            // tbody += '<td></td>';
		        }else{
		        	tbody += '<tr>';
		        	tbody += '<td colspan="6"><p class="text-center">No data found in selected date</p></td>';
		        	tbody += '</tr>';
		        }
		        $('#timesheets > thead').html(thead);
		        $('#timesheets > tbody').html(tbody);
		        $('.select').select2();
			}
		});
	}

	window.onload = function() {
		setCurrentDate();
		setCurrentWeek();
		setCurrentMonth();
		// to load the data
	   	LoadData($('#monthlyDatePicker').val(),'monthly');
	}

	$('#search').click(function() {
		var active = $('.fc-state-active').attr('id');
		active = active.split("_");
		LoadData($('#'+active[0]+'DatePicker').val(), active[0]);
	});

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
	});
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
		PreviousMonth($('#monthlyDatePicker').val());
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

	var timesheetRecordsArray = [];
	function getTimeSheetStatus(timesheet_id) {      
		$('#approve_action').hide();
		var status_id = $('#timesheet_'+timesheet_id).val();
		// remove from array if empty
		if(status_id == '') {
            timesheetRecordsArray = timesheetRecordsArray.filter(function( obj ) {
				return obj.id != timesheet_id;
			});
        }
		timesheetRecordsArray.forEach(function(value,index){
			if(value.id == timesheet_id)		
				timesheetRecordsArray.splice(index,1);		
		});

		if(status_id)
            timesheetRecordsArray.push({'id': timesheet_id, 'status_id': status_id});
        
		if(timesheetRecordsArray.length)
			$('#approve_action').show();
		
		$('#timesheet_id_update').val(JSON.stringify(timesheetRecordsArray));
		console.log(timesheet_id, 'result', timesheetRecordsArray);
    }

    // function currentTimesheetStatus(index)
    // {
    //     var status = new Array("Not submitted", "Submitted", "Approved", "Rejected");
    //     return status[index];
    // }

</script>
@endpush
