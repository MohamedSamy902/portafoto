<header>

    <div class="header-main">
        <div class="container">
            <a href="{{ route('site') }}" class="header-logo">
                Portafoto
            </a>
            <div class="header-search-container">
                <input type="search" name="search" class="search-field" placeholder="Enter your product name...">
                <button class="search-btn">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>
            <div class="header-user-actions">

                <div class="dropdown fav" id="favorite">
                    <button class="action-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <ion-icon name="heart-outline"></ion-icon>

                    </button>

                    <ul class="dropdown-menu wide" id="favorites-list" aria-labelledby="dropdownMenuButton1">
                    </ul>
                </div>
                <div class="dropdown shop">
                    <button class="action-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <ion-icon name="bag-handle-outline"></ion-icon> <i class="fas fa-sort-down"></i>
                        {{-- <span class="count">0</span> --}}
                    </button>
                    <ul class="dropdown-menu wide" aria-labelledby="dropdownMenuButton1">
                        @foreach ($carts as $cart)
                            <li class="shop-content">
                                <img src="{{ $cart->product->getFirstMediaUrl('products') }}" alt="product">
                                <div class="shop-body">
                                    <a href="{{ route('product.remove.cart', $cart->id) }}" class="remove"><i
                                            class="fas fa-times"></i></a>
                                    <span>{{ $cart->product->name }}</span>
                                    <p class="text-black-50" style="margin-bottom: 5px">{{ $cart->standardColor->name }}
                                    </p>
                                    <p class="">{{ __('site.quantity') }}: {{ $cart->quantity }}</p>
                                </div>
                                <div class="price-field">
                                    <p class="price">{{ $cart->price }}</p>

                                </div>
                            </li>
                        @endforeach

                        <li class="checkout"><a class="dropdown-item"
                                href="{{ route('customers.payment.show') }}"><button type="button"
                                    class="btn btn-dark btn-block">Cart <i
                                        class="fa-solid fa-cart-shopping cartt"></i></button></a></li>
                    </ul>
                </div>
                <div class="dropdown shop lang">
                    <button class="action-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <ion-icon name="language-outline"></ion-icon> <i class="fas fa-sort-down"></i>
                    </button>
                    <ul class="dropdown-menu profile" aria-labelledby="dropdownMenuButton1">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                        {{-- <li><a class="dropdown-item" href="#">English</a></li>
                        <li><a class="dropdown-item" href="#">Arabic</a></li> --}}
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="mobile-bottom-navigation">
        {{-- <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
        </button> --}}
        <button class="action-btn">
            <ion-icon name="bag-handle-outline"></ion-icon>
            {{-- <span class="count">0</span> --}}
        </button>
        <a class="action-btn" href="{{ route('site') }}">
            <ion-icon name="home-outline"></ion-icon>
        </a>
        <a class="action-btn">
            <ion-icon name="heart-outline"></ion-icon>
            {{-- <span class="count">0</span> --}}
        </a>
        {{-- <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="grid-outline"></ion-icon>
        </button> --}}
    </div>

</header>

@push('js')
    <script>
        $('#favorite').on('click', function() {
            // console.log('good');

            $.ajax({
                url: "{{ route('favorites.show') }}",
                type: 'get',

                success: function(response) {
                    // console.log(response.favorites);
                    var $favoritesList = $('#favorites-list');
                    $favoritesList.empty();
                    $.each(response.favorites, function(index, favorite) {
                        $favoritesList.append(`<li class="shop-content">
                            <img src="` + favorite.media[0].original_url + `" alt="product">
                            <div class="shop-body">
                                <button id="removeFavorite" data-product-id-remove="` + favorite.id + `" class="remove"><i class="fas fa-times"></i></button>
                                <span>` + favorite.name.{{ App::getLocale() }} + `</span>

                            </div>`);


                        // console.log(favorite.name );
                    });
                    $('.remove').on('click', function(event) {
                        var productId = $(this).data('product-id-remove');
                        var url = "{{ route('remove.product', ':productId') }}";
                        url = url.replace(':productId', productId);
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                id: productId,
                                _token: '{{ csrf_token() }}'
                            },

                            success: function(response) {
                                console.log(response);

                            },
                            error: function(xhr) {
                                // Handle the error response
                                console.log(xhr);
                            }
                        });
                    });
                }
            });
        });
    </script>
@endpush
