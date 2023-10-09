<header>

    <div class="header-main">
        <div class="container">
            <a href="<?php echo e(route('site')); ?>" class="header-logo">
                Portafoto
            </a>
            <div class="header-search-container">
                <input type="search" name="search" class="search-field" placeholder="Enter your product name...">
                <button class="search-btn">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>
            <div class="header-user-actions">

                <div class="dropdown fav" id="favorite">
                    <button class="action-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <ion-icon name="heart-outline"></ion-icon>

                    </button>

                    <ul class="dropdown-menu wide" id="favorites-list" aria-labelledby="dropdownMenuButton1">
                        <p class="text-center">Empty Cart</p>
                    </ul>
                </div>
                <div class="dropdown shop">
                    <button class="action-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <ion-icon name="bag-handle-outline"></ion-icon> <i class="fas fa-sort-down"></i>
                    </button>
                    <ul class="dropdown-menu wide" aria-labelledby="dropdownMenuButton1">
                        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="shop-content">
                                <img src="<?php echo e($cart->product->getFirstMediaUrl('products')); ?>" alt="product">
                                <div class="shop-body">
                                    <a href="<?php echo e(route('product.remove.cart', $cart->id)); ?>" class="remove"><i
                                            class="fas fa-times"></i></a>
                                    <span><?php echo e($cart->product->name); ?></span>
                                    <p class="text-black-50" style="margin-bottom: 5px"><?php echo e($cart->standardColor->name); ?>

                                    </p>
                                    <p class=""><?php echo e(__('site.quantity')); ?>: <?php echo e($cart->quantity); ?></p>
                                </div>
                                <div class="price-field">
                                    <p class="price"><?php echo e($cart->price); ?></p>

                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(COUNT($carts) != 0): ?>
                            <li class="checkout">
                                <a class="dropdown-item" href="<?php echo e(route('customers.payment.show')); ?>">
                                    <button type="button" class="btn btn-dark btn-block">
                                        Cart <i class="fa-solid fa-cart-shopping cartt"></i>
                                    </button>
                                </a>
                            </li>
                        <?php else: ?>
                            <p class="text-center">Empty Cart</p>
                        <?php endif; ?>


                    </ul>
                </div>
                <div class="dropdown shop lang">
                    <button class="action-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <ion-icon name="language-outline"></ion-icon> <i class="fas fa-sort-down"></i>
                    </button>
                    <ul class="dropdown-menu profile" aria-labelledby="dropdownMenuButton1">
                        <?php $__currentLoopData = LaravelLocalization::getSupportedLocales(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $localeCode => $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a class="dropdown-item" rel="alternate" hreflang="<?php echo e($localeCode); ?>"
                                    href="<?php echo e(LaravelLocalization::getLocalizedURL($localeCode, null, [], true)); ?>">
                                    <?php echo e($properties['native']); ?>

                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="mobile-bottom-navigation">
        
        <button class="action-btn">
            <ion-icon name="bag-handle-outline"></ion-icon>
            
        </button>
        <a class="action-btn" href="<?php echo e(route('site')); ?>">
            <ion-icon name="home-outline"></ion-icon>
        </a>
        <a class="action-btn">
            <ion-icon name="heart-outline"></ion-icon>
            
        </a>
        
    </div>

</header>

<?php $__env->startPush('js'); ?>
    <script>
        $('#favorite').on('click', function() {
            $.ajax({
                url: "<?php echo e(route('favorites.show')); ?>",
                type: 'get',

                success: function(response) {
                    var $favoritesList = $('#favorites-list');
                    $favoritesList.empty();
                    $.each(response.favorites, function(index, favorite) {
                        $favoritesList.append(`<li class="shop-content">
                            <img src="` + favorite.media[0].original_url + `" alt="product">
                            <div class="shop-body">
                                <button id="removeFavorite" data-product-id-remove="` + favorite.id + `" class="remove"><i class="fas fa-times"></i></button>
                                <span>` + favorite.name.<?php echo e(App::getLocale()); ?> + `</span>

                            </div>`);
                    });
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
                                console.log(response);
                            },
                            error: function(xhr) {
                                console.log(xhr);
                            }
                        });
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/layouts/header.blade.php ENDPATH**/ ?>