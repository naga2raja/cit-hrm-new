@extends('layout.mainlayout')
@section('content')
<!-- Content -->

<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">						
						<div class="col-xl-12 col-lg-12 col-md-12">
							<div class="card shadow-sm ctm-border-radius border">
								<div class="card-body align-center">
									<form method="GET" action="{{ route('leaveEntitlement.index') }}">
										<div class="row filter-row">

											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3"> 
												<div class="form-group mb-xl-0 mb-md-2 mb-sm-3">
													<label>Employee Name <span class="text-danger">*</span></label>
													<select class="employee_name form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" id="employee_name" style="width: 100%">
														@if(Request::get('name'))
															<option selected="selected" id="{{ Request::get('emp_number') }}">{{ Request::get('name') }}</option>
														@endif
													</select>
													{!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													<input type="hidden" name="emp_number" id="emp_number" class="form-control">
												</div>
											</div>

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

											<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2"> 
												<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
													<label>Leave Type <span class="text-danger">*</span></label>
													<select class="form-control select" name="leave_type_id">
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
												<a href="{{ route('leaveEntitlement.create', 'employee_id=1') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
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
													<th>Employee Name</th>
													<th>Leave Type</th>
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
														<td>{{ $row->employee_name }}</td>
														<td>{{ $row->leave_type_id }}</td>
														<td>
															<h2><u><a href="{{ route('leaveEntitlement.create', 'employee_id='.$row->id) }}">{{ $row->from_date }}</a></u></h2>
														</td>
														<td>
															<h2><u><a href="{{ route('leaveEntitlement.create', 'employee_id='.$row->id) }}">{{ $row->to_date }}</a></u></h2>
														</td>
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
	$('.employee_name').select2({
		placeholder: 'Select a employee',
		ajax: {
			url: '/employee-autocomplete-ajax',
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
	 	$('#emp_number').val(this.value);
	});
</script>    
    <!-- <script src="{{ asset('js/system_users.js')}}"></script> -->
@endpush