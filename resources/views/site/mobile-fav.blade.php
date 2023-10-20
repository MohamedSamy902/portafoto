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
                        <div class="mobfav" id="mobfav{{ $product->id }}">
                            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="">
                            <div class="details">
                                <h6>{{ $product->name }}</h6>
                                <p>{{ $product->price != null? $product->price: $product->size()->latest()->first()->price }}
                                    {{ __('site.EGP') }}</p>
                            </div>
                            <button id="removeFavorite" data-product-id-remove="{{ $product->id }}"
                                class="remove btn btn-danger"><i class="fas fa-times"></i></button>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script src="https://releases.jquery.com/git/jquery-git.js"></script>
        <script>
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
                        
                        $('#mobfav'+productId).remove()
                        // console.log(response);
                    },
                    error: function(xhr) {
                        console.log(xhr);
                    }
                });
            });
        </script>
    @endpush
@endsection
