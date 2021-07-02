<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $__env->make('layout.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </head>
  <?php if(Route::is(['error-404','error-500'])): ?>
  <body class="error-page">
  <?php endif; ?>
  <body>
  <?php if(!Route::is(['login','register','forgot-password','lock-screen','error-404','error-500'])): ?>
  <?php echo $__env->make('layout.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->make('layout.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      
<?php endif; ?>
 <?php echo $__env->yieldContent('content'); ?>
 <?php echo $__env->make('layout.partials.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


  </body>
</html><?php /**PATH C:\xampp\htdocs\ventura\template\resources\views/layout/mainlayout.blade.php ENDPATH**/ ?>