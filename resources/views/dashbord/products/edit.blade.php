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
                            action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name_en') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name" placeholder=""
                                        value="{{ old('name') ? old('name') : $product->getTranslation('name', 'en') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationCustom01">{{ __('master.name_ar') }}</label>
                                    <input class="form-control" id="validationCustom01" type="text" required=""
                                        name="name_ar" placeholder=""
                                        value="{{ old('name') ? old('name') : $product->getTranslation('name', 'ar') }}" />
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label class="form-label"
                                    for="validationTextarea">{{ __('master.description_en') }}</label>
                                <textarea id="editor1" cols="30" rows="10" name="description">
                                    {{ old('description') ? old('description') : $product->getTranslation('description', 'en') }}
                                </textarea>

                            </div>

                            <div class="mb-3">
                                <label class="form-label"
                                    for="validationTextarea">{{ __('master.description_ar') }}</label>
                                <textarea id="editor2" cols="30" rows="10" name="description_ar">
                                    {{ old('description_ar') ? old('description_ar') : $product->getTranslation('description', 'ar') }}
                                </textarea>

                            </div>




                            @if ($product->price != null)
                                <div class="row g-1" id="price">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="validationCustom01">{{ __('master.price') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="price"
                                            placeholder="" value="{{ old('price') ? old('price') : $product->price }}" />
                                        <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                        <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                    </div>
                                </div>
                            @endif

                            @if ($product->discount != null)
                                <div class="row g-1" id="discount">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label"
                                            for="validationCustom01">{{ __('master.discount') }}</label>
                                        <input class="form-control" id="validationCustom01" type="text" name="discount"
                                            placeholder=""
                                            value="{{ old('discount') ? old('discount') : $product->discount }}" />
                                        <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                        <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                    </div>
                                </div>
                            @endif

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="category">{{ __('category.category') }}</label>
                                    <select class="form-select" id="category" required="" name="category_id">
                                        <option selected="" disabled="" value="">
                                            {{ __('category.category') }}
                                        </option>
                                        @foreach ($categories as $category)
                                            <option @selected($category->id == $product->id) value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                    <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                </div>
                            </div>

                            @if ($product->price == null)
                                <div class="row g-2 element" id="div_1">

                                    <div class="col-2">
                                        <div class="mb-3" style="margin-top: 32px;">
                                            <span class="add btn btn-primary">{{ __('product.addSizes') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row g-1">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="validationDefault06">{{ __('master.status') }}</label>
                                    <select class="form-select" id="validationDefault06" required="" name="status">
                                        <option selected="" disabled="" value=""> {{ __('master.status') }}
                                        </option>
                                        <option value="active" @selected($product->status == 'active')>{{ __('master.active') }}
                                        </option>
                                        <option value="inactive" @selected($product->status == 'inactive')> {{ __('master.inactive') }}
                                        </option>
                                        <option value="SOLD OUT" @selected($product->status == 'SOLD OUT')> {{ __('master.SOLDOUT') }}
                                        </option>


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
                                        <option value="no" @selected($product->best == 'no')> {{ __('product.no') }}
                                        </option>
                                        <option value="yes" @selected($product->best == 'yes')> {{ __('product.yes') }}
                                        </option>


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
                                        <option value="no" @selected($product->slider == 'no')> {{ __('product.no') }}</option>
                                        <option value="yes" @selected($product->slider == 'yes')> {{ __('product.yes') }}</option>


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

                @if (count($product->size) > 0)
                    <div class="card">
                        <div class="card-header pb-0">
                            <h5 class="text-center">{{ __('master.size') }}</h5>
                        </div>
                        <div class="card-body">
                            @foreach ($product->size as $productSize)
                                <form class="needs-validation" novalidate="" method="post"
                                    action="{{ route('size.update', $productSize->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="row g-1">
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label"
                                                for="validationCustom05">{{ __('master.size') }}</label>
                                            <select class="form-select col-sm-12" name="standard_size_id">
                                                @foreach ($sizes as $size)
                                                    <option @selected($productSize->standard_size_id == $size->id) value="{{ $size->id }}">
                                                        {{ $size->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                            <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                        </div>

                                        <div class="col-md-3 mb-3">
                                            <label class="form-label"
                                                for="validationCustom05">{{ __('master.price') }}</label>
                                            <input class="form-control" id="validationCustom05" type="text"
                                                name="price" required=""
                                                value="{{ old('price') ? old('price') : $productSize->price }}" />
                                            <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                            <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label class="form-label"
                                                for="validationCustom05">{{ __('master.discount') }}</label>
                                            <input class="form-control" id="validationCustom05" type="text"
                                                name="discount"
                                                value="{{ old('discount') ? old('discount') : $productSize->discount }}" />
                                            <div class="valid-feedback">{{ __('validation.valid_feedback') }}</div>
                                            <div class="invalid-feedback">{{ __('validation.invalid_feedback') }}</div>
                                        </div>

                                        <div class="col-1">
                                            <div class="mt-2 mb-3">
                                                <br>
                                                <a href="{{ route('size.delete', $productSize->id) }}"
                                                    class=" btn btn-danger">{{ __('master.remove') }}</a>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="mt-2 mb-3 m-1">
                                                <br>
                                                <input type="submit" value="{{ __('master.edit') }}"
                                                    class="btn btn-info">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>


        <div class="email-wrap bookmark-wrap">
            <div class="row">
                <div class="col-xl-12 col-md-12 box-col-8">
                    <div class="email-right-aside bookmark-tabcontent">
                        <div class="card email-body radius-left">
                            <div class="ps-0">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="pills-created" role="tabpanel"
                                        aria-labelledby="pills-created-tab">
                                        <div class="card mb-0">
                                            <div class="card-header d-flex">
                                                <h6 class="mb-0">{{ __('master.image') }}</h6>

                                            </div>
                                            <div class="card-body pb-0">
                                                <div class="details-bookmark text-center">
                                                    <div class="row" id="bookmarkData">
                                                        @foreach ($product->getMedia('products') as $productImage)
                                                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 box-col-6">
                                                                <div class="card bookmark-card o-hidden">
                                                                    <div class="details-website">
                                                                        <img class="img-fluid"
                                                                            src="{{ $productImage->getFullUrl() }}"
                                                                            alt="">
                                                                        <div class="favourite-icon favourite_0"
                                                                            onclick="setFavourite(0)">
                                                                            <form
                                                                                action="{{ route('products.images.delete', [$product->id, $productImage->id]) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"><i
                                                                                        style="color: #000"
                                                                                        class="fa fa-trash"></i></button>
                                                                            </form>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
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
        <script src="{{ asset('assets/js/bookmark/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/js/bookmark/custom.js') }}"></script>

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
