
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
														<h4 class="text-dark">Add Person</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-header">
										<h4 class="card-title mb-0">Details Content</h4>
									</div>
									<div class="card-body">
										<div id="list-example" class="list-group border-none">
											<a class="list-group-item list-group-item-action border-none" href="javascript:void(0)">Basic</a>
											<a class="list-group-item list-group-item-action border-none" href="javascript:void(0)">Employment</a>
											<a class="list-group-item list-group-item-action border-none" href="javascript:void(0)">Teams & Offices</a>
											<a class="list-group-item list-group-item-action border-none" href="javascript:void(0)">Salary</a>
										</div>
									</div>
								</div>
							</aside>
						</div>
						
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="accordion add-employee" id="accordion-details">
								<div class="card shadow-sm ctm-border-radius">
									<div class="card-header" id="basic1">
										<h4 class="cursor-pointer mb-0">
											<a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#basic-one" aria-expanded="true">
												Basic Details
											<br><span class="ctm-text-sm">Organized and secure.</span>
											</a>
										</h4>
									</div>
									<div class="card-body p-0">
										<div id="basic-one" class="collapse show ctm-padding" aria-labelledby="basic1" data-parent="#accordion-details">
											<form>
												<div class="row">
													<div class="col form-group">
														<input type="text" class="form-control" placeholder="First Name">
													</div>
													<div class="col form-group">
														<input type="text" class="form-control" placeholder="Last Name">
													</div>
													<div class="col-12 form-group">
														<input type="email" class="form-control" placeholder="Email">
													</div>
													<div class="col-md-12">
														<div class=" custom-control custom-checkbox mb-0">
															<input type="checkbox" id="send-email" name="send-email" class="custom-control-input">
															<label class="mb-0 custom-control-label" for="send-email">Send them an invite email so they can log in immediately</label>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="card shadow-sm ctm-border-radius">
									<div class="card-header" id="headingTwo">
										<h4 class="cursor-pointer mb-0">
											<a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#employee-det">
												Employment Details
											<br><span class="ctm-text-sm">Let everyone know the essentials so they're fully prepared.</span>
											</a>
										</h4>
									</div>
									<div class="card-body p-0">
										<div id="employee-det" class="collapse show ctm-padding" aria-labelledby="headingTwo" data-parent="#accordion-details">
											<form>
												<div class="row">
													<div class="col-md-12 form-group">
														<select class="form-control select">
															<option selected>Country of Employment </option>
															<option value="1">country1</option>
															<option value="2">country2</option>
															<option value="3">country3</option>
														</select>
													</div>
													<div class="col-md-12 form-group">
														<div class="cal-icon">
															<input class="form-control datetimepicker cal-icon-input" type="text" placeholder="Start Date">
														</div>
													</div>
													<div class="col-12 form-group">
														<input type="text" class="form-control" placeholder="Job Title">
													</div>
													<div class="col-12 form-group mb-0">
														<p class="mb-2">Employment Type</p>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input" id="Permanent" name="Permanent" checked>
															<label class="custom-control-label" for="Permanent">Permanent</label>
														</div>
														<div class="custom-control custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input" id="Freelancer" name="Permanent">
															<label class="custom-control-label" for="Freelancer">Freelancer</label>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<div class="card shadow-sm ctm-border-radius">
									<div class="card-header" id="headingThree">
										<h4 class="cursor-pointer mb-0">
											<a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#term-office">
											Teams and Offices
											<br><span class="ctm-text-sm">Keep things tidy — and save time setting approvers and public holidays.</span>
											</a>
										</h4>
									</div>
									<div class="card-body p-0">
										<div id="term-office" class="collapse show ctm-padding" aria-labelledby="headingThree" data-parent="#accordion-details">
											<div class="row">
												<div class="col-md-12 form-group">
													<select class="form-control select">
														<option selected>Teams </option>
														<option value="1">PHP</option>
														<option value="2">Android</option>
														<option value="3">Testing</option>
														<option value="3">Designing</option>
														<option value="3">IOS</option>
														<option value="3">Business</option>
													</select>
												</div>
												<div class="col-md-12 form-group">
													<select class="form-control select">
														<option selected>Line Manager</option>
														<option value="1">Robert Wilson</option>
														<option value="2">Maria Cotton</option>
														<option value="3">Danny Ward</option>
														<option value="4">Linda Craver</option>
														<option value="5">Jenni Sims</option>
														<option value="6">John Gibbs</option>
														<option value="7">Stacey Linville</option>
													</select>
												</div>
												<div class="col-12 form-group mb-0">
													<select class="form-control select">
														<option selected>Office Name</option>
														<option value="1">Focus Technology</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card shadow-sm ctm-border-radius">
									<div class="card-header" id="headingFour">
										<h4 class="cursor-pointer mb-0">
											<a class="coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#salary_det">
											Salary Details
											<br><span class="ctm-text-sm">Stored securely, only visible to Super Admins, Payroll Admins, and themselves.</span>
											</a>
										</h4>
									</div>
									<div class="card-body p-0">
										<div id="salary_det" class="collapse show ctm-padding" aria-labelledby="headingFour" data-parent="#accordion-details">
											<div class="row">
												<div class="col-md-12 form-group">
													<select class="form-control select">
														<option selected>Currency </option>
														<option value="1">$</option>
													</select>
												</div>
												<div class="col-md-12 form-group">
													<input type="text" class="form-control" placeholder="Amount">
												</div>
												<div class="col-12 form-group">
													<select class="form-control select">
														<option selected>Frequency</option>
														<option value="1">Annualy</option>
														<option value="2">Monthly</option>
														<option value="3">Weekly</option>
														<option value="4">Daily</option>
														<option value="5">Hourly</option>
														<option value="6">Fixed</option>
													</select>
												</div>
												<div class="col-md-12 form-group mb-0">
													<div class="cal-icon">
														<input class="form-control datetimepicker cal-icon-input" type="text" placeholder="Start Date">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<div class="submit-section text-center btn-add">
										<button class="btn btn-theme text-white ctm-border-radius button-1">Add Team Member</button>
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
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dleohr\template\resources\views/add-employee.blade.php ENDPATH**/ ?>