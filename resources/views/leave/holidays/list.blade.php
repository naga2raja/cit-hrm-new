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
														<h4 class="text-dark">Holidays</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm border">
									<div class="card-body">
										<!-- <h4 class="card-title"><i class="fa fa-search"></i> Search</h4><hr> -->
										<form id="searchHoliday" method="GET" action="{{ route('holidays.index') }}">
											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Country</label>
														<select class="form-control select" name="location_id" id="location_id">
		                                                    <option value="" {{ Request::get('location_id')  == '' ? 'selected' : '' }}>All</option>
		                                                    @foreach ($country as $row)
			                                                    <option value='{{ $row->id }}' {{ Request::get('location_id') == $row->id ? 'selected' : '' }}>{{ $row->country }}</option>
			                                                @endforeach
		                                                </select>
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>From Date</label>
														<input type="text" name="from_date" id="from_date" class="form-control {{ $errors->has('from_date') ? 'is-invalid' : ''}} datetimepicker" placeholder="" value="{{ Request::get('from_date') }}" autocomplete="off" required="">
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>To Date</label>
														<input type="text" name="to_date" id="to_date" class="form-control datetimepicker" placeholder="" value="{{ Request::get('to_date') }}" autocomplete="off" required="">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button id="search" type="button" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4"><i class="fa fa-search"></i> Search </button>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="button" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4" onclick="resetAllValues('searchHoliday')"><i class="fa fa-refresh"></i> Reset </button>
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
												<h4 class="card-title mb-0 ml-2 mt-2">Holidays List </h4>
											</div>
										</div>										
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">  
											<a href="{{ route('holidays.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-2">  
											<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_holiday_table','holidays','{{ route('holidays.deleteMultiple') }}')"><i class="fa fa-trash"></i> Delete</button>
										</div>
									</div>
								</div>
								
								<div class="card-body align-center">									
									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr>
													<th class="text-center">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_holiday_table')">
													</th>
													<th>Name</th>
													<th>Date</th>
													<th>Day</th>
													<th>Repeats Annually</th>
													<th>Country</th>
													<th>Sub Unit</th>
												</tr>
											</thead>
											<tbody id="list_holiday_table">
												@if(count($holidays) > 0)
													@foreach ($holidays as $row)
													<tr>
														<td class="text-center">
															<input type="checkbox" name="holiday_id" value="{{ $row->id }}">
														</td>
														<td>
															<h2><u><a href="{{ route('holidays.edit', $row->id) }}">{{ $row->description }}</a></u></h2>
														</td>
														<td>{{ $row->date }}</td>
														<td>
															@if($row->length == '0')
																Full Day
															@elseif($row->length == '1')
																Half Day
															@endif</td>
														<td>
															@if($row->recurring == '1')
																Yes
															@else
																No
															@endif
														</td>
														<td>{{ $row->countryName->country }}</td>
														<td>{{ $row->subUnitName->company_name }}</td>
													</tr>
													@endforeach
												@else
													<tr>
														<td colspan="7"><p class="text-center alert alert-danger">No Data Found</p></td>
													</tr>
												@endif
													<tr>
														<td colspan="7">
															<div class="d-flex justify-content-center">
																{{ $holidays->links() }}
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
	// form submit
	$('#search').click(function(){
		$('#searchHoliday').submit();
	});

</script>
@endpush