@extends('site.layouts.master')
@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}"> --}}
@endpush
@section('content')
    <main>
        <!--  - BANNER  -->
        <div class="banner">

            <div class="container">
                {{-- <div class="nothing text-center font-weight-bold">
                    There Is No Content To Show
                </div> --}}

                <div class="slider-container has-scrollbar">
                    @foreach ($productsSlider as $slider)
                        <div class="slider-item">

                            <img src="{{ $slider->getFirstMediaUrl('products') }}" alt="{{ $slider->name }}"
                                class="banner-img">

                            <div class="banner-content">

                                <p class="banner-subtitle">{{ $slider->name }}</p>

                                <h2 class="banner-title">{{ $slider->name }}</h2>

                                {{-- <p class="banner-text">
                                    starting at &dollar; <b>20</b>.00
                                </p> --}}

                                <a href="{{ route('showProduct', $slider->slug) }}"
                                    class="banner-btn">{{ __('site.shopNow') }}</a>

                            </div>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>
        <!--  - PRODUCT  -->

        <div class="product-container">

            <div class="container">


                <!-- - SIDEBAR -->

                <div class="sidebar  has-scrollbar" data-mobile-menu>



                    <div class="product-showcase">

                        <h3 class="showcase-heading">{{ __('site.bestSellers') }}</h3>

                        <div class="showcase-wrapper">

                            <div class="showcase-container">

                                @foreach ($productsBest as $best)
                                    <div class="showcase">

                                        <a href="{{ route('showProduct', $best->slug) }}" class="showcase-img-box">
                                            <img src="{{ $best->getFirstMediaUrl('products') }}" alt="Wall Frame"
                                                width="75" height="75" class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <a href="{{ route('showProduct', $best->slug) }}"
                                                class="showcase-category">{{ $best->name }}</a>
                                            @if (COUNT($best->size) > 0)
                                                <a href="#">
                                                    <h3 class="showcase-title">
                                                        {{ $best->size()->first()->standardSize->name }}</h3>
                                                </a>
                                            @endif


                                            <div class="price-box">
                                                @if (COUNT($best->size) > 0)
                                                    <p class="price">{{ $best->size()->first()->price }}
                                                        {{ __('site.EGP') }}</p>
                                                    @if ($best->size()->first()->discount != null)
                                                        <del>{{ $best->size()->first()->discount }}
                                                            {{ __('site.EGP') }}</del>
                                                    @endif
                                                @else
                                                    <p class="price">{{ $best->price }} {{ __('site.EGP') }}</p>
                                                    @if ($best->discount != null)
                                                        <del>{{ $best->discount }} {{ __('site.EGP') }}</del>
                                                    @endif
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>

                </div>



                <div class="product-box">

                    <div class="product-main">

                        <div class="product-grid" id="products-container">
                            @include('site.partialsProduct')
                            <div class="ajax-loading" style="display:none">
                                test
                                {{-- <img src="{{ asset('images/loading.gif') }}" /> --}}
                            </div>
                        </div>

                    </div>
                    <!--  - PRODUCT GRID -->
                </div>

            </div>

        </div>

    </main>

    @push('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://releases.jquery.com/git/jquery-git.js"></script>

        {{-- <script>
            $(document).ready(function() {
                var page = 1; // initialize page to 2
                var loading = false; // set loading to false
                var product_container_offset = $('#products-container').offset().top;
                var window_height = $(window).height();

                $(window).scroll(function() {
                    var scroll_height = $(document).height() - $(window).height();
                    var scroll_position = $(window).scrollTop();
                    console.log(scroll_position);
                    console.log(scroll_height);
                    if (((scroll_position == scroll_height) || ((scroll_position + 5) >= scroll_height)) && !loading) {

                        loading = true;
                        $('.ajax-loading').show();
                        $.ajax({
                            url: "/get-products-ajax?skip=" + page,
                            type: "get",
                            success: function(data) {
                                $('#products-container').append(data);
                                loading = false;
                                page++;
                                console.log(page);
                            },
                            complete: function() {
                                $('.ajax-loading').hide();
                            }
                        });
                    }
                });
            });

        </script> --}}

        <script>
            var visible = 10; // Number of visible products at load
            var skip = 10; // Number of products already loaded

            $(window).scroll(function() {
                if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                    // Increment the skip count
                    skip += visible;

                    $.ajax({
                        url: "/get-products-ajax",
                        method: 'get',
                        data: {
                            limit: visible,
                            skip: skip
                        }, // Send limit and skip parameters to Laravel route

                        success: function(data) {
                            $('#products-container').append(data);
                            // Append new products to the existing list
                            // $.each(response, function(index, product) {
                            //     // Your code to create HTML markup for each product
                            //     // Append the markup to the #product-list element
                            // });
                        }
                    });
                }
            });
        </script>








        <script>
            $(document).ready(function() {
                $(document).on('click', '.favorite-button', function(event) {
                    event.preventDefault();
                    var productId = $(this).data('product-id');
                    var url = "{{ route('favorites.add', ':productId') }}";
                    url = url.replace(':productId', productId);
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            id: productId,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {

                            swal({
                                position: 'center',
                                icon: 'success',
                                title: "{{ __('site.favoritesAdd') }}",
                                showConfirmButton: false,
                                timer: 2000
                            });

                        }
                    });
                });

            });
        </script>
    @endpush
@endsection
