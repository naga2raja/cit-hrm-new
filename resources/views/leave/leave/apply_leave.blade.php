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
															<li class="breadcrumb-item d-inline-block"><a href="index" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Leave</li>
														</ol>
														<h4 class="text-dark">Leave</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-header">
										<div class="d-inline-block">
											<h4 class="card-title mb-0">Focus Technologies</h4>
											<p class="mb-0 ctm-text-sm">Head Office</p>
										</div>
									</div>
									<div class="card-body">
										<h4 class="card-title">Members</h4>
										<a href="employment"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Danny Ward"><img alt="avatar image" src="img/profiles/img-5.jpg" class="img-fluid"></span></a>
										<a href="employment"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Linda Craver"><img class="img-fluid" alt="avatar image" src="img/profiles/img-4.jpg"></span></a>										
									</div>
								</div>
								
							</aside>
						</div>
						
						<div class="col-xl-9 col-lg-8 col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Apply Leaves</h4>
										</div>
										<div class="card-body">
											<form method="POST" action="{{ route('leave.store') }}">
												@csrf												
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>
															Leave Type
															<span class="text-danger">*</span>
															</label>
															<select class="form-control select" name="leave_type_id" id="leave_type_id" required>
																<option>Select Leave</option>
																@foreach ($leaveType as $item)
																	<option value="{{ $item->id }}">{{ $item->name }}</option>																	
																@endforeach
															</select>
														</div>
													</div>
													<div class="col-sm-6 leave-col">
														<div class="form-group">
															<label>Remaining Leaves</label>
															<input type="text" class="form-control" placeholder="10" disabled id="leave_balance">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label>From</label>
															<input type='text' class="form-control" id='datetimepicker4' name="from_date" required/>
														</div>
													</div>
													<div class="col-sm-6 leave-col">
														<div class="form-group">
															<label>To</label>
															<input type='text' class="form-control" id='datetimepicker5' name="to_date" required/>
															{{-- <input type="text" class="form-control datetimepicker"> --}}
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
															<select class="form-control select" name="leave_duration" required>
																<option value="">Select</option>
																<option value="full day">Full Day</option>
																<option value="morning">First Half</option>
																<option value="evening">Second Half</option>
															</select>
														</div>
													</div>
													<div class="col-sm-6 leave-col">
														<div class="form-group">
															<label>Number of Days Leave</label>
															<input type="text" class="form-control" placeholder="2" disabled name="number_of_days" id="number_of_days">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-12">
														<div class="form-group mb-0">
															<label>Reason</label>
															<textarea class="form-control" rows=4 required></textarea>
														</div>
													</div>
												</div>
												<div class="text-center">
													<button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Apply</button>
													<a href="javascript:void(0);" class="btn btn-danger text-white ctm-border-radius mt-4">Cancel</a>
												</div>
											</form>
										</div>
									</div>
								</div>
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
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
		<!--Delete The Modal -->
		<div class="modal fade" id="delete">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Are You Sure Want to Delete?</h4>
						<button type="button" class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme button-1 ctm-border-radius text-white text-center mb-2" data-dismiss="modal">Delete</button>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('my-scripts')
	<script>
		$('#leave_balance').val('0');
		$('#leave_type_id').on('change', function() {
			getLeaveBalance();			
		})

		function getLeaveBalance() {
			var leave_type_id = $("#leave_type_id option:selected").val();

			$.ajax({
				method: 'POST',
				url: '/leave/leave-balance-ajax',
				data: JSON.stringify({'leave_type_id': leave_type_id, 'employee_id' : '{{ $employeeId }}',  '_token': '{{ csrf_token() }}' }),
				dataType: "json",
				contentType: 'application/json',
				success: function(response){
					console.log('response : ', response);
					$('#leave_balance').val(response.leave_balance);
				}					
			});
		}

		$('#datetimepicker4, #datetimepicker5').datetimepicker({
			format: 'DD/MM/YYYY',
			icons: {
				up: "fa fa-angle-up",
				down: "fa fa-angle-down",
				next: 'fa fa-angle-right',
				previous: 'fa fa-angle-left'
			}
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

		

	</script>
@endsection