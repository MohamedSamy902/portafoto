@extends('site.layouts.master')
@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}"> --}}
@endpush
@section('content')
    <main>
        <!--  - BANNER  -->
        <div class="banner">

            <div class="container">

                <div class="slider-container has-scrollbar">

                    <div class="slider-item">

                        <img src="./assets/img/1.jpg" alt="The Finest Wall Frames" class="banner-img">

                        <div class="banner-content">

                            <p class="banner-subtitle">Trending item</p>

                            <h2 class="banner-title">The Finest Wall Frames</h2>

                            <p class="banner-text">
                                starting at &dollar; <b>20</b>.00
                            </p>

                            <a href="#" class="banner-btn">Shop now</a>

                        </div>

                    </div>

                    <div class="slider-item">

                        <img src="./assets/img/6.jpg" alt="modern sunglasses" class="banner-img">

                        <div class="banner-content">

                            <p class="banner-subtitle">Trending accessories</p>

                            <h2 class="banner-title">Modern sunglasses</h2>

                            <p class="banner-text">
                                starting at &dollar; <b>15</b>.00
                            </p>

                            <a href="#" class="banner-btn">Shop now</a>

                        </div>

                    </div>

                    <div class="slider-item">

                        <img src="./assets/img/7.jpg" alt="new fashion summer sale" class="banner-img">

                        <div class="banner-content">

                            <p class="banner-subtitle">Sale Offer</p>

                            <h2 class="banner-title">New fashion summer sale</h2>

                            <p class="banner-text">
                                starting at &dollar; <b>29</b>.99
                            </p>

                            <a href="#" class="banner-btn">Shop now</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!--  - PRODUCT  -->

        <div class="product-container">

            <div class="container">


                <!-- - SIDEBAR -->

                <div class="sidebar  has-scrollbar" data-mobile-menu>



                    <div class="product-showcase">

                        <h3 class="showcase-heading">best sellers</h3>

                        <div class="showcase-wrapper">

                            <div class="showcase-container">
                                @foreach ($productsBest as $best)
                                    <div class="showcase">

                                        <a href="{{ route('showProduct', $best->slug) }}" class="showcase-img-box">
                                            <img src="{{ $best->getFirstMediaUrl('products') }}" alt="Wall Frame" width="75" height="75"
                                                class="showcase-img">
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

                        <div class="product-grid">
                            @foreach ($products as $product)
                                <div class="showcase">
                                    <div class="showcase-banner">
                                        <img src="{{ $product->getFirstMediaUrl('products') }}"
                                            alt="Mens Winter Leathers Jackets" width="300"
                                            class="product-img default">
                                        <img src="{{ $product->getFirstMediaUrl('products') }}"
                                            alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">

                                        <div class="showcase-actions">

                                            <button class="btn-action favorite-button"
                                                data-product-id="{{ $product->id }}">
                                                <ion-icon name="heart-outline"></ion-icon>
                                            </button>

                                        </div>

                                    </div>

                                    <div class="showcase-content">

                                        <a href="{{ route('showProduct', $product->slug) }}"
                                            class="showcase-category">{{ $product->name }}</a>
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
                    <!--  - PRODUCT GRID -->
                </div>

            </div>

        </div>

    </main>

    @push('js')
        <script src="https://releases.jquery.com/git/jquery-git.js"></script>
        {{-- <script src="{{ asset('assets/js/sweet-alert/sweetalert.min.js') }}"></script> --}}
        <script>
            $(document).ready(function() {
                $('.favorite-button').on('click', function(event) {
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

                            // Update the header favorite list
                            // var $favoritesCount = $('#favorites-count');
                            // var count = $favoritesCount.text() ? parseInt($favoritesCount.text()) :
                            //     0;
                            // var newCount = count + 1;
                            // $favoritesCount.text(newCount);
                            // var $favoritesList = $('#favorites-list');
                            // $favoritesList.empty();
                            // console.log(response);
                            // $.each(response.favorites, function(index, favorite) {
                            //     console.log(favorite);
                            //     $favoritesList.append('<li>' + favorite.name + '</li>');
                            // });
                            // // Show success message
                            // alert(response.message);
                        }
                    });
                });


            });
        </script>
    @endpush
@endsection
