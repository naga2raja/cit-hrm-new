
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
															<li class="breadcrumb-item d-inline-block active">Employees</li>
														</ol>
														<h4 class="text-dark">Employees</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
									<div class="card-body">
										<ul class="list-group">
											<li class="list-group-item text-center active button-5"><a href="employees" class="text-white">All</a></li>
											<li class="list-group-item text-center button-6"><a class="text-dark" href="employees-team">Teams</a></li>
											<li class="list-group-item text-center button-6"><a class="text-dark" href="employees-offices">Offices</a></li>
										</ul>
									</div>
								</div>
							</aside>
						</div>
					
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">7 People</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
										<li class="nav-item">
											<a class="nav-link border-0 font-23 grid-view" href="employees"><i class="fa fa-th-large" aria-hidden="true"></i></a>
										</li>
										<li class="nav-item">
											<a class="nav-link border-0 font-23 active list-view" href="employees-list"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
										</li>
										<li class="nav-item pl-3">
											<a href="add-employee" class="btn btn-theme button-1 text-white ctm-border-radius p-2 add-person ctm-btn-padding"><i class="fa fa-plus"></i> Add Person</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="ctm-border-radius shadow-sm card">
								<div class="card-body">
								
									<!--Content table-->
									<div class="table-back employee-office-table">
										<div class="table-responsive">
											<table class="table custom-table table-hover table-hover">
												<thead>
													<tr>
														<th>Name</th>
														<th>Line Manager</th>
														<th>Team</th>
														<th>Office</th>
														<th>Permissions</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<a href="employment" class="avatar"><img alt="avatar image" src="img/profiles/img-5.jpg" class="img-fluid"></a>
															<h2><a href="employment">Danny Ward</a></h2>
														</td>
														<td><a class="btn btn-outline-success btn-sm"> Richard Wilson  </a></td>
														<td><a class="btn btn-outline-warning btn-sm"> Design </a></td>
														<td>Focus Technologies</td>
														<td>Team Lead</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown"> Active <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Invited</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img src="img/profiles/img-4.jpg" alt="Linda Craver" class="img-fluid"></a>
															<h2><a href="employment">Linda Craver</a></h2>
														</td>
														<td><a class="btn  btn-outline-success btn-sm"> Richard Wilson </a></td>
														<td><a class="btn btn-outline-warning btn-sm"> IOS </a></td>
														<td>Focus Technologies</td>
														<td>Team Lead</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a  href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Invite <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Invited</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img src="img/profiles/img-3.jpg" alt="Jenni Sims" class="img-fluid"></a>
															<h2><a href="employment">Jenni Sims</a></h2>
														</td>
														<td><a class="btn  btn-outline-success btn-sm"> Richard Wilson </a></td>
														<td><a class="btn btn-outline-warning btn-sm"> Android </a></td>
														<td>Focus Technologies</td>
														<td>Team Lead</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a  href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Invite <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Invited</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img src="img/profiles/img-8.jpg" alt="Jenni Sims" class="img-fluid"></a>
															<h2><a href="employment">Stacey Linville</a></h2>
														</td>
														<td><a class="btn  btn-outline-success btn-sm"> Richard Wilson </a></td>
														<td><a class="btn btn-outline-warning btn-sm"> Testing </a></td>
														<td>Focus Technologies</td>
														<td>Team Lead</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a  href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Invite <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Invited</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img alt="avatar image" src="img/profiles/img-6.jpg" class="img-fluid"></a>
															<h2><a href="employment">Maria Cotton</a></h2>
														</td>
														<td><a class="btn  btn-outline-success btn-sm"> Richard Wilson </a></td>
														<td><a class="btn btn-outline-warning btn-sm"> PHP</a></td>
														<td>Focus Technologies</td>
														<td>Team Lead</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a  href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Active <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Invited</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img class="img-fluid" src="img/profiles/img-2.jpg" alt="John Gibbs"></a>
															<h2><a href="employment">John Gibbs</a></h2>
														</td>
														<td><a class="btn  btn-outline-success btn-sm"> Richard Wilson </a></td>
														<td><a class="btn btn-outline-warning btn-sm"> Business </a></td>
														<td>Focus Technologies</td>
														<td>Team Lead</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a  href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Invited</a>
																</div>
															</div>
														</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img src="img/profiles/img-10.jpg" alt="Richard Wilson" class="img-fluid"></a>
															<h2><a href="employment">Richard Wilson</a></h2>
														</td>
														<td><a class="btn btn-outline-danger btn-sm"> No </a></td>
														<td><a class="btn btn-outline-warning btn-sm"> Operation Manager </a></td>
														<td>Focus Technologies</td>
														<td>Super Admin</td>
														<td>
															<div class="dropdown action-label drop-active">
																<a  href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Active <i class="caret"></i></a>
																<div class="dropdown-menu">
																	<a class="dropdown-item" href="javascript:void(0)"> Active</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Inactive</a>
																	<a class="dropdown-item" href="javascript:void(0)"> Invited</a>
																</div>
															</div>
														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<!-- /Content Table -->
									
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
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dleohr\template\resources\views/employees-list.blade.php ENDPATH**/ ?>