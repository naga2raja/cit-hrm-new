
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
															<li class="breadcrumb-item d-inline-block active">Reports</li>
														</ol>
														<h4 class="text-dark">Reports</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-body">
										<a href="javascript:void(0)" class="btn btn-theme button-1 ctm-border-radius text-white btn-block" data-toggle="modal" data-target="#add_report"><span><i class="fe fe-plus"></i></span> Create Reports</a>
									</div>
								</div>
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
									<div class="card-body">
										<ul class="list-group">
											<li class="list-group-item text-center"><a href="reports" class="text-dark">Team Reports</a></li>
											<li class="list-group-item text-center"><a class="text-dark" href="leave-reports">Leave Reports</a></li>
											<li class="list-group-item text-center"><a class="text-dark" href="payroll-reports">Payroll Reports</a></li>
											<li class="list-group-item text-center"><a class="text-dark" href="contact-reports">Contact Reports</a></li>
											<li class="list-group-item text-center"><a class="text-dark" href="email-reports">Email Reports</a></li>
											<li class="list-group-item text-center active"><a class="text-white" href="security-reports">Security Reports</a></li>
											<li class="list-group-item text-center"><a class="text-dark" href="work-from-home-reports">Working From Home Reports</a></li>
										</ul>
									</div>
								</div>
							</aside>
						</div>
				
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<div class="row filter-row">
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3"> 
											<div class="form-group mb-xl-0 mb-md-2 mb-sm-2">
												<select class="form-control select">
													<option selected>Start Date</option>
													<option>Date Of Birth</option>
													<option>Created At</option>
													<option>Leaving Date</option>
													<option>Visa Expiry Date</option>
												</select>
												
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">  
											<div class="form-group mb-lg-0 mb-md-2 mb-sm-2">
												<input type="text" class="form-control datetimepicker" placeholder="From">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">  
											<div class="form-group mb-lg-0 mb-md-0 mb-sm-0">
												<input type="text" class="form-control datetimepicker" placeholder="To">
											</div>
										</div>
										
										<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">  
											<a href="#" class="btn btn-theme button-1 text-white btn-block p-2 mb-md-0 mb-sm-0 mb-lg-0 mb-0"> Apply Filter </a>  
										</div>
									</div>
								</div>
							</div>
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<div class="employee-office-table">
										<div class="table-responsive">
											<table class="table custom-table table-hover">
												<thead>
													<tr>
														<th>Team Member</th>
														<th>Email</th>
														<th>Job Title</th>
														<th>Team Name</th>
														<th>Office</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<a href="employment" class="avatar"><img alt="avatar image" src="img/profiles/img-5.jpg" class="img-fluid"></a>
															<h2><a href="employment">Danny Ward</a></h2>
														</td>
														<td>danyward@example.com</td>
														<td>Design Team Lead</td>
														<td><span class="btn btn-outline-warning text-dark btn-sm">Design</span></td>
														<td>Focus Technology</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img class="img-fluid" alt="avatar image" src="img/profiles/img-4.jpg"></a>
															<h2><a href="employment"> Linda Craver</a></h2>
														</td>
														<td>lindacraver@example.com</td>
														<td>IOS Team Lead</td>
														<td><span class="btn btn-outline-warning text-dark btn-sm">IOS </span></td>
														<td>Focus Technology</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img class="img-fluid" alt="avatar image" src="img/profiles/img-3.jpg"></a>
															<h2><a href="employment">Jenni Sims</a></h2>
														</td>
														
														<td>jennisims@example.com</td>
														<td>Android Team Lead</td>
														<td><span class="btn btn-outline-warning text-dark btn-sm">Android </span></td>
														<td>Focus Technology</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img alt="avatar image" src="img/profiles/img-6.jpg" class="img-fluid"></a>
															<h2><a href="employment"> Maria Cotton</a></h2>
														</td>
														
														<td>mariacotton@example.com</td>
														<td>PHP Team Lead</td>
														<td><span class="btn btn-outline-warning text-dark btn-sm">PHP </span></td>
														<td>Focus Technology</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img class="img-fluid" alt="avatar image" src="img/profiles/img-2.jpg"></a>
															<h2><a href="employment"> John Gibbs</a></h2>
														</td>
														
														<td>johndrysdale@example.com</td>
														<td>Business Team Lead </td>
														<td><span class="btn btn-outline-warning text-dark btn-sm">Business </span></td>
														<td>Focus Technology</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img class="img-fluid" alt="avatar image" src="img/profiles/img-10.jpg"></a>
															<h2><a href="employment"> Richard Wilson</a></h2>
														</td>
														
														<td>richardwilson@example.com</td>
														<td>Operation Manager</td>
														<td><span class="btn btn-outline-warning text-dark btn-sm">Operation Manager</span></td>
														<td>Focus Technology</td>
													</tr>
													<tr>
														<td>
															<a href="employment" class="avatar"><img class="img-fluid" alt="avatar image" src="img/profiles/img-8.jpg"></a>
															<h2><a href="employment">Stacey Linville</a></h2>
														</td>
														
														<td>staceylinville@example.com</td>
														<td>Testing Team Lead</td>
														<td><span class="btn btn-outline-warning text-dark btn-sm">Testing </span></td>
														<td>Focus Technology</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div class="text-center mt-3">
										<a href="javascript:void(0)" class="btn btn-theme button-1 ctm-border-radius text-white">Download Report</a>
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

	
		<!-- Create Reports The Modal -->
		<div class="modal fade" id="add_report">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<!-- Modal body -->
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title mb-3">Create Report</h4>
						<form>
							<p class="mb-2">Select Report Type</p>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio">Team Member</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" class="custom-control-input" id="customRadio2" name="example" value="customEx">
								<label class="custom-control-label" for="customRadio2">Time Off</label>
							</div>
							
							<div class="form-group">
								<label class="mt-3">What data would you like to include?</label>
								<!-- Multiselect dropdown -->
								<select multiple class="select w-100 form-control">
									<option>Full Name</option>
									<option>Working Days Off</option>
									<option>Booked By</option>
									<option>Start Date</option>
									<option>End Date</option>
									<option>Team Name</option>
									<option>First Name</option>
									<option>Last Name</option>
									<option>Email</option>
									<option>Date Of Birth</option>
									<option>Phone Number</option>
								</select><!-- End -->
							</div>
						</form>
						<button type="button" class="btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
						<button type="button" class="btn btn-theme button-1 text-white ctm-border-radius float-right">Add</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dleohr\template\resources\views/security-reports.blade.php ENDPATH**/ ?>