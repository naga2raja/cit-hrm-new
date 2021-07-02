<?php $__env->startSection('content'); ?>
<div class="inner-wrapper login-body">
    <div class="login-wrapper">
<div class="container">
    <div class="row justify-content-center">
        <div class="loginbox shadow-sm">
            <div class="login-left">
                <img class="img-fluid" src="<?php echo e(assetUrl('img/logo.png')); ?>" alt="Logo">
            </div>

            <div class="login-right">
                <div class="login-right-wrap">
                    <h1>Forgot Password?</h1>
                    <p class="account-subtitle">Enter your email to get a reset link</p>
                    

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                                <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="E-Mail Address">

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

                        <div class="form-group mb-0">
                                <button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white btn-block">
                                    <?php echo e(__('Reset Password')); ?>

                                </button>
                        </div>
                    </form>

                    <div class="text-center dont-have">Remember your password? <a href="/login">Login</a></div>

                </div>
            </div>
        </div>

        </div>
    </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\cithrm-new\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>