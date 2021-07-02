
<?php $__env->startSection('content'); ?>
<!-- Main Wrapper -->
<div class="inner-wrapper login-body">
			<div class="login-wrapper">
				<div class="container">
					<div class="loginbox shadow-sm">
						<div class="login-left">
							<img class="img-fluid" src="img/logo.png" alt="Logo">
						</div>
						<div class="login-right">
							<div class="login-right-wrap">
								<h1>Forgot Password?</h1>
								<p class="account-subtitle">Enter your email to get a reset link</p>
								
								<!-- Form -->
								<form action="login">
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Email">
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-theme button-1 ctm-border-radius text-white btn-block" type="submit">Reset Password</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center dont-have">Remember your password? <a href="login">Login</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\dleohr-horizontal\resources\views/forgot-password.blade.php ENDPATH**/ ?>