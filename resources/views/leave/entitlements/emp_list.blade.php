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
															<li class="breadcrumb-item d-inline-block"><a>Leave</a></li>
															<li class="breadcrumb-item d-inline-block active">Entitlements</li>
														</ol>
														<h4 class="text-dark">Employee Entitlements</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
										<!-- <h4 class="card-title"><i class="fa fa-search"></i> Search</h4><hr> -->
										<form id="searchEmployeeEntitlement" method="GET" action="{{ route('leaveEntitlement.index') }}">
											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Employee Name </label>
														<select class="employee_name form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" id="employee_name" style="width: 100%">
															@if(Request::get('emp_name'))
																<option selected="selected" id="{{ Request::get('emp_number') }}">{{ Request::get('emp_name'), old('name') }}</option>
															@endif
														</select>
														{!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
														<input type="hidden" name="emp_number" id="emp_number" class="form-control">
														<input type="hidden" name="emp_name" id="emp_name" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Leave Period</label>
														<select class="form-control select {{ $errors->has('leave_period') ? 'is-invalid' : ''}}" name="leave_period" id="leave_period">
															<option value="">Select Leave Period</option>
															@foreach ($leave_period as $period)
			                                                    <option value='{{ $period->leave_period }}' {{ Request::get('leave_period') == $period->leave_period ? 'selected' : '' }}>{{ $period->leave_period }}</option>
			                                                @endforeach
		                                                </select>
		                                                {!! $errors->first('leave_period', '<span class="invalid-feedback" role="alert">:message</span>') !!}
		                                                <input type="hidden" name="from_date" id="from_date" class="form-control" value="{{ Request::get('from_date') }}">
		                                                <input type="hidden" name="to_date" id="to_date" class="form-control" value="{{ Request::get('to_date') }}">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Leave Type</label>
														<select class="form-control select" name="leave_type_id">
															<option value="">All</option>
		                                                    @foreach ($leave_types as $type)
			                                                    <option value='{{ $type->id }}' {{ Request::get('leave_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
			                                                @endforeach
		                                                </select>
		                                                {!! $errors->first('leave_type_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
													</div>
												</div>
											</div>

											<input type="hidden" name="sort_field" id="sort_field" value="{{ Request::get('sort_field') }}">
											<input type="hidden" name="sort_by" id="sort_by" value="{{ Request::get('sort_by') }}">

											<div class="row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4"><i class="fa fa-search"></i> Search </button>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="button" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4" onclick="resetAllValues('searchEmployeeEntitlement')"><i class="fa fa-refresh"></i> Reset </button>
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
												<h4 class="card-title mb-0 ml-2 mt-2">Employee Leave Entitlements</h4>
											</div>
										</div>
										@hasrole('Admin')
											<div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
												<a href="{{ route('leaveEntitlement.create', (Request::get('emp_number')) ? 'employee_id='.Request::get('emp_number') : '' )}}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
											</div>
											<div class="col-sm-6 col-md-2 col-lg-3 col-xl-2">
												<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('mylist_entitlements_table','myEntitlements','{{ route('myEntitlements.deleteMultiple') }}')"><i class="fa fa-trash"></i> Delete</button>
											</div>
										@endrole
									</div>
								</div>
								
								<div class="card-body align-center">									
									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light sort_row">
													<th class="text-center">
														@hasrole('Admin')
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('mylist_entitlements_table')">
														@endrole
													</th>
													<th>Employee Name <a href="#" class="{{ (Request::get('sort_field') == 'employee_name') ? 'active' : '' }}" onclick="sorting('employee_name', 'searchEmployeeEntitlement')"><i class="fa fa-fw fa-sort"></i></th>
													<th>Leave Type <a href="#" class="{{ (Request::get('sort_field') == 'leave_type_name') ? 'active' : '' }}" onclick="sorting('leave_type_name', 'searchEmployeeEntitlement')"><i class="fa fa-fw fa-sort"></i></th>
													<th>Valid From <a href="#" class="{{ (Request::get('sort_field') == 'from_date') ? 'active' : '' }}" onclick="sorting('from_date', 'searchEmployeeEntitlement')"><i class="fa fa-fw fa-sort"></i></th>
													<th>Valid To <a href="#" class="{{ (Request::get('sort_field') == 'to_date') ? 'active' : '' }}" onclick="sorting('to_date', 'searchEmployeeEntitlement')"><i class="fa fa-fw fa-sort"></i></th>
													<th class="text-right">Days <a href="#" class="{{ (Request::get('sort_field') == 'no_of_days') ? 'active' : '' }}" onclick="sorting('no_of_days', 'searchEmployeeEntitlement')"><i class="fa fa-fw fa-sort"></i></th>
												</tr>
											</thead>
											<tbody id="mylist_entitlements_table">
												@php
													$total = 0;
												@endphp
												@if(count($entitlement) > 0)
													@foreach ($entitlement as $row)
													<tr>
														<td class="text-center">
															@hasrole('Admin')
															<input type="checkbox" name="user_id" value="{{ $row->entitlement_id }}">
															@endrole
														</td>
														<td>{{ $row->employee_name }}</td>
														<td>{{ $row->leave_type_name }}</td>
														<td>
															<h2>
																<u><a href="{{ route('leaveEntitlement.edit', $row->entitlement_id) }}">{{ $row->from_date }}</a>
																</u>
															</h2>
														</td>
														<td>
															<h2>
																<u><a href="{{ route('leaveEntitlement.edit', $row->entitlement_id) }}">{{ $row->to_date }}</a>
																</u>
															</h2>
														</td>
														@php
															$total = $total + $row->no_of_days;
														@endphp
														<td class="text-right">
															<h2>
																<u><a href="{{ route('leaveEntitlement.edit', $row->entitlement_id) }}">{{ number_format($row->no_of_days, 2) }}</a>
																</u>
															</h2>
														</td>
													</tr>
													@endforeach
													<tr class="bg-light font-weight-bold">
														<td></td>
														<td colspan="3"></td>
														<td>Total :</td>
														<td class="text-right">{{ number_format($total, 2) }}</td>
													</tr>
												@else
													<tr>
														<td colspan="6"><p class="text-center">No Data Found !</p></td>
													</tr>
												@endif

												<tr>
													<td colspan="6">
														<div class="d-flex justify-content-center">
															{{ $entitlement->appends($_GET)->links() }}
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
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
<!--  Validation Modal -->
<div class="modal fade" id="validation_message">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">		
			<!-- Modal body -->
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title mb-3"></h5><hr>
				<p class="modal-message"></p>
				<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3 mt-4" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
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
		// alert($('#select2-employee_name-container').text());
	 	$('#emp_number').val(this.value);
	 	var emp_name = $("#employee_name option:selected").html();
	 	$('#emp_name').val(emp_name);
	});

	window.onload = function() {
		var emp_number = $("#employee_name option:selected").prop('id');
		$('#emp_number').val(emp_number);
	 	var emp_name = $("#employee_name option:selected").html();
	 	$('#emp_name').val(emp_name);
	}

	// on change of leave_period
	$('#leave_period').on('change', function() {	  
		var result = this.value.split(' - ');
		if(result){
			$('#from_date').val(result[0]);
			$('#to_date').val(result[1]);
		}
	});

	function validation_popup_msg(){
		@if (Session::get('success'))
			 title = 'Success'; msg = '{{ Session::get("success") }}';
		@elseif (Session::get('error'))
			 title = 'Failed'; msg = '{{ Session::get("error") }}';
		@endif

		@if ((Session::get('success'))||(Session::get('error')))
			$('#validation_message').modal('toggle');
			$('.modal-title').html(title);
			$('.modal-message').html(msg);
		@endif
	}

	window.onload = function() {
		// calling validation_popup_msg
		validation_popup_msg();
	}
	
</script>    
    <!-- <script src="{{ asset('js/system_users.js')}}"></script> -->
@endpush