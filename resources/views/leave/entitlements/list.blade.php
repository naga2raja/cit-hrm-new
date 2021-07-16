@extends('layout.mainlayout')
@section('content')
<!-- Content -->

<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">						
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="card shadow-sm ctm-border-radius border">
								<div class="card-body align-center">
									<form method="GET" action="{{ route('myEntitlements.index') }}">
										<div class="row filter-row">

											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3"> 
												<div class="form-group mb-xl-0 mb-md-2 mb-sm-3">
													<label>Leave Period <span class="text-danger">*</span></label>
													<select class="form-control select {{ $errors->has('leave_period') ? 'is-invalid' : ''}}" name="leave_period">
		                                                <option value='{{ $leave_period_value }}' {{ old('leave_period_value') == $leave_period_value ? 'selected' : '' }}>{{ $leave_period_name }}</option>
	                                                </select>
	                                                {!! $errors->first('leave_period', '<span class="invalid-feedback" role="alert">:message</span>') !!}
	                                                <input type="hidden" name="from_date" id="from_date" class="form-control" value="{{ $from_date }}">
	                                                <input type="hidden" name="to_date" id="to_date" class="form-control" value="{{ $end_date }}">
												</div>
											</div>

											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3"> 
												<div class="form-group mb-xl-0 mb-md-2 mb-sm-3">
													<label>Leave Type <span class="text-danger">*</span></label>
													<select class="form-control select" name="leave_type_id">
														<option value="">All</option>
	                                                    @foreach ($leave_types as $type)
		                                                    <option value='{{ $type->id }}' {{ old('leave_type_id') == $type->name ? 'selected' : '' }}>{{ $type->name }}</option>
		                                                @endforeach
	                                                </select>
	                                                {!! $errors->first('leave_type_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
												</div>
											</div>
											
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2"> 
												<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
													<label></label>
													<button type="submit" class="mt-1 btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Search </button>
												</div> 
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2"> 
												<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
													<label></label>
													<a href="{{ route('leaveEntitlement.index') }}" class="mt-1 btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Cancel </a>  
												</div>
											</div>
										
										</div>
									</form>
								</div>
							</div>

							<div class="card shadow-sm ctm-border-radius border">
								<div class="card-header">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-10">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2">My Leave Entitlements</h4>
											</div>
										</div>
										@hasrole('Admin')
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-1">  
												<a href="{{ route('leaveEntitlement.create', 'employee_id='.$employees->id) }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
											</div>
											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-1">  
												<button class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_entitlements_table','leaveEntitlement')"><i class="fa fa-trash"></i> Delete</button>
											</div>
										@endrole
									</div>
								</div>
								
								<div class="card-body align-center">									
									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr>
													<th class="text-center">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_entitlements_table')">
													</th>
													<th>Leave Type</th>
													<!-- <th>Entitlement Type</th> -->
													<th>Valid From</th>
													<th>Valid To</th>
													<th>Days</th>
												</tr>
											</thead>
											<tbody id="list_entitlements_table">
												@if(count($entitlement) > 0)
													@foreach ($entitlement as $row)
													<tr>
														<td class="text-center">
															<input type="checkbox" name="user_id" value="{{ $row->id }}">
														</td>
														<td>{{ $row->leave_type_id }}</td>
														<!-- <td>{{ $row->id }}</td> -->
														<td>{{ $row->from_date }}</td>
														<td>{{ $row->to_date }}</td>
														<td>{{ $row->no_of_days }}</td>
													</tr>
													@endforeach
												@else
													<tr>
														<td colspan="6"><p class="text-center">No Data Found</p></td>
													</tr>
												@endif
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
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
@endsection

@push('scripts')
<script type="text/javascript">
	// Autocomplete ajax call
	$('#employee_name').keyup(function(){ 
		var employee_name = $(this).val();
		if(employee_name != '')
		{
			var _token = $('input[name="_token"]').val();
			$.ajax({
				method:"POST",
				url: '/employeeNameSearch',
				data:{
					employee_name:employee_name,
					_token:_token
				},
				success:function(data){
					$('#employee_name').removeClass('is-invalid');
					$("#not_exist").remove();

					if(data != ""){					
						$('#employees_list').fadeIn();
						$('#employees_list').html(data);
					}else{
						var exists = ($("#not_exist").length == 0);
					    if (exists) {
					        $('#employee_name').addClass('is-invalid');
							$('#employees_list').fadeOut();
							$('<span id="not_exist" class="invalid-feedback" role="alert">Employee does not exist</span>').insertAfter('#employee_name');
					    }
					}
				}
			});
		} else{
			$('#employees_list').html('');	        	
		}
	});

	$(document).on('click', '.employees', function(){
		$('#employee_name').val($(this).text());
		$('#employees_list').fadeOut();
		$('#employee_name').removeClass('is-invalid');
		$("#not_exist").remove();
	});
</script>    
    <!-- <script src="{{ asset('js/system_users.js')}}"></script> -->
@endpush