@extends('site.layouts.master')
@push('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.css') }}"> --}}
@endpush
@section('content')
    <div class="mobile-fav pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="text-center pb-3">{{ __('site.favorite') }}</h4>
                    @foreach ($products as $product)
                        <div class="mobfav">
                            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="">
                            <div class="details">
                                <h6>{{ $product->name }}</h6>
                                <p>{{ $product->price != null? $product->price: $product->size()->latest()->first()->price }} {{ __('site.EGP') }}</p>
                            </div>
                            <a href="{{ route('remove.product.mobile', $product->id) }}" class="remove btn btn-danger"><i class="fas fa-times"></i></a>
                        </div>
                    @endforeach

                    {{-- <div class="mobfav">
                        <img src="https://rvs-checkout-page.onrender.com/photo1.png" alt="">
                        <div class="details">
                            <h6>Wall Frame</h6>
                            <p>30 x 60</p>
                        </div>
                        <a href="" class="remove btn btn-danger"><i class="fas fa-times"></i></a>
                    </div>
                    <div class="mobfav">
                        <img src="https://rvs-checkout-page.onrender.com/photo1.png" alt="">
                        <div class="details">
                            <h6>Wall Frame</h6>
                            <p>30 x 60</p>
                        </div>
                        <a href="" class="remove btn btn-danger"><i class="fas fa-times"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script src="https://releases.jquery.com/git/jquery-git.js"></script>
    @endpush
@endsection
