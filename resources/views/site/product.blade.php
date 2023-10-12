@extends('site.layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('site') }}/assets/css/magiczoomplus.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <style>
        .title {
            margin-bottom: 0.4em;
        }

        .label {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .label .input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
            margin: 0;
        }

        .talla-instance {
            --label-radio-rect-w: 56;
            --label-radio-rect-h: 44;
            --color-bg-active: rgba(0, 0, 0, .1);
            --dasharray-rect: calc(calc(var(--label-radio-rect-w) * 2) + calc(var(--label-radio-rect-h) * 2));
        }

        .labels-radio-rect {
            display: flex;
            margin-bottom: 1.2em;
            flex-wrap: wrap;
        }

        .labels-radio-rect--row {
            flex-direction: column;
        }

        .labels-radio-rect--row .label {
            margin-bottom: 0.4em;
        }

        .labels-radio-rect .label {
            display: grid;
            gap: 0;
            position: relative;
            width: calc(var(--label-radio-rect-w) * 2px);
            height: calc(var(--label-radio-rect-h) * 1px);
            cursor: pointer;
        }

        .labels-radio-rect .label:not(:last-of-type) {
            margin-right: 0.6em;
            transition: margin 0.4s ease;
        }

        .labels-radio-rect .label input:checked~.label__checkmark .shape-rect {
            stroke-dashoffset: 0;
            fill: var(--color-bg-active);
        }

        .labels-radio-rect .label input:focus~.label__checkmark .shape-rect {
            fill: var(--color-bg-active);
        }

        .labels-radio-rect .label__checkmark {
            display: grid;
            align-items: center;
            width: inherit;
            height: inherit;
        }

        .labels-radio-rect .label__checkmark .shape,
        .labels-radio-rect .label__checkmark .outline {
            grid-area: 1/1/2/2;
            width: inherit;
            height: inherit;
        }

        .labels-radio-rect .label__checkmark .shape-rect {
            width: inherit;
            height: inherit;
            stroke-dasharray: var(--dasharray-rect);
            stroke-dashoffset: var(--dasharray-rect);
            stroke-width: 1px;
            fill: rgba(255, 255, 255, 0);
            stroke: #111;
            transition: stroke-dashoffset 1s;
        }

        .labels-radio-rect .label__checkmark .outline {
            font-size: 1em;
            color: #242424;
            width: 100%;
            height: 100%;
            border: 0.5px solid rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: color 0.5s ease 0.1s;
        }

        .labels-radio-rect .label__checkmark .input-text {
            grid-area: 1/2/2/2;
            padding-left: 10px;
            white-space: nowrap;
        }

        .labels-radio-rect .label__checkmark:hover .shape-rect {
            stroke-dashoffset: 0;
        }

        .labels-radio-circle {
            display: flex;
            margin-bottom: 1.2em;
            flex-direction: column;
        }

        .labels-radio-circle .label {
            display: grid;
            gap: 0;
            position: relative;
            width: calc(var(--label-radio-circle-w) * 1px);
            height: calc(var(--label-radio-circle-w) * 1px);
            cursor: pointer;
            font-size: 1em;
            margin-bottom: 10px;
        }

        .labels-radio-circle .label:not(:last-of-type) {
            margin-right: 0.6em;
            transition: margin 0.4s ease;
        }

        .labels-radio-circle .label input:checked~.label__checkmark .shape-circle {
            stroke-dashoffset: 0;
            fill: var(--color-bg-active);
        }

        .labels-radio-circle .label input:focus~.label__checkmark .shape-circle {
            fill: var(--color-bg-active);
        }

        .labels-radio-circle .label__checkmark {
            display: grid;
            align-items: center;
            width: inherit;
            height: inherit;
        }

        .labels-radio-circle .label__checkmark .shape,
        .labels-radio-circle .label__checkmark .outline {
            grid-area: 1/1/2/2;
            width: inherit;
            height: inherit;
        }

        .labels-radio-circle .label__checkmark .shape-circle {
            cx: var(--label-radio-circle-r);
            cy: var(--label-radio-circle-r);
            r: calc(var(--label-radio-circle-r) - .5);
            width: inherit;
            height: inherit;
            stroke-dasharray: var(--dasharray-circle);
            stroke-dashoffset: var(--dasharray-circle);
            stroke-width: 1px;
            fill: rgba(255, 255, 255, 0);
            stroke: #111;
            transition: stroke-dashoffset 1s;
        }

        .labels-radio-circle .label__checkmark .outline {
            font-size: 1em;
            color: #242424;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 0.5px solid rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            transition: color 0.5s ease 0.1s;
        }

        .labels-radio-circle .label__checkmark .input-text {
            grid-area: 1/2/2/2;
            padding-left: 10px;
            white-space: nowrap;
        }

        .labels-radio-circle .label__checkmark:hover .shape-circle {
            stroke-dashoffset: 0;
        }
    </style>
    <style>
        .input-icons i {
            position: absolute;
        }

        .input-icons {
            width: 100%;
            margin-bottom: 10px;
        }

        .icon {
            padding: 10px;
            min-width: 40px;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            text-align: center;
        }
    </style>
@endpush
@section('content')

    <main>
        <div class="product-container">
            <div class="container">
                <div class="product-box">
                    <div class="product-featured">
                        <div class="showcase-wrapper has-scrollbar">
                            <div class="" style="padding: 10px">
                                <div class="showcase">
                                    <div class="showcase-banner">

                                        <a href="{{ $product->getFirstMediaUrl('products') }}" class="MagicZoom"
                                            id="jeans" data-options="cssClass: mz-show-arrows;"><img
                                                src="{{ $product->getFirstMediaUrl('products') }}"></a>
                                        @foreach ($product->getMedia('products') as $productImage)
                                            @if ($productImage->getFullUrl() != $product->getFirstMediaUrl('products'))
                                                <a data-zoom-id="jeans" href="{{ $productImage->getFullUrl() }}"
                                                    data-image="jeans1-small.jpg" class="gallery"><img
                                                        src="{{ $productImage->getFullUrl() }}"></a>
                                            @endif
                                        @endforeach

                                    </div>

                                    <div class="showcase-content">
                                        <h4><span
                                                id="price">{{ $product->price != null? $product->price: $product->size()->latest()->first()->price }}</span>
                                            {{ __('site.EGP') }}</h4>
                                        <span class="text-success font-weight-bold pb-2" id="SOLDOUT"
                                            @if ($product->status == 'SOLD OUT') style="color: red !important" @endif>{{ $product->status != 'SOLD OUT' ? 'In Stock' : 'SOLD OUT' }}</span>


                                        <p class="pt-3">


                                            {!! $product->description !!}
                                        </p>
                                        <p>{!! __('site.decProduct') !!}</p>
                                        <form class="row g-3 needs-validation" novalidate method="post"
                                            action="{{ route('product.add.cart', $product->slug) }}">
                                            @csrf
                                            @if (COUNT($product->size) > 0)
                                                <div class="col-md-12 selectt gap-0">
                                                    <div class="talla">
                                                        <h2 class="title">Sizes</h2>
                                                        <div class="labels-radio-rect talla-instance ">
                                                            @foreach ($product->size as $size)
                                                                <label class="label ">
                                                                    <input class="input size"
                                                                        data-price="{{ $size->price }}"
                                                                        data-available="{{ $product->status }}"
                                                                        type="radio" name="size" checked
                                                                        value="{{ $size->id }}">
                                                                    <span class="label__checkmark">
                                                                        <svg class="shape"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <rect class="shape-rect" />
                                                                        </svg>
                                                                        <span
                                                                            class="outline">{{ $size->standardSize->name }}</span>
                                                                    </span>
                                                                </label>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                </div>
                                            @endif


                                            <div class="col-md-12 gap-0">

                                                <div>
                                                    <label for="color" class="form-label">{{ __('site.color') }}</label>
                                                    <select required class="form-select" id="color"
                                                        name="standard_color_id">
                                                        <option selected disabled value="">{{ __('site.choose') }}
                                                        </option>
                                                        @foreach ($colors as $color)
                                                            <option value="{{ $color->id }}">
                                                                {{ $color->name }}</option>
                                                        @endforeach


                                                    </select>


                                                </div>


                                                <div class="invalid-feedback">
                                                    Please select a valid state.
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="validationCustom05"
                                                    class="form-label">{{ __('site.quantity') }}</label>

                                                <div class="wrapper">
                                                    <span class="minus">-</span>
                                                    <input class="num" name="quantity" value="01"
                                                        style="width: 226%;" />
                                                    <span class="plus">+</span>
                                                </div>

                                            </div>

                                            <div class="col-12">
                                                <div class="input-icons">
                                                    {{-- <i style="position: absolute;color:#FFF" class="fa-solid fa-cart-shopping"></i> --}}
                                                    <input type="submit" class="btn btn-dark"
                                                        value="{{ __('site.addToCart') }}">
                                                    <a class="checkoutt text-decoration-none"
                                                        href="{{ $setting->messenger }}"><button type="button"
                                                            class="btn btn-primary">Custom Size <i
                                                                class="fa-brands fa-facebook"></i></button></a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h3 class="text-center pb-5">You May Also Like</h3>

            <div class="product-main">

                <!-- <h2 class="title">New Products</h2> -->

                <div class="product-grid product-grid-product prod">
                    @foreach ($product->category->product()->where('id', '!=', $product->id)->limit(3)->get() as $product)
<div class="showcase product-item">
                        <div class="showcase-banner">
                            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="Mens Winter Leathers Jackets" width="300"
                                class="product-img default">
                            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="Mens Winter Leathers Jackets" width="300"
                                class="product-img hover">

                            <div class="showcase-actions">

                                <button class="btn-action favorite-button" data-product-id="{{ $product->id }}">
                                    <ion-icon name="heart-outline"></ion-icon>
                                </button>

                            </div>

                        </div>

                        <div class="showcase-content">

                            <a href="{{ route('showProduct', $product->slug) }}" class="showcase-category">{{ $product->name }}</a>
                            @if (COUNT($product->size) > 0)
<a href="#">
                                    <h3 class="showcase-title">
                                        {{ $product->size()->first()->standardSize->name }}</h3>
                                </a>
@endif



                            <div class="price-box">
                                @if (COUNT($product->size) > 0)
<p class="price">{{ $product->size()->first()->price }}
                                        {{ __('site.EGP') }}</p>
                                    @if ($product->size()->first()->discount != null)
<del>{{ $product->size()->first()->discount }}
                                            {{ __('site.EGP') }}</del>
@endif
@else
<p class="price">{{ $product->price }} {{ __('site.EGP') }}</p>
                                    @if ($product->discount != null)
<del>{{ $product->discount }} {{ __('site.EGP') }}</del>
@endif
@endif
                            </div>

                        </div>

                    </div>
@endforeach




                </div>

            </div>
        </div>

    </main>


@endsection

@push('js')
    <script src="https://releases.jquery.com/git/jquery-git.js"></script>

        <script src="{{ asset('site') }}/assets/fontawesome-free-6.4.2-web/js/all.min.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <script>
            $(document).ready(function() {
                // Bind click event to size options
                $('.size').click(function() {
                    // Get selected size and price
                    var size = $(this).data('size');
                    var price = $(this).data('price');
                    var available = $(this).data('available');
                    console.log(available);

                    // Update price display
                    $('#price').text(' ' + price.toFixed(2));
                    if (available == 'SOLD OUT') {
                        available = 'SOLD OUT';
                        $('#SOLDOUT').removeClass('text-success');
                        $('#SOLDOUT').css('color', 'red');

                        $('#SOLDOUT').text(' ' + available);
                    }

                });
            });
        </script>
        <script src="{{ asset('site') }}/assets/js/magiczoomplus.js"></script>

        <script>
            const plus = document.querySelector(".plus"),
                minus = document.querySelector(".minus"),
                num = document.querySelector(".num");
            let a = 1;
            plus.addEventListener("click", () => {
                a++;
                a = (a < 5) ? "0" + a : a;
                num.value = a;
            });
            minus.addEventListener("click", () => {
                if (a > 1) {
                    a--;
                    a = (a < 5) ? "0" + a : a;
                    num.value = a;
                }
            });
        </script>


        <script>
            document.querySelector("form").addEventListener("submit", function(event) {
                if (document.getElementById("color").value === "") {
                    event.preventDefault();
                    swal({
                        position: 'center',
                        icon: 'error',
                        title: "{{ __('site.errorSelectColor') }}",
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            });
        </script>
@endpush)
