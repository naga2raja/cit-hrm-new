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
															<li class="breadcrumb-item d-inline-block"><a href="index.html" class="text-dark">Leave</a></li>
															<li class="breadcrumb-item d-inline-block active">Attendance</li>
														</ol>
														<h4 class="text-dark">My Records</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
										<h4 class="card-title"><i class="fa fa-search"></i> Search</h4><hr>
										<form method="GET" action="#">
											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
                                                    <label>Date</label>
													<div class="input-group mb-3">                                                        
                                                        <input class="form-control datetimepicker" type="text" id="date" name="date" value="{{ Request::get('date') }}">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-theme text-white" type="button" id="calendar_icon">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4"><i class="fa fa-search"></i> Search </button>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="reset" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4"><i class="fa fa-refresh"></i> Reset </button>
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
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-header">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-8 col-lg-7 col-xl-8">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2">My Records</h4>
											</div>
										</div>
										
                                        <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                            <a href="{{ route('punch.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
                                        </div>
                                        <div class="col-sm-6 col-md-2 col-lg-3 col-xl-2">
                                            <button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_myrecords_table', 'punch')"><i class="fa fa-trash"></i> Delete</button>
                                        </div>
									</div>                                    
								</div>
								
								<div class="card-body align-center">									
									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light">
													<th class="text-center">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_myrecords_table')">
													</th>
													<th> Name </th>
													<th>Punch in</th>													
													<th>Punch in Note</th>
													<th>Punch out</th>
													<th>Punch out Note</th>
                                                    <th>Duration</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody id="list_myrecords_table">

                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="id" value="{{ $item->id }}">
                                                        </td>
														<td> {{ $item->emp_name }}</td>
                                                        <td>
                                                            <h2><a href="#" onclick="showAttendanceInfo({{ $item->id }})"> {{ $item->punch_in_user_time }} </a></h2>
                                                        </td>
                                                        <td>
                                                            <h2>{{ $item->punch_in_note }}</h2>
                                                        </td>
                                                        <td>
                                                            <h2>{{ $item->punch_out_user_time }}</h2>
                                                        </td>
                                                        <td>
                                                            <h2>{{ $item->punch_out_note }}</h2>
                                                        </td>
                                                        <td>
                                                            <h2>{{ hoursAndMins($item->duration) }}</h2>
                                                        </td>
														<td>
															{{ currentPunchStatus($item->status) }}
														</td>
														<td>
															
																@if($item->status > 0)
																@hasrole('Admin|Manager')
																	<select class="form-control select" onchange="getAttendanceStatus({{ $item->id }})">
																		<option>Select</option>
																		@foreach (punchStatus() as $key => $value)
																			@if($key > 1)
																				<option value="{{ $key }}"> {{ $value }}</option>
																			@endif
																		@endforeach
																	</select>
																@endrole

																@else
																	<button class="btn btn-theme text-white" onclick="submitForApprove('{{ $item->id }}')">Submit </button>	
																@endif
															
														</td>
                                                    </tr>
                                                @endforeach

												@if(!count($data)) 
													<tr>
														<td colspan="9">
															<div class="alert alert-danger"> No data found!</div>
														</td>
													</tr>
												@endif
												<tr>
													<td colspan="9">
														<div class="d-flex justify-content-center">
															{{ $data->links() }}
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
			<!--/Content-->			
		</div>

		<!-- Modal -->
		<div class="modal fade" id="showInfo">
			<div class="modal-dialog modal-dialog-centered modal-lg">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Update Punch In/Out Info</h4>
                        <form method="POST" id="editForm">
                            @csrf                            
                            <input type="hidden" id="punch_id" name="punch_id">							
										<div class="row">
											<div class="col-sm-3">
												<div class="form-group">
													<label>Punched In</label>
												</div>
											</div>
											<div class="col-sm-5">
												<div class="input-group mb-3">
													<input class="form-control datetimepicker" type="text" id="punch_in_date" name="punch_in_date" value="" required>
													<div class="input-group-append">
														<button class="btn btn-theme text-white" type="button" id="calendar_icon">
															<i class="fa fa-calendar" aria-hidden="true"></i>
														</button>
													</div>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<input type="text" class="form-control time" name="in_time" id="in_time" value="" style="padding: 5px 5px;" required>
                                                    {!! $errors->first('in_time', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label>HH:MM</label>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-sm-3">
												<div class="form-group">
													<label>Punch In Note</label>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="form-group">
													<textarea class="form-control" rows="3" id="punch_in_note" name="punch_in_note" required> </textarea>
												</div>
											</div>
										</div>
									
										<div class="row">
											<div class="col-sm-3">
												<div class="form-group">
													<label>Punched Out</label>
												</div>
											</div>
											<div class="col-sm-5">
												<div class="input-group mb-3">
													<input class="form-control datetimepicker" type="text" id="punch_out_date" name="punch_out_date" value="" required>
													<div class="input-group-append">
														<button class="btn btn-theme text-white" type="button" id="calendar_icon">
															<i class="fa fa-calendar" aria-hidden="true"></i>
														</button>
													</div>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<input type="text" class="form-control time" name="out_time" id="out_time" value="" style="padding: 5px 5px;" required>
                                                    {!! $errors->first('out_time', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label>HH:MM</label>
												</div>
											</div>
										</div>										

										<div class="row">
											<div class="col-sm-3">
												<div class="form-group">
													<label>Punch Out Note</label>
												</div>
											</div>
											<div class="col-sm-8">
												<div class="form-group">
													<textarea class="form-control" rows="3" name="punch_out_note" id="punch_out_note" required></textarea>
                                                    {!! $errors->first('note', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
										</div>
										<hr>


						<button type="button" class="btn btn-danger ctm-border-radius text-white text-center mb-2 mr-3" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white text-center mb-2">Save</button>
                        </form>
					</div>
				</div>
			</div>
		</div>

		
	<div class="sidebar-overlay" id="sidebar_overlay"></div>
@endsection

@push('scripts')
<script type="text/javascript">
	$('#calendar_icon').on('click', function(){
		$('#date').datetimepicker("show");
	});

	function showAttendanceInfo(punch_id)
	{
		$('#punch_id').val(punch_id);
		var punch_in_note, punch_out_note, punch_in_date, punch_out_date, in_time, out_time = '';
		$.ajax({
			method: 'GET',
			url: '/punch/'+ punch_id,			
			dataType: "json",
			contentType: 'application/json',
			success: function(response){
				console.log('response : ', response);					
				punch_in_note = response.punch_in_note;
				punch_out_note = response.punch_out_note;
				punch_in_date = response.punch_in;
				punch_out_date = response.punch_out;
				in_time = response.in_time;
				out_time = response.out_time;
				$('#punch_in_date').val(punch_in_date);
				$('#punch_out_date').val(punch_out_date);
				$('#punch_in_note').val(punch_in_note);
				$('#punch_out_note').val(punch_out_note);
				$('#in_time').val(in_time);
				$('#out_time').val(out_time);

				$('#showInfo').modal({
					backdrop: 'static',
					keyboard: false
				}); 			
			}					
		});		
	}

	$("#editForm").submit(function(e) {
		e.preventDefault(); // avoid to execute the actual submit of the form.

		var form = $(this);
		var url = '{{ route("punch.update-ajax") }}';

		$.ajax({
				type: "POST",
				url: url,
				data: form.serialize(), // serializes the form's elements.
				success: function(data)
				{
					console.log(data); // show response from the php script.
					alert('Updated successfully!');
					window.location.reload();
				}
			});
		});
	
	function submitForApprove(id) {
		if (!confirm("Do you want to submit for approval?")){
			return false;
		}
		$.ajax({
			type: "POST",
			url: '{{ route("punch.submit") }}',
			data: { 'id': id, 'status': 1, '_token': '{{ csrf_token() }}' }, // serializes the form's elements.
			success: function(data)
			{
				console.log(data); // show response from the php script.
				alert('Submited successfully!');
				window.location.reload();

			}
		});
	}

	function getAttendanceStatus(leave_id) {
        console.log(leave_id, 'getAttendanceStatus');
    }
</script>   
@endpush