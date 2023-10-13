<?php $__env->startSection('content'); ?>
    <section class="pay pt-5 pb-5">
        <div class="container">
            <div class="row flex-direction-column-reverse flex-direction-lg-row">

                <section class="checkout-form">
                    <form method="POST" action="<?php echo e(route('customers.payment.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <h3><?php echo e(__('site.PAYMENT')); ?></h3>
                        <div class="form-controll">
                            
                            <div>
                                <span class="fa fa-envelope"></span>
                                <input type="email" id="checkout-email"
                                    placeholder="<?php echo e(__('site.email')); ?>" name="email" value="<?php echo e(old('email')); ?>">
                            </div>
                        </div>
                        <div class="form-controll">
                            
                            <div>
                                <span class="fa fa-phone"></span>
                                <input type="tel" id="checkout-phone"
                                    placeholder="<?php echo e(__('site.mobile_1')); ?>" name="mobile_1">
                            </div>
                            <div class="form-controll">

                                <div>
                                    <span class="fa fa-phone"></span>
                                    <input type="tel" id="checkout-phone"
                                        placeholder="<?php echo e(__('site.mobile_2')); ?>" name="mobile_2">
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6><?php echo e(__('site.Shipping address')); ?></h6>
                        <div class="form-controll">
                            
                            <div>
                                <span class="fa fa-user-circle"></span>
                                <input type="text" id="checkout-name" name="name" placeholder="<?php echo e(__('site.name')); ?>"
                                    value="<?php echo e(old('name')); ?>">
                            </div>
                        </div>
                        <div class="form-controll">
                            
                            <div>
                                <span class="fa fa-home"></span>
                                <input type="text" id="checkout-address" placeholder="<?php echo e(__('site.address_1')); ?>"
                                    name="address_1" value="<?php echo e(old('address_1')); ?>">
                            </div>
                        </div>
                        <div class="form-controll">
                            
                            <div>
                                <span class="fa fa-home"></span>
                                <input type="text" id="checkout-address" placeholder="<?php echo e(__('site.address_2')); ?>"
                                    name="address_2" value="<?php echo e(old('address_2')); ?>">
                            </div>
                        </div>
                        
                        <div class="form-controll" style="display: flex;">
                            <div class="form-controll" style="width: 50%; padding: 5px">


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
                            <div class="form-controll" style="width: 50%; padding: 5px">
                                

                                <select class="form-select" id="city-dropdown" name="city_id">
                                    <option disabled value="" selected ><?php echo e(__('site.area')); ?>

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

                        </div>

                        <h4><?php echo e(__('site.payment')); ?></h4>
                        <div class="form-check voda">
                            <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault1"
                                checked  value="InstaPay">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Cash on Delivery (COD)
                            </label>
                        </div>
                        <div class="form-check voda one">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Vodafone Cash
                            </label>
                            <div class="want one">
                                <p>Note: <span>We will process your order after we receive the payment</span></p>
                                <p>Account: <span><?php echo e($setting->vodafoneCash); ?></span></p>
                            </div>
                        </div>
                        <div class="form-check voda two">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Instapay
                            </label>
                            <div class="want two">
                                <p>Note: <span>We will process your order after we receive the payment</span></p>
                                <p>Account: <span><?php echo e($setting->instapay); ?></span></p>
                            </div>
                        </div>

                        <div class="form-controll-btn">
                            <button>Continue</button>
                        </div>
                    </form>

                </section>

                <section class="checkout-details">
                    <div class="checkout-details-inner">
                        <div class="checkout-lists">
                            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="cardd">
                                    
                                    <div class="card-image"><img src="<?php echo e($cart->product->getFirstMediaUrl('products')); ?>"
                                            alt=""></div>
                                    <div class="card-details">
                                        <div class="card-name"><?php echo e($cart->product->name); ?></div>
                                        <?php if($cart->size != ''): ?>
                                            <p class="text-black-50 pt-2"><?php echo e($cart->size); ?></p>
                                        <?php endif; ?>
                                        <p class="text-black-50 pt-2"><?php echo e(__('site.quantity')); ?>:
                                            <?php echo e($cart->quantity); ?></p>
                                        <div class="card-price"><?php echo e($cart->price); ?> <span></span></div>


                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>

                        <div class="checkout-total">
                            <h6><?php echo e(__('site.Total Price')); ?>:</h6>
                            <p id="totalPrice"><?php echo e($totalPrice); ?> <?php echo e(__('site.EGP')); ?></p>
                        </div>
                    </div>
                </section>

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
        function checkMe(selected) {
            if (selected) {
                document.getElementById("divcheck").style.display = "";
            } else {
                document.getElementById("divcheck").style.display = "none";
            }

        }
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
    <script>
        const voda1 = document.querySelector(".voda.one");
        const voda2 = document.querySelector(".voda.two");
        const radio1 = document.getElementById("flexRadioDefault1");
        const radio2 = document.getElementById("flexRadioDefault2");
        const radio3 = document.getElementById("flexRadioDefault3");
        const want1 = document.querySelector(".want.one");
        const want2 = document.querySelector(".want.two");
        radio1.addEventListener('click', () => {
            want1.classList.remove("active");
            want2.classList.remove("active");
            voda1.classList.remove("bord");
            voda2.classList.remove("bord");
        })
        radio2.addEventListener('click', () => {
            voda1.classList.add("bord");
            voda2.classList.remove("bord")
            want1.classList.toggle("active");
            want2.classList.remove("active");
        })
        radio3.addEventListener('click', () => {
            voda2.classList.add("bord");
            voda1.classList.remove("bord");
            want2.classList.toggle("active");
            want1.classList.remove("active")
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/payment.blade.php ENDPATH**/ ?>