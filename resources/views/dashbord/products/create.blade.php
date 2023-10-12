@extends('layouts.admin.master')

@section('title')
    {{ __('product.product_add') }}
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/simple-mde.css') }}"> --}}
@endpush

@section('content')
    @component('components.breadcrumb')
        @slot('breadcrumb_title')
            <h3>{{ __('product.product_add') }}</h3>
        @endslot

        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">{{ __('product.products') }}</a></li>
        <li class="breadcrumb-item active">{{ __('product.product_add') }}</li>
    @endcomponent


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h5>{{ __('master.data') }}</h5>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" method="post" action="{{ route('products.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name_en') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" placeholder="" value="{{ old('name') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name_ar') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name_ar" placeholder="" value="{{ old('name_ar') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label"
                                    for="validationTextarea">{{ __('master.description_en') }}</label>
                                <textarea id="editor1" cols="30" rows="10" name="description">
                                </textarea>

                            </div>

                            <div class="mb-3">
                                <label class="form-label"
                                    for="validationTextarea">{{ __('master.description_ar') }}</label>
                                <textarea id="editor2" cols="30" rows="10" name="description_ar">
                                </textarea>

                            </div>



                            <div class="row g-1" id="price">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.price') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" name="price"
                                        placeholder="" value="{{ old('price') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1" id="discount">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.discount') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" name="discount"
                                        placeholder="" value="{{ old('discount') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>


                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="col-form-label">{{ __('site.color') }}</label>
                                    <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="colors[]">
                                        @foreach ($colors as $color)
                                            <option selected value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>




                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label"
                                        for="category">{{ __('category.category') }}</label>
                                    <select class="form-select" id="category" required="" name="category_id">
                                        <option selected="" disabled="" value="">
                                            {{ __('category.category') }}
                                        </option>
                                        @foreach ($categories as $category)
                                            <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-2 element" id="div_1">

                                <div class="col-2">
                                    <div class="mb-3" style="margin-top: 32px;">
                                        <span class="add btn btn-primary">{{ __('product.addSizes') }}</span>
                                    </div>
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
                                        <option value="SOLD OUT"> {{ __('master.SOLDOUT') }}</option>


                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label"
                                        for="validationDefault06">{{ __('product.showBest') }}</label>
                                    <select class="form-select" id="validationDefault06" required="" name="best">
                                        <option value="no" selected> {{ __('product.no') }}</option>
                                        <option value="yes"> {{ __('product.yes') }}</option>


                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label"
                                        for="validationDefault06">{{ __('product.showSlider') }}</label>
                                    <select class="form-select" id="validationDefault06" required="" name="slider">
                                        <option value="no" selected> {{ __('product.no') }}</option>
                                        <option value="yes"> {{ __('product.yes') }}</option>


                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>



                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom07">{{ __('master.image') }}</label>
                                    <input class="form-control" id="validationCustom07" type="file"
                                        aria-label="file example" name="photos[]" multiple />
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
        <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('assets/js/editor/ckeditor/adapters/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/editor/ckeditor/styles.js') }}"></script>
        <script src="{{ asset('assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>

        <script>
            $(document).ready(function() {
                // Add new element
                $(".add").click(function() {
                    $("#price").empty();
                    $("#discount").empty();


                    // Finding total number of elements added
                    var total_element = $(".element").length;

                    // last <> with element class id
                    var lastid = $(".element:last").attr("id");
                    var split_id = lastid.split("_");
                    var nextindex = Number(split_id[1]) + 1;

                    // Adding new div container after last occurance of element class
                    $(".element:last").after(

                        "<div class='element row' id='div_" + nextindex + "'></div>"
                    );

                    // Adding element to <div>
                    $("#div_" + nextindex).append(
                        `
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="validationCustom05">{{ __('master.size') }}</label>
                            <select class="form-select col-sm-12" name="standard_size_id[]">
                                @foreach ($sizes as $size)
                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                            <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="validationCustom05">{{ __('master.price') }}</label>
                            <input class="form-control" id="validationCustom05" type="text" name="price_size[]"
                                required=""  />
                            <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                            <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                        </div>
                        <div class="col-md-3 mb-3">
                                    <label class="form-label" for="validationCustom05">{{ __('master.discount') }}</label>
                                    <input class="form-control" id="validationCustom05" type="text" name="discount_size[]"
                                        />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>

                        <div class="col-2">
                            <div class="mt-2 mb-3">
                                <br>
                                <span id="remove_${nextindex}" class="remove btn btn-danger">{{ __('master.remove') }}</span>
                            </div>
                        </div>
                    </div>`
                    );
                });

                // Remove element
                $(".row").on("click", ".remove", function() {
                    var id = this.id;
                    var split_id = id.split("_");
                    var deleteindex = split_id[1];
                    // Remove <div> with id
                    $("#div_" + deleteindex).remove();
                    if ($(".element").length == 1) {
                        $("#price").append(`<div class="col-md-12 mb-3">
                                    <label class="form-label"
                                        for="validationCustom01">{{ __('master.price') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="price" placeholder="" value="{{ old('price') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>`);

                        $("#price").append(`<div class="col-md-12 mb-3">
                                    <label class="form-label"
                                        for="validationCustom01">{{ __('master.discount') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text"
                                        name="discount" placeholder="" value="{{ old('discount') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>`);
                    }
                });
            });
        </script>
    @endpush
@endsection
