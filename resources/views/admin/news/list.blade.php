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
															<li class="breadcrumb-item d-inline-block"><a href="{{ route('home') }}" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">News</li>
														</ol>
														<h4 class="text-dark">Daily News</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm border">
									<div class="card-body">
										<!-- <h4 class="card-title"><i class="fa fa-search"></i> Search</h4><hr> -->
										<form id="searchNews" method="GET" action="{{ route('news.index') }}">

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Post By</label>
														<select class="employee_name form-control {{ $errors->has('name') ? 'is-invalid' : ''}}" name="name" id="employee_name" style="width: 100%" >
															@if(Request::get('emp_name'))
																<option selected="selected" id="{{ Request::get('employee_id') }}">{{ Request::get('emp_name'), old('name') }}</option>
															@endif
														</select>
														{!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}														
														<input type="hidden" name="emp_name" id="emp_name" class="form-control">
														<input type="hidden" name="employee_id" id="employee_id" value="{{ (Request::get('employee_id')) ? Request::get('employee_id') : '' }}">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Date</label>
														<input type="text" name="date" id="date" class="form-control datetimepicker cal-icon-input" placeholder="Date" value="{{ old('date', Request::get('date')) }}">
													</div>
												</div>
											</div>

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Status</label>
														<select class="form-control select" name="status">
															<option value=''>Select Status</option>
														    <option value='Active' {{ Request::get('status') == "Active" ? 'selected' : '' }}>Active</option>
														    <option value='In active' {{ Request::get('status') == "In active" ? 'selected' : '' }}>In-active</option>
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
													<button type="button" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4" onclick="resetAllValues('searchNews')"><i class="fa fa-refresh"></i> Reset </button>
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
												<h4 class="card-title mb-0 ml-2 mt-2">Daily News List</h4>
											</div>
										</div>
										@hasrole('Admin')
											<div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
												<a href="{{ route('news.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
											</div>
											<div class="col-sm-6 col-md-2 col-lg-3 col-xl-2">
												<button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_news_table','news','{{ route('news.deleteMultiple') }}')"><i class="fa fa-trash"></i> Delete</button>
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
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_news_table')">
													</th>
													<th>News Title <a href="#" class="{{ (Request::get('sort_field') == 'title') ? 'active' : '' }}" onclick="sorting('title', 'searchNews')"><i class="fa fa-fw fa-sort"></i></th>
													<th>Category <a href="#" class="{{ (Request::get('sort_field') == 'category') ? 'active' : '' }}" onclick="sorting('category', 'searchNews')"><i class="fa fa-fw fa-sort"></i></th>
													<th>Project <a href="#" class="{{ (Request::get('sort_field') == 'project_id') ? 'active' : '' }}" onclick="sorting('project_id', 'searchNews')"><i class="fa fa-fw fa-sort"></i></th>
													<th>Date <a href="#" class="{{ (Request::get('sort_field') == 't_news.date') ? 'active' : '' }}" onclick="sorting('t_news.date', 'searchNews')"><i class="fa fa-fw fa-sort"></i></th>
													<th>Post By <a href="#" class="{{ (Request::get('sort_field') == 'employee_name') ? 'active' : '' }}" onclick="sorting('employee_name', 'searchNews')"><i class="fa fa-fw fa-sort"></i></th>
													<th>Status <a href="#" class="{{ (Request::get('sort_field') == 't_news.status') ? 'active' : '' }}" onclick="sorting('t_news.status', 'searchNews')"><i class="fa fa-fw fa-sort"></i></th>
												</tr>
											</thead>
											<tbody id="list_news_table">
												@if(count($news) > 0)
													@foreach ($news as $row)
													<tr>
														<td class="text-center">
															<input type="checkbox" name="news_id" value="{{ $row->id }}">
														</td>
														<td>
															<h2><u><a href="{{ route('news.edit', $row->id) }}">{{ $row->title }}</a></u></h2>
														</td>
														<td>{{ $row->category }}</td>
														<td>{{ ($row->project_name) ? $row->project_name : 'All' }}</td>
														<td>{{ $row->date }}</td>
														<td>{{ $row->employee_name }}</td>
														<td>
															@if($row->status == 'In active')
																<a class="btn btn-outline-danger btn-sm"> Inactive </a>
															@elseif($row->status == 'Active')
																<a class="btn  btn-outline-success btn-sm"> Active </a>
															@endif
														</td>
													<tr>
													@endforeach
													<tr>
														<td colspan="100%">															
															<div class="pull-left mt-3">Showing {{ ($news->currentPage() > 1) ? (($news->currentPage() * $news->perPage()) - $news->perPage()) + 1 : $news->currentPage() }} to {{ (($news->currentPage() * $news->perPage()) > $total) ? $total : ($news->currentPage() * $news->perPage()) }} of {{ $total }} entries</div>
															<div class="pull-right mt-3">
																{{ $news->appends($_GET)->links() }}
															</div>
														</td>
													</tr>
												@else
													<tr>
														<td colspan="6"><p class="text-center">No Data Found</p></td>
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
	 	$('#employee_id').val(this.value);
	 	var emp_name = $("#employee_name option:selected").html();
	 	$('#emp_name').val(emp_name);
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
@endpush