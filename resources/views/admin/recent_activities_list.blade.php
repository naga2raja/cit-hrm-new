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
															<li class="breadcrumb-item d-inline-block active">All Activities</li>
														</ol>
														<h4 class="text-dark">All Activities</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm border">
									<div class="card-body">
										<!-- <h4 class="card-title"><i class="fa fa-search"></i> Search</h4><hr> -->
										<form id="searchNews" method="GET" action="{{ route('allRecentActivities') }}">

											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
													<div class="form-group">
														<label>Employee Name</label>
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
														<label>Activity Date</label>
														<input type="text" name="date" id="date" class="form-control datetimepicker cal-icon-input" placeholder="Date" value="{{ old('date', Request::get('date')) }}">
													</div>
												</div>
											</div>

											<!--
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
										-->

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
												<h4 class="card-title mb-0 ml-2 mt-2">All User Activities</h4>
											</div>
										</div>
										
									</div>
								</div>
								
								<style>
									.list {
    padding-left: 0;
    padding-right: 0
}

.list-item {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word
}

.list-row .list-item {
    -ms-flex-direction: row;
    flex-direction: row;
    -ms-flex-align: center;
    align-items: center;
    padding: .75rem .625rem
}

.list-row .list-item>* {
    padding-left: .625rem;
    padding-right: .625rem
}

.no-wrap {
    white-space: nowrap
}

.text-color {
    color: #5e676f
}

.text-gd {
    -webkit-background-clip: text;
    -moz-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    -moz-text-fill-color: transparent;
    text-fill-color: transparent
}

.text-sm {
    font-size: .825rem
}

.h-1x {
    height: 1.25rem;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 1;
    -webkit-box-orient: vertical
}

.w-48 {
    width: 48px !important;
    height: 48px !important
}


a:link {
    text-decoration: none
}
.notify_content_section {
	width: 680px;
}
 
								</style>
								
								@if(count($activities) > 0)
								<div class="row">
									<div class="col-sm-12">
										<div class="list list-row block">
											@foreach ($activities as $row)
												<div class="list-item">
													<div>
														@if($row->profile_photo)												
															<a data-abc="true">
																<span class="w-48 avatar gd-primary">
																	<img src="{{ assetUrl($row->profile_photo) }}" alt="{{ $row->employee_name }}" class="img-fluid rounded-circle" width="100">
																</span>
															</a>														
														@else
															<a data-abc="true">
																<span class="w-48 avatar gd-primary">
																	<img src="{{ assetUrl('img/profiles/img-1.jpg') }}" alt="{{ $row->employee_name }}" class="img-fluid rounded-circle" width="100">
																</span>
															</a>
														@endif	
													</div>
													<div class="flex ml-2 notify_content_section"> <a href="#" class="item-author text-color" data-abc="true">{{ $row->employee_name }}</a>
														<div class="item-except text-muted text-sm h-1x">
															@if($row->action == "Submitted")
															Sent {{ $row->module }} ({{ $row->date }}) to {{ getSendToUsers($row->send_to) }} <b>Approval  </b>
														@else
															<b>{{ $row->action }}</b> {{ $row->module }} ({{ $row->date }}) and Notified to {{ getSendToUsers($row->send_to) }}
														@endif
														</div>
													</div>
													<div class="no-wrap">														
														<div class="item-date text-muted text-sm d-none d-md-block">{{ date('Y-m-d H:i A', strtotime($row->created_at)) }}</div>
													</div>
												</div>											
											@endforeach

											<div class="d-flex justify-content-center">
												{{ $activities->appends($_GET)->links() }}
											</div>
										</div>
									</div>
								</div>
								@else		
								<div class="row">
									<div class="col-sm-10 m-2">
										<br>
										<div class="alert alert-warning"><p>No Logs Found</p></div>
									</div>
								</div>
								@endif
												<?php /*
								<div class="card-body align-center">									
									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light">													
													<th>Module</th>
													<th>Action</th>
													<th>Date</th>
													<th>Action By</th>
													<th>Notified To</th>
													<th>Created At</th>
												</tr>
											</thead>
											<tbody id="list_news_table">
												

													@foreach ($activities as $row)
													<tr>																												
														<td>{{ $row->module }}</td>
														<td>{{ $row->action }}</td>
														<td>{{ $row->date }}</td>
														<td>{{ $row->employee_name }}</td>
														<td>{{ $row->send_to_user }}</td>
														<td>
															{{ $row->created_at }}
														</td>
													<tr>
													@endforeach
												@else
													<tr>
														<td colspan="5"><p class="text-center">No Data Found</p></td>
													</tr>
												@endif
											</tbody>
										</table>
									</div>
								</div> 
								*/ ?>
								
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