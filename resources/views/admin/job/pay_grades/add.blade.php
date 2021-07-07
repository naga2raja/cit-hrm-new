@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left">
										<h4 class="card-title mb-0">Add Pay Grade</h4>
									</div>
								</div>
								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-sm-1">
												<div class="form-group">
													<label>Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
												</div>
											</div>
										</div>
										<hr>

										<div class="row">
											<div class="col-sm-2 text-center">
												<button href="javascript:void(0);" class="btn btn-success text-white ctm-border-radius">Save</button>
												<a href="{{ route('payGrades.index') }}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Currency Add -->
				<div class="container-fluid" id="currency_div" style="display: none">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left">
										<h4 class="card-title mb-0">Add Currency</h4> 
									</div>
								</div>
								<div class="card-body">
									<form method="post" action="{{ route('currency.store') }}">
										<div class="row">
											<div class="col-sm-2 leave-col">
												<div class="form-group">
													<label>Currency <span class="text-danger">*</span></label>
													<input type="text" class="form-control" placeholder="">
												</div>
											</div>

											<div class="col-sm-2 leave-col">
												<div class="form-group">
													<label>Minimum Salary</label>
													<input type="text" class="form-control" placeholder="">
												</div>
											</div>

											<div class="col-sm-2 leave-col">
												<div class="form-group">
													<label>Maximum Salary</label>
													<input type="text" class="form-control" placeholder="">
												</div>
											</div>

											<div class="col-sm-2 leave-col">
												<div class="form-group">
													<label>.</label><br>
													<button href="javascript:void(0);" class="btn btn-success text-white ctm-border-radius">Save</button>
													<a id="currency_hide" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label class="ctm-text-sm"><span class="text-danger">*</span> Required field</label>
												</div>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Currency Add -->

				<!-- Currency List -->
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left">
										<h4 class="card-title mb-0">Assigned Currencies</h4>
										<hr>
										<a id="currency_show" class="btn btn-success text-white ctm-border-radius"><span class="fa fa-plus"></span> Add</a>
										<a href="javascript:void(0);" class="btn btn-danger text-white ctm-border-radius"><span class="fa fa-trash"></span> Delete</a>
									</div>
								</div>
								<div class="card-body">
									<div class="employee-office-table">
										<div class="table-responsive">
											@if($message = Session::get('success'))
												<div class="alert alert-success">
													<p>{{$message}}</p>
												</div>
											@endif
											<table class="table custom-table mb-0 table-hover table-striped table-bordered">
												<thead>
													<tr class="bg-blue-header text-white">
														<th class="text-center">
															<input type="checkbox" name="">
														</th>
														<th>Currency</th>
														<th>Minimum Salary</th>
														<th>Maximum Salary</th>
													</tr>
												</thead>
												<tbody>
														<tr>
															<td class="text-center">
																<input type="checkbox" name="pay_grades_id" value="">
															</td>
															<td>
																<h2><u><a href=""></a></u></h2>
															</td>
															<td></td>
															<td></td>
														</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Currency List -->
			</div>
			<!--/Content-->
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		<!-- script -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="text/javascript" src="{{ URL::asset('js/currency.js') }}"></script>
		
@endsection