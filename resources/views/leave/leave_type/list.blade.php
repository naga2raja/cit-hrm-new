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
											<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('leave_type_table','leaveTypes','{{ route('leaveTypes.deleteMultiple') }}')"><i class="fa fa-trash"></i> Delete</button>
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
										<form method="GET" id="filter_form">
											<input type="hidden" name="sort_field" id="sort_field" value="{{ Request::get('sort_field') }}">
											<input type="hidden" name="sort_by" id="sort_by" value="{{ Request::get('sort_by') }}">
										</form>
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light sort_row">
													<th class="text-center" style="width: 10%">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('leave_type_table')">
													</th>
													<th>Leave Type <a href="#" class="{{ (Request::get('sort_field') == 'name') ? 'active' : '' }}" onclick="sorting('name')"><i class="fa fa-fw fa-sort"></i></a></th>
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
													<tr>
														<td colspan="100%">															
															<div class="pull-left mt-3">Showing {{ ($leave_type->currentPage() > 1) ? (($leave_type->currentPage() * $leave_type->perPage()) - $leave_type->perPage()) + 1 : $leave_type->currentPage() }} to {{ (($leave_type->currentPage() * $leave_type->perPage()) > $total) ? $total : ($leave_type->currentPage() * $leave_type->perPage()) }} of {{ $total }} entries</div>
															<div class="pull-right mt-3">
																{{ $leave_type->appends($_GET)->links() }}
															</div>
														</td>
													</tr>
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