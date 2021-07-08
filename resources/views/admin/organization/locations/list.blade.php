@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="row">
								<div class="col-md-12">
									<div class="card ctm-border-radius shadow-sm border">
										<div class="card-header">
											<h4 class="card-title mb-0">Company Locations</h4>
										</div>
										<div class="card-body">
											@if($message = Session::get('success'))
											<div class="alert alert-success">
												<p>{{$message}}</p>
											</div>
											@endif
											<form method="GET" action="{{ route('locations.index') }}">
												<div class="row">
													<div class="col-sm-2 leave-col">
														<div class="form-group">
															<label>Company</label>
															<input type="text" class="form-control" placeholder="Location" name="company_name" value="{{ Request::get('company_name') }}">
														</div>
													</div>
													<div class="col-sm-2">
														<div class="form-group">
															<label>City</label>
															<input type="text" class="form-control" placeholder="Company city" name="city" value="{{ Request::get('city') }}">															
														</div>
													</div>
													<div class="col-sm-2 leave-col">
														<div class="form-group">
															<label>Country</label>
															<select class="form-control select" name="country">
																<option value="">-Select-</option>
																@foreach ($countries as $country)
                                                                    <option value="{{ $country->id }}" {{ Request::get('country') == $country->id ? 'selected' : '' }}>{{ $country->country }}</option>
																@endforeach
															</select>
														</div>
													</div>	
													<div class="col-sm-2">
														<button type="submit" class="btn btn-success text-white ctm-border-radius mt-4"><span class="fa fa-search"></span> Search</button>
														<a href="{{ route('locations.index') }}" class="btn btn-danger text-white ctm-border-radius mt-4"><span class="fa fa-refresh"></span> Reset</a>
													</div>											
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="card ctm-border-radius shadow-sm border">
								<form method="POST" action="{{ route('locations.destroy', 1) }}">
									@csrf
									@method('DELETE')
									<div class="card-header">
										<div class="text-left ml-3">
											<a href="{{ route('locations.create') }}" class="btn btn-success text-white ctm-border-radius"><span class="fa fa-plus"></span> Add</a>
											<button class="btn btn-danger text-white ctm-border-radius" onclick="deleteAll('list_locations_table','locations')"><span class="fa fa-trash"></span> Delete</button>
										</div>
									</div>
									<div class="card-body">

										<div class="employee-office-table">
											<div class="table-responsive">
												<table class="table custom-table mb-0 table-hover table-striped table-bordered">
													<thead>
														<tr class="bg-blue-header text-white">
															<th class="text-center">
																<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_locations_table')">
															</th>
															<th>Company</th>
															<th>City</th>
															<th>Country</th>
															<th>Phone</th>
															<th>Number of employees</th>
														</tr>
													</thead>
													<tbody id="list_locations_table">
														@if(count($locations) > 0)
															@foreach ($locations as $location)
																<tr>
																	<td class="text-center">
																		<input type="checkbox" name="delete_ids" id="delete_ids" value="{{ $location->id }}">
																	</td>
																	<td>
																		<h2><u><a href="{{ route('locations.edit', $location->id) }}">{{ $location->company_name }}</a></u></h2>
																	</td>
																	<td>{{ $location->city }}</td>
																	<td>{{ $location->country }}</td>
																	<td>{{ $location->phone_number }}</td>
																	<td>
																		@foreach($employees_count as $emp)
																			@if($emp->company_location_id == $location->id)
																			{{ $emp->count }}
																			@endif
																		@endforeach
																	</td>
																</tr>
															@endforeach
														@else
															<tr>
																<td colspan="5"><div class="alert alert-danger text-center">No locations Found!</div></td>
															</tr>
														@endif												
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</form>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection
