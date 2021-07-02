
<?php $__env->startSection('content'); ?>
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Mail View</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index">Dashboard</a></li>
									<li class="breadcrumb-item active">Mail View</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-lg-3 col-md-4">
							<div class="compose-btn">
								<a href="compose" class="btn btn-primary btn-block">
								Compose
								</a>
							</div>
							<ul class="inbox-menu">
								<li class="active">
									<a href="#"><i class="fa fa-download"></i> Inbox <span class="mail-count">(5)</span></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-star-o"></i> Important</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-paper-plane-o"></i> Sent Mail</a>
								</li>
								<li>
									<a href="#"><i class="fa fa-file-text-o"></i> Drafts <span class="mail-count">(13)</span></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-trash-o"></i> Trash</a>
								</li>
							</ul>
						</div>
						
						<div class="col-lg-9 col-md-8">
							<div class="card">
								<div class="card-body">
									<div class="mailview-content">
										<div class="mailview-header">
										<div class="row">
											<div class="col-sm-8 col-md-7 col-lg-9">
												<div class="text-truncate m-b-10">
													<span class="mail-view-title">Innovative Conference Schedule</span>
												</div>
											</div>
											<div class="col-sm-4 col-md-5 col-lg-3">
												<div class="mail-view-action">
													<div class="btn-group">
														<button type="button" class="btn btn-white btn-sm" data-toggle="tooltip" title="Delete"> <i class="fa fa-trash-o"></i></button>
														<button type="button" class="btn btn-white btn-sm" data-toggle="tooltip" title="Reply"> <i class="fa fa-reply"></i></button>
														<button type="button" class="btn btn-white btn-sm" data-toggle="tooltip" title="Forward"> <i class="fa fa-share"></i></button>
													</div>
													<button type="button" class="btn btn-white btn-sm" data-toggle="tooltip" title="Print"> <i class="fa fa-print"></i></button>
												</div>
											</div>
										</div>
											<div class="sender-info">
												<div class="sender-img">
													<img width="40" alt="User Image" src="img/profiles/avatar-02.jpg" class="rounded-circle">
												</div>
												<div class="receiver-details float-left">
													<span class="sender-name">John Doe (johnjoe@example.com)</span>
													<span class="receiver-name">
														to
														<span>me</span>, <span>Richard</span>, <span>Paul</span>
													</span>	
												</div>	
												<div class="mail-sent-time">
													<span class="mail-time">18 Feb 2019 9:42 AM</span>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
										<div class="mailview-inner">
											<p>Hello Richard,</p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
											<p>Thanks,<br>
											John Doe</p>
										</div>
									</div>
									<div class="mail-attachments">
										<p><i class="fa fa-paperclip"></i> 2 Attachments - <a href="#">View all</a> | <a href="#">Download all</a></p>
										<ul class="attachments clearfix">
											<li>
												<div class="attach-file"><i class="fa fa-file-pdf-o"></i></div>
												<div class="attach-info"> <a href="#" class="attach-filename">daily_meeting.pdf</a> <div class="attach-fileize"> 842 KB</div></div>
											</li>
											<li>
												<div class="attach-file"><i class="fa fa-file-word-o"></i></div>
												<div class="attach-info"> <a href="#" class="attach-filename">documentation.docx</a> <div class="attach-fileize"> 2,305 KB</div></div>
											</li>
											<li>
												<div class="attach-file"><img src="img/placeholder.jpg" alt="Attachment"></div>
												<div class="attach-info"> <a href="#" class="attach-filename">webdesign.png</a> <div class="attach-fileize"> 1.42 MB</div></div>
											</li>
											<li>
												<div class="attach-file"><img src="img/placeholder.jpg" alt="Attachment"></div>
												<div class="attach-info"> <a href="#" class="attach-filename">webdevelopment.png</a> <div class="attach-fileize"> 1.1 MB</div></div>
											</li>
										</ul>
									</div>
									<div class="mailview-footer">
										<div class="row">
											<div class="col-sm-6 left-action">
												<button type="button" class="btn btn-white"><i class="fa fa-reply"></i> Reply</button>
												<button type="button" class="btn btn-white"><i class="fa fa-share"></i> Forward</button>
											</div>
											<div class="col-sm-6 right-action">
												<button type="button" class="btn btn-white"><i class="fa fa-print"></i> Print</button>
												<button type="button" class="btn btn-white"><i class="fa fa-trash-o"></i> Delete</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ventura_landing\template\resources\views/mail-view.blade.php ENDPATH**/ ?>