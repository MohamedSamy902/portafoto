@extends('layouts.admin.master')

@section('title')
    {{ __('customer.customer_add') }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('customer.customer_add') }}</h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">{{ __('customer.customers') }}</a></li>
        <li class="breadcrumb-item active">{{ __('customer.customer_add') }}</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('master.data') }}</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post" action="{{ route('customers.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" placeholder="" value="{{ old('name') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>
                            <div class="row g-2">

                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom03">{{ __('master.mobile') }}</label>
                                    <input class="form-control" id="validationCustom03" type="text" name="mobile"
                                        placeholder="" required="" value="{{ old('mobile') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationCustom04">{{ __('master.email') }}</label>
                                    <input class="form-control" id="validationCustom04" type="email" name="email"
                                        placeholder="ex: mohamedsamy@mail.com" required=""
                                        value="{{ old('email') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom05">{{ __('master.password') }}</label>
                                    <input class="form-control" id="validationCustom05" type="text" name="password"
                                        placeholder="***********" required="" value="{{ old('password') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                            </div>


                            <div class="row g-2">
                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label" for="governorate"> {{ __('city.governorate') }}</label>
                                    <select id="governorate" class="js-example-disabled-results col-sm-12" required="" name="governorate_id">
                                        <option disabled selected >{{ __('city.governorate') }}</option>
                                        @foreach ($governorates as $governorate)
                                            <option value="{{ $governorate->id }}">{{ $governorate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="col-form-label" for="city">{{ __('city.city') }}</label>
                                    <select id="city" class="js-example-disabled-results col-sm-12" required="" name="city_id">
                                    </select>
                                </div>


                            </div>




                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom05">{{ __('master.address') }}</label>
                                    <input class="form-control" id="validationCustom05" type="text" name="address"
                                         required="" value="{{ old('address') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault06">{{ __('master.status') }}</label>
                                    <select class="form-select" id="validationDefault06" required="" name="status">
                                        <option selected="" disabled="" value=""> {{ __('master.status') }}
                                        </option>
                                        <option value="active" selected>{{ __('master.active') }}</option>
                                        <option value="inactive"> {{ __('master.inactive') }}</option>


                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>



                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom07">{{ __('master.image') }}</label>
                                    <input class="form-control" id="validationCustom07" type="file"
                                        aria-label="file example" name="photo" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>


                            <button class="btn btn-primary" type="submit">{{ __('master.save') }}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
        <script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>

        <script>
            console.log($('html').data('locale'));

            $(document).ready(function() {
                $('#governorate').change(function() {
                    var governorateId = $(this).val(); // Get the selected governorate ID

                    // Send AJAX request to the server to fetch cities for the selected governorate
                    $.ajax({
                        url: "{{ route('getCities', '') }}/" + governorateId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // Empty the city select element
                            $('#city').empty();
                            // Add default option
                            $('#city').append($('<option>').text("{{ __('city.selsctCity') }}").attr('value', ''));

                            // Loop through cities and add them to the select element
                            $.each(data.cities, function(key, value) {
                                var cityName = value.name[
                                    "{{ app()->getLocale() }}"
                                    ]; // Get the translated text for the current language
                                $('#city').append($('<option>').text(cityName).attr('value',
                                    value.id));
                            });
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
