<header>

    <div class="header-main">
        <div class="container">
            <a href="{{ route('site') }}" class="header-logo">
                Portafoto
            </a>
            <div class="header-search-container">
                <form action="{{ route('product.search') }}" method="GET">
                    {{-- <input type="text" name="query"> --}}
                    <input type="search" name="search" class="search-field" placeholder="Enter your product name...">
                    <button class="search-btn">
                        <ion-icon name="search-outline"></ion-icon>
                    </button>
                    {{-- <button type="submit">Search</button> --}}
                </form>

            </div>
            <div class="header-user-actions">
                <a href="{{ route('trackOrder') }}"><button class="action-btn truck" type="button">
                        <img
                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAACRklEQVR4nO2YO0sdQRiGH1GPQtQjksJYhXTpE4hVwE6IaKws/APxQpr0sdNTJ4VC2hTBSv9CiDfMpfGSIkUSNShoYRQlKCcMfAuDObM7M3thA/PCNLPffM++55vbHggKCgoKCgoKCgqyUAcwDxwD9QLaCbAA3CJjLRRk4GZ7nbWRY0n8gGL0SHhHWSeuSytSuTDrwYi/QkXKOrV+Wexuh8A74L5t0iLls12fAUM2SYtUxBy3iL0HLEn8BdCflLRIuTKbgTcy5jvQk0XSLGRiVoAacJAwzZaBJtukecrErDmsmRe2SfOUibkv/U9ixg4C18Cfm+ulTEbqlu8yK3E/gNuug8tkpAV4L7GLroPLZETpLnAp8Y//ZyNoW/Lbshn5Kf1jlnkGJP5bXNI8ZWLOeF5frspmpEXMRJVxaaUy4qNgJAuFiqSdWu3Ac2ADOJe2DkwDbWngCZwzYBWYkptxKiN9wJeY3eIzcCcDI0mcTxLjZaRNS74FDAOd0kaAHQ1SSWHElvOxAcfKyLQ82waqDZ5XNchECiMunElTroOY7+cVeaZ+IZOeSswHSxMPNfiQB2dV6xuXvn3brzJVYpO6PK8VvpzTBuNmo/lZ077OXAFVx5dVf5q/Al4Cex6cUy1evfOczfqMSq4WnEmjjlMrLWfFBzAlg3cMi7Ab+Coxz3wAHpwJH0BFzgmVYFcWXJe0US15o20xD84m0OoL6dMgpoOqN4UJW86mx8H7j9SGoMq/JteG6Oqg9vQ0lUji/Ja1p6ZTbCX+Anf7zx/UhtX/AAAAAElFTkSuQmCC">


                    </button></a>

                <div class="dropdown fav" id="favorite">
                    <button class="action-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <ion-icon name="heart-outline"></ion-icon>

                    </button>

                    <ul class="dropdown-menu wide" id="favorites-list" aria-labelledby="dropdownMenuButton1">
                        <p class="text-center">{{ __('site.messages_fav_empty') }}</p>
                    </ul>
                </div>
                <div class="dropdown shop">
                    <button class="action-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <ion-icon name="bag-handle-outline"></ion-icon> <i class="fas fa-sort-down"></i>
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
                        @if (COUNT($carts) != 0)
                            <li class="checkout">
                                <a class="dropdown-item" href="{{ route('customers.payment.show') }}">
                                    <button type="button" class="btn btn-dark btn-block">
                                        Cart <i class="fa-solid fa-cart-shopping cartt"></i>
                                    </button>
                                </a>
                            </li>
                        @else
                            <p class="text-center">{{ __('site.messages_cart_empty') }}</p>
                        @endif


                    </ul>
                </div>
                <div class="dropdown shop lang">
                    <button class="action-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ LaravelLocalization::getCurrentLocale() }}
                        <i class="fas fa-sort-down"></i>
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

                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="mobile-bottom-navigation">
        {{-- <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
        </button> --}}
        <a style="color: var(--eerie-black);" href="{{ route('cartMobile') }}" class="action-btn">
            <ion-icon name="bag-handle-outline"></ion-icon>
            {{-- <span class="count">0</span> --}}
        </a>
        <a style="color: var(--eerie-black);" class="action-btn" href="{{ route('site') }}">
            <ion-icon name="home-outline"></ion-icon>
        </a>
        <a style="color: var(--eerie-black);" class="action-btn" href="{{ route('favoriteProduct') }}">
            <ion-icon name="heart-outline"></ion-icon>
            {{-- <span class="count">0</span> --}}
        </a>
        <a style="color: var(--eerie-black);" href="{{ route('trackOrder') }}" class="action-btn"
            data-mobile-menu-open-btn>
            <ion-icon name="grid-outline"></ion-icon>
        </a>
    </div>

</header>

@push('js')
    <script>
        $('#favorite').on('click', function() {
            $.ajax({
                url: "{{ route('favorites.show') }}",
                type: 'get',

                success: function(response) {
                    var $favoritesList = $('#favorites-list');
                    $favoritesList.empty();
                    $.each(response.favorites, function(index, favorite) {
                        $favoritesList.append(`<li class="shop-content">
                            <img src="` + favorite.media[0].original_url + `" alt="product">
                            <div class="shop-body">
                                <button id="removeFavorite" data-product-id-remove="` + favorite.id + `" class="remove"><i class="fas fa-times"></i></button>
                                <span>` + favorite.name.{{ App::getLocale() }} + `</span>

                            </div>`);
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
                                console.log(xhr);
                            }
                        });
                    });
                }
            });
        });
    </script>
@endpush
