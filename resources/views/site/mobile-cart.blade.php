@extends('site.layouts.master')
@push('css')
@endpush
@section('content')
    <div class="mobile-fav pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="text-center pb-3">{{ __('site.cart') }}</h4>

                    @foreach ($carts as $cart)
                        <div class="mobfav">
                            <img src="{{ $cart->product->getFirstMediaUrl('products') }}" alt="">
                            <div class="details">
                                <h6>{{ $cart->product->name }}</h6>
                                <p>{{ $cart->product->price != null? $cart->product->price: $product->size()->latest()->first()->price }}
                                    {{ __('site.EGP') }}</p>
                                <p class="text-black-50" style="margin-bottom: 5px">{{ $cart->standardColor->name }}
                                </p>
                                <p class="">{{ __('site.quantity') }}: {{ $cart->quantity }}</p>
                            </div>
                            <a href="{{ route('product.remove.cart', $cart->id) }}" class="remove btn btn-danger"><i
                                    class="fas fa-times"></i></a>

                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script src="https://releases.jquery.com/git/jquery-git.js"></script>
    @endpush
@endsection
