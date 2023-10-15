<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <div class="mobile-fav pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="text-center pb-3">Favorite Items</h4>
                    <div class="mobfav">
                        <img src="https://rvs-checkout-page.onrender.com/photo1.png" alt="">
                        <div class="details">
                            <h6>Wall Frame</h6>
                            <p>30 x 60</p>
                        </div>
                        <a href="" class="remove btn btn-danger"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="mobfav">
                        <img src="https://rvs-checkout-page.onrender.com/photo1.png" alt="">
                        <div class="details">
                            <h6>Wall Frame</h6>
                            <p>30 x 60</p>
                        </div>
                        <a href="" class="remove btn btn-danger"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="mobfav">
                        <img src="https://rvs-checkout-page.onrender.com/photo1.png" alt="">
                        <div class="details">
                            <h6>Wall Frame</h6>
                            <p>30 x 60</p>
                        </div>
                        <a href="" class="remove btn btn-danger"><i class="fas fa-times"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('js'); ?>
        <script src="https://releases.jquery.com/git/jquery-git.js"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/mobile-fav.blade.php ENDPATH**/ ?>