
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
											<li class="list-group-item text-center button-6"><a href="settings" class="text-dark">General</a></li>
											<li class="list-group-item text-center active button-5"><a class="text-white" href="settings-timeoff">Time Off</a></li>
										</ul>
									</div>
								</div>
							</aside>
						</div>
						
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card flex-fill ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">
												Company Default <a href="javascript:void(0)" class="float-right text-primary" data-toggle="modal" data-target="#edit_timedefault"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											</h4>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-6 col-sm-6 col-6 allowance text-center">
													<p class="mb-2 btn btn-theme button-1 text-white ctm-border-radius">25 days</p>
													<p class="mb-2 h6">Allowance</p>
												</div>
												<div class="col-md-6 col-sm-6 col-6 allowance text-center">
													<p class="mb-2 btn btn-theme button-1 text-white ctm-border-radius">01 January</p>
													<p class="mb-2 h6">Year Start</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card flex-fill ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">
												<span>Working Week</span><a href="javascript:void(0)" class="float-right text-primary" data-toggle="modal" data-target="#addWorkWeek"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
											</h4>
											<span class="ctm-text-sm">Set the dates that your company works.</span>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-12">
													<span class="badge custom-badge badge-primary">Mon</span>
													<span class="badge custom-badge badge-primary">Tue</span>
													<span class="badge custom-badge badge-primary">Wed</span>
													<span class="badge custom-badge badge-primary">Thu</span>
													<span class="badge custom-badge badge-primary">Fri</span>
													<span class="badge custom-badge">Sat</span>
													<span class="badge custom-badge">Sun</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 d-flex">
									<div class="card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header">
											<h4 class="card-title mb-0">Working From Home</h4>
											<span class="mb-0 ctm-text-sm">Reflect your company's working from home policy by editing the approval process or disabling the feature entirely.</span>
										</div>
										<div class="card-body">
											<div class="card-content">
												<span class="wk-home h6">Working From Home</span>
												<div class="custom-control custom-switch float-right">
													<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
													<label class="custom-control-label" for="customSwitch1"></label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6 d-flex">
									<div class="card settings-card ctm-border-radius shadow-sm flex-fill">
										<div class="card-header w-100">
											<h4 class="card-title mb-0 d-block">Focus Technologies</h4>
										</div>
										<div class="card-body">
											<div id="company-name">
												<div class="table-responsive bg-white">
													<table class="table">
														<thead>
															<tr>
																<th>Team Member</th>
																<th>Allowance</th>
																<th>Days Used</th>
																<th>Approvers</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td><a href="employment" class="text-primary"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Maria Cotton"><img src="img/profiles/img-6.jpg" alt="Maria Cotton" class="img-fluid"></span><span>Maria Cotton</span></a></td>
																<td>25</td>
																<td>20</td>
																<td>Robert Wilson</td>
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
					</div>
				</div>
			</div>
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
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dleohr\template\resources\views/settings-timeoff.blade.php ENDPATH**/ ?>