
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
										<li class="list-group-item text-center button-5 active"><a href="documents" class="text-white">Document</a></li>
										<li class="list-group-item text-center button-6"><a href="payroll" class="text-dark">Payroll</a></li>
										<li class="list-group-item text-center button-6"><a href="time-off" class="text-dark">Timeoff</a></li>
										<li class="list-group-item text-center button-6"><a href="profile-reviews" class="text-dark">Reviews</a></li>
										<li class="list-group-item text-center button-6"><a class="text-dark" href="profile-settings">Settings</a></li>
									</ul>
								</div>
							</aside>
						</div>
						
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm">
								<div class="card-header">
									<h4 class="card-title doc d-inline-block mb-0">Documents</h4>
									<a href="javascript:void(0)" class="float-right doc-fold text-primary d-inline-block text-info" data-toggle="modal" data-target="#add-document">Add Document</a>
								</div>
								<div class="card-body doc-boby">
									<div class="card shadow-none">
										<div class="card-header">
											<h5 class="card-title text-primary mb-0">Passport</h5>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="document-up">
														<a href="javascript:void(0)"><i class="mr-2 text-primary fa fa-file-pdf-o" aria-hidden="true"></i> Passport.pdf <span class="float-right text-primary" data-toggle="modal" data-target="#upload-document">Edit</span></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card shadow-none">
										<div class="card-header">
											<h5 class="card-title text-primary mb-0">P45</h5>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="document-up">
														<a href="javascript:void(0)"><i class="mr-2 text-primary fa fa-file-pdf-o" aria-hidden="true"></i> P45.pdf<span class="float-right text-primary" data-toggle="modal" data-target="#upload-p45">Edit</span></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card shadow-none">
										<div class="card-header">
											<h5 class=" text-primary card-title mb-0">Visa</h5>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<div class="document-up">
														<a href="javascript:void(0)"><i class="mr-2 text-primary fa fa-file-pdf-o" aria-hidden="true"></i> Visa.pdf<span  data-toggle="modal" data-target="#upload-visa" class="float-right text-primary">Edit</span></a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="add-doc text-center">
										<a href="javascript:void(0)" data-toggle="modal" data-target="#add-document" class="btn btn-theme  button-1 ctm-border-radius text-white text-center">Add New Document</a>
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
				
		<!-- Add a Key Date Modal-->
		<div class="modal fade" id="add-document">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Add Document</h4>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="text" placeholder="Document Description">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="file">
							</div>
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme  button-1 text-white ctm-border-radius float-right">Add Document</button>
					</div>
				</div>
			</div>
		</div>
		
		<!-- New Team The Modal -->
		<div class="modal fade" id="upload-document">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Edit Passport</h4>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="text" placeholder="Passport">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="text" placeholder="Document Description ( optional )" value="Passport">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="file">
							</div>
						</div>
						<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme  button-1 text-white ctm-border-radius float-right">Save Document</button>
					</div>
				</div>
			</div>
		</div>
	
		
		<!--visa The Modal -->
		<div class="modal fade" id="upload-visa">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Edit visa</h4>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="text" placeholder="Visa">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="text" placeholder="Document Description ( optional )" value="Visa">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="file">
							</div>
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme  button-1 text-white ctm-border-radius float-right">Save Document</button>
					</div>
				</div>
			</div>
		</div>
		
		<!--P45 The Modal -->
		<div class="modal fade" id="upload-p45">
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
								<input class="form-control date-enter" type="text" placeholder="Document Description ( optional )" value="P45">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group mb-3">
								<input class="form-control date-enter" type="file">
							</div>
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme  button-1 text-white ctm-border-radius float-right">Save Document</button>
					</div>
				</div>
			</div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dleohr\template\resources\views/documents.blade.php ENDPATH**/ ?>