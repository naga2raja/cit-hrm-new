
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
															<li class="breadcrumb-item d-inline-block active">Settings</li>
														</ol>
														<h4 class="text-dark">Settings</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
									<div class="card-body">
										<ul class="list-group">
											<li class="list-group-item text-center active button-5"><a href="settings" class="text-white">General</a></li>
											<li class="list-group-item text-center button-6"><a class="text-dark" href="settings-timeoff">Time Off</a></li>
										</ul>
									</div>
								</div>
							</aside>
						</div>
					
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card ctm-border-radius shadow-sm company-logo flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">Company Logo</h4>
										</div>
										<div class="card-body">
											<form>
												<div class="row">
													<div class="col-12">
														<div class="avatar-upload">
															<div class="avatar-edit">
																<input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
																<label for="imageUpload"></label>
															</div>
															<div class="avatar-preview">
																<div id="imagePreview">
																</div>
															</div>
														</div>
													</div>
													
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">
												Your Company
											</h4>
										</div>
										<div class="card-body">
											<form>
												<div class="form-group">
													<label>Company Name</label>
													<input type="text" class="form-control">
												</div>
												<div class="form-group">
													<label>Company Url</label>
													<input type="text" class="form-control">
												</div>
												<div class="text-center">
													<a href="javascript:void(0)" class="btn btn-theme button-1 ctm-border-radius text-white">Save Changes</a>
												</div>
											</form>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dleohr\template\resources\views/settings.blade.php ENDPATH**/ ?>