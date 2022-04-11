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
														<h4 class="text-dark">My Entitlements</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
										<!-- <h4 class="card-title"><i class="fa fa-search"></i> Search</h4><hr> -->
										<form id="searchMyEntitlement" method="GET" action="{{ route('myEntitlements.index') }}">
											<div class="row filter-row">
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
													<button type="button" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4" onclick="resetAllValues('searchMyEntitlement')"><i class="fa fa-refresh"></i> Reset </button>
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
												<h4 class="card-title mb-0 ml-2 mt-2">My Leave Entitlements</h4>
											</div>
										</div>
										@hasrole('Admin')
											<div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
												<a href="{{ route('leaveEntitlement.create', 'employee_id='.@$employees->id) }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
											</div>
											<div class="col-sm-6 col-md-2 col-lg-3 col-xl-2">
												<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_entitlements_table','leaveEntitlement','{{ route('leaveEntitlement.deleteMultiple') }}')"><i class="fa fa-trash"></i> Delete</button>
											</div>
										@endrole
									</div>
								</div>
								
								<div class="card-body align-center">									
									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light sort_row">
													@hasrole('Admin')
													<th class="text-center">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_entitlements_table')">
													</th>
													@endrole
													<th>Leave Type <a href="#" class="{{ (Request::get('sort_field') == 'leave_type_name') ? 'active' : '' }}" onclick="sorting('leave_type_name', 'searchMyEntitlement')"><i class="fa fa-fw fa-sort"></i></th>
													<!-- <th>Entitlement Type</th> -->
													<th>Valid From <a href="#" class="{{ (Request::get('sort_field') == 'from_date') ? 'active' : '' }}" onclick="sorting('from_date', 'searchMyEntitlement')"><i class="fa fa-fw fa-sort"></i></th>
													<th>Valid To <a href="#" class="{{ (Request::get('sort_field') == 'to_date') ? 'active' : '' }}" onclick="sorting('to_date', 'searchMyEntitlement')"><i class="fa fa-fw fa-sort"></i></th>
													<th>Days <a href="#" class="{{ (Request::get('sort_field') == 'no_of_days') ? 'active' : '' }}" onclick="sorting('no_of_days', 'searchMyEntitlement')"><i class="fa fa-fw fa-sort"></i></th>
												</tr>
											</thead>
											<tbody id="list_entitlements_table">
												@php
													$total = 0;
												@endphp
												@if(count($entitlement) > 0)
													@foreach ($entitlement as $row)
													<tr>
														@hasrole('Admin')
														<td class="text-center">
															<input type="checkbox" name="user_id" value="{{ $row->entitlement_id }}">
														</td>
														@endrole
														<td>{{ $row->leave_type_name }}</td>
														<!-- <td>{{ $row->entitlement_id }}</td> -->
														<td>
															<h2>
																@hasrole('Admin')
																	<u><a href="{{ route('leaveEntitlement.edit', $row->entitlement_id) }}">
																@endrole
																		{{ $row->from_date }}
																@hasrole('Admin')
																	</a></u>
																@endrole
															</h2>
														</td>
														<td>
															<h2>																
																@hasrole('Admin')
																	<u><a href="{{ route('leaveEntitlement.edit', $row->entitlement_id) }}">
																@endrole																
																		{{ $row->to_date }}
																@hasrole('Admin')
																	</a></u>
																@endrole																
															</h2>
														</td>
														@php
															$total = $total + $row->no_of_days;
														@endphp
														<td>
															<h2>
																@hasrole('Admin')
																	<u><a href="{{ route('leaveEntitlement.edit', $row->entitlement_id) }}">
																@endrole	
																	{{ number_format($row->no_of_days, 2) }}
																@hasrole('Admin')
																	</a></u>
																@endrole
															</h2>
														</td>
													</tr>
													@endforeach
													<tr class="bg-light font-weight-bold">
														@hasrole('Admin')
														<td></td>
														@endrole
														<td colspan="2"></td>
														<td>Total :</td>
														<td>{{ number_format($total, 2) }}</td>
													</tr>

													<tr>
														<td colspan="100%">
															<div class="d-flex justify-content-center">
																{{ $entitlement->appends($_GET)->links() }}
															</div>
														</td>
													</tr>
												@else
													<tr>
														@hasrole('Admin')
														<td></td>
														@endrole
														<td colspan="5"><p class="text-center">No Data Found</p></td>
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