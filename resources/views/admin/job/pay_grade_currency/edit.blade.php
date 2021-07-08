@extends('layout.mainlayout')
@section('content')
<!-- Content -->

			<div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">					
						<div class="col-xl-12 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm border">
								<div class="card-header">
									<div class="text-left ml-2">
										<h4 class="card-title mb-0">Add Currency</h4> 
									</div>
								</div>
								<div class="card-body">
									<form method="post" action="{{ route('payGradeCurrency.store') }}">
										@csrf
										<div class="row">
											<div class="col-sm-2 leave-col">
												<div class="form-group">
													<label>Currency <span class="text-danger">*</span></label>
													<input type="text" name="currency" class="form-control" placeholder="">
													<input type="hidden" name="currency_id" class="form-control" placeholder="">
													<input type="hidden" name="grade_id" class="form-control" value="">
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
													<a href="{{ route('payGradeCurrency.index') }}" class="btn btn-danger text-white ctm-border-radius">Cancel</a>
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
			</div>
			<!--/Content-->
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
@endsection