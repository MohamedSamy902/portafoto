<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php if ($__env->exists('site.layouts.css')) echo $__env->make('site.layouts.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo SEO::generate(); ?>

</head>

<body>
    <div class="messanger">
        <a href="<?php echo e($setting->messenger); ?>" target="_blank">
            <div class="ii">
                <img src="https://img.icons8.com/3d-fluency/94/facebook-messenger.png" alt="facebook-messenger" />
            </div>
        </a>
    </div>

    <div class="overlay" data-overlay></div>


    <?php echo $__env->make('site.layouts.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- - HEADER -->
    <?php if ($__env->exists('site.layouts.header')) echo $__env->make('site.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- - MAIN -->
    <?php echo $__env->yieldContent('content'); ?>




    <!-- - FOOTER -->

    

    <footer>

        <div class="container pt-3 text-sm-center text-lg-left">

            <div class="row position-relative">

                <div class="col-sm-12 col-lg-4">
                    <a href="#" class="footer-logo">
                        <!-- <img src="./assets/images/logo/logo.jpg" alt="Anon's logo" width="120" height="36"> -->
                        
                        Portafoto
                    </a>
                    <p class="text-white-50 author justify-content-sm-center justify-content-lg-start pt-3">Created By
                        <a href="https://karimosama99.github.io/GoldenCode/" target="_blank"><span>CyBoRg</span></a>
                    </p>
                </div>
                <div class="col-sm-12 col-lg-4">
                    
                    
                    <div class="rounded-social-buttons">
                        <a class="social-button facebook" href="<?php echo e($setting->facebook); ?>" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        
                        <a class="social-button instagram" href="<?php echo e($setting->instagram); ?>" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <?php if($setting->mobile_1): ?>
                        <p class="telephone"><i class="fa-solid fa-mobile-screen"></i> <span>
                                <?php echo e($setting->mobile_1); ?></span></p>
                    <?php endif; ?>
                    <?php if($setting->mobile_2): ?>
                        <p class="telephone"><i class="fa-solid fa-mobile-screen"></i> <span>
                                <?php echo e($setting->mobile_2); ?></span></p>
                    <?php endif; ?>

                </div>
                <p class="copyright pb-sm-3 pb-md-0 text-center">2023-2024 All Rights&copy; Reserved</p>
            </div>

        </div>

    </footer>


    <?php if ($__env->exists('site.layouts.js')) echo $__env->make('site.layouts.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



</body>

</html>
<?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/layouts/master.blade.php ENDPATH**/ ?>