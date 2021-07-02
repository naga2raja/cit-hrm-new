
<?php $__env->startSection('content'); ?>
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
															<li class="breadcrumb-item d-inline-block"><a href="index" class="text-dark">Home</a></li>
															<li class="breadcrumb-item d-inline-block active">Profile</li>
														</ol>
														<h4 class="text-dark">Profile</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="user-card shadow-sm bg-white p-4 text-center ctm-border-radius card">
									<div class="user-info">
										<div class="user-avatar mb-4">
											<img src="img/profiles/img-6.jpg" alt="User Avatar" class="img-fluid rounded-circle" width="100">
										</div>
										<div class="user-details">
											<h4><b>Welcome Maria</b></h4>
											<span class="ctm-text-sm">mariacotton@example.com</span>
										</div>
									</div>
								</div>
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white p-4 mb-4 card">
									<ul class="list-group">
										<li class="list-group-item text-center button-6"><a href="employment" class="text-dark">Employement</a></li>
										<li class="list-group-item text-center button-6"><a href="details" class="text-dark">Detail</a></li>
										<li class="list-group-item text-center button-6"><a href="documents" class="text-dark">Document</a></li>
										<li class="list-group-item text-center button-5 active"><a href="payroll" class="text-white">Payroll</a></li>
										<li class="list-group-item text-center button-6"><a href="time-off" class="text-dark">Timeoff</a></li>
										<li class="list-group-item text-center button-6"><a href="profile-reviews" class="text-dark">Reviews</a></li>
										<li class="list-group-item text-center button-6"><a class="text-dark" href="profile-settings">Settings</a></li>
									</ul>
								</div>
							</aside>
						</div>
				
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="row">
								<div class="col-xl-6 col-lg-12 col-md-6 col-12 d-flex">
									<div class="card flex-fill ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Payroll Details</h4>
										</div>
										<div class="card-body">
											<div class="input-group mb-3">
												<input type="text" class="form-control" placeholder="Add Bank Name">
												<div class="input-group-append">
													<button class="btn btn-theme ctm-border-radius text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
												</div>
											</div>
											<div class="input-group mb-3">
												<input type="text" class="form-control" placeholder="Add Bank Account Number">
												<div class="input-group-append">
													<button class="btn btn-theme ctm-border-radius text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
												</div>
											</div>
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Add Bank Sort Code">
												<div class="input-group-append">
													<button class="btn btn-theme ctm-border-radius text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-12 col-md-6 col-12 d-flex">
									<div class="card flex-fill ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">Payroll Details</h4>
										</div>
										<div class="card-body text-center">
											<p class="card-text mb-3"><span class="text-primary">Bank Name : </span>Life Essence Banks, Inc.</p>
											<p class="card-text mb-3"><span class="text-primary">Bank Account Number : </span>112300987652</p>
											<p class="card-text mb-3"><span class="text-primary">Bank Sort Code : </span>LE00652</p>
											<a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm" data-toggle="modal" data-target="#add_payroll"><i class="fa fa-plus" aria-hidden="true"></i></a>
											<a href="javascript:void(0)" class="btn btn-theme ctm-border-radius text-white btn-sm" data-toggle="modal" data-target="#edit_payroll"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-12 d-flex">
									<div class="upload-doc mb-0 flex-fill">
										<div class="card ctm-border-radius shadow-sm">
											<div class="card-header">
												<h4 class="card-title mb-0">P45</h4>
											</div>
											<div class="card-body">
												<div class="row">
													<div class="col-12">
														<div class="document-up">
															<a href="javascript:void(0)" data-toggle="modal" data-target="#upload-document"><i class="mr-2 text-primary fa fa-file-pdf-o" aria-hidden="true"></i>Upload P45 <span class="float-right text-primary">Edit</span></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 col-12 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill office-card-last">
										<div class="card-header">
											<h4 class="card-title mb-0">Salary</h4>
										</div>
										<div class="card-body">
											<div class="input-group mb-0">
												<input type="text" class="form-control" placeholder="Current Salary">
												<div class="input-group-append">
													<button class="btn btn-theme text-white" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
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
		
		<!-- New Team The Modal -->
		<div class="modal fade" id="upload-document">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Edit P45</h4>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="text" placeholder="P45">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="text" placeholder="Document Description ( optional )">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="file">
							</div>
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius ml-3 float-right" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Save Document</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Add Payroll The Modal -->
		<div class="modal fade" id="add_payroll">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Add Payroll</h4>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Add Bank Name">
							<div class="input-group-append">
								<button class="btn btn-theme button-1 text-white ctm-border-radius" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Add Bank Account Number">
							<div class="input-group-append">
								<button class="btn btn-theme button-1 text-white ctm-border-radius" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Add Bank Sort Code">
							<div class="input-group-append">
								<button class="btn btn-theme button-1 text-white ctm-border-radius" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Save</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Add Payroll The Modal -->
		<div class="modal fade" id="edit_payroll">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Edit Payroll</h4>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Add Bank Name" Value=" Life Essence Banks, Inc.">
							<div class="input-group-append">
								<button class="btn btn-theme button-1 text-white ctm-border-radius" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Add Bank Account Number" value="112300987652">
							<div class="input-group-append">
								<button class="btn btn-theme button-1 text-white ctm-border-radius" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Add Bank Sort Code" value="LE00652">
							<div class="input-group-append">
								<button class="btn btn-theme button-1 text-white ctm-border-radius" type="button"><i class="fa fa-pencil" aria-hidden="true"></i></button>
							</div>
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Save</button>
					</div>
				</div>
			</div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dleohr\template\resources\views/payroll.blade.php ENDPATH**/ ?>