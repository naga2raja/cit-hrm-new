@extends('layout.mainlayout')
@section('content')
<!-- Content -->

<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">						
						<div class="col-xl-12 col-lg-12 col-md-12">

							<div class="card shadow-sm ctm-border-radius border">
								<div class="card-header">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-10">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2">Leave Type </h4>
											</div>
										</div>										
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-1">  
											<a href="{{ route('leaveTypes.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-1">  
											<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('leave_type_table','leaveTypes')"><i class="fa fa-trash"></i> Delete</button>
										</div>
									</div>
								</div>
								
								<div class="card-body align-center">									
									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr>
													<th class="text-center" style="width: 10%">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('leave_type_table')">
													</th>
													<th>Leave Type</th>
												</tr>
											</thead>
											<tbody id="leave_type_table">
												@if(count($leave_type) > 0)
													@foreach ($leave_type as $type)
													<tr>
														<td class="text-center">
															<input type="checkbox" name="leave_type_id" value="{{ $type->id }}">
														</td>
														<td>
															<h2><u><a href="{{ route('leaveTypes.edit', $type->id) }}">{{ $type->name }}</a></u></h2>
														</td>
													</tr>
													@endforeach
												@else
													<tr>
														<td colspan="2"><p class="text-center">No Data Found</p></td>
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