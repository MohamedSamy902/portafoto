@extends('site.layouts.master')

@section('content')
    <section class="pay pt-5">
        <div class="container">
            <div class="row">
                <div class="payment col-md-6 col-lg-8">
                    <h3 class="text-center text-uppercase pb-5">{{ __('site.PAYMENT') }}</h3>
                    <form method="POST" action="{{ route('customers.payment.store') }}">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {{-- <label for="inputFirst">{{ __('site.firstName') }}</label> --}}
                                <input type="text" class="form-control" id="inputFirst" placeholder="{{ __('site.firstName') }}"
                                    name="firstName" value="{{ old('firstName') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                {{-- <label for="inputLast">{{ __('site.lastName') }}</label> --}}
                                <input type="text" class="form-control" id="inputLast" placeholder="{{ __('site.lastName') }}"
                                    name="lastName" value="{{ old('lastName') }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            {{-- <label for="inputEmail4">{{ __('site.email') }}</label> --}}
                            <input type="email" class="form-control" id="inputEmail4" placeholder="{{ __('site.email') }}"
                                name="email" value="{{ old('email') }}" />
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {{-- <label for="inputAddress">{{ __('site.address_1') }}</label> --}}
                                <input type="text" class="form-control" id="inputAddress" placeholder="{{ __('site.address_1') }}"
                                    name="address_1" value="{{ old('address_1') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                {{-- <label for="inputAddress2">Address 2</label> --}}
                                <input type="text" class="form-control" id="inputAddress2"
                                    placeholder="{{ __('site.address_2') }}" name="address_2"
                                    value="{{ old('address_2') }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {{-- <label for="country" class="form-label">Country</label> --}}
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
                            </div>
                            <div class="form-group col-md-4">
                                {{-- <label for="city-dropdown" class="form-label">City</label> --}}
                                <select class="form-select" id="city-dropdown" name="city_id">
                                    <option disabled value="" selected name="">{{__('site.area')}}
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
                            <div class="form-group col-md-2">
                                {{-- <label for="inputZip">Zip</label> --}}
                                <input type="text" class="form-control" id="inputZip" placeholder="{{ __('site.zip') }}"
                                    name="zip_code" value="{{ old('zip_code') }}" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                {{-- <label for="inputPhone">Phone Number</label> --}}
                                <input type="text" class="form-control" id="inputPhone" placeholder="{{ __('site.mobile_1') }}"
                                    name="mobile_1" value="{{ old('mobile_1') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                {{-- <label for="inputPhone">{{ __('site.mobile_1') }}</label> --}}
                                <input type="text" class="form-control" id="inputPhone" placeholder="{{ __('site.mobile_2') }}"
                                    name="mobile_2" value="{{ old('mobile_2') }}" />
                            </div>

                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-12">
                                {{-- <label for="validationCustom17" class="form-label">Payment Method</label> --}}
                                <select class="form-select" id="validationCustom17" name="payment">
                                    <option {{ old('payment') == '' ? 'selected' : '' }} value="">{{ __('site.payment') }}
                                    </option>
                                    <option {{ old('payment') == 'Vodafone Cash' ? 'selected' : '' }}
                                        value="Vodafone Cash">Vodafone Cash</option>
                                    <option {{ old('payment') == 'InstaPay' ? 'selected' : '' }} value="InstaPay">InstaPay
                                    </option>
                                    <option {{ old('payment') == 'Cash On Delivery' ? 'selected' : '' }}
                                        value="Cash On Delivery">Cash On Delivery</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark mt-2 mb-3 w-25">
                            {{ __('site.send') }} <i class="fa-solid fa-credit-card ml-1"></i>
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
                                <h5>{{ __('site.Total Price') }}:</h4>
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
