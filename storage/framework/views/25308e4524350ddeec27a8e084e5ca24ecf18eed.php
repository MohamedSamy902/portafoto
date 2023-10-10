<!--  favicon -->
<link rel="shortcut icon" href="<?php echo e(asset('site')); ?>/assets/images/logo/logo.jpg" >
<link rel="stylesheet" href="<?php echo e(asset('site')); ?>/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo e(asset('site')); ?>/assets/fontawesome-free-6.4.2-web/css/all.min.css">
<!-- custom css link -->

<?php if(App::getLocale() == 'ar'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('site')); ?>/assets/css/style-prefix-ar.css">
<?php else: ?>
    <link rel="stylesheet" href="<?php echo e(asset('site')); ?>/assets/css/style-prefix.css">
<?php endif; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>


<!-- google font link -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/sweetalert2.css')); ?>">

<!-- OR -->
<?php echo SEO::generate(); ?>


<!-- MINIFIED -->


<!-- LUMEN -->

<?php echo $__env->yieldPushContent('css'); ?>
<?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/layouts/css.blade.php ENDPATH**/ ?>