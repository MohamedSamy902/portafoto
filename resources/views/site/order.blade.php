@extends('site.layouts.master')

@push('css')
    <style>

    </style>
@endpush

@section('content')
    <div class="order">
        <div class="container">
            <div class="row">
                {{-- <div class="nothing text-center font-weight-bold pt-3">
                    There Is No Content To Show
                </div> --}}
                <div class="col-sm-12">
                    <div class="accordion pt-5 pb-5" id="accordionExample">
                        @foreach ($orders as $order)
                            
                            <div class="accordion-item">
                                <h2 class="accordion-header" style="background-color: #e7f1ff;
                                box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);">
                                    <button class="accordion-button trace" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne{{ $order->id }}" aria-expanded="true" aria-controls="collapseOne{{ $order->id }}" style="width: 75%;
                                        display: -webkit-inline-box;">
                                        <div class="trr">
                                            <h4>#{{ $order->id }}</h4>
                                            <p>{{ $order->status }}</p>
                                            <p>{{ $order->created_at }}</p>
                                            {{-- @if ($order->status == 'pending')
                                                <a href="{{ route('cancelOrder', $order->id) }}" class="btn btn-danger cancel">Cancel</a>
                                            @endif --}}
                                        </div>
                                    </button>
                                    @if ($order->status == 'pending')
                                    <a href="{{ route('cancelOrder', $order->id) }}" class="btn btn-danger cancel">Cancel</a>
                                    @endif
                                </h2>
                                <div id="collapseOne{{ $order->id }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <table>
                                            <caption>{{ __('site.Total Price') }} : {{ $order->totalPrice }}</caption>
                                            <thead>
                                                <tr>
                                                    <th scope="col">{{ __('master.image') }}</th>
                                                    <th scope="col">{{ __('product.product') }}</th>
                                                    <th scope="col">{{ __('site.color') }}</th>
                                                    <th scope="col">{{ __('site.quantity') }}</th>
                                                    <th scope="col">{{ __('master.size') }}</th>
                                                    <th scope="col">{{ __('site.Total Price') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->cart as $cart)
                                                    <tr>
                                                        <td data-label="{{ __('master.image') }}"><img class="t-img" width="200"
                                                                src="{{ $cart->product->getFirstMediaUrl('products') }}"
                                                                alt="">
                                                        </td>
                                                        <td data-label="{{ __('product.product') }}">{{ $cart->product->name }}</td>
                                                        <td data-label="{{ __('site.color') }}">{{ $cart->standardColor->name }}</td>
                                                        <td data-label="{{ __('site.quantity') }}">{{ $cart->quantity }}</td>
                                                        <td data-label="{{ __('master.size') }}">{!! $cart->size == null ? $cart->product->description :  $cart->size !!}</td>
                                                        <td data-label="{{ __('site.Total Price') }}">{{ $cart->totalPrice }}</td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://releases.jquery.com/git/jquery-git.js"></script>

    <script src="{{ asset('site') }}/assets/fontawesome-free-6.4.2-web/js/all.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@endpush
