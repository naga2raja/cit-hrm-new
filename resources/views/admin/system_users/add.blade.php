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
										<h4 class="card-title mb-0 text-left ml-3">Add System User</h4>
									</div>
								</div>
								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>User Role <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<select class="form-control select">
													    <option value='1'>Admin</option>
													    <option value='2'>ESS</option>
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Employee Name <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Username <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Status <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<input type="text" class="form-control" placeholder="">
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Password <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<input type="text" class="form-control" placeholder="">
											</div>
										</div>

										<div class="row">
											<div class="col-sm-2">
												<div class="form-group">
													<label>Confirm Password <span class="text-danger">*</span></label>
												</div>
											</div>
											<div class="col-sm-4">
												<input type="text" class="form-control" placeholder="">
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
											<div class="col-sm-2"></div>
											<div class="col-sm-4 text-center">
												<button href="javascript:void(0);" class="btn btn-success text-white ctm-border-radius">Save</button>
												<button href="javascript:void(0);" class="btn btn-danger text-white ctm-border-radius">Cancel</button>
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