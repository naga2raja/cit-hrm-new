
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
														<h4 class="text-dark">Time Off Approver</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card">
									<div class="card-body">
										<div class="flex-column list-group" id="v-pills-tab" role="tablist" aria-orientation="vertical">
											<a class=" active list-group-item" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Manage Time Off</a>
										</div>
									</div>
								</div>
							</aside>
						</div>
						
						<div class="col-xl-9 col-lg-8  col-md-12">
							<div class="card ctm-border-radius shadow-sm">
								<div class="card-header">
									<h4 class="card-title mb-0 d-inline-block">Time Off Approver</h4>
								</div>
								<div class="card-body">
									<a class="mb-0 cursor-pointer d-block">
									<span class="avatar" data-toggle="tooltip" data-placement="top" title="Richard Wilson"><img src="img/profiles/img-10.jpg" alt="Richard Wilson" class="img-fluid"></span>
									<span class="ml-4">1 Time Off Approver</span>
									</a>
								</div>
							</div>
							<div class="card ctm-border-radius shadow-sm">
								<div class="card-body">
									<div class="tab-content" id="v-pills-tabContent">
									
										<!-- Tab1-->
										<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
											<div class="table-responsive">
												<table class="table admin-table table-hover">
													<thead>
														<tr>
															<th class="pt-0">Rule Description</th>
															<th class="pt-0">Allow?</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<div>
																	<h6 class="mb-0">Approve/Deny Time Off</h6>
																	<p class="ctm-text-sm">Manage time off requests for anyone in their team </p>
																</div>
															</td>
															<td>
																<div class="custom-control custom-switch">
																	<input type="checkbox" class="custom-control-input" id="switch1" checked>
																	<label class="custom-control-label" for="switch1"></label>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<div>
																	<h6 class="mb-0">Book Time Off On Behalf</h6>
																	<p class="ctm-text-sm">Book time off for anyone in their team </p>
																</div>
															</td>
															<td>
																<div class="custom-control custom-switch">
																	<input type="checkbox" class="custom-control-input" id="switch3" checked>
																	<label class="custom-control-label" for="switch3"></label>
																</div>
															</td>
														</tr>
														<tr>
															<td>
																<div>
																	<h6 class="mb-0">Manage Allowances</h6>
																	<p class="ctm-text-sm">Adjust the holiday allowance for people in their team </p>
																</div>
															</td>
															<td>
																<div class="custom-control custom-switch">
																	<input type="checkbox" class="custom-control-input" id="switch5" checked>
																	<label class="custom-control-label" for="switch5"></label>
																</div>
															</td>
														</tr>
														<tr>
															<td class="pb-0">
																<div>
																	<h6 class="mb-0">Manage Time Off Settings For The Company</h6>
																	<p class="ctm-text-sm">Manage custom leave types, roll over, company holidays and restricted days, the company working week, and your company holiday allowance. </p>
																</div>
															</td>
															<td class="pb-0">
																<div class="custom-control custom-switch">
																	<input type="checkbox" class="custom-control-input" id="switch7" disabled>
																	<label class="custom-control-label" for="switch7"></label>
																</div>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<!-- /Tab1-->
										
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
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dleohr\template\resources\views/custom-timeoff-approver.blade.php ENDPATH**/ ?>