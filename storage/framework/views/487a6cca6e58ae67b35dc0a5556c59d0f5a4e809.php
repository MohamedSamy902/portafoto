

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
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button trace" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="trr">
                                        <h4>#15</h4>
                                        <p>Available</p>
                                        <a href="" class="btn btn-danger cancel">Cancel</a>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <table>
                                        <caption>Statement Summary</caption>
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Due Date</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Period</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td data-label=""><img class="t-img" width="200"
                                                        src="<?php echo e(asset('site/assets/images/banner-1.jpg')); ?>" alt="">
                                                </td>
                                                <td data-label="Due Date">04/01/2016</td>
                                                <td data-label="Amount">$1,190</td>
                                                <td data-label="Period">03/01/2016 - 03/31/2016</td>
                                            </tr>
                                            <tr>
                                                <td scope="row" data-label="Account">Visa - 6076</td>
                                                <td data-label="Due Date">03/01/2016</td>
                                                <td data-label="Amount">$2,443</td>
                                                <td data-label="Period">02/01/2016 - 02/29/2016</td>
                                            </tr>
                                            <tr>
                                                <td scope="row" data-label="Account">Corporate AMEX</td>
                                                <td data-label="Due Date">03/01/2016</td>
                                                <td data-label="Amount">$1,181</td>
                                                <td data-label="Period">02/01/2016 - 02/29/2016</td>
                                            </tr>
                                            <tr>
                                                <td scope="row" data-label="Acount">Visa - 3412</td>
                                                <td data-label="Due Date">02/01/2016</td>
                                                <td data-label="Amount">$842</td>
                                                <td data-label="Period">01/01/2016 - 01/31/2016</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="trr">
                                        <h4>#15</h4>
                                        <p>Available</p>
                                        <a href="" class="btn btn-danger cancel">Cancel</a>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the second item's accordion body.</strong> It is hidden by default,
                                    until the collapse plugin adds the appropriate classes that we use to style each
                                    element. These classes control the overall appearance, as well as the showing and hiding
                                    via CSS transitions. You can modify any of this with custom CSS or overriding our
                                    default variables. It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <div class="trr">
                                        <h4>#15</h4>
                                        <p>Available</p>
                                        <a href="" class="btn btn-danger cancel">Cancel</a>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <strong>This is the third item's accordion body.</strong> It is hidden by default, until
                                    the collapse plugin adds the appropriate classes that we use to style each element.
                                    These classes control the overall appearance, as well as the showing and hiding via CSS
                                    transitions. You can modify any of this with custom CSS or overriding our default
                                    variables. It's also worth noting that just about any HTML can go within the
                                    <code>.accordion-body</code>, though the transition does limit overflow.
                                </div>
                            </div>
                        </div>
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

<?php echo $__env->make('site.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Programming\new\portafoto\resources\views/site/order.blade.php ENDPATH**/ ?>