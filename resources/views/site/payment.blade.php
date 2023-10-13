@extends('site.layouts.master')

@section('content')
    <section class="pay pt-5 pb-5">
        <div class="container">
            <div class="row flex-direction-column-reverse flex-direction-lg-row">

                <section class="checkout-form">
                    <form method="POST" action="{{ route('customers.payment.store') }}">
                        @csrf
                        <h3>{{ __('site.PAYMENT') }}</h3>
                        <div class="form-controll">
                            {{-- <label for="checkout-email">E-mail</label> --}}
                            <div>
                                <span class="fa fa-envelope"></span>
                                <input type="email" id="checkout-email"
                                    placeholder="{{ __('site.email') }}" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-controll">
                            {{-- <label for="checkout-phone">Phone</label> --}}
                            <div>
                                <span class="fa fa-phone"></span>
                                <input type="tel" id="checkout-phone"
                                    placeholder="{{ __('site.mobile_1') }}" name="mobile_1">
                            </div>
                            <div class="form-controll">

                                <div>
                                    <span class="fa fa-phone"></span>
                                    <input type="tel" id="checkout-phone"
                                        placeholder="{{ __('site.mobile_2') }}" name="mobile_2">
                                </div>
                            </div>
                        </div>
                        <br>
                        <h6>{{ __('site.Shipping address') }}</h6>
                        <div class="form-controll">
                            {{-- <label for="checkout-name">Full name</label> --}}
                            <div>
                                <span class="fa fa-user-circle"></span>
                                <input type="text" id="checkout-name" name="name" placeholder="{{ __('site.name') }}"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-controll">
                            {{-- <label for="checkout-address">Address</label> --}}
                            <div>
                                <span class="fa fa-home"></span>
                                <input type="text" id="checkout-address" placeholder="{{ __('site.address_1') }}"
                                    name="address_1" value="{{ old('address_1') }}">
                            </div>
                        </div>
                        <div class="form-controll">
                            {{-- <label for="checkout-address">Address</label> --}}
                            <div>
                                <span class="fa fa-home"></span>
                                <input type="text" id="checkout-address" placeholder="{{ __('site.address_2') }}"
                                    name="address_2" value="{{ old('address_2') }}">
                            </div>
                        </div>
                        {{-- <div class="form-controll">
                            <label for="checkout-city">City</label>
                            <div>
                                <span class="fa fa-building"></span>
                                <input type="text"  id="checkout-city" placeholder="Your city...">
                            </div>
                        </div> --}}
                        <div class="form-controll" style="display: flex;">
                            <div class="form-controll" style="width: 50%; padding: 5px">


                                <select class="form-select" id="country" name="governorate_id">
                                    <option disabled value="" selected>{{ __('site.governorate') }}
                                    </option>
                                    @foreach ($governorates as $governorate)
                                        <option {{ old('governorate_id') == $governorate->id ? 'selected' : '' }}
                                            data-price="{{ $governorate->price }}" value="{{ $governorate->id }}">
                                            {{ $governorate->name }}
                                        </option>
                                    @endforeach
                                </select>
                                {{-- <span class="fa fa-globe"></span> --}}
                            </div>
                            <div class="form-controll" style="width: 50%; padding: 5px">
                                {{-- <span class="fa fa-globe"></span> --}}

                                <select class="form-select" id="city-dropdown" name="city_id">
                                    <option disabled value="" selected >{{ __('site.area') }}
                                    </option>
                                    @if (old('governorate_id') != null)
                                        @foreach ($governorates->where('id', old('governorate_id'))->first()->city as $governorateCity)
                                            <option {{ old('city_id') == $governorateCity->id ? 'selected' : '' }}
                                                value="{{ $governorateCity->id }}">
                                                {{ $governorateCity->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                        </div>

                        <h4>{{ __('site.payment') }}</h4>
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
                                <p>Account: <span>{{ $setting->vodafoneCash }}</span></p>
                            </div>
                        </div>
                        <div class="form-check voda two">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                            <label class="form-check-label" for="flexRadioDefault3">
                                Instapay
                            </label>
                            <div class="want two">
                                <p>Note: <span>We will process your order after we receive the payment</span></p>
                                <p>Account: <span>{{ $setting->instapay }}</span></p>
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
                            @foreach ($carts as $cart)
                                <div class="cardd">
                                    {{-- <a href="{{ route('product.remove.cart', $cart->id) }}" class="remove"><i
                                            class="fas fa-times"></i></a> --}}
                                    <div class="card-image"><img src="{{ $cart->product->getFirstMediaUrl('products') }}"
                                            alt=""></div>
                                    <div class="card-details">
                                        <div class="card-name">{{ $cart->product->name }}</div>
                                        @if ($cart->size != '')
                                            <p class="text-black-50 pt-2">{{ $cart->size }}</p>
                                        @endif
                                        <p class="text-black-50 pt-2">{{ __('site.quantity') }}:
                                            {{ $cart->quantity }}</p>
                                        <div class="card-price">{{ $cart->price }} <span></span></div>


                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="checkout-total">
                            <h6>{{ __('site.Total Price') }}:</h6>
                            <p id="totalPrice">{{ $totalPrice }} {{ __('site.EGP') }}</p>
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
