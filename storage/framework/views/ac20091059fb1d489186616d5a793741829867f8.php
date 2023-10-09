<?php $__env->startSection('content'); ?>
    <section class="pay pt-5">
        <div class="container">
            <div class="row">
                <div class="payment col-md-6 col-lg-8">
                    <h3 class="text-center text-uppercase pb-5"><?php echo e(__('site.PAYMENT')); ?></h3>
                    <form method="POST" action="<?php echo e(route('customers.payment.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                
                                <input type="text" class="form-control" id="inputFirst" placeholder="<?php echo e(__('site.firstName')); ?>"
                                    name="firstName" value="<?php echo e(old('firstName')); ?>" />
                            </div>
                            <div class="form-group col-md-6">
                                
                                <input type="text" class="form-control" id="inputLast" placeholder="<?php echo e(__('site.lastName')); ?>"
                                    name="lastName" value="<?php echo e(old('lastName')); ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo e(__('site.email')); ?>"
                                name="email" value="<?php echo e(old('email')); ?>" />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                
                                <input type="text" class="form-control" id="inputAddress" placeholder="<?php echo e(__('site.address_1')); ?>"
                                    name="address_1" value="<?php echo e(old('address_1')); ?>" />
                            </div>
                            <div class="form-group col-md-6">
                                
                                <input type="text" class="form-control" id="inputAddress2"
                                    placeholder="<?php echo e(__('site.address_2')); ?>" name="address_2"
                                    value="<?php echo e(old('address_2')); ?>" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                
                                <select class="form-select" id="country" name="governorate_id">
                                    <option disabled value="" selected><?php echo e(__('site.governorate')); ?>

                                    </option>
                                    <?php $__currentLoopData = $governorates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $governorate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e(old('governorate_id') == $governorate->id ? 'selected' : ''); ?>

                                            data-price="<?php echo e($governorate->price); ?>" value="<?php echo e($governorate->id); ?>">
                                            <?php echo e($governorate->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                
                                <select class="form-select" id="city-dropdown" name="city_id">
                                    <option disabled value="" selected name=""><?php echo e(__('site.area')); ?>

                                    </option>
                                    <?php if(old('governorate_id') != null): ?>
                                        <?php $__currentLoopData = $governorates->where('id', old('governorate_id'))->first()->city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $governorateCity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(old('city_id') == $governorateCity->id ? 'selected' : ''); ?>

                                                value="<?php echo e($governorateCity->id); ?>">
                                                <?php echo e($governorateCity->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                
                                <input type="text" class="form-control" id="inputZip" placeholder="<?php echo e(__('site.zip')); ?>"
                                    name="zip_code" value="<?php echo e(old('zip_code')); ?>" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                
                                <input type="text" class="form-control" id="inputPhone" placeholder="<?php echo e(__('site.mobile_1')); ?>"
                                    name="mobile_1" value="<?php echo e(old('mobile_1')); ?>" />
                            </div>
                            <div class="form-group col-md-6">
                                
                                <input type="text" class="form-control" id="inputPhone" placeholder="<?php echo e(__('site.mobile_2')); ?>"
                                    name="mobile_2" value="<?php echo e(old('mobile_2')); ?>" />
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                
                                <select class="form-select" id="validationCustom17" name="payment">
                                    <option <?php echo e(old('payment') == '' ? 'selected' : ''); ?> value=""><?php echo e(__('site.payment')); ?>

                                    </option>
                                    <option <?php echo e(old('payment') == 'Vodafone Cash' ? 'selected' : ''); ?>

                                        value="Vodafone Cash">Vodafone Cash</option>
                                    <option <?php echo e(old('payment') == 'InstaPay' ? 'selected' : ''); ?> value="InstaPay">InstaPay
                                    </option>
                                    <option <?php echo e(old('payment') == 'Cash On Delivery' ? 'selected' : ''); ?>

                                        value="Cash On Delivery">Cash On Delivery</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark mt-2 mb-3 w-25">
                            <?php echo e(__('site.send')); ?> <i class="fa-solid fa-credit-card ml-1"></i>
                        </button>
                    </form>
                </div>

                <div class="carr col-md-6 col-lg-4">
                    <div class="car">
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between align-items-center pb-2 ar-flex">
                                <h3><?php echo e(__('site.cart')); ?></h3>
                                <div class="position-relative pr-2"><i class="fa-solid fa-cart-shopping fa-xl"></i> <span
                                        class="count"><?php echo e(COUNT($carts)); ?></span></div>
                            </li>
                            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="shop-content">

                                    <img src="<?php echo e($cart->product->getFirstMediaUrl('products')); ?>"
                                        alt="<?php echo e($cart->product->name); ?>">
                                    <div class="shop-body">
                                        <div>
                                            <a href="<?php echo e(route('product.remove.cart', $cart->id)); ?>" class="remove"><i
                                                    class="fas fa-times"></i></a>

                                        </div>
                                        <span><?php echo e($cart->product->name); ?></span>
                                        <p class="text-black-50"><?php echo e($cart->standardColor->name); ?></p>
                                        <?php if($cart->size != ''): ?>
                                            <p class="text-black-50" style="margin-top: -10px"><?php echo e($cart->size); ?></p>
                                        <?php endif; ?>
                                        <p class="text-black-50" style="margin-top: -10px"><?php echo e(__('site.quantity')); ?>:
                                            <?php echo e($cart->quantity); ?></p>
                                    </div>
                                    <div class="price-field">
                                        <p class="price"><?php echo e($cart->price); ?></p>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            <li class="d-flex justify-content-start gap-3 align-items-center pt-4 ar-flex">
                                <h5><?php echo e(__('site.Total Price')); ?>:</h4>
                                    <h6 class="price" id="totalPrice"><?php echo e($totalPrice); ?> <?php echo e(__('site.EGP')); ?></h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
    <script src="https://releases.jquery.com/git/jquery-git.js"></script>
    <script>
        $(document).ready(function() {

            $('#country').on('change', function() {

                var governorateId = this.value;
                $("#state-dropdown").html('');
                var url = "<?php echo e(route('customers.getCitiesInSite', ':governorateId')); ?>";
                url = url.replace(':governorateId', governorateId);
                $.ajax({
                    url: url,

                    success: function(result) {
                        $('#city-dropdown').html(
                            '<option disabled selected value="">-- Select City --</option>');

                        $.each(result, function(key, value) {
                            $("#city-dropdown").append('<option value="' + value

                                .id + '">' + value.name.<?php echo e(App::getLocale()); ?> +
                                '</option>');
                        });

                    }

                });

            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var dilevary = $(this).find(':selected').attr('data-price');
                var price = '<?php echo e($totalPrice); ?>';
                var total = parseInt(price) + parseInt(dilevary) + "<?php echo e(__('site.EGP')); ?>";
                $('#totalPrice').html(total);

            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/payment.blade.php ENDPATH**/ ?>