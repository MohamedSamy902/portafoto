@extends('layouts.admin.master')

@section('title')
    المنطقه
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>المنطقه</h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('cities.index') }}">المناطق</a></li>
        <li class="breadcrumb-item active"> تعدبل منطقه</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('master.data') }}</h5>
                    </div>
                    <div class="card-body">
                        <h5>{{ $governorate->name }}</h5>
                        <form class="needs-validation" novalidate="" method="post"
                            action="{{ route('governorates.update', $governorate->id) }}" enctype="multipart/form-data">
                            @csrf
                            {{-- @method('patch') --}}


                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.price') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required="" value="{{ old('price') ? old('price') : $governorate->price }}" name="price" placeholder="ex: 150" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <button class="btn btn-primary" type="submit">حفظ</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/js/form-validation-custom.js') }}"></script>
    @endpush
@endsection
