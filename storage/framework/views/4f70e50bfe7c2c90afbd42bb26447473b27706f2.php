<?php $__env->startSection('content'); ?>
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

                
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Email Address">

                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                                <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password"  placeholder="Password">

                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="form-group">
                                <div class="forgotpass">
                                    <input class="form-check-input1" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                    <label class="form-check-label" for="remember" style="color: #a0a0a0;">
                                        <?php echo e(__('Remember Me')); ?>

                                    </label>
                                </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius btn-block">
                                    <?php echo e(__('Login')); ?>

                                </button>                                
                        </div>
                    </form>
                    <?php if(Route::has('password.request')): ?>
                    <div class="text-center forgotpass">
                        <a href="<?php echo e(route('password.request')); ?>">
                            <?php echo e(__('Forgot Your Password?')); ?>

                        </a>  
                    </div>                                  
                    <?php endif; ?>

                  
                  <!--
                                <div class="login-or">
                                    <span class="or-line"></span>
                                    <span class="span-or">or</span>
                                </div>
                                
                                
                                <div class="social-login">
                                    <span>Login with</span>
                                    <a href="javascript:void(0)" class="facebook"><i class="fa fa-facebook"></i></a><a href="javascript:void(0)" class="google"><i class="fa fa-google"></i></a>
                                </div>
                                -->


            </div>
        </div>
    </div>
</div>

</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\cit-hrm-new\resources\views/auth/login.blade.php ENDPATH**/ ?>