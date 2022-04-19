@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xl-12 col-lg-8 col-md-12">
							<div class="card shadow-sm ctm-border-radius border">
								<div class="card-header">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-8 col-lg-7 col-xl-10">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2">Job Category</h4>
											</div>
										</div>
										@hasrole('Admin')
											<div class="col-sm-6 col-md-2 col-lg-2 col-xl-1">
												<a href="{{ route('jobCategory.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
											</div>
											<div class="col-sm-6 col-md-2 col-lg-3 col-xl-1">
												<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_job_category_table','jobCategory','{{ route('jobCategory.deleteMultiple') }}')"><i class="fa fa-trash"></i> Delete</button>
											</div>
										@endrole
									</div>
								</div>
								<div class="card-body align-center">
									<div class="table-responsive">
										@if($message = Session::get('success'))
											<div class="alert alert-success">
												<p>{{$message}}</p>
											</div>
										@endif
										<form method="GET" id="filter_form">
											<input type="hidden" name="sort_field" id="sort_field" value="{{ Request::get('sort_field') }}">
											<input type="hidden" name="sort_by" id="sort_by" value="{{ Request::get('sort_by') }}">
										</form>
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light sort_row">
													<th class="text-center">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_job_category_table')">
													</th>
													<th>Job Category <a href="#" class="{{ (Request::get('sort_field') == 'name') ? 'active' : '' }}" onclick="sorting('name')"><i class="fa fa-fw fa-sort"></i></a></th>
												</tr>
											</thead>
											<tbody id="list_job_category_table">
												@if(count($categories) > 0)
													@foreach ($categories as $category)
													<tr>
														<td class="text-center" style="width: 5%">
															<input type="checkbox" name="job_category_id" value="{{ $category->id }}">
														</td>
														<td>
															<h2><u><a href="{{ route('jobCategory.edit', $category->id) }}">{{ $category->name }}</a></u></h2>
														</td>
													</tr>
													@endforeach
													<tr>
														<td colspan="100%">															
															<div class="pull-left mt-3">Showing {{ ($categories->currentPage() > 1) ? (($categories->currentPage() * $categories->perPage()) - $categories->perPage()) + 1 : $categories->currentPage() }} to {{ (($categories->currentPage() * $categories->perPage()) > $total) ? $total : ($categories->currentPage() * $categories->perPage()) }} of {{ $total }} entries</div>
															<div class="pull-right mt-3">
																{{ $categories->appends($_GET)->links() }}
															</div>
														</td>
													</tr>
												@else
													<tr>
														<td colspan="5"><p class="text-center">No Job Category Found !</p></td>
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