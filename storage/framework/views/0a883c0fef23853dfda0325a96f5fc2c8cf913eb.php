<?php $__env->startSection('title'); ?>
    <?php echo e(__('product.product_edit')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/select2.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('breadcrumb_title'); ?>
            <h3><?php echo e(__('product.product_edit')); ?></h3>
        <?php $__env->endSlot(); ?>

        <li class="breadcrumb-item"><a href="<?php echo e(route('products.index')); ?>"><?php echo e(__('product.products')); ?></a></li>
        <li class="breadcrumb-item active"><?php echo e(__('product.product_edit')); ?></li>
    <?php echo $__env->renderComponent(); ?>


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5><?php echo e(__('master.data')); ?></h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post"
                            action="<?php echo e(route('setting.update')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            

                            


                            <div class="mb-3">
                                <label class="form-label"
                                    for="validationTextarea"><?php echo e(__('master.description_en')); ?></label>
                                <textarea class="form-control" cols="30" rows="10" name="description"><?php echo e(old('description') ? old('description') : $setting->getTranslation('description', 'en')); ?></textarea>

                            </div>

                            <div class="mb-3">
                                <label class="form-label"
                                    for="validationTextarea"><?php echo e(__('master.description_ar')); ?></label>
                                <textarea class="form-control"  cols="30" rows="10" name="description_ar"><?php echo e(old('description_ar') ? old('description_ar') : $setting->getTranslation('description', 'ar')); ?> </textarea>

                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('master.keywords')); ?></label>
                                    
                                        <textarea class="form-control"  cols="30" rows="10" name="keywords"><?php echo e(old('keywords') ? old('keywords') : $setting->getTranslation('keywords', 'en')); ?></textarea>

                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('master.keywords_ar')); ?></label>

                                        <textarea class="form-control"  cols="30" rows="10" name="keywords_ar"><?php echo e(old('keywords_ar') ? old('keywords_ar') : $setting->getTranslation('keywords', 'ar')); ?></textarea>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('master.facebook')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text" name="facebook"
                                        placeholder=""
                                        value="<?php echo e(old('facebook') ? old('facebook') : $setting->facebook); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('master.instagram')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text" name="instagram"
                                        placeholder=""
                                        value="<?php echo e(old('instagram') ? old('instagram') : $setting->instagram); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom01"><?php echo e(__('master.twitter')); ?></label>
                                <input class="form-control" id="validationCustom01" type="text" name="twitter"
                                    placeholder="" value="<?php echo e(old('twitter') ? old('twitter') : $setting->twitter); ?>" />
                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom01"><?php echo e(__('master.messenger')); ?></label>
                                <input class="form-control" id="validationCustom01" type="text" name="messenger"
                                    placeholder="" value="<?php echo e(old('messenger') ? old('messenger') : $setting->messenger); ?>" />
                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom01"><?php echo e(__('master.mobile_1')); ?></label>
                                <input class="form-control" id="validationCustom01" type="text" name="mobile_1"
                                    placeholder="" value="<?php echo e(old('mobile_1') ? old('mobile_1') : $setting->mobile_1); ?>" />
                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom01"><?php echo e(__('master.mobile_2')); ?></label>
                                <input class="form-control" id="validationCustom01" type="text" name="mobile_2"
                                    placeholder="" value="<?php echo e(old('mobile_2') ? old('mobile_2') : $setting->mobile_2); ?>" />
                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom01"><?php echo e(__('master.vodafoneCash')); ?></label>
                                <input class="form-control" id="validationCustom01" type="text" name="vodafoneCash"
                                    placeholder="" value="<?php echo e(old('vodafoneCash') ? old('vodafoneCash') : $setting->vodafoneCash); ?>" />
                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom01"><?php echo e(__('master.instapay')); ?></label>
                                <input class="form-control" id="validationCustom01" type="text" name="instapay"
                                    placeholder="" value="<?php echo e(old('instapay') ? old('instapay') : $setting->instapay); ?>" />
                                <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                            </div>


                            <button class="btn btn-primary" type="submit"><?php echo e(__('master.save')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/dashbord/settings/edit.blade.php ENDPATH**/ ?>