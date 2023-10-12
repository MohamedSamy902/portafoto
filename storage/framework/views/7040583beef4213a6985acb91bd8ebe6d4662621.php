<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('site')); ?>/assets/css/magiczoomplus.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <style>
        .title {
            margin-bottom: 0.4em;
        }

        .label {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .label .input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
            margin: 0;
        }

        .talla-instance {
            --label-radio-rect-w: 56;
            --label-radio-rect-h: 44;
            --color-bg-active: rgba(0, 0, 0, .1);
            --dasharray-rect: calc(calc(var(--label-radio-rect-w) * 2) + calc(var(--label-radio-rect-h) * 2));
        }

        .labels-radio-rect {
            display: flex;
            margin-bottom: 1.2em;
            flex-wrap: wrap;
        }

        .labels-radio-rect--row {
            flex-direction: column;
        }

        .labels-radio-rect--row .label {
            margin-bottom: 0.4em;
        }

        .labels-radio-rect .label {
            display: grid;
            gap: 0;
            position: relative;
            width: calc(var(--label-radio-rect-w) * 2px);
            height: calc(var(--label-radio-rect-h) * 1px);
            cursor: pointer;
        }

        .labels-radio-rect .label:not(:last-of-type) {
            margin-right: 0.6em;
            transition: margin 0.4s ease;
        }

        .labels-radio-rect .label input:checked~.label__checkmark .shape-rect {
            stroke-dashoffset: 0;
            fill: var(--color-bg-active);
        }

        .labels-radio-rect .label input:focus~.label__checkmark .shape-rect {
            fill: var(--color-bg-active);
        }

        .labels-radio-rect .label__checkmark {
            display: grid;
            align-items: center;
            width: inherit;
            height: inherit;
        }

        .labels-radio-rect .label__checkmark .shape,
        .labels-radio-rect .label__checkmark .outline {
            grid-area: 1/1/2/2;
            width: inherit;
            height: inherit;
        }

        .labels-radio-rect .label__checkmark .shape-rect {
            width: inherit;
            height: inherit;
            stroke-dasharray: var(--dasharray-rect);
            stroke-dashoffset: var(--dasharray-rect);
            stroke-width: 1px;
            fill: rgba(255, 255, 255, 0);
            stroke: #111;
            transition: stroke-dashoffset 1s;
        }

        .labels-radio-rect .label__checkmark .outline {
            font-size: 1em;
            color: #242424;
            width: 100%;
            height: 100%;
            border: 0.5px solid rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: color 0.5s ease 0.1s;
        }

        .labels-radio-rect .label__checkmark .input-text {
            grid-area: 1/2/2/2;
            padding-left: 10px;
            white-space: nowrap;
        }

        .labels-radio-rect .label__checkmark:hover .shape-rect {
            stroke-dashoffset: 0;
        }

        .labels-radio-circle {
            display: flex;
            margin-bottom: 1.2em;
            flex-direction: column;
        }

        .labels-radio-circle .label {
            display: grid;
            gap: 0;
            position: relative;
            width: calc(var(--label-radio-circle-w) * 1px);
            height: calc(var(--label-radio-circle-w) * 1px);
            cursor: pointer;
            font-size: 1em;
            margin-bottom: 10px;
        }

        .labels-radio-circle .label:not(:last-of-type) {
            margin-right: 0.6em;
            transition: margin 0.4s ease;
        }

        .labels-radio-circle .label input:checked~.label__checkmark .shape-circle {
            stroke-dashoffset: 0;
            fill: var(--color-bg-active);
        }

        .labels-radio-circle .label input:focus~.label__checkmark .shape-circle {
            fill: var(--color-bg-active);
        }

        .labels-radio-circle .label__checkmark {
            display: grid;
            align-items: center;
            width: inherit;
            height: inherit;
        }

        .labels-radio-circle .label__checkmark .shape,
        .labels-radio-circle .label__checkmark .outline {
            grid-area: 1/1/2/2;
            width: inherit;
            height: inherit;
        }

        .labels-radio-circle .label__checkmark .shape-circle {
            cx: var(--label-radio-circle-r);
            cy: var(--label-radio-circle-r);
            r: calc(var(--label-radio-circle-r) - .5);
            width: inherit;
            height: inherit;
            stroke-dasharray: var(--dasharray-circle);
            stroke-dashoffset: var(--dasharray-circle);
            stroke-width: 1px;
            fill: rgba(255, 255, 255, 0);
            stroke: #111;
            transition: stroke-dashoffset 1s;
        }

        .labels-radio-circle .label__checkmark .outline {
            font-size: 1em;
            color: #242424;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 0.5px solid rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: color 0.5s ease 0.1s;
        }

        .labels-radio-circle .label__checkmark .input-text {
            grid-area: 1/2/2/2;
            padding-left: 10px;
            white-space: nowrap;
        }

        .labels-radio-circle .label__checkmark:hover .shape-circle {
            stroke-dashoffset: 0;
        }
    </style>
    <style>
        .input-icons i {
            position: absolute;
        }

        .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }

        .icon {
            padding: 10px;
            min-width: 40px;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            text-align: center;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <main>
        <div class="product-container">
            <div class="container">
                <div class="product-box">
                    <div class="product-featured">
                        <div class="showcase-wrapper has-scrollbar">
                            <div class="" style="padding: 10px">
                                <div class="showcase">
                                    <div class="showcase-banner">

                                        <a href="<?php echo e($product->getFirstMediaUrl('products')); ?>" class="MagicZoom"
                                            id="jeans" data-options="cssClass: mz-show-arrows;"><img
                                                src="<?php echo e($product->getFirstMediaUrl('products')); ?>"></a>
                                        <?php $__currentLoopData = $product->getMedia('products'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($productImage->getFullUrl() != $product->getFirstMediaUrl('products')): ?>
                                                <a data-zoom-id="jeans" href="<?php echo e($productImage->getFullUrl()); ?>"
                                                    data-image="jeans1-small.jpg" class="gallery"><img
                                                        src="<?php echo e($productImage->getFullUrl()); ?>"></a>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>

                                    <div class="showcase-content">
                                        <h4><span
                                                id="price"><?php echo e($product->price != null? $product->price: $product->size()->latest()->first()->price); ?></span>
                                            <?php echo e(__('site.EGP')); ?></h4>
                                        <span class="text-success font-weight-bold pb-2" id="SOLDOUT" <?php if($product->status == 'SOLD OUT'): ?>
                                            style="color: red !important"  <?php endif; ?> ><?php echo e($product->status != 'SOLD OUT' ? 'In Stock' : 'SOLD OUT'); ?></span>


                                        <p class="pt-3">


                                            <?php echo $product->description; ?>

                                        </p>
                                        <p><?php echo __('site.decProduct'); ?></p>
                                        <form class="row g-3 needs-validation" novalidate method="post"
                                            action="<?php echo e(route('product.add.cart', $product->slug)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php if(COUNT($product->size) > 0): ?>
                                                <div class="col-md-12 selectt gap-0">
                                                    <div class="talla">
                                                        <h2 class="title">Sizes</h2>
                                                        <div class="labels-radio-rect talla-instance ">
                                                            <?php $__currentLoopData = $product->size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <label class="label ">
                                                                    <input class="input size"
                                                                        data-price="<?php echo e($size->price); ?>" data-available="<?php echo e($product->status); ?>" type="radio"
                                                                        name="size" checked value="<?php echo e($size->id); ?>">
                                                                    <span class="label__checkmark">
                                                                        <svg class="shape"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect class="shape-rect" />
                                                                        </svg>
                                                                        <span
                                                                            class="outline"><?php echo e($size->standardSize->name); ?></span>
                                                                    </span>
                                                                </label>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>


                                            <div class="col-md-12 gap-0">

                                                <div>
                                                    <label for="color" class="form-label"><?php echo e(__('site.color')); ?></label>
                                                    <select required class="form-select" id="color" name="standard_color_id">
                                                        <option selected disabled value=""><?php echo e(__('site.choose')); ?></option>
                                                        <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($color->id); ?>">
                                                                <?php echo e($color->name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                    </select>


                                                </div>


                                                <div class="invalid-feedback">
                                                    Please select a valid state.
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="validationCustom05" class="form-label"><?php echo e(__('site.quantity')); ?></label>

                                                <div class="wrapper">
                                                    <span class="minus">-</span>
                                                    <input class="num" name="quantity" value="01"
                                                        style="width: 226%;" />
                                                    <span class="plus">+</span>
                                                </div>

                                            </div>

                                            <div class="col-12">
                                                <div class="input-icons">
                                                    
                                                    <input type="submit" class="btn btn-dark" value="<?php echo e(__('site.addToCart')); ?>">
                                                    <a class="checkoutt text-decoration-none" href="<?php echo e($setting->messenger); ?>"><button
                                                        type="button" class="btn btn-primary">Custom Size <i
                                                            class="fa-brands fa-facebook"></i></button></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h3 class="text-center pb-5">You May Also Like</h3>

            <div class="product-main">

                <!-- <h2 class="title">New Products</h2> -->

                <div class="product-grid product-grid-product prod">

                    <div class="showcase">

                        <div class="showcase-banner">

                            <img src="<?php echo e(asset('site')); ?>/assets/img/1.jpg" alt="Mens Winter Leathers Jackets"
                                width="300" class="product-img default">
                            <img src="<?php echo e(asset('site')); ?>/assets/img/1.jpg" alt="Mens Winter Leathers Jackets"
                                width="300" class="product-img hover">

                            <p class="showcase-badge">15%</p>

                            <div class="showcase-actions">

                                <button class="btn-action">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </button>



                                <button class="btn-action">
                                    <ion-icon name="bag-add-outline"></ion-icon>
                                </button>

                            </div>

                        </div>

                        <div class="showcase-content">

                            <a href="product.html" class="showcase-category">Wall Frame </a>

                            <a href="#">
                                <h3 class="showcase-title">Frame 30 x 90</h3>
                            </a>

                            <div class="price-box">
                                <p class="price">$48.00</p>
                                <del>$75.00</del>
                            </div>

                        </div>

                    </div>

                    <div class="showcase">

                        <div class="showcase-banner">
                            <img src="<?php echo e(asset('site')); ?>/assets/img/2.jpg" alt="Pure Garment Dyed Cotton Shirt"
                                class="product-img default" width="300">
                            <img src="<?php echo e(asset('site')); ?>/assets/img/2.jpg" alt="Pure Garment Dyed Cotton Shirt"
                                class="product-img hover" width="300">

                            <p class="showcase-badge angle black">sale</p>

                            <div class="showcase-actions">
                                <button class="btn-action">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </button>


                                <button class="btn-action">
                                    <ion-icon name="bag-add-outline"></ion-icon>
                                </button>
                            </div>
                        </div>

                        <div class="showcase-content">
                            <a href="#" class="showcase-category">Wall Frame</a>

                            <h3>
                                <a href="#" class="showcase-title">Frame 30 x 60</a>
                            </h3>

                            <div class="price-box">
                                <p class="price">$45.00</p>
                                <del>$56.00</del>
                            </div>

                        </div>

                    </div>

                    <div class="showcase">

                        <div class="showcase-banner">
                            <img src="<?php echo e(asset('site')); ?>/assets/img/3.jpg" alt="MEN Yarn Fleece Full-Zip Jacket"
                                class="product-img default" width="300">
                            <img src="<?php echo e(asset('site')); ?>/assets/img/3.jpg" alt="MEN Yarn Fleece Full-Zip Jacket"
                                class="product-img hover" width="300">

                            <div class="showcase-actions">
                                <button class="btn-action">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </button>



                                <button class="btn-action">
                                    <ion-icon name="bag-add-outline"></ion-icon>
                                </button>
                            </div>
                        </div>

                        <div class="showcase-content">
                            <a href="#" class="showcase-category">Wall Frame</a>

                            <h3>
                                <a href="#" class="showcase-title">Frame 60 x 90</a>
                            </h3>

                            <div class="price-box">
                                <p class="price">$58.00</p>
                                <del>$65.00</del>
                            </div>

                        </div>

                    </div>

                    <div class="showcase">

                        <div class="showcase-banner">
                            <img src="<?php echo e(asset('site')); ?>/assets/img/4.jpg" alt="Black Floral Wrap Midi Skirt"
                                class="product-img default" width="300">
                            <img src="<?php echo e(asset('site')); ?>/assets/img/4.jpg" alt="Black Floral Wrap Midi Skirt"
                                class="product-img hover" width="300">

                            <p class="showcase-badge angle pink">new</p>

                            <div class="showcase-actions">
                                <button class="btn-action">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </button>


                                <button class="btn-action">
                                    <ion-icon name="bag-add-outline"></ion-icon>
                                </button>
                            </div>
                        </div>

                        <div class="showcase-content">
                            <a href="#" class="showcase-category">Wall Frame</a>

                            <h3>
                                <a href="#" class="showcase-title">Frame 20 x 40</a>
                            </h3>

                            <div class="price-box">
                                <p class="price">$25.00</p>
                                <del>$35.00</del>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </main>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="https://releases.jquery.com/git/jquery-git.js"></script>

    <script src="<?php echo e(asset('site')); ?>/assets/fontawesome-free-6.4.2-web/js/all.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        $(document).ready(function() {
            // Bind click event to size options
            $('.size').click(function() {
                // Get selected size and price
                var size = $(this).data('size');
                var price = $(this).data('price');
                var available = $(this).data('available');
                console.log(available);

                // Update price display
                $('#price').text(' ' + price.toFixed(2));
                if (available == 'SOLD OUT') {
                    available = 'SOLD OUT';
                    $('#SOLDOUT').removeClass('text-success');
                    $('#SOLDOUT').css('color', 'red');

                    $('#SOLDOUT').text(' ' + available);
                }

            });
        });
    </script>
    <script src="<?php echo e(asset('site')); ?>/assets/js/magiczoomplus.js"></script>

    <script>
        const plus = document.querySelector(".plus"),
            minus = document.querySelector(".minus"),
            num = document.querySelector(".num");
        let a = 1;
        plus.addEventListener("click", () => {
            a++;
            a = (a < 5) ? "0" + a : a;
            num.value = a;
        });
        minus.addEventListener("click", () => {
            if (a > 1) {
                a--;
                a = (a < 5) ? "0" + a : a;
                num.value = a;
            }
        });
    </script>


    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            if (document.getElementById("color").value === "") {
                event.preventDefault();
                swal({
                    position: 'center',
                    icon: 'error',
                    title: "<?php echo e(__('site.errorSelectColor')); ?>",
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/product.blade.php ENDPATH**/ ?>