
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
															<li class="breadcrumb-item d-inline-block active">Manage</li>
														</ol>
														<h4 class="text-dark">Manage</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
									<div class="card-body">
										<ul class="list-group">
											<li class="list-group-item text-center button-6"><a href="manage" class="text-dark">Account Roles</a></li>
											<li class="list-group-item text-center active button-5"><a class="text-white" href="manage-leadership">Leadership Roles</a></li>
										</ul>
									</div>
								</div>
							</aside>
						</div>
					
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="row">
								<div class="col-xl-6 col-lg-6 col-md-6 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">Line Manager</h4>
										</div>
										<div class="card-body">
											<p class="card-text">They can see and do everything – best not to have many with this role.</p>
											<div class="mt-2">
												<span class="avatar" data-toggle="tooltip" data-placement="top" title="Richard Wilson"><img src="img/profiles/img-10.jpg" alt="Richard Wilson" class="img-fluid"></span>
												<a href="line-manager" class="btn btn-theme button-1 ctm-border-radius text-white float-right text-white">View Permissions</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0"> Team Lead</h4>
										</div>
										<div class="card-body">
											<p class="card-text">Admin help sort stuff, but have less access to confidential information like salaries.</p>
											<div class="mt-2">
												<span class="avatar" data-toggle="tooltip" data-placement="top" title="Richard Wilson"><img src="img/profiles/img-10.jpg" alt="Richard Wilson" class="img-fluid"></span>
												<a href="team-lead" class="btn btn-theme button-1 ctm-border-radius text-white float-right text-white">View Permissions</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">Time Off Approver</h4>
										</div>
										<div class="card-body">
											<p class="card-text">They sort out your payroll and have access to everyone's salary information.</p>
											<div class="mt-2">
												<span class="avatar" data-toggle="tooltip" data-placement="top" title="Richard Wilson"><img src="img/profiles/img-10.jpg" alt="Richard Wilson" class="img-fluid"></span>
												<a href="custom-timeoff-approver" class="btn btn-theme button-1 ctm-border-radius text-white float-right text-white">View Permissions</a>
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
		
		<!-- Add Working Weeks -->
		<div class="modal fade" id="addWorkWeek">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<form>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title mb-3">Edit Working Week</h4>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Mon" class="custom-control-input" checked>
								<label class="mb-0 custom-control-label" for="Mon">Mon</label>
							</div>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Tue" class="custom-control-input" checked>
								<label class="mb-0 custom-control-label" for="Tue">Tue</label>
							</div>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Wed" class="custom-control-input" checked>
								<label class="mb-0 custom-control-label" for="Wed">Wed</label>
							</div>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Thu" class="custom-control-input" checked>
								<label class="mb-0 custom-control-label" for="Thu">Thu
								</label>
							</div>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Fri" class="custom-control-input" checked>
								<label class="mb-0 custom-control-label" for="Fri">Fri</label>
							</div>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Sat" class="custom-control-input">
								<label class="mb-0 custom-control-label" for="Sat">Sat</label>
							</div>
							<div class=" custom-control custom-checkbox mb-3 d-inline-block mr-3">
								<input type="checkbox" id="Sun" class="custom-control-input">
								<label class="mb-0 custom-control-label" for="Sun">Sun</label>
							</div>
							<br>
							<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
							<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Add Working Weeks -->
		<div class="modal fade" id="edit_timedefault">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Company Default</h4>
						<div class="form-group">
							<label>Time Off Allowance</label>
							<input type="text" class="form-control" placeholder="Name" value="25 Days">
						</div>
						<div class="form-group">
							<label>Year Start</label>
							<input type="text" class="form-control datetpicker" placeholder="Year Start" value="01-01-2019">
						</div>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
					</div>
				</div>
			</div>
		</div>
				
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dleohr\template\resources\views/manage-leadership.blade.php ENDPATH**/ ?>