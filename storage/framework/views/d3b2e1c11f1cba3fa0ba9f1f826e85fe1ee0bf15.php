
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

                            <img src="<?php echo e($slider->getFirstMediaUrl('products')); ?>" alt="<?php echo e($slider->name); ?>"
                                class="banner-img">

                            <div class="banner-content">

                                <p class="banner-subtitle"><?php echo e($slider->name); ?></p>

                                <h2 class="banner-title"><?php echo e($slider->name); ?></h2>

                                

                                <a href="<?php echo e(route('showProduct', $slider->slug)); ?>"
                                    class="banner-btn"><?php echo e(__('site.shopNow')); ?></a>

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

                        <div class="product-grid" id="products-container">
                            <?php echo $__env->make('site.partialsProduct', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                var page = 1;
                $(window).scroll(function() {
                    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                        page++;
                        console.log(page);
                        $.ajax({
                            url: "/get-products-ajax?skip=" + ((page - 1) * 10),
                            success: function(data) {
                                $('#products-container').append(data);
                            }
                        });
                    }
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $(document).on('click', '.favorite-button', function(event) {
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

                        }
                    });
                });

            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Programming\new\portafoto\resources\views/site/index.blade.php ENDPATH**/ ?>