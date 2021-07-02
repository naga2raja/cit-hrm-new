
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
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>
								
								<!-- Form -->
								<form action="index">
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Password">
									</div>
									<div class="form-group">
										<button class="btn btn-theme button-1 text-white ctm-border-radius btn-block" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="text-center forgotpass"><a href="forgot-password">Forgot Password?</a></div>
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								
								<!-- Social Login -->
								<div class="social-login">
									<span>Login with</span>
									<a href="javascript:void(0)" class="facebook"><i class="fa fa-facebook"></i></a><a href="javascript:void(0)" class="google"><i class="fa fa-google"></i></a>
								</div>
								<!-- /Social Login -->
								
								<div class="text-center dont-have">Don’t have an account? <a href="register">Register</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /Main Wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\cithrm-new\resources\views/login.blade.php ENDPATH**/ ?>