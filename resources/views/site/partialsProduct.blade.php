@foreach ($products as $product)
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
