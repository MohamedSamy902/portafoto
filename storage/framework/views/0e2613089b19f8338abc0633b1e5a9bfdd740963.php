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
                            action="<?php echo e(route('products.update', $product->id)); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('patch'); ?>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('master.name_en')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" placeholder=""
                                        value="<?php echo e(old('name') ? old('name') : $product->getTranslation('name', 'en')); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01"><?php echo e(__('master.name_ar')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name_ar" placeholder=""
                                        value="<?php echo e(old('name') ? old('name') : $product->getTranslation('name', 'ar')); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label"
                                    for="validationTextarea"><?php echo e(__('master.description_en')); ?></label>
                                <textarea id="editor1" cols="30" rows="10" name="description">
                                    <?php echo e(old('description') ? old('description') : $product->getTranslation('description', 'en')); ?>

                                </textarea>

                            </div>

                            <div class="mb-3">
                                <label class="form-label"
                                    for="validationTextarea"><?php echo e(__('master.description_ar')); ?></label>
                                <textarea id="editor2" cols="30" rows="10" name="description_ar">
                                    <?php echo e(old('description_ar') ? old('description_ar') : $product->getTranslation('description', 'ar')); ?>

                                </textarea>

                            </div>




                            <?php if($product->price != null): ?>
                                <div class="row g-1" id="price">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="validationCustom01"><?php echo e(__('master.price')); ?></label>
                                        <input class="form-control" id="validationCustom01" type="text" name="price"
                                            placeholder="" value="<?php echo e(old('price') ? old('price') : $product->price); ?>" />
                                        <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                        <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($product->discount != null): ?>
                                <div class="row g-1" id="discount">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label"
                                            for="validationCustom01"><?php echo e(__('master.discount')); ?></label>
                                        <input class="form-control" id="validationCustom01" type="text" name="discount"
                                            placeholder=""
                                            value="<?php echo e(old('discount') ? old('discount') : $product->discount); ?>" />
                                        <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                        <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="category"><?php echo e(__('category.category')); ?></label>
                                    <select class="form-select" id="category" required="" name="category_id">
                                        <option  disabled="" value="">
                                            <?php echo e(__('category.category')); ?>

                                        </option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($category->id == $product->id): echo 'selected'; endif; ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <?php if($product->price == null): ?>
                                <div class="row g-2 element" id="div_1">

                                    <div class="col-2">
                                        <div class="mb-3" style="margin-top: 32px;">
                                            <span class="add btn btn-primary"><?php echo e(__('product.addSizes')); ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault06"><?php echo e(__('master.status')); ?></label>
                                    <select class="form-select" id="validationDefault06" required="" name="status">
                                        <option selected="" disabled="" value=""> <?php echo e(__('master.status')); ?>

                                        </option>
                                        <option value="active" <?php if($product->status == 'active'): echo 'selected'; endif; ?>><?php echo e(__('master.active')); ?>

                                        </option>
                                        <option value="inactive" <?php if($product->status == 'inactive'): echo 'selected'; endif; ?>> <?php echo e(__('master.inactive')); ?>

                                        </option>
                                        <option value="SOLD OUT" <?php if($product->status == 'SOLD OUT'): echo 'selected'; endif; ?>> <?php echo e(__('master.SOLDOUT')); ?>

                                        </option>


                                    </select>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>



                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label"
                                        for="validationDefault06"><?php echo e(__('product.showBest')); ?></label>
                                    <select class="form-select" id="validationDefault06" required="" name="best">
                                        <option value="no" <?php if($product->best == 'no'): echo 'selected'; endif; ?>> <?php echo e(__('product.no')); ?>

                                        </option>
                                        <option value="yes" <?php if($product->best == 'yes'): echo 'selected'; endif; ?>> <?php echo e(__('product.yes')); ?>

                                        </option>


                                    </select>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label"
                                        for="validationDefault06"><?php echo e(__('product.showSlider')); ?></label>
                                    <select class="form-select" id="validationDefault06" required="" name="slider">
                                        <option value="no" <?php if($product->slider == 'no'): echo 'selected'; endif; ?>> <?php echo e(__('product.no')); ?></option>
                                        <option value="yes" <?php if($product->slider == 'yes'): echo 'selected'; endif; ?>> <?php echo e(__('product.yes')); ?></option>


                                    </select>
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>


                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom07"><?php echo e(__('master.image')); ?></label>
                                    <input class="form-control" id="validationCustom07" type="file"
                                        aria-label="file example" name="photos[]" multiple />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>
                            </div>


                            <button class="btn btn-primary" type="submit"><?php echo e(__('master.save')); ?></button>
                        </form>
                    </div>
                </div>

                <?php if(count($product->size) > 0): ?>
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="text-center"><?php echo e(__('master.size')); ?></h5>
                        </div>
                        <div class="card-body">
                            <?php $__currentLoopData = $product->size; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productSize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <form class="needs-validation" novalidate="" method="post"
                                    action="<?php echo e(route('size.update', $productSize->id)); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                    <div class="row g-1">
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label"
                                                for="validationCustom05"><?php echo e(__('master.size')); ?></label>
                                            <select class="form-select col-sm-12" name="standard_size_id">
                                                <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php if($productSize->standard_size_id == $size->id): echo 'selected'; endif; ?> value="<?php echo e($size->id); ?>">
                                                        <?php echo e($size->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                            <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label"
                                                for="validationCustom05"><?php echo e(__('master.price')); ?></label>
                                            <input class="form-control" id="validationCustom05" type="text"
                                                name="price" required=""
                                                value="<?php echo e(old('price') ? old('price') : $productSize->price); ?>" />
                                            <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                            <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label"
                                                for="validationCustom05"><?php echo e(__('master.discount')); ?></label>
                                            <input class="form-control" id="validationCustom05" type="text"
                                                name="discount"
                                                value="<?php echo e(old('discount') ? old('discount') : $productSize->discount); ?>" />
                                            <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                            <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                        </div>

                                        <div class="col-1">
                                            <div class="mt-2 mb-3">
                                                <br>
                                                <a href="<?php echo e(route('size.delete', $productSize->id)); ?>"
                                                    class=" btn btn-danger"><?php echo e(__('master.remove')); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="mt-2 mb-3 m-1">
                                                <br>
                                                <input type="submit" value="<?php echo e(__('master.edit')); ?>"
                                                    class="btn btn-info">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>


        <div class="email-wrap bookmark-wrap">
            <div class="row">
                <div class="col-xl-12 col-md-12 box-col-8">
                    <div class="email-right-aside bookmark-tabcontent">
                        <div class="card email-body radius-left">
                            <div class="ps-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                                        aria-labelledby="pills-created-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex">
                                                <h6 class="mb-0"><?php echo e(__('master.image')); ?></h6>

                                            </div>
                                            <div class="card-body pb-0">
                                                <div class="details-bookmark text-center">
                                                    <div class="row" id="bookmarkData">
                                                        <?php $__currentLoopData = $product->getMedia('products'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 box-col-6">
                                                                <div class="card bookmark-card o-hidden">
                                                                    <div class="details-website">
                                                                        <img class="img-fluid"
                                                                            src="<?php echo e($productImage->getFullUrl()); ?>"
                                                                            alt="">
                                                                        <div class="favourite-icon favourite_0"
                                                                            onclick="setFavourite(0)">
                                                                            <form
                                                                                action="<?php echo e(route('products.images.delete', [$product->id, $productImage->id])); ?>"
                                                                                method="post">
                                                                                <?php echo csrf_field(); ?>
                                                                                <?php echo method_field('DELETE'); ?>
                                                                                <button type="submit"><i
                                                                                        style="color: #000"
                                                                                        class="fa fa-trash"></i></button>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $__env->startPush('scripts'); ?>
        <script src="<?php echo e(asset('assets/js/form-validation-custom.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/editor/ckeditor/ckeditor.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/editor/ckeditor/adapters/jquery.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/editor/ckeditor/styles.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/editor/ckeditor/ckeditor.custom.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/bookmark/jquery.validate.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/bookmark/custom.js')); ?>"></script>

        <script>
            $(document).ready(function() {
                // Add new element
                $(".add").click(function() {
                    $("#price").empty();
                    $("#discount").empty();


                    // Finding total number of elements added
                    var total_element = $(".element").length;

                    // last <> with element class id
                    var lastid = $(".element:last").attr("id");
                    var split_id = lastid.split("_");
                    var nextindex = Number(split_id[1]) + 1;

                    // Adding new div container after last occurance of element class
                    $(".element:last").after(

                        "<div class='element row' id='div_" + nextindex + "'></div>"
                    );

                    // Adding element to <div>
                    $("#div_" + nextindex).append(
                        `
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="validationCustom05"><?php echo e(__('master.size')); ?></label>
                            <select class="form-select col-sm-12" name="standard_size_id[]">
                                <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($size->id); ?>"><?php echo e($size->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                            <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="validationCustom05"><?php echo e(__('master.price')); ?></label>
                            <input class="form-control" id="validationCustom05" type="text" name="price_size[]"
                                required=""  />
                            <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                            <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                        </div>
                        <div class="col-md-3 mb-3">
                                    <label class="form-label" for="validationCustom05"><?php echo e(__('master.discount')); ?></label>
                                    <input class="form-control" id="validationCustom05" type="text" name="discount_size[]"
                                        />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>

                        <div class="col-2">
                            <div class="mt-2 mb-3">
                                <br>
                                <span id="remove_${nextindex}" class="remove btn btn-danger"><?php echo e(__('master.remove')); ?></span>
                            </div>
                        </div>
                    </div>`
                    );
                });

                // Remove element
                $(".row").on("click", ".remove", function() {
                    var id = this.id;
                    var split_id = id.split("_");
                    var deleteindex = split_id[1];
                    // Remove <div> with id
                    $("#div_" + deleteindex).remove();
                    if ($(".element").length == 1) {
                        $("#price").append(`<div class="col-md-12 mb-3">
                                    <label class="form-label"
                                        for="validationCustom01"><?php echo e(__('master.price')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="price" placeholder="" value="<?php echo e(old('price')); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>`);

                        $("#price").append(`<div class="col-md-12 mb-3">
                                    <label class="form-label"
                                        for="validationCustom01"><?php echo e(__('master.discount')); ?></label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="discount" placeholder="" value="<?php echo e(old('discount')); ?>" />
                                    <div class="valid-feedback"><?php echo e(__('validation.valid_feedback')); ?></div>
                                    <div class="invalid-feedback"><?php echo e(__('validation.invalid_feedback')); ?></div>
                                </div>`);
                    }
                });
            });
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/mohamed/Desktop/art/laravel/resources/views/dashbord/products/edit.blade.php ENDPATH**/ ?>