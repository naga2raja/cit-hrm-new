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
															<li class="breadcrumb-item d-inline-block"><a href="index.html" class="text-dark">Admin</a></li>
															<li class="breadcrumb-item d-inline-block active">Organization</li>
														</ol>
														<h4 class="text-dark">Locations</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm border">
									<div class="card-body">
										<!-- <h4 class="card-title"><i class="fa fa-search"></i> Search</h4><hr> -->
										<form id="searchLocations" method="GET" action="{{ route('locations.index') }}">

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Company</label>
														<input type="text" class="form-control" placeholder="Location" name="company_name" value="{{ Request::get('company_name') }}" autocomplete="off">
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>City</label>
														<input type="text" class="form-control" placeholder="Company city" name="city" value="{{ Request::get('city') }}">
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Country</label>
														<select class="country form-control select" name="country" id="country">
															<option value="">-Select-</option>
															@foreach ($countries as $country)
	                                                            <option value="{{ $country->id }}" {{ Request::get('country') == $country->id ? 'selected' : '' }}>{{ $country->country }}</option>
															@endforeach
														</select>
														<input type="hidden" name="country_name" id="country_name" class="form-control">
														<input type="hidden" name="country_id" id="country_id" value="{{ (Request::get('country_id')) ? Request::get('country_id') : '' }}">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4"><i class="fa fa-search"></i> Search </button>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="reset" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4" onclick="resetAllValues('searchLocations')"><i class="fa fa-refresh"></i> Reset </button>
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
										<div class="col-sm-6 col-md-8 col-lg-7 col-xl-8">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2">Locations List</h4>
											</div>
										</div>
										@hasrole('Admin')
											<div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
												<a href="{{ route('locations.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
											</div>
											<div class="col-sm-6 col-md-2 col-lg-3 col-xl-2">
												<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_locations_table','locations')"><i class="fa fa-trash"></i> Delete</button>
											</div>
										@endrole
									</div>
								</div>
								<div class="card-body align-center">									
									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light">
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
														<td colspan="6"><p class="text-center">No locations Found!</p></td>
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
	$('.country').select2({
		placeholder: 'Select a Country',
		allowClear: true,
		ajax: {
			url: '/country-autocomplete-ajax',
			dataType: 'json',
			delay: 250,
			processResults: function (data) {
				return {
					results:  $.map(data, function (item) {
						return {
							text: item.country,
							id: item.id
						}
					})
				};
			},
			cache: true
		}		
	});

	$(document.body).on("change","#country",function(){
	 	$('#country_id').val(this.value);
	 	var country = $("#country option:selected").html();
	 	$('#country_name').val(country);
	});
</script>
@endpush