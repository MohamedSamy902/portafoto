<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <?php if ($__env->exists('site.layouts.css')) echo $__env->make('site.layouts.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>


    <div class="overlay" data-overlay></div>


    <?php echo $__env->make('site.layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- - HEADER -->
    <?php if ($__env->exists('site.layouts.header')) echo $__env->make('site.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- - MAIN -->
   <?php echo $__env->yieldContent('content'); ?>




    <!-- - FOOTER -->

    <footer>


        <div class="footer-bottom">

            <div class="container">

                <p class="copyright">
                    Copyright &copy; <a href="#">Portafoto</a> all rights reserved.
                </p>

            </div>

        </div>

    </footer>


    <?php if ($__env->exists('site.layouts.js')) echo $__env->make('site.layouts.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



</body>

</html>
<?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/layouts/master.blade.php ENDPATH**/ ?>