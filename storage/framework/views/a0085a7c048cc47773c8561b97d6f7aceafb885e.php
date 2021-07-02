
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
											<li class="list-group-item text-center button-6"><a href="employees" class="text-dark">All</a></li>
											<li class="list-group-item text-center button-6"><a class="text-dark" href="employees-team">Teams</a></li>
											<li class="list-group-item text-center active button-5"><a class="text-white" href="employees-offices">Offices</a></li>
										</ul>
									</div>
								</div>
							</aside>
						</div>
						
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">1 Office</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
										<li class="nav-item">
											<a class="nav-link border-0 font-23 active grid-view" href="employees-offices"><i class="fa fa-th-large" aria-hidden="true"></i></a>
										</li>
										<li class="nav-item">
											<a class="nav-link border-0 font-23 list-view" href="employees-offices-list"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
										</li>
										<li class="nav-item pl-3">
											<a href="javascript:void(0)" class="btn btn-theme button-1 ctm-border-radius p-2 text-white float-right" data-toggle="modal" data-target="#addOffice"><i class="fa fa-plus"></i> Add Office</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
											<h4 class="card-title mb-0">
												Create New Office
											</h4>
										</div>
										<div class="card-body">
											<div class="form-group">
												<div class="input-group mb-3">
													<input class="form-control date-enter" type="text" placeholder="Name">
												</div>
											</div>
											<button type="button" class="btn btn-danger ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
											<button type="button" class="btn btn-theme button-1 text-white float-right ctm-border-radius">Create Office</button>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="card ctm-border-radius shadow-sm">
										<div class="card-header">
											<div class="d-inline-block">
												<h4 class="card-title mb-0">Focus Technologies</h4>
												<p class="mb-0 ctm-text-sm">Head Office</p>
											</div>
											<div class="d-inline-block float-right" data-toggle="modal" data-target="#editOffice">
												<a href="javascript:void(0)" class="btn btn-theme mt-2 text-white float-right ctm-border-radius" title="Edit"><i class="fa fa-pencil"></i>	</a>
											</div>
										</div>
										<div class="card-body">
											<h4 class="card-title">Members</h4>
											<a href="employment"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Danny Ward"><img alt="avatar image" src="img/profiles/img-5.jpg" class="img-fluid"></span></a>
											<a href="employment"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Linda Craver"><img class="img-fluid" alt="avatar image" src="img/profiles/img-4.jpg"></span></a>
											<a href="employment"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Jenni Sims"><img class="img-fluid" alt="avatar image" src="img/profiles/img-3.jpg"></span></a>
											<a href="employment"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Maria Cotton"><img alt="avatar image" src="img/profiles/img-6.jpg" class="img-fluid"></span></a>
											<a href="employment"><span class="avatar" data-toggle="tooltip" data-placement="top" title="John Gibbs"><img class="img-fluid" alt="avatar image" src="img/profiles/img-2.jpg"></span></a>
											<a href="employment"><span class="avatar" data-toggle="tooltip" data-placement="top" title="Richard Wilson"><img class="img-fluid" alt="avatar image" src="img/profiles/img-10.jpg"></span></a>
											<button type="button" class="btn btn-theme float-right ctm-border-radius text-white coll-arrow" data-toggle="collapse" data-target="#visit"></button>
											<a target="_blank" href="" class="btn btn-theme float-right mx-2 d-none"> Visit</a>
											<div id="visit" class="collapse show">
												<div class="row d-block">
													<div class="col-md-12">
														<div class="table-back mt-4 employee-office-table">
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
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
		
		<!--  add office The Modal -->
		<div class="modal fade" id="addOffice">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create a New Office</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Name">
						</div>
						<button type="button" class="btn btn-danger float-right ctm-border-radius ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme button-1 ctm-border-radius text-white float-right">Add</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="editOffice">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Edit Office</h4>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Office Name">
						</div>
						<button type="button" class="btn btn-danger float-right ctm-border-radius ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme button-1 ctm-border-radius text-white float-right">Save</button>
					</div>
				</div>
			</div>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dleohr\template\resources\views/employees-offices.blade.php ENDPATH**/ ?>