@extends('site.layouts.master')

@section('content')
    <section class="pay pt-5 pb-5">
        <div class="container">
            <div class="row flex-direction-column-reverse flex-direction-lg-row">

                <section class="checkout-form">
                    <form action="#!" method="get">
                        <h4>Contact Information</h4>
                        <div class="form-controll">
                            <label for="checkout-email">E-mail</label>
                            <div>
                                <span class="fa fa-envelope"></span>
                                <input type="email" id="checkout-email" name="checkout-email"
                                    placeholder="Enter your email...">
                            </div>
                        </div>
                        <div class="form-controll">
                            <label for="checkout-phone">Phone</label>
                            <div>
                                <span class="fa fa-phone"></span>
                                <input type="tel" name="checkout-phone" id="checkout-phone"
                                    placeholder="Enter you phone...">
                            </div>
                        </div>
                        <br>
                        <h6>Shipping address</h6>
                        <div class="form-controll">
                            <label for="checkout-name">Full name</label>
                            <div>
                                <span class="fa fa-user-circle"></span>
                                <input type="text" id="checkout-name" name="checkout-name"
                                    placeholder="Enter you name...">
                            </div>
                        </div>
                        <div class="form-controll">
                            <label for="checkout-address">Address</label>
                            <div>
                                <span class="fa fa-home"></span>
                                <input type="text" name="checkout-address" id="checkout-address"
                                    placeholder="Your address...">
                            </div>
                        </div>
                        <div class="form-controll">
                            <label for="checkout-city">City</label>
                            <div>
                                <span class="fa fa-building"></span>
                                <input type="text" name="checkout-city" id="checkout-city" placeholder="Your city...">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-controll">
                                <label for="checkout-country">Country</label>
                                <div>
                                    <span class="fa fa-globe"></span>
                                    <input type="text" name="checkout-country" id="checkout-country"
                                        placeholder="Your country..." list="country-list">
                                    <datalist id="country-list">
                                        <option value="India"></option>
                                        <option value="USA"></option>
                                        <option value="Russia"></option>
                                        <option value="Japan"></option>
                                        <option value="Egypt"></option>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-controll">
                                <label for="checkout-postal">Postal code</label>
                                <div>
                                    <span class="fa fa-archive"></span>
                                    <input type="numeric" name="checkout-postal" id="checkout-postal"
                                        placeholder="Your postal code...">
                                </div>
                            </div>
                        </div>

                        <h4>Payment Method</h4>
                        <div class="form-check voda">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
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
                                <p>Account: <span>admin@cybog.com</span></p>
                            </div>
                        </div>
                        <div class="form-check voda two">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Instapay
                            </label>
                            <div class="want two">
                                <p>Note: <span>We will process your order after we receive the payment</span></p>
                                <p>Account: <span>admin@cybog.com</span></p>
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
                            <div class="cardd">
                                <a href="" class="remove"><i class="fas fa-times"></i></a>
                                <div class="card-image"><img src="https://rvs-checkout-page.onrender.com/photo1.png"
                                        alt=""></div>
                                <div class="card-details">
                                    <div class="card-name">Vintage Backbag</div>
                                    <div class="card-price">$54.99 <span>$94.99</span></div>


                                </div>
                            </div>
                            <div class="cardd">
                                <a href="" class="remove"><i class="fas fa-times"></i></a>

                                <div class="card-image"><img src="https://rvs-checkout-page.onrender.com/photo2.png"
                                        alt=""></div>
                                <div class="card-details">
                                    <div class="card-name">Levi Shoes</div>
                                    <div class="card-price">$74.99 <span>$124.99</span></div>

                                </div>
                            </div>
                        </div>
                        <div class="checkout-shipping">
                            <h6>Shipping</h6>
                            <p>$19</p>
                        </div>
                        <div class="checkout-total">
                            <h6>Total</h6>
                            <p>$148.98</p>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </section>
@endsection


@push('js')
    <script src="https://releases.jquery.com/git/jquery-git.js"></script>
    <script>
        $(document).ready(function() {

            $('#country').on('change', function() {

                var governorateId = this.value;
                $("#state-dropdown").html('');
                var url = "{{ route('customers.getCitiesInSite', ':governorateId') }}";
                url = url.replace(':governorateId', governorateId);
                $.ajax({
                    url: url,

                    success: function(result) {
                        $('#city-dropdown').html(
                            '<option disabled selected value="">-- Select City --</option>');

                        $.each(result, function(key, value) {
                            $("#city-dropdown").append('<option value="' + value

                                .id + '">' + value.name.{{ App::getLocale() }} +
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
                var price = '{{ $totalPrice }}';
                var total = parseInt(price) + parseInt(dilevary) + "{{ __('site.EGP') }}";
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
@endpush
