<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <main>
        <!--  - BANNER  -->
        <div class="banner">

            <div class="container">

                <div class="slider-container has-scrollbar">
                    <?php $__currentLoopData = $productsSlider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slider-item">

                            <img src="<?php echo e($slider->getFirstMediaUrl('products')); ?>" alt="<?php echo e($slider->name); ?>" class="banner-img">

                            <div class="banner-content">

                                <p class="banner-subtitle"><?php echo e($slider->name); ?></p>

                                <h2 class="banner-title"><?php echo e($slider->name); ?></h2>

                                

                                <a href="<?php echo e(route('showProduct', $slider->slug)); ?>" class="banner-btn"><?php echo e(__('site.shopNow')); ?></a>

                            </div>

                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

            </div>

        </div>
        <!--  - PRODUCT  -->

        <div class="product-container">

            <div class="container">


                <!-- - SIDEBAR -->

                <div class="sidebar  has-scrollbar" data-mobile-menu>



                    <div class="product-showcase">

                        <h3 class="showcase-heading"><?php echo e(__('site.bestSellers')); ?></h3>

                        <div class="showcase-wrapper">

                            <div class="showcase-container">
                                <?php $__currentLoopData = $productsBest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $best): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="showcase">

                                        <a href="<?php echo e(route('showProduct', $best->slug)); ?>" class="showcase-img-box">
                                            <img src="<?php echo e($best->getFirstMediaUrl('products')); ?>" alt="Wall Frame"
                                                width="75" height="75" class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <a href="<?php echo e(route('showProduct', $best->slug)); ?>"
                                                class="showcase-category"><?php echo e($best->name); ?></a>
                                            <?php if(COUNT($best->size) > 0): ?>
                                                <a href="#">
                                                    <h3 class="showcase-title">
                                                        <?php echo e($best->size()->first()->standardSize->name); ?></h3>
                                                </a>
                                            <?php endif; ?>


                                            <div class="price-box">
                                                <?php if(COUNT($best->size) > 0): ?>
                                                    <p class="price"><?php echo e($best->size()->first()->price); ?>

                                                        <?php echo e(__('site.EGP')); ?></p>
                                                    <?php if($best->size()->first()->discount != null): ?>
                                                        <del><?php echo e($best->size()->first()->discount); ?>

                                                            <?php echo e(__('site.EGP')); ?></del>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <p class="price"><?php echo e($best->price); ?> <?php echo e(__('site.EGP')); ?></p>
                                                    <?php if($best->discount != null): ?>
                                                        <del><?php echo e($best->discount); ?> <?php echo e(__('site.EGP')); ?></del>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>

                                        </div>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>

                        </div>

                    </div>

                </div>



                <div class="product-box">

                    <div class="product-main">

                        <div class="product-grid">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="showcase">
                                    <div class="showcase-banner">
                                        <img src="<?php echo e($product->getFirstMediaUrl('products')); ?>"
                                            alt="Mens Winter Leathers Jackets" width="300" class="product-img default">
                                        <img src="<?php echo e($product->getFirstMediaUrl('products')); ?>"
                                            alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">

                                        <div class="showcase-actions">

                                            <button class="btn-action favorite-button"
                                                data-product-id="<?php echo e($product->id); ?>">
                                                <ion-icon name="heart-outline"></ion-icon>
                                            </button>

                                        </div>

                                    </div>

                                    <div class="showcase-content">

                                        <a href="<?php echo e(route('showProduct', $product->slug)); ?>"
                                            class="showcase-category"><?php echo e($product->name); ?></a>
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
                        </div>

                    </div>
                    <!--  - PRODUCT GRID -->
                </div>

            </div>

        </div>

    </main>

    <?php $__env->startPush('js'); ?>
        <script src="https://releases.jquery.com/git/jquery-git.js"></script>
        
        <script>
            $(document).ready(function() {
                $('.favorite-button').on('click', function(event) {
                    event.preventDefault();
                    var productId = $(this).data('product-id');
                    var url = "<?php echo e(route('favorites.add', ':productId')); ?>";
                    url = url.replace(':productId', productId);
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            id: productId,
                            _token: '<?php echo e(csrf_token()); ?>'
                        },
                        success: function(response) {

                            swal({
                                position: 'center',
                                icon: 'success',
                                title: "<?php echo e(__('site.favoritesAdd')); ?>",
                                showConfirmButton: false,
                                timer: 2000
                            });

                            // Update the header favorite list
                            // var $favoritesCount = $('#favorites-count');
                            // var count = $favoritesCount.text() ? parseInt($favoritesCount.text()) :
                            //     0;
                            // var newCount = count + 1;
                            // $favoritesCount.text(newCount);
                            // var $favoritesList = $('#favorites-list');
                            // $favoritesList.empty();
                            // console.log(response);
                            // $.each(response.favorites, function(index, favorite) {
                            //     console.log(favorite);
                            //     $favoritesList.append('<li>' + favorite.name + '</li>');
                            // });
                            // // Show success message
                            // alert(response.message);
                        }
                    });
                });


            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/index.blade.php ENDPATH**/ ?>