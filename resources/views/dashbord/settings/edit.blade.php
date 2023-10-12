@extends('layouts.admin.master')

@section('title')
    {{ __('product.product_edit') }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('product.product_edit') }}</h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('product.products') }}</a></li>
        <li class="breadcrumb-item active">{{ __('product.product_edit') }}</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('master.data') }}</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post"
                            action="{{ route('setting.update') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('patch') --}}

                            {{-- <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name_en') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" placeholder=""
                                        value="{{ old('name') ? old('name') : $setting->getTranslation('name', 'en') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name_ar') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name_ar" placeholder=""
                                        value="{{ old('name') ? old('name') : $setting->getTranslation('name', 'ar') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div> --}}


                            <div class="mb-3">
                                <label class="form-label"
                                    for="validationTextarea">{{ __('master.description_en') }}</label>
                                <textarea class="form-control" cols="30" rows="10" name="description">{{ old('description') ? old('description') : $setting->getTranslation('description', 'en') }}</textarea>

                            </div>

                            <div class="mb-3">
                                <label class="form-label"
                                    for="validationTextarea">{{ __('master.description_ar') }}</label>
                                <textarea class="form-control"  cols="30" rows="10" name="description_ar">{{ old('description_ar') ? old('description_ar') : $setting->getTranslation('description', 'ar') }} </textarea>

                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.keywords') }}</label>
                                    {{-- <input class="form-control" id="validationCustom01" type="text" name="keywords"
                                        placeholder=""
                                        value="{{ old('keywords') ? old('keywords') : $setting->getTranslation('keywords', 'en') }}" /> --}}
                                        <textarea class="form-control"  cols="30" rows="10" name="keywords">{{ old('keywords') ? old('keywords') : $setting->getTranslation('keywords', 'en') }}</textarea>

                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>
                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.keywords_ar') }}</label>

                                        <textarea class="form-control"  cols="30" rows="10" name="keywords_ar">{{ old('keywords_ar') ? old('keywords_ar') : $setting->getTranslation('keywords', 'ar') }}</textarea>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.facebook') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" name="facebook"
                                        placeholder=""
                                        value="{{ old('facebook') ? old('facebook') : $setting->facebook }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.instagram') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" name="instagram"
                                        placeholder=""
                                        value="{{ old('instagram') ? old('instagram') : $setting->instagram }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom01">{{ __('master.twitter') }}</label>
                                <input class="form-control" id="validationCustom01" type="text" name="twitter"
                                    placeholder="" value="{{ old('twitter') ? old('twitter') : $setting->twitter }}" />
                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom01">{{ __('master.messenger') }}</label>
                                <input class="form-control" id="validationCustom01" type="text" name="messenger"
                                    placeholder="" value="{{ old('messenger') ? old('messenger') : $setting->messenger }}" />
                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom01">{{ __('master.mobile_1') }}</label>
                                <input class="form-control" id="validationCustom01" type="text" name="mobile_1"
                                    placeholder="" value="{{ old('mobile_1') ? old('mobile_1') : $setting->mobile_1 }}" />
                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom01">{{ __('master.mobile_2') }}</label>
                                <input class="form-control" id="validationCustom01" type="text" name="mobile_2"
                                    placeholder="" value="{{ old('mobile_2') ? old('mobile_2') : $setting->mobile_2 }}" />
                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                            </div>


                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom01">{{ __('master.vodafoneCash') }}</label>
                                <input class="form-control" id="validationCustom01" type="text" name="vodafoneCash"
                                    placeholder="" value="{{ old('vodafoneCash') ? old('vodafoneCash') : $setting->vodafoneCash }}" />
                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="validationCustom01">{{ __('master.instapay') }}</label>
                                <input class="form-control" id="validationCustom01" type="text" name="instapay"
                                    placeholder="" value="{{ old('instapay') ? old('instapay') : $setting->instapay }}" />
                                <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                            </div>


                            <button class="btn btn-primary" type="submit">{{ __('master.save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
