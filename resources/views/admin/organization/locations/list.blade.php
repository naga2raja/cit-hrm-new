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
											<form>
												<div class="row">
													<div class="col-sm-4 leave-col">
														<div class="form-group">
															<label>Location</label>
															<input type="text" class="form-control" placeholder="Location">
														</div>
													</div>
													<div class="col-sm-4">
														<div class="form-group">
															<label>City</label>
															<input type="text" class="form-control" placeholder="Company city">															
														</div>
													</div>
													<div class="col-sm-2">
														<button type="button" class="btn btn-success text-white ctm-border-radius mt-4"><span class="fa fa-search"></span> Search</button>
														<button type="reset" class="btn btn-danger text-white ctm-border-radius mt-4"><span class="fa fa-refresh"></span> Reset</button>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-4 leave-col">
														<div class="form-group">
															<label>Country</label>
															<select class="form-control select">
																<option>-Select-</option>
																@foreach ($countries as $country)
																	<option>{{ $country->country }}</option>
																@endforeach
															</select>
														</div>
													</div>												
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left">
										<a href="addCompanyLocation" class="btn btn-success text-white ctm-border-radius"><span class="fa fa-plus"></span> Add</a>
										<a href="" class="btn btn-danger text-white ctm-border-radius"><span class="fa fa-trash"></span> Delete</a>
									</div>
								</div>
								<div class="card-body">

									<div class="employee-office-table">
										<div class="table-responsive">
											<table class="table custom-table mb-0 table-hover table-striped table-bordered">
												<thead>
													<tr class="bg-blue-header text-white">
														<th class="text-center">
															<input type="checkbox" name="">
														</th>
														<th>Company</th>
														<th>City</th>
														<th>Country</th>
														<th>Phone</th>
														<th>Number of employees</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($locations as $location)
														<tr>
															<td class="text-center">
																<input type="checkbox" name="" value="{{ $location->id }}">
															</td>
															<td>
																<h2><a href="editCompanyLocation/{{ $location->id }}">{{ $location->company_name }}</a></h2>
															</td>
															<td>{{ $location->city }}</td>
															<td>{{  }}</td>
															<td>{{ $location->phone }}</td>
															<td>{{  }}</td>
														</tr>
													@endforeach													
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
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<!-- Create Reports The Modal -->
		<div class="modal fade" id="add_report">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create Report</h4>
						<form>
							<p class="mb-2">Select Report Type</p>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">Team Member</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio2">Time Off</label>
							</div>
							
							<div class="form-group">
								<label class="mt-3">What data would you like to include?</label>
								<!-- Multiselect dropdown -->
								<select multiple class="select w-100 form-control">
									<option>Full Name</option>
									<option>Working Days Off</option>
									<option>Booked By</option>
									<option>Start Date</option>
									<option>End Date</option>
									<option>Team Name</option>
									<option>First Name</option>
									<option>Last Name</option>
									<option>Email</option>
									<option>Date Of Birth</option>
									<option>Phone Number</option>
								</select><!-- End -->
							</div>
						</form>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
	        $(document).ready( function () {
			    $('#example').DataTable();
			} );
	    </script>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection