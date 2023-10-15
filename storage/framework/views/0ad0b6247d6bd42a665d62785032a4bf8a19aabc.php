<?php $__env->startPush('css'); ?>
    
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <main>
        <!--  - BANNER  -->

        <!--  - PRODUCT  -->
        <?php if($products->isEmpty()): ?>
            <h3 class="text-center pt-5">No results found.</h3>
        <?php endif; ?>
        <div class="product-container pt-3">

            <div class="container">

                <div class="product-box">

                    <div class="product-main">


                        <div class="product-grid" id="products-container" style="grid-template-columns: repeat(4, 1fr);">
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="showcase product-item">
                                    <div class="showcase-banner">
                                        <a href="<?php echo e(route('showProduct', $product->slug)); ?>">
                                            <img src="<?php echo e($product->getFirstMediaUrl('products')); ?>"
                                                alt="Mens Winter Leathers Jackets" width="300"
                                                class="product-img default">
                                            <img src="<?php echo e($product->getFirstMediaUrl('products')); ?>"
                                                alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">

                                            <div class="showcase-actions">

                                                <button class="btn-action favorite-button"
                                                    data-product-id="<?php echo e($product->id); ?>">
                                                    <ion-icon name="heart-outline"></ion-icon>
                                                </button>

                                            </div>
                                        </a>

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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://releases.jquery.com/git/jquery-git.js"></script>

        <script>
            $(document).ready(function() {
                var page = 1; // initialize page to 2
                var loading = false; // set loading to false
                var product_container_offset = $('#products-container').offset().top;
                var window_height = $(window).height();

                $(window).scroll(function() {
                    var scroll_height = $(document).height() - $(window).height();
                    var scroll_position = $(window).scrollTop();
                    console.log(scroll_position);
                    console.log(scroll_height);
                    if (((scroll_position == scroll_height) || ((scroll_position + 5) >= scroll_height)) && !
                        loading) {

                        loading = true;
                        $('.ajax-loading').show();
                        $.ajax({
                            url: "/get-products-ajax?skip=" + page,
                            type: "get",
                            success: function(data) {
                                $('#products-container').append(data);
                                loading = false;
                                page++;
                                console.log(page);
                            },
                            complete: function() {
                                $('.ajax-loading').hide();
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

<?php echo $__env->make('site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/search_results.blade.php ENDPATH**/ ?>