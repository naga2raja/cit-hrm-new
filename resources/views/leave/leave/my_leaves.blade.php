@extends('layout.mainlayout')
@section('content')

			<!-- Content -->
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
															<li class="breadcrumb-item d-inline-block"><a href="{{ route('index') }}" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Leave</li>
														</ol>
														<h4 class="text-dark">My Leaves</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
										<form method="GET" id="filter_form">
											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>From Date</label>
														<input autocomplete="off" class="form-control datetimepicker1 cal-icon-input" type="text" placeholder="From Date" name="from_date" value="{{ Request::get('from_date') }}" id="datetimepicker1">
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>To Date</label>
														<input class="form-control datetimepicker2 cal-icon-input" type="text" placeholder="To Date" name="to_date" value="{{ Request::get('to_date') }}" id="datetimepicker2" autocomplete="off">
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Status</label>
														<select class="form-control select" name="status">
															<option value="">Status</option>
																@foreach($leaveStatus as $status)
																	<option value="{{ $status->id }}"  {{ Request::get('status') == $status->id ? 'selected' : ''}}> {{ $status->name }}</option>
																@endforeach																
														</select>
													</div>
												</div>
											</div>	
											
											<input type="hidden" name="sort_field" id="sort_field" value="{{ Request::get('sort_field') }}">
											<input type="hidden" name="sort_by" id="sort_by" value="{{ Request::get('sort_by') }}">
											
											<div class="row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">													
													<button type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4" name="search"><span class="fa fa-search"></span> Search</button>													
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="button" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4" onclick="resetAllValues('filter_form')"><i class="fa fa-refresh"></i> Reset </button>
												</div>
											</div>

										</form>

									</div>
								</div>

							</aside>
						</div>
						<!-- Left side End -->

						
						<div class="col-xl-9 col-lg-8 col-md-12">                            

							<div class="row">
                                
								<div class="col-md-12">
									@if($message = Session::get('success'))
										<div class="alert alert-success">
											<p>{{$message}}</p>
										</div>
									@endif	

									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">My Leaves</h4>
										</div>
										<div class="card-body">
											<div class="">
												<div class="table-responsive">
													<table class="table custom-table table-hover">
														<thead>															
															<tr class="bg-light sort_row">																
																<th>Leave Type <a href="#" class="{{ (Request::get('sort_field') == 'name') ? 'active' : '' }}" onclick="sorting('name', 'filter_form')"><i class="fa fa-fw fa-sort"></i></th>
																<th>From <a href="#" class="{{ (Request::get('sort_field') == 'from_date') ? 'active' : '' }}" onclick="sorting('from_date', 'filter_form')"><i class="fa fa-fw fa-sort"></i></th>
																<th>To <a href="#" class="{{ (Request::get('sort_field') == 'to_date') ? 'active' : '' }}" onclick="sorting('to_date', 'filter_form')"><i class="fa fa-fw fa-sort"></i></th>
																<th>Days <a href="#" class="{{ (Request::get('sort_field') == 'leave_duration') ? 'active' : '' }}" onclick="sorting('leave_duration', 'filter_form')"><i class="fa fa-fw fa-sort"></i></th>																
																<th>Notes <a href="#" class="{{ (Request::get('sort_field') == 'comments') ? 'active' : '' }}" onclick="sorting('comments', 'filter_form')"><i class="fa fa-fw fa-sort"></i></th>
																<th>Status <a href="#" class="{{ (Request::get('sort_field') == 'my_status') ? 'active' : '' }}" onclick="sorting('my_status', 'filter_form')"><i class="fa fa-fw fa-sort"></i></th>																
																<th class="text-left">Action</th>																
															</tr>
														</thead>
														<tbody>
                                                            @foreach ($myLeaves as $leave)
                                                                <tr>                                                                    
                                                                    <td> <a href="#" onclick="showLeaveInfo('{{ $leave->id }}', '{{ route('leave.show', $leave->id) }}' )"> {{ $leave->name }} </a></td>
                                                                    <td> <a href="#" onclick="showLeaveInfo('{{ $leave->id }}', '{{ route('leave.show', $leave->id) }}' )"> {{ $leave->from_date }} </a></td>
                                                                    <td> <a href="#" onclick="showLeaveInfo('{{ $leave->id }}', '{{ route('leave.show', $leave->id) }}' )"> {{ $leave->to_date }} </a> </td>
                                                                    <td> 
																		{{ ($leave->leave_days+1) * $leave->length_days }} 
																		(
																		@if($leave->leave_duration == 'morning')
																			First Half
																		@elseif($leave->leave_duration == 'evening')
																			Second Half
																		@else
																			Full Day
																		@endif
																		)
																	</td>                                                                    
                                                                    <td class="word_wrap"> {{ $leave->comments }}</td>
                                                                    <td>
                                                                        @if($leave->approval_level == 1 && $leave->status == 2 ) 
                                                                            Pending Approval From Admin
                                                                        @elseif($leave->approval_level == 2 && $leave->status == 2 )
                                                                            <b><span class="text-success font-weight-bold"> Approved </span></b>
                                                                        @elseif($leave->status == 1)
														              		<b><span class="text-warning font-weight-bold"> Pending </span></b>
														              	@elseif($leave->status == 3)
														              		<b><span class="text-success font-weight-bold"> Taken </span></b>
														              	@elseif($leave->status == 4)
														              		<b><span class="text-danger font-weight-bold"> Rejected </span></b>
														              	@elseif($leave->status == 5)
														              		<b><span class="text-danger font-weight-bold"> Cancelled </span></b>
														              	@endif
																	</td>	
																	@if( ($leave->approval_level == 1 || $leave->approval_level == 2) && $leave->status == 2 && !Auth::user()->hasRole('Admin') ) 
                                                                        
                                                                    @else
																		@if($leave->status == 1 || Auth::user()->hasRole('Admin'))
																		<!-- if employee want to delete can do it before manager approve/reject-->	
                                                                    	<td>	
																			<a href="javascript:void(0);" onclick="showDeleteModal({{ $leave->id }})" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
																				<span class="lnr lnr-trash"></span> Delete
																			</a>
                                                                    	</td>
																		@endif
                                                                    @endif
                                                                </tr>
                                                            @endforeach

                                                            @if(!count($myLeaves)) 
                                                                <tr>
                                                                    <td colspan="7">
                                                                        <div class="alert alert-danger"> No data found!</div>
                                                                    </td>
                                                                </tr>
                                                            @endif

                                                            <tr>
																<td colspan="100%">															
																	<div class="pull-left mt-3">Showing {{ ($myLeaves->currentPage() > 1) ? (($myLeaves->currentPage() * $myLeaves->perPage()) - $myLeaves->perPage()) + 1 : $myLeaves->currentPage() }} to {{ (($myLeaves->currentPage() * $myLeaves->perPage()) > $total) ? $total : ($myLeaves->currentPage() * $myLeaves->perPage()) }} of {{ $total }} entries</div>
																	<div class="pull-right mt-3">
																		{{ $myLeaves->appends($_GET)->links() }}
																	</div>
																</td>
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

						<form action="{{ route('leave.delete_modal')}}" method="post">
							@method('DELETE')
							@csrf
							<input type="hidden" id="delete_id" name="delete_id">
							<button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white text-center mb-2">Delete</button>
							<button type="button" class="ml-2 btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3" data-dismiss="modal">Cancel</button>
						</form>						
					</div>
				</div>
			</div>
		</div>
        
