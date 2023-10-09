<?php $__env->startSection('title'); ?>
    Invoice
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3>Invoice</h3>
        <?php $__env->endSlot(); ?>
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item">Ecommerce</li>
        <li class="breadcrumb-item active">Invoice</li>
    <?php echo $__env->renderComponent(); ?>

    <div class="container invoice">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div>
                            
                            <!-- End InvoiceTop-->
                            <div class="row invo-profile">
                                <div class="col-xl-4">
                                    <div class="media">
                                        
                                        <div class="media-body m-l-20">
                                            <h4 class="media-heading f-w-600"><?php echo e($invoice->name); ?></h4>
                                            <p> <?php echo e($invoice->email); ?><br />
                                                <span class="digits"><?php echo e($invoice->mobile_1); ?></span> /
                                                <span class="digits"><?php echo e($invoice->mobile_2); ?></span>
                                            </p>
                                            <p
                                                style="color: #000;
                                            font-size: 20px;
                                            font-weight: 700;">
                                                <?php echo e($invoice->payment); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="text-xl-end" id="project">
                                        
                                        <p>
                                            <?php echo e($invoice->address_1); ?> <br>
                                            <?php echo e($invoice->address_2); ?> <br>
                                            <?php echo e($invoice->governorate->name); ?> <br>
                                            <?php echo e($invoice->city->name); ?><br>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <!-- End Invoice Mid-->
                            <div>
                                <div class="table-responsive invoice-table" id="table">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="item">
                                                    <h6 class="p-2 mb-0"><?php echo e(__('master.name')); ?></h6>
                                                </td>
                                                <td class="Hours">
                                                    <h6 class="p-2 mb-0"><?php echo e(__('site.color')); ?></h6>
                                                </td>
                                                <td class="Rate">
                                                    <h6 class="p-2 mb-0"><?php echo e(__('site.quantity')); ?></h6>
                                                </td>
                                                <td class="subtotal">
                                                    <h6 class="p-2 mb-0"><?php echo e(__('master.size')); ?></h6>
                                                </td>
                                                <td class="subtotal">
                                                    <h6 class="p-2 mb-0"><?php echo e(__('site.totalPrice')); ?></h6>
                                                </td>
                                            </tr>
                                            <?php $__currentLoopData = $invoice->cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <label><?php echo e($cart->product->name); ?></label>
                                                        
                                                    </td>
                                                    <td>
                                                        <p class="itemtext digits"><?php echo e($cart->standardColor->name); ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext digits"><?php echo e($cart->quantity); ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext digits"><?php echo e($cart->size); ?></p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext digits"><?php echo e($cart->totalPrice); ?></p>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Table-->
                                <div class="row mt-3">
                                    <div class="col-md-8">
                                        <div>
                                            <p class="legal">
                                                <strong>TotalPrice</strong> <?php echo e($invoice->totalPrice); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <?php if($invoice->status == 'panning'): ?>
                                            <a class="btn btn-info"
                                                href="<?php echo e(route('invoice.approved', $invoice->id)); ?>">Approv</a>
                                            <a class="btn btn-danger"
                                                href="<?php echo e(route('invoice.refusal', $invoice->id)); ?>">Refusal</a>
                                        <?php else: ?>
                                        <p style="    color: #000;
                                        text-align: center;
                                        background-color: #d1d7cd;
                                        border-radius: 5px;"><?php echo e($invoice->status); ?></p>

                                        <?php endif; ?>

                                        
                                    </div>
                                </div>
                            </div>
                            <!-- End InvoiceBot-->
                        </div>
                        
                    </div>
                    <!-- End Invoice-->
                    <!-- End Invoice Holder-->
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('assets/js/counter/jquery.waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/counter/jquery.counterup.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/counter/counter-custom.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/print.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/dashbord/invoices/invoice.blade.php ENDPATH**/ ?>