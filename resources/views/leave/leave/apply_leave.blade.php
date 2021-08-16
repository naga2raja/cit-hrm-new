@extends('layout.mainlayout')
@section('content')

			<!-- Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class=" col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="{{ route('index') }}" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Leave</li>
														</ol>
														<h4 class="text-dark">Apply Leave</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								@if(Request::is('leave/create'))
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-header">
										<div class="d-inline-block">
											<h4 class="card-title mb-0">Your Leaves Info</h4>
											{{-- <p class="mb-0 ctm-text-sm">Head Office</p> --}}
										</div>
									</div>
									<div class="card-body">
										@if($leavesInfo = currentUserLeaveBalance())
										<table class="table">
											<tr>
												{{-- <th>Type</th> --}}
												<th>Allowance</th>
												<th>Taken</th>
												<th>Balance</th>
											</tr>
											@foreach ($leavesInfo as $leave)
												<tr>													
													<td> {{ $leave->name }} - {{ $leave->no_of_days }} </td>
													<td> {{ $leave->days_used }} </td>
													<td> {{ $leave->remaining_days }} </td>
												</tr>
											@endforeach
										</table>
										@endif
									</div>
								</div>
								@endif
								
							</aside>
						</div>
						
						<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="row">
								<div class="col-md-12">
									@if($message = Session::get('success'))
										<div class="alert alert-success">
											<p>{{$message}}</p>
										</div>
									@endif	
									@if($message = Session::get('error'))
										<div class="alert alert-danger">
											<p>{{$message}}</p>
										</div>
									@endif
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Apply Leaves</h4>
										</div>
										<div class="card-body">
											<form id="searchLeave" method="POST" action="{{ route('leave.store') }}">
												@csrf		
												<input type="hidden" name="leave_entitlement_id" id="leave_entitlement_id">
												@if(@$assignLeave)													
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<label>
																Employee Name
																<span class="text-danger">*</span>
																</label>
																<select class="form-control employee_auto_search select {{ $errors->has('employee_id') ? 'is-invalid' : ''}}" required name="employee_id" id="employee_id" style="width: 100%">
																</select>
																{!! $errors->first('employee_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
															</div>
														</div>
													</div>
												@else
													<input type="hidden" name="employee_id" id="employee_id" value="{{ $employeeId }}">
												@endif

												<input type="hidden" name="assign_leave" value="{{ (@$assignLeave) ? 1 : 0 }}">

												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>
															Leave Type
															<span class="text-danger">*</span>
															</label>
															<select class="form-control select {{ $errors->has('leave_type_id') ? 'is-invalid' : ''}}" name="leave_type_id" id="leave_type_id" required>
																<option value="">Select Leave</option>
																@foreach ($leaveType as $item)
																	<option value="{{ $item->id }}" {{ (old('leave_type_id') == $item->id) ? 'selected' : '' }}>{{ $item->name }}</option>																	
																@endforeach
															</select>
															{!! $errors->first('leave_type_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
													<div class="col-sm-6 leave-col">
														<div class="form-group">
															<label>Remaining Leaves</label>
															<input type="text" class="form-control {{ $errors->has('leave_balance') ? 'is-invalid' : ''}}" placeholder="-" readonly name="leave_balance" id="leave_balance" value="{{ old('leave_balance') }}">
															{!! $errors->first('leave_balance', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>From</label>
															<input type='text' class="form-control {{ $errors->has('from_date') ? 'is-invalid' : ''}}" id='datetimepicker4' name="from_date" required value="{{ old('from_date') }}"/ autocomplete="off">
															{!! $errors->first('from_date', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
													<div class="col-sm-6 leave-col">
														<div class="form-group">
															<label>To</label>
															<input type='text' class="form-control {{ $errors->has('to_date') ? 'is-invalid' : ''}}" id='datetimepicker5' name="to_date" required value="{{ old('to_date') }}"/ autocomplete="off">
															{!! $errors->first('to_date', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>
															Duration
															<span class="text-danger">*</span>
															</label>
															<select class="form-control select {{ $errors->has('leave_duration') ? 'is-invalid' : ''}}" name="leave_duration" id="leave_duration" required>
																<option value="">Select</option>
																<option value="full day" {{ (old('leave_duration') == 'full day') ? 'selected' : '' }}>Full Day</option>
																<!--<option value="half a day">Half a Day</option> -->
																<option value="morning" {{ (old('leave_duration') == 'morning') ? 'selected' : '' }}>First Half</option>
																<option value="evening" {{ (old('leave_duration') == 'evening') ? 'selected' : '' }}>Second Half</option>
															</select>
															{!! $errors->first('leave_duration', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
													<div class="col-sm-6 leave-col">
														<div class="form-group">
															<label>Number of Days Leave</label>
															<input type="text" class="form-control {{ $errors->has('number_of_days') ? 'is-invalid' : ''}}" placeholder="-" readonly name="number_of_days" id="number_of_days" value="{{ old('number_of_days') }}">
															{!! $errors->first('number_of_days', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group mb-0">
															<label>Reason</label>
															<textarea class="form-control {{ $errors->has('reason') ? 'is-invalid' : ''}}" rows=4 required name="reason">{{ old('reason') }}</textarea>
															{!! $errors->first('reason', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														</div>
													</div>
												</div>
												<div class="text-center">
													<button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Apply</button>
													<a href="javascript:void(0);" class="btn btn-danger text-white ctm-border-radius mt-4" onclick="resetAllValues('searchLeave')">Cancel</a>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!--
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Leave Details</h4>
										</div>
										<div class="card-body">
											<div class="employee-office-table">
												<div class="table-responsive">
													<table class="table custom-table mb-0 table-hover">
														<thead>
															<tr>
																<th>Date</th>
																<th>Total Employees</th>
																<th>First Half</th>
																<th>Second Half</th>
																<th>Working From Home</th>
																<th>Absent</th>
																<th>Today Aways</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>05 May 2019</td>
																<td>7</td>
																<td>6</td>
																<td>6</td>
																<td>1</td>
																<td>0</td>
																<td>1</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Today Leaves</h4>
										</div>
										<div class="card-body">
											<div class="employee-office-table">
												<div class="table-responsive">
													<table class="table custom-table mb-0 table-hover">
														<thead>
															<tr>
																<th>Employee</th>
																<th>Leave Type</th>
																<th>From</th>
																<th>To</th>
																<th>Days</th>
																<th>Remaining Days</th>
																<th>Notes</th>
																<th>Status</th>
																<th class="text-right">Action</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>
																	<a href="employment" class="avatar"><img alt="avatar image" src="img/profiles/img-5.jpg" class="img-fluid"></a>
																	<h2><a href="employment">Danny Ward</a></h2>
																</td>
																<td>Parental Leave</td>
																<td>05 Dec 2019</td>
																<td>07 Dec 2019</td>
																<td>3</td>
																<td>9</td>
																<td>Parenting Leave</td>
																<td><a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm">Approved</a></td>
																<td class="text-right text-danger"><a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
																			<span class="lnr lnr-trash"></span> Delete
																		</a></td>
															</tr>
															<tr>
																<td>
																	<a href="employment" class="avatar"><img src="img/profiles/img-4.jpg" alt="Linda Craver" class="img-fluid"></a>
																	<h2><a href="employment">Linda Craver</a></h2>
																</td>
																<td>Sick Leave</td>
																<td>05 Dec 2019</td>
																<td>05 Dec 2019</td>
																<td>1</td>
																<td>11</td>
																<td>Going to Hospital</td>
																<td><a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm">Approved</a></td>
																<td class="text-right text-danger"><a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
																			<span class="lnr lnr-trash"></span> Delete
																		</a></td>
															</tr>
															<tr>
																<td>
																	<a href="employment" class="avatar"><img src="img/profiles/img-3.jpg" alt="Jenni Sims" class="img-fluid"></a>
																	<h2><a href="employment">Jenni Sims</a></h2>
																</td>
																<td>Working From Home</td>
																<td>05 Dec 2019</td>
																<td>05 Dec 2019</td>
																<td>1</td>
																<td>11</td>
																<td>Raining</td>
																<td><a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm">Approved</a></td>
																<td class="text-right text-danger"><a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
																			<span class="lnr lnr-trash"></span> Delete
																		</a></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
		<!--show leave duration The Modal -->
		<div class="modal fade" id="leave_duration_info">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Leave Duration </h4>

						<div class="alert alert-warning">
							<p><b>Note:</b> Half a day Leave will be applied to the selected date range</p>
						</div>
						<br> 
						<div style="text-align: center">
							<button type="button" class="btn btn-theme button-1 ctm-border-radius text-white text-center mb-2" data-dismiss="modal">OK</button>
						</div>
						<!-- 
							<button type="button" class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3" data-dismiss="modal">Close</button>
							
						-->
					</div>
				</div>
			</div>
		</div>

		<div id="holidays_array" style="display: none;">{{ json_encode($holidays) }}</div>
		<style>
			td.day.disabled {
				background: #f1bd06 !important;
				color: #fff !important;
				border-radius: 0px;
			}
			td.day.disabled.weekend {
				background: none !important;
				color: #777 !important;
			}
		</style>
@endsection

@section('my-scripts')
	<script>
		// $('#leave_balance').val('0');
		$('#leave_type_id').on('change', function() {
			getLeaveBalance();			
		});

		$('#leave_duration').on('change', function() {
			numberOfDaysLeave();

			var from_date = $('#datetimepicker4').val();
			var to_date = $('#datetimepicker5').val();

			var startDate = moment(from_date, 'DD/MM/YYYY');
			var endDate = moment(to_date, 'DD/MM/YYYY');

			if((startDate != endDate) && ($(this).val() == 'morning' || $(this).val() == 'evening')) {
				$('#leave_duration_info').modal('show');
			}
			console.log($(this).val());
		});

		function getLeaveBalance() {
			var leave_type_id = $("#leave_type_id option:selected").val();
			var employeeId = $("#employee_id").val();

			$.ajax({
				method: 'POST',
				url: "{{ route('leave-balance-ajax') }}",
				data: JSON.stringify({'leave_type_id': leave_type_id, 'employee_id' : employeeId,  '_token': '{{ csrf_token() }}' }),
				dataType: "json",
				contentType: 'application/json',
				success: function(response){
					console.log('response : ', response);
					$('#leave_balance').val(response.leave_balance);
					$('#leave_entitlement_id').val(response.leave_entitlement_id);
				}					
			});
		}

		var holidayDates= [];
		var existing_holidays = $('#holidays_array').html();
		if(existing_holidays) {
			holidayDates = JSON.parse(existing_holidays);
			console.log('holidays', holidayDates);
		}

		$('#datetimepicker4, #datetimepicker5').datetimepicker({
			format: 'DD/MM/YYYY',
			locale:  moment.locale('en', {
				week: { dow: 1 }
			}),
			daysOfWeekDisabled: [0,6],
			icons: {
				up: "fa fa-angle-up",
				down: "fa fa-angle-down",
				next: 'fa fa-angle-right',
				previous: 'fa fa-angle-left'
			},
			disabledDates: holidayDates,
			// debug: true,
		});

		$("#datetimepicker4, #datetimepicker5").datetimepicker().on('dp.change', function (e) {			
			var from_date = $(this).val();			
			getLeaveBalance();
			numberOfDaysLeave();

			var number_of_days = 0;
			// updateToDate(from_date);			
    	});

		function numberOfDaysLeave() {
			var from_date = $('#datetimepicker4').val();
			var to_date = $('#datetimepicker5').val();

			var startDate = moment(from_date, 'DD/MM/YYYY');
			var endDate = moment(to_date, 'DD/MM/YYYY');
			var diff = endDate.diff(startDate, 'days');
			console.log('diff', diff);
			if(diff == 0) {
				diff = 1;
				console.log('1');
			}
			else if(diff > 0 ) {
				diff++; 
			} else {	
				diff = 0;			
				console.log('please select correct date');
			}

			// check the leave for full day or half a day
			var leave_duration = $('#leave_duration').val();
			if(leave_duration == 'morning' || leave_duration == 'evening') {				
				diff = diff * 0.5;
			}
			$('#number_of_days').val(diff);
		}

		// function updateToDate(from_date) {
		// 	console.log('set to', from_date);
		// 	$('#datetimepicker5').datetimepicker({
		// 		format: 'DD/MM/YYYY',
		// 		minDate: moment(from_date, 'DD/MM/YYYY'),
		// 		defaultDate: moment(from_date, 'DD/MM/YYYY'),
		// 		icons: {
		// 				up: "fa fa-angle-up",
		// 				down: "fa fa-angle-down",
		// 				next: 'fa fa-angle-right',
		// 				previous: 'fa fa-angle-left'
		// 			}
		// 	}).show();
		// }

		$('.employee_auto_search').select2({
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

		$(document.body).on("change",".employee_auto_search",function(){
			console.log('live', this.value);
			getLeaveBalance();
		});

	</script>
@endsection