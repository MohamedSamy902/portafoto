@extends('layouts.admin.master')
@section('title')
    Edit Category
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>Edit Category</h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category</a></li>
        <li class="breadcrumb-item active"> Edit Category</li>
    @endcomponent

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('master.data') }}</h5>
                    </div>
                    <div class="card-body">
                        <form class="form theme-form" method="post" action="{{ route('category.update', $category->id) }}">
                            @csrf
                            @method('patch')
                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name_en') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" placeholder=""
                                        value="{{ old('name') ? old('name') : $category->getTranslation('name', 'en') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name_ar') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name_ar" placeholder=""
                                        value="{{ old('name') ? old('name') : $category->getTranslation('name', 'ar') }}" />
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

    <!-- Container-fluid Ends-->
@endsection
