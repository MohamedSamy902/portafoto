@extends('site.layouts.master')

@section('content')
    <section class="pay pt-5">
        <div class="container">
            <div class="row">
                <div class="payment col-md-6 col-lg-8">
                    <h3 class="text-center text-uppercase pb-5">Payment</h3>
                    <form method="POST" action="{{ route('customers.payment.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputFirst">First Name</label>
                                <input type="text" class="form-control" id="inputFirst" placeholder="First Name"
                                    name="firstName" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputLast">Last Name</label>
                                <input type="text" class="form-control" id="inputLast" placeholder="Last Name"
                                    name="lastName" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email Address"
                                name="email" />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St"
                                    name="address_1" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputAddress2">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2"
                                    placeholder="Apartment, studio, or floor" name="address_2" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" id="country" name="governorate_id">
                                    <option disabled value="" selected name="">-- Please Chose governorate --
                                    </option>
                                    @foreach ($governorates as $governorate)
                                        <option data-price="150" value="{{ $governorate->id }}">{{ $governorate->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="city-dropdown" class="form-label">State</label>
                                <select class="form-select" id="city-dropdown" name="city_id">
                                    <option disabled value="" selected name="">-- Please Chose governorate --
                                    </option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip" placeholder="Zip Code"
                                    name="zip_code" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputPhone">Phone Number</label>
                                <input type="text" class="form-control" id="inputPhone" placeholder="Phone Number"
                                    name="mobile_1" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPhone">Phone Number</label>
                                <input type="text" class="form-control" id="inputPhone" placeholder="Phone Number"
                                    name="mobile_2" />
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                <label for="validationCustom17" class="form-label">Payment Method</label>
                                <select class="form-select" id="validationCustom17" name="payment">
                                    <option selected value="">Vodafone Cash</option>
                                    <option value="">InstaPay</option>
                                    <option value="">Fawry</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark mt-2 mb-3 w-25">
                            Submit <i class="fa-solid fa-credit-card ml-1"></i>
                        </button>
                    </form>
                </div>

                <div class="carr col-md-6 col-lg-4">
                    <div class="car">
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between align-items-center pb-2 ar-flex">
                                <h3>{{ __('site.cart') }}</h3>
                                <div class="position-relative pr-2"><i class="fa-solid fa-cart-shopping fa-xl"></i> <span
                                        class="count">{{ COUNT($carts) }}</span></div>
                            </li>
                            @foreach ($carts as $cart)
                                <li class="shop-content">

                                    <img src="{{ $cart->product->getFirstMediaUrl('products') }}"
                                        alt="{{ $cart->product->name }}">
                                    <div class="shop-body">
                                        <div>
                                            <a href="{{ route('product.remove.cart', $cart->id) }}" class="remove"><i
                                                    class="fas fa-times"></i></a>

                                        </div>
                                        <span>{{ $cart->product->name }}</span>
                                        <p class="text-black-50">{{ $cart->standardColor->name }}</p>
                                        @if ($cart->size != '')
                                            <p class="text-black-50" style="margin-top: -10px">{{ $cart->size }}</p>
                                        @endif
                                        <p class="text-black-50" style="margin-top: -10px">{{ __('site.quantity') }}:
                                            {{ $cart->quantity }}</p>
                                    </div>
                                    <div class="price-field">
                                        <p class="price">{{ $cart->price }}</p>
                                    </div>
                                </li>
                            @endforeach


                            <li class="d-flex justify-content-start gap-3 align-items-center pt-4 ar-flex">
                                <h5>Total Price:</h4>
                                    <h6 class="price" id="totalPrice">{{ $totalPrice }} {{ __('site.EGP') }}</h6>
                            </li>
                        </ul>
                    </div>
                </div>
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
        $(document).ready(function() {
            $('#country').on('change', function() {
                var dilevary = $(this).find(':selected').attr('data-price');
                var price = '{{ $totalPrice }}';
                var total = parseInt(price) + parseInt(dilevary) + "{{ __('site.EGP') }}";
                $('#totalPrice').html(total);

            });
        });
    </script>
@endpush
