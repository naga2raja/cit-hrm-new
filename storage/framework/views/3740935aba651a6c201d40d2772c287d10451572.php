
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
															<li class="breadcrumb-item d-inline-block active">Reviews</li>
														</ol>
														<h4 class="text-dark">Create Review</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</aside>
						</div>
						
						<div class="col-xl-9 col-lg-8  col-md-12">
							<form>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Setup</h4>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-12 form-group">
												<input type="text" class="form-control" placeholder="Review Name">
											</div>
											
											<div class="col form-group">
												<input type="text" class="form-control datetimepicker" placeholder="Review Begins On">
											</div>
											<div class="col form-group">
												<input type="text" class="form-control datetimepicker" placeholder="Reviews Completion Date">
											</div>
											<div class="col-md-12 form-group mb-0">
												<select class="form-control select">
													<option selected>Review Frequency </option>
													<option value="1">Every 3 Months</option>
													<option value="2">Every 6 Months</option>
													<option value="3">Every 12 Months</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Participants</h4>
									</div>		
									<div class="card-body">			
										<div class="row">
											<div class="col-md-12 form-group">
												<select class="form-control select">
													<option selected>Select Reviewed Employees </option>
													<option value="1">Everyone</option>
													<option value="2">Maria Cotton</option>
													<option value="3">Danny Ward</option>
													<option value="4">Linda Craver</option>
													<option value="5">Jenni Sims</option>
													<option value="6">John Gibbs</option>
												</select>
											</div>
											<div class="col-md-12 form-group mb-0">
												<select class="form-control select">
													<option selected>Select Reviewer </option>
													<option value="1">Admin</option>
													<option value="2">Maria Cotton</option>
													<option value="3">Danny Ward</option>
													<option value="4">Linda Craver</option>
													<option value="5">Jenni Sims</option>
													<option value="6">John Gibbs</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="card ctm-border-radius shadow-sm">
									<div class="card-header">
										<h4 class="card-title mb-0 d-inline-block">Form</h4>
									</div>		
									<div class="card-body">			
										<div class="row">
											<div class="col-md-12 form-group">
												<textarea class="form-control" placeholder="Explain What This Review Is To, How It's Going To Be Run, How Everyone Can Prepare."></textarea>
											</div>
											<div class="col-md-12 form-group">
												<textarea class="form-control" placeholder="Add Questions For The People Being Reviewed."></textarea>
												<a href="javascript:void(0)" class="text-primary">Add a Question</a><span class="float-right text-danger">Delete</span>
											</div>
											
											<div class="col-md-12 form-group mb-0">
												<textarea class="form-control" placeholder="Add Questions For Their Reviewers."></textarea>
												<a href="javascript:void(0)" class="text-primary">Add a Question</a><span class="float-right text-danger">Delete</span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
								<div class="col-12">
									<div class="submit-section text-center btn-add">
										<button class="btn btn-theme text-white ctm-border-radius button-1">Save</button>
										<button class="btn btn-danger text-white ctm-border-radius">Cancel</button>
									</div>
								</div>
							</div>
							</form>		
						</div>
					</div>
				</div>
			</div>
			<!--/Content-->
			
		</div>
		<!-- Inner Wrapper -->
		
		<div class="sidebar-overlay" id="sidebar_overlay"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dleohr\template\resources\views/create-review.blade.php ENDPATH**/ ?>