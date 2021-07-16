@extends('layout.mainlayout')
@section('content')

			<!-- Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">					
						
						<div class="col-xl-12 col-lg-12 col-md-12">

                            <div class="row">
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-body">
											<form method="GET">
												<div class="row">
													<div class="col-sm-2 leave-col">
														<div>															
                                                            <input class="form-control datetimepicker1 cal-icon-input" type="text" placeholder="From Date" name="from_date" value="{{ Request::get('from_date') }}" id="datetimepicker1">
														</div>
													</div>
													<div class="col-sm-2 leave-col">
														<div>
															<input class="form-control datetimepicker2 cal-icon-input" type="text" placeholder="To Date" name="to_date" value="{{ Request::get('to_date') }}" id="datetimepicker2">
														</div>
													</div>
													<div class="col-sm-2">
														<div>
															<select class="form-control select" name="status">
																<option value="">Status</option>
                                                                    @foreach($leaveStatus as $status)
                                                                        <option value="{{ $status->id }}"  {{ Request::get('status') == $status->id ? 'selected' : ''}}> {{ $status->name }}</option>
                                                                    @endforeach																
															</select>
														</div>
													</div>
													<div class="col-sm-2">														
														<button type="submit" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" name="search"><span class="fa fa-search"></span> Search</button>                                                        
                                                    </div>
                                                    <div class="col-sm-2">  
                                                        <a href="{{ route('leave.index') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><span class="fa fa-refresh"></span> Reset</a>
                                                    </div>

												</div>
											</form>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
                                
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">My Leaves</h4>
										</div>
										<div class="card-body">
											<div class="employee-office-table">
												<div class="table-responsive">
													<table class="table custom-table mb-0 table-hover">
														<thead>
															<tr>
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

                                                            

                                                            @foreach ($myLeaves as $leave)
                                                                <tr>                                                                    
                                                                    <td> {{ $leave->name }}</td>
                                                                    <td> {{ $leave->from_date }}</td>
                                                                    <td> {{ $leave->to_date }}</td>
                                                                    <td> {{ $leave->leave_days+1 }} </td>
                                                                    <td>  - </td>
                                                                    <td> {{ $leave->comments }}</td>
                                                                    <td> {{ $leave->leave_status }}</td>
                                                                    <td> 
                                                                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete">
                                                                            <span class="lnr lnr-trash"></span> Delete
                                                                        </a> 
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                            @if(!count($myLeaves)) 
                                                                <tr>
                                                                    <td colspan="8">
                                                                        <div class="alert alert-danger"> No data found!</div>
                                                                    </td>
                                                                </tr>
                                                            @endif

                                                            <tr>
                                                                <td colspan="8">
                                                                    <div class="d-flex justify-content-center">
                                                                        {{ $myLeaves->links() }}
                                                                    </div>
                                                                </td>
                                                            </tr>
															
															{{-- <tr>
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
															</tr> --}}
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
	</script>
@endsection