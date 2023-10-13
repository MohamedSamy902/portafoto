<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="showcase product-item">
        <div class="showcase-banner">
            <a href="<?php echo e(route('showProduct', $product->slug)); ?>">
                <img src="<?php echo e($product->getFirstMediaUrl('products')); ?>" alt="Mens Winter Leathers Jackets" width="300"
                    class="product-img default">
                <img src="<?php echo e($product->getFirstMediaUrl('products')); ?>" alt="Mens Winter Leathers Jackets" width="300"
                    class="product-img hover">

                <div class="showcase-actions">

                    <button class="btn-action favorite-button" data-product-id="<?php echo e($product->id); ?>">
                        <ion-icon name="heart-outline"></ion-icon>
                    </button>

                </div>
            </a>

        </div>

        <div class="showcase-content">

            <a href="<?php echo e(route('showProduct', $product->slug)); ?>" class="showcase-category"><?php echo e($product->name); ?></a>
            <?php if(COUNT($product->size) > 0): ?>
                <a href="#">
                    <h3 class="showcase-title">
                        <?php echo e($product->size()->first()->standardSize->name); ?></h3>
                </a>
            <?php endif; ?>



            <div class="price-box">
                <?php if(COUNT($product->size) > 0): ?>
                    <p class="price"><?php echo e($product->size()->first()->price); ?>

                        <?php echo e(__('site.EGP')); ?></p>
                    <?php if($product->size()->first()->discount != null): ?>
                        <del><?php echo e($product->size()->first()->discount); ?>

                            <?php echo e(__('site.EGP')); ?></del>
                    <?php endif; ?>
                <?php else: ?>
                    <p class="price"><?php echo e($product->price); ?> <?php echo e(__('site.EGP')); ?></p>
                    <?php if($product->discount != null): ?>
                        <del><?php echo e($product->discount); ?> <?php echo e(__('site.EGP')); ?></del>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

        </div>

    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/partialsProduct.blade.php ENDPATH**/ ?>