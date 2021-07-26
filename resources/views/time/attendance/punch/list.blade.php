@extends('layout.mainlayout')
@section('content')
<!-- Content -->

<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
						<!-- left side -->
						<div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="index.html" class="text-dark">Leave</a></li>
															<li class="breadcrumb-item d-inline-block active">Attendance</li>
														</ol>
														<h4 class="text-dark">My Records</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
										<!-- <h4 class="card-title"><i class="fa fa-search"></i> Search</h4><hr> -->
										<form method="GET" action="http://127.0.0.1:8000/myEntitlements">
											<div class="row filter-row">
												<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
                                                    <label>Date</label>
													<div class="input-group mb-3">                                                        
                                                        <input class="form-control datetimepicker" type="text" id="date" name="date" value="{{ old('date') }}">                                                        
                                                        <div class="input-group-append">
                                                            <button class="btn btn-theme text-white" type="button" id="calendar_icon">
                                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
												</div>
											</div>

											<div class="row">
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4"><i class="fa fa-search"></i> Search </button>
												</div>
												<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
													<button type="reset" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4"><i class="fa fa-refresh"></i> Reset </button>
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
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-header">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-8 col-lg-7 col-xl-8">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<h4 class="card-title mb-0 ml-2 mt-2">My Records</h4>
											</div>
										</div>
										
                                        <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                            <a href="#" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
                                        </div>
                                        <div class="col-sm-6 col-md-2 col-lg-3 col-xl-2">
                                            <button class="btn btn-danger text-white ctm-border-radius btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0" onclick="deleteAll('list_entitlements_table','leaveEntitlement')"><i class="fa fa-trash"></i> Delete</button>
                                        </div>
									</div>                                    
								</div>
								
								<div class="card-body align-center">									
									<div class="table-responsive">
										<table class="table custom-table table-hover">
											<thead>
												<tr class="bg-light">
													<th class="text-center">
														<input type="checkbox" name="select_checkAll" id="select_checkAll" onclick="SelectAll('list_entitlements_table')">
													</th>
													<th>Punch in</th>													
													<th>Punch in Note</th>
													<th>Punch out</th>
													<th>Punch out Note</th>
                                                    <th>Duration</th>
												</tr>
											</thead>
											<tbody id="list_entitlements_table">

                                                @foreach ($data as $item)
                                                    <tr>
                                                        <td class="text-center">
                                                            <input type="checkbox" name="id" value="{{ $item->id }}">
                                                        </td>
                                                        <td>
                                                            <h2> {{ $item->punch_in_user_time }}</h2>
                                                        </td>
                                                        <td>
                                                            <h2>{{ $item->punch_in_note }}</h2>
                                                        </td>
                                                        <td>
                                                            <h2>{{ $item->punch_out_user_time }}</h2>
                                                        </td>
                                                        <td>
                                                            <h2>{{ $item->punch_out_note }}</h2>
                                                        </td>
                                                        <td>
                                                            <h2>{{ $item->duration }}</h2>
                                                        </td>
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
			<!--/Content-->			
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
@endsection

@push('scripts')
<script type="text/javascript">
	$('#calendar_icon').on('click', function(){
		$('#date').datetimepicker("show");
	});
</script>   
@endpush