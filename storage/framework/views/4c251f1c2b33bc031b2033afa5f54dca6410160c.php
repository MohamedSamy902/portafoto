<?php $__env->startSection('title'); ?>
    المنطقه
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3>المنطقه</h3>
        <?php $__env->endSlot(); ?>

        <li class="breadcrumb-item"><a href="<?php echo e(route('cities.index')); ?>">المناطق</a></li>
        <li class="breadcrumb-item active"> تعدبل منطقه</li>
    <?php echo $__env->renderComponent(); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5><?php echo e(__('master.data')); ?></h5>
                    </div>
                    <div class="card-body">
                        <h5><?php echo e($governorate->name); ?></h5>
                        <form class="needs-validation" novalidate="" method="post"
                            action="<?php echo e(route('governorates.update', $governorate->id)); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            


                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('master.price')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text" required="" value="<?php echo e(old('price') ? old('price') : $governorate->price); ?>" name="price" placeholder="ex: 150" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">حفظ</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/dashbord/governorates/edit.blade.php ENDPATH**/ ?>