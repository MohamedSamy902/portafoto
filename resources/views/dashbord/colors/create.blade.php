@extends('layouts.admin.master')

@section('title')
    اضافه منطقه
@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>اضافه منطقه</h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('cities.index') }}">المناطق</a></li>
        <li class="breadcrumb-item active">اضافه منطقه</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('master.data') }}</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post" action="{{ route('cities.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name_en') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        value="{{ old('name') ? old('name') : '' }}" name="name"
                                        placeholder="القاهره" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name_ar') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        value="{{ old('name_ar') ? old('name_ar') : '' }}" name="name_ar"
                                        placeholder="القاهره" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="col-form-label"> المحافظه</label>
                                    <select class="js-example-disabled-results col-sm-12" name="governorate_id">
                                        @foreach ($governorates as $governorat)
                                            <option {{ old('governorat') == $governorat->name ? 'selected' : '' }}
                                                value="{{ $governorat->id }}  ">{{ $governorat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault06">{{ __('role.role') }}</label>
                                    <select class="form-select" id="validationDefault06" required="" name="governorat">
                                        <option selected="" disabled="" value=""> {{ __('role.role') }}
                                        </option>
                                        @foreach ($governorates as $governorat)
                                            <option {{ old('governorat') == $governorat->name ? 'selected' : '' }}
                                                value="{{ $governorat->id }}  ">{{ $governorat->name }}</option>
                                        @endforeach

                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div> --}}
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
    @endpush
@endsection
