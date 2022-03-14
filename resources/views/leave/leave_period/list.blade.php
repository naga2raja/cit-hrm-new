@extends('layout.mainlayout')
@section('content')
<!-- Content -->

<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">						
						<!-- left side -->
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm border">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="{{ route('index') }}" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block"><a>Leave</a></li>
															<li class="breadcrumb-item d-inline-block active">Configuration</li>
														</ol>
														<h4 class="text-dark">Leave Period</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm border">
									<div class="card-body">
										<!-- <h4 class="card-title"><i class="fa fa-search"></i> Search</h4><hr> -->
										<form id="searchPeriod" method="GET" action="{{ route('leavePeriod.index') }}">

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Country</label>
														<select class="form-control select" name="country_id" id="country_id">
		                                                    <option value='' {{ Request::get('country_id')  == '' ? 'selected' : '' }}>All</option>
		                                                    @foreach ($country as $row)
			                                                    <option value='{{ $row->id }}' {{ Request::get('country_id') == $row->id ? 'selected' : '' }}>{{ $row->country }}</option>
			                                                @endforeach
		                                                </select>
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Start Period</label>
														<input type="text" name="start_date" id="datetimepicker1" class="form-control datetimepicker1" value="{{ Request::get('start_date') }}" autocomplete="off">
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>End Period</label>
														<input type="text" name="end_date" id="datetimepicker2" class="form-control datetimepicker2" value="{{ Request::get('end_date') }}" autocomplete="off">
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Status</label>
														<select class="form-control select" id="status" name="status">
															<option value="">All</option>
															<option value="1" {{ Request::get('status') == '1' ? 'selected' : '' }} >Active</option>
															<option value="0" {{ Request::get('status') == '0' ? 'selected' : '' }} >In-active</option>
														</select>
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
													<button type="button" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4" onclick="resetAllValues('searchPeriod')"><i class="fa fa-refresh"></i> Reset </button>
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
							<div class="card shadow-sm ctm-border-radius border">
								<div class="card-header">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-8">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2">Leave Period List </h4>
											</div>
										</div>										
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">  
											<a href="{{ route('leavePeriod.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">  
											<button id="deleteAll" class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_period_table','leavePeriod','{{ route('leavePeriod.deleteMultiple') }}')"><i class="fa fa-trash"></i> Delete</button>
										</div>
									</div>
								</div>
								
								<div class="card-body align-center">									
									<div class="table-responsive">
										@if($message = Session::get('success'))
										<div class="col-md-12">
											<div class="alert alert-success">
												<p>{{$message}}</p>
											</div>
										</div>
										@endif
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light sort_row">
													<th class="text-center">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_period_table')">
													</th>
													<th>Leave Period <a href="#" class="{{ (Request::get('sort_field') == 'start_period') ? 'active' : '' }}" onclick="sorting('start_period', 'searchPeriod')"><i class="fa fa-fw fa-sort"></i></th>
													<th>Country <a href="#" class="{{ (Request::get('sort_field') == 'm_countries.country') ? 'active' : '' }}" onclick="sorting('m_countries.country', 'searchPeriod')"><i class="fa fa-fw fa-sort"></i></th>
													<th>Sub Unit <a href="#" class="{{ (Request::get('sort_field') == 'm_company_locations.company_name') ? 'active' : '' }}" onclick="sorting('m_company_locations.company_name', 'searchPeriod')"><i class="fa fa-fw fa-sort"></i></th>
													<th style="width: 100px;">Status <a href="#" class="{{ (Request::get('sort_field') == 'status') ? 'active' : '' }}" onclick="sorting('status', 'searchPeriod')"><i class="fa fa-fw fa-sort"></i></th>
												</tr>
											</thead>
											<tbody id="list_period_table">
												@if(count($leave_period) > 0)
													@foreach ($leave_period as $row)
													<tr>
														<td class="text-center">
															<input type="checkbox" name="leave_period_id" value="{{ $row->id }}">
														</td>
														<td>
															<h2><u><a href="{{ route('leavePeriod.edit', $row->id) }}">{{ $row->start_period }} - {{ $row->end_period }}</a></u></h2>
														</td>
														<td>{{ $row->countryName->country }}</td>
														<td>{{ $row->subUnitName->company_name }}</td>
														<td>
															@if($row->status == '0')
																<input type="button" name="leave_period_status" class="btn btn-outline-danger btn-sm btn-block" value="In Active" disabled="">
															@else
																<input type="button" name="leave_period_status" class="btn btn-success btn-sm btn-block" value="Active">
															@endif
														</td>
													</tr>
													@endforeach
												@else
													<tr>
														<td colspan="5"><p class="text-center alert alert-danger">No Data Found</p></td>
													</tr>
												@endif
													<tr>
														<td colspan="5">
															<div class="d-flex justify-content-center">
																{{ $leave_period->appends($_GET)->links() }}
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
@endsection

@push('scripts')
<script type="text/javascript">

	$('#datetimepicker1').datetimepicker({
        date: '{{ (@Request::get("start_date")) }}',
        format: "YYYY-MM",
        icons: {
            up: "fa fa-angle-up",
            down: "fa fa-angle-down",
            next: 'fa fa-angle-right',
            previous: 'fa fa-angle-left'
        }
    });

    $('.datetimepicker2').datetimepicker({
        date: '{{ (@Request::get("end_date")) }}',
        format: "YYYY-MM", 
        icons: {
            up: "fa fa-angle-up",
            down: "fa fa-angle-down",
            next: 'fa fa-angle-right',
            previous: 'fa fa-angle-left'
        }
    });

</script>
@endpush