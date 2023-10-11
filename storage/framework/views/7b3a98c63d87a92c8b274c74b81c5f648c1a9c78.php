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
    <div class="messanger">
        <a href="">
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
                        <a class="social-button facebook" href="https://www.facebook.com/" target="_blank"><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="social-button twitter" href="https://www.twitter.com/" target="_blank"><i
                                class="fab fa-twitter"></i></a>
                        <a class="social-button instagram" href="https://www.instagram.com/" target="_blank"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4">
                    <p class="telephone"><i class="fa-solid fa-mobile-screen"></i> <span> +201124982599</span></p>
                    <p class="telephone"><i class="fa-solid fa-mobile-screen"></i> <span> +201124982599</span></p>

                </div>
                <p class="copyright pb-sm-3 pb-md-0 text-center">2023-2024 All Rights&copy; Reserved</p>
            </div>

        </div>

    </footer>


    <?php if ($__env->exists('site.layouts.js')) echo $__env->make('site.layouts.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



</body>

</html>
<?php /**PATH F:\Programming\new\portafoto\resources\views/site/layouts/master.blade.php ENDPATH**/ ?>