@extends('layout.mainlayout')
@section('content')

			<!-- Content -->
			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
                        
                        <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
							<aside class="sidebar sidebar-user">
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body py-4">
										<div class="row">
											<div class="col-md-12 mr-auto text-left">
												<div class="custom-search input-group">
													<div class="custom-breadcrumb">
														<ol class="breadcrumb no-bg-color d-inline-block p-0 m-0 mb-2">
															<li class="breadcrumb-item d-inline-block"><a href="/" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Payroll</li>
														</ol>
														<h4 class="text-dark">Payslips List</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
                                                        <form method="GET" id="filter_form">
															<div class="row filter-row">
																<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
																	<div class="form-group">
																		<label>From Date</label>
																		<input autocomplete="off" class="form-control datetimepicker1 cal-icon-input" type="text" placeholder="From Date" name="from_date" value="{{ Request::get('from_date') }}" id="datetimepicker1">
																	</div>
																</div>
															</div>

															<div class="row filter-row">
																<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
																	<div class="form-group">
																		<label>To Date</label>
																		<input autocomplete="off" class="form-control datetimepicker2 cal-icon-input" type="text" placeholder="To Date" name="to_date" value="{{ Request::get('to_date') }}" id="datetimepicker2">
																	</div>
																</div>
															</div>															

															<div class="row filter-row">
																<div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
																	<div class="form-group">
																		<label>Employee Name</label>
																		<select class="form-control select" name="employee_id">
                                                                            <option value="">Status</option>
                                                                                @foreach($employees as $employee)
                                                                                    <option value="{{ $employee->id }}"  {{ Request::get('employee_id') == $employee->id ? 'selected' : ''}}> {{ $employee->name }}</option>
                                                                                @endforeach																
                                                                        </select>
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">													
																	<button type="submit" class="mt-1 btn btn-theme button-1 text-white ctm-border-radius btn-block mt-4" name="search"><span class="fa fa-search"></span> Search</button>													
																</div>
																<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
																	<button type="button" class="mt-1 btn btn-danger text-white ctm-border-radius btn-block mt-4" onclick="resetAllValues('filter_form')"><i class="fa fa-refresh"></i> Reset </button>
																</div>
															</div>
                                                        </form>                                                   

									</div>
								</div>
								
							</aside>
						</div>
						

						
						<div class="col-xl-9 col-lg-8  col-md-12">

							<div class="row">                                
                                
								<div class="col-md-12">
                                    @if($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{$message}}</p>
                                        </div>
                                    @endif
                                    
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
                                            <div class="row filter-row">
                                                <div class="col-sm-6 col-md-10 col-lg-9 col-xl-10">  
                                                    <div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
                                                        <h4 class="card-title mb-0">Payslips List</h4>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
                                                    <a href="{{ route('payslips.create') }}" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"><i class="fa fa-plus"></i> Add</a>
                                                </div>
                                                
                                            </div>

											
										</div>
										<div class="card-body align-center">
											<div class="">
												<div class="table-responsive ">
													<table class="table custom-table table-hover">
														<thead>
															<tr class="bg-light">
                                                                <th>Employee Name</th>
																<th>Month Year</th>
																<th>Document</th>
																<th>Created At</th>
																<th class="text-right">Action</th>
															</tr>
														</thead>
														<tbody>

                                                            
                                                        @if($data->first()) 
                                                            @foreach ($data as $payslip)
                                                                <tr>
                                                                    <td> {{ $payslip->employee_id }} </td>  
                                                                    <td> {{ $payslip->pay_month }}</td>
                                                                    <td> {{ $payslip->pay_slip_pdf }}</td>
                                                                    <td> {{ $leave->created_at }}</td>  
                                                                    <td> 
                                                                        
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @else                                                        
                                                                <tr>
                                                                    <td colspan="100%">
                                                                        <div class="alert alert-danger"> No data found!</div>
                                                                    </td>
                                                                </tr>
                                                        @endif

                                                            <tr>
                                                                <td colspan="100%">
                                                                    <div class="d-flex justify-content-center">
                                                                        {{ $data->links() }}
                                                                    </div>
                                                                </td>
                                                            </tr>
															
															
														</tbody>
													</table>
                                                    <button type="button" class="btn btn-theme button-1 text-white pull-right p-2" style="display: none;" id="approve_action" data-toggle="modal" data-target="#delete">Save</button>
												</div>
											</div>
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
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
        
        <style>
            td .select2-container { width: 150px !important;}
        </style>
        
@endsection
        
@section('my-scripts')
	<script>
        $('#datetimepicker1').datetimepicker({
            date: '{{ (@Request::get("from_date")) }}',
            format: "YYYY-MM-DD",
            icons: {
                up: "fa fa-angle-up",
                down: "fa fa-angle-down",
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'
            }
        });

        $('.datetimepicker2').datetimepicker({
            date: '{{ (@Request::get("to_date")) }}',
            format: "YYYY-MM-DD", 
            icons: {
                up: "fa fa-angle-up",
                down: "fa fa-angle-down",
                next: 'fa fa-angle-right',
                previous: 'fa fa-angle-left'
            }
        });
	</script>
@endsection