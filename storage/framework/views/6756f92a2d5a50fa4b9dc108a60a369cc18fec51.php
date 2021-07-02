<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $__env->make('layout.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>
  <body>
  <?php if(!Route::is(['forgot-password','login','register', 'password.request']) && !(\Request::is('password/reset/*')) ): ?>
  <?php echo $__env->make('layout.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php endif; ?>
 <?php echo $__env->yieldContent('content'); ?>
 <?php echo $__env->make('layout.partials.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  </body>
</html><?php /**PATH D:\xampp\htdocs\cithrm-new\resources\views/layout/mainlayout.blade.php ENDPATH**/ ?>