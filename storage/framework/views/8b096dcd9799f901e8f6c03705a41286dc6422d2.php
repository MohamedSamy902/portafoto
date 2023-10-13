<?php $__env->startPush('css'); ?>
    <style>

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="order">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="accordion pt-5 pb-5" id="accordionExample">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" style="background-color: #e7f1ff;
                                box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);">
                                    <button class="accordion-button trace" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne<?php echo e($order->id); ?>" aria-expanded="true" aria-controls="collapseOne<?php echo e($order->id); ?>" style="width: 75%;
                                        display: -webkit-inline-box;">
                                        <div class="trr">
                                            <h4>#<?php echo e($order->id); ?></h4>
                                            <p><?php echo e($order->status); ?></p>
                                            <p><?php echo e($order->created_at); ?></p>
                                            
                                        </div>
                                    </button>
                                    <?php if($order->status == 'pending'): ?>
                                    <a href="<?php echo e(route('cancelOrder', $order->id)); ?>" class="btn btn-danger cancel">Cancel</a>
                                    <?php endif; ?>
                                </h2>
                                <div id="collapseOne<?php echo e($order->id); ?>" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <table>
                                            <caption><?php echo e(__('site.Total Price')); ?> : <?php echo e($order->totalPrice); ?></caption>
                                            <thead>
                                                <tr>
                                                    <th scope="col"><?php echo e(__('master.image')); ?></th>
                                                    <th scope="col"><?php echo e(__('product.product')); ?></th>
                                                    <th scope="col"><?php echo e(__('site.color')); ?></th>
                                                    <th scope="col"><?php echo e(__('site.quantity')); ?></th>
                                                    <th scope="col"><?php echo e(__('master.size')); ?></th>
                                                    <th scope="col"><?php echo e(__('site.Total Price')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $order->cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td data-label=""><img class="t-img" width="200"
                                                                src="<?php echo e($cart->product->getFirstMediaUrl('products')); ?>"
                                                                alt="">
                                                        </td>
                                                        <td data-label="Due Date"><?php echo e($cart->product->name); ?></td>
                                                        <td data-label="Amount"><?php echo e($cart->standardColor->name); ?></td>
                                                        <td data-label="Period"><?php echo e($cart->quantity); ?></td>
                                                        <td data-label="Period"><?php echo $cart->size == null ? $cart->product->description :  $cart->size; ?></td>
                                                        <td data-label="Period"><?php echo e($cart->totalPrice); ?></td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="https://releases.jquery.com/git/jquery-git.js"></script>

    <script src="<?php echo e(asset('site')); ?>/assets/fontawesome-free-6.4.2-web/js/all.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/site/order.blade.php ENDPATH**/ ?>