@endsection
        
@section('my-scripts')
	<script>
    $('#datetimepicker1').datetimepicker({
		date: '{{ (@Request::get("from_date")) }}',
		format: "YYYY-MM-DD",
		icons: {
			up: "fa fa-angle-up",
			down: "fa fa-angle-down",
			next: 'fa fa-angle-right',
			previous: 'fa fa-angle-left'
		}
	});

	$('.datetimepicker2').datetimepicker({
		date: '{{ (@Request::get("to_date")) }}',
		format: "YYYY-MM-DD", 
		icons: {
			up: "fa fa-angle-up",
			down: "fa fa-angle-down",
			next: 'fa fa-angle-right',
			previous: 'fa fa-angle-left'
		}
	});

	$("#datetimepicker1").datetimepicker().on('dp.change', function (e) {
		var from_date = $(this).val();
		var to_date = '';
		if($('#datetimepicker2').val() == ''){
			to_date = from_date;
		}else{
			to_date = $('#datetimepicker2').val();
		}

		var startDate = moment(from_date, 'YYYY-MM-DD');
		var endDate = moment(to_date, 'YYYY-MM-DD');
		var diff = endDate.diff(startDate, 'days');

		// validation from and to date
		if(diff < 0) {
			$('#datetimepicker2').data("DateTimePicker").date(from_date);
		}
	});

	$("#datetimepicker2").datetimepicker().on('dp.change', function (e) {
		var from_date = '';
		var to_date = $(this).val();

		if($('#datetimepicker2').val() == ''){
			from_date = to_date;
		}else{
			from_date = $('#datetimepicker1').val();
		}

		var startDate = moment(from_date, 'YYYY-MM-DD');
		var endDate = moment(to_date, 'YYYY-MM-DD');
		var diff = endDate.diff(startDate, 'days');

		// validation from and to date
		if(diff < 0) {
			$('#datetimepicker1').data("DateTimePicker").date(to_date);
		}
	});

	function showDeleteModal(id) {
		console.log(id);
		$('#delete_id').val(id);
	}
	</script>
@endsection