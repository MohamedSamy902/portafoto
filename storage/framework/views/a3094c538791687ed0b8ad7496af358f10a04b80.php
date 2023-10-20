<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="mobile-fav pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="text-center pb-3"><?php echo e(__('site.cart')); ?></h4>

                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mobfav">
                            <img src="<?php echo e($cart->product->getFirstMediaUrl('products')); ?>" alt="">
                            <div class="details">
                                <h6><?php echo e($cart->product->name); ?></h6>
                                <p><?php echo e($cart->product->price != null? $cart->product->price: $product->size()->latest()->first()->price); ?>

                                    <?php echo e(__('site.EGP')); ?></p>
                                <p class="text-black-50" style="margin-bottom: 5px"><?php echo e($cart->standardColor->name); ?>

                                </p>
                                <p class=""><?php echo e(__('site.quantity')); ?>: <?php echo e($cart->quantity); ?></p>
                            </div>
                            <a href="<?php echo e(route('product.remove.cart', $cart->id)); ?>" class="remove btn btn-danger"><i
                                    class="fas fa-times"></i></a>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('js'); ?>
        <script src="https://releases.jquery.com/git/jquery-git.js"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/mobile-cart.blade.php ENDPATH**/ ?>