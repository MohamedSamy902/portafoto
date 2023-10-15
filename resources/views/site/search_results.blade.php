@extends('site.layouts.master')
@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}"> --}}
@endpush
@section('content')
    <main>
        <!--  - BANNER  -->

        <!--  - PRODUCT  -->
        @if ($products->isEmpty())
            <h3 class="text-center pt-5">No results found.</h3>
        @endif
        <div class="product-container pt-3">

            <div class="container">

                <div class="product-box">

                    <div class="product-main">


                        <div class="product-grid" id="products-container" style="grid-template-columns: repeat(4, 1fr);">
                            @foreach ($products as $product)
                                <div class="showcase product-item">
                                    <div class="showcase-banner">
                                        <a href="{{ route('showProduct', $product->slug) }}">
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
                                        </a>

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
                            {{-- <div class="ajax-loading" style="display:none">
                                <img src="{{ asset('images/loading.gif') }}" />
                            </div> --}}
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

        <script>
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
                    if (((scroll_position == scroll_height) || ((scroll_position + 5) >= scroll_height)) && !
                        loading) {

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
