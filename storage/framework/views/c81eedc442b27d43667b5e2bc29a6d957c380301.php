<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="mobile-fav pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="text-center pb-3"><?php echo e(__('site.favorite')); ?></h4>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="mobfav" id="mobfav<?php echo e($product->id); ?>">
                            <img src="<?php echo e($product->getFirstMediaUrl('products')); ?>" alt="">
                            <div class="details">
                                <h6><?php echo e($product->name); ?></h6>
                                <p><?php echo e($product->price != null? $product->price: $product->size()->latest()->first()->price); ?>

                                    <?php echo e(__('site.EGP')); ?></p>
                            </div>
                            <button id="removeFavorite" data-product-id-remove="<?php echo e($product->id); ?>"
                                class="remove btn btn-danger"><i class="fas fa-times"></i></button>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>

    <?php $__env->startPush('js'); ?>
        <script src="https://releases.jquery.com/git/jquery-git.js"></script>
        <script>
            $('.remove').on('click', function(event) {
                var productId = $(this).data('product-id-remove');
                var url = "<?php echo e(route('remove.product', ':productId')); ?>";
                url = url.replace(':productId', productId);
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        id: productId,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function(response) {
                        
                        $('#mobfav'+productId).remove()
                        // console.log(response);
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/mobile-fav.blade.php ENDPATH**/ ?>