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
															<li class="breadcrumb-item d-inline-block"><a href="/" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Leave</li>
														</ol>
														<h4 class="text-dark">Leave List</h4>
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
														<input autocomplete="off" class="form-control datetimepicker2 cal-icon-input" type="text" placeholder="To Date" name="to_date" value="{{ Request::get('to_date') }}" id="datetimepicker2">
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
						

						
						<div class="col-xl-9 col-lg-8  col-md-12">

							<div class="row">                                
                                
								<div class="col-md-12">
                                    @if($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{$message}}</p>
                                        </div>
                                    @endif
                                    
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Leave List</h4>
										</div>
										<div class="card-body align-center">
											<div class="">
												<div class="table-responsive ">
													<table class="table custom-table table-hover">
														<thead>
															<tr class="bg-light">
                                                                <th>Employee Name</th>
																<th>Leave Type</th>
																<th>From</th>
																<th>To</th>
																<th>Days</th>
																{{-- <th>Remaining Days</th> --}}
																{{-- <th>Notes</th> --}}
																<th>Status</th>
																<th class="text-left">Action</th>
															</tr>
														</thead>
														<tbody>

                                                            

                                                            @foreach ($myLeaves as $leave)
                                                                <tr>
                                                                    <td> <a href="#" onclick="showLeaveInfo('{{ $leave->id }}', '{{ route('leave.show', $leave->id) }}' )"> {{ $leave->emp_name }} </a> </td>  
                                                                    <td> {{ $leave->name }}</td>
                                                                    <td> {{ $leave->from_date }}</td>
                                                                    <td> {{ $leave->to_date }}</td>
                                                                    <td> 
																		{{ ($leave->leave_days+1) * $leave->length_days }} ({{ $leave->leave_duration }})
																	</td>                                                                    
                                                                    {{-- <td> {{ $leave->comments }}</td> --}}
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
                                                                    <td>
                                                                        @if( ($userRole == 'Manager' && $leave->approval_level == 0) || ($userRole == 'Admin' && $leave->approval_level == 1) || ($leave->reporting_me && $leave->approval_level == 0) || ($userRole == 'Admin' && $leave->status > 3 ))
                                                                        <select class="form-control select" id="leave_{{ $leave->id }}" onchange="getLeaveStatus({{ $leave->id }})">
                                                                            <option value="">Select</option>
                                                                            @foreach ($leaveStatus as $item)
                                                                                <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @endif
                                                                    </td>
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
                                                                <td colspan="7">
                                                                    <div class="d-flex justify-content-center">
                                                                        {{ $myLeaves->links() }}
                                                                    </div>
                                                                </td>
                                                            </tr>
														</tbody>
													</table>
                                                    <button type="button" class="btn btn-theme button-1 text-white pull-right p-2" style="display: none;" id="approve_action" data-toggle="modal" data-target="#delete">Save</button>
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
						<h4 class="modal-title mb-3">Are You Sure Want to update the Status?</h4>
                        <form method="POST" action="{{ route('leave.action') }}">
                            @csrf                            
                            <input type="hidden" id="leave_id_update" name="leave_id_update">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group mb-2">
										<label>Your Comments:</label>
										<textarea class="form-control " rows="3" id="comments" name="comments"></textarea>
									</div>
								</div>
							</div>
						<button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white text-center mb-2">Save</button>
						<button type="button" class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3" data-dismiss="modal">Cancel</button>
                        </form>
					</div>
				</div>
			</div>
		</div>

        <style>
            td .select2-container { width: 150px !important;}
        </style>
        
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

			if($('#datetimepicker1').val() == ''){
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

    var leavesArray = [];
    function getLeaveStatus(leave_id) {
        var status_id = $('#leave_'+leave_id).val();
        //if(status_id == '') {
            leavesArray = leavesArray.filter(function( obj ) {
				return obj.id != leave_id;
			});
        //}
        if(status_id) {
            leavesArray.push({'id': leave_id, 'status_id': status_id});
        }        
        var result = uniqueArray(leavesArray);        
        console.log(leavesArray, result, status_id);
        $('#leave_id_update').val(JSON.stringify(result));

        $('#approve_action').hide();
        if(result.length) {
            $('#approve_action').show();
        }
    }

    function uniqueArray(arr) {
        return arr.reduce(function(memo, e1){
        var matches = memo.filter(function(e2){
            return e1.id == e2.id
        })
        if (matches.length == 0)
            memo.push(e1)
            return memo;
        }, []);
    }    
	</script>
@endsection