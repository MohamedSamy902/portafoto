@extends('layouts.admin.master')

@section('title')
    Invoice
    {{ $title }}
@endsection

@push('css')
@endpush

@section('content')
    @component('components.breadcrumb')
        {{-- @slot('breadcrumb_title')
            <h3>Invoice</h3>
        @endslot
        <li class="breadcrumb-item">Pages</li>
        <li class="breadcrumb-item">Ecommerce</li>
        <li class="breadcrumb-item active">Invoice</li> --}}
        @slot('breadcrumb_title')
            <h3>{{ __('invoice.invoice') }}</h3>
        @endslot
        <li class="breadcrumb-item">{{ __('invoice.invoice') }}</li>
        <li class="breadcrumb-item active">{{ __('invoice.invoiceShow') }}</li>
    @endcomponent

    <div class="container invoice">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div>

                            <!-- End InvoiceTop-->
                            <div class="row invo-profile">
                                <div class="col-xl-4">
                                    <div class="media">
                                        {{-- <div class="media-left"><img class="media-object rounded-circle img-60"
                                                src="{{ asset('assets/images/user/1.jpg') }}" alt="" /></div> --}}
                                        <div class="media-body m-l-20">
                                            <h4 class="media-heading f-w-600">{{ $invoice->name }}</h4>
                                            <p> {{ $invoice->email }}<br />
                                                <span class="digits">{{ $invoice->mobile_1 }}</span> /
                                                <span class="digits">{{ $invoice->mobile_2 }}</span>
                                            </p>
                                            <p
                                                style="color: #000;
                                            font-size: 20px;
                                            font-weight: 700;">
                                                {{ $invoice->payment }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <div class="text-xl-end" id="project">
                                        <p>
                                            {{ $invoice->address_1 }} <br>
                                            {{ $invoice->address_2 }} <br>
                                            {{ $invoice->governorate->name }} <br>
                                            {{ $invoice->city->name }}<br>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <!-- End Invoice Mid-->
                            <div>
                                <div class="table-responsive invoice-table" id="table">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td class="item">
                                                    <h6 class="p-2 mb-0">{{ __('master.name') }}</h6>
                                                </td>
                                                <td class="Hours">
                                                    <h6 class="p-2 mb-0">{{ __('site.color') }}</h6>
                                                </td>
                                                <td class="Rate">
                                                    <h6 class="p-2 mb-0">{{ __('site.quantity') }}</h6>
                                                </td>
                                                <td class="subtotal">
                                                    <h6 class="p-2 mb-0">{{ __('master.size') }}</h6>
                                                </td>
                                                <td class="subtotal">
                                                    <h6 class="p-2 mb-0">{{ __('site.totalPrice') }}</h6>
                                                </td>
                                            </tr>
                                            @foreach ($invoice->cart as $cart)
                                                <tr>
                                                    <td>
                                                        <label>{{ $cart->product->name }}</label>
                                                        {{-- <p class="m-0">Lorem Ipsum is simply dummy text of the printing and
                                                        typesetting industry.</p> --}}
                                                    </td>
                                                    <td>
                                                        <p class="itemtext digits">{{ $cart->standardColor->name }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext digits">{{ $cart->quantity }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext digits">{{ $cart->size }}</p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext digits">{{ $cart->totalPrice }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Table-->
                                <div class="row mt-3">
                                    <div class="col-md-8">
                                        <div>
                                            <p class="legal">
                                                <strong>TotalPrice</strong> {{ $invoice->totalPrice }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        @if ($invoice->status == 'pending')
                                            @can('invoice-refusal')
                                                <a class="btn btn-danger"
                                                    href="{{ route('invoice.refusal', $invoice->id) }}">Refusal</a>
                                            @endcan
                                            @can('invoice-approvedChengStatus')
                                                <a class="btn btn-info"
                                                    href="{{ route('invoice.approved', $invoice->id) }}">Approv</a>
                                            @endcan
                                        @elseif($invoice->status == 'approved')
                                            <p
                                                style="color: #000; text-align: center; background-color: #d1d7cd; border-radius: 5px;">
                                                {{ $invoice->status }}</p>
                                        @else
                                            <p
                                                style="color: #000; text-align: center; background-color: #ff6161; border-radius: 5px;">
                                                {{ $invoice->status }}</p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <!-- End InvoiceBot-->
                        </div>

                    </div>
                    <!-- End Invoice-->
                    <!-- End Invoice Holder-->
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
        <script src="{{ asset('assets/js/print.js') }}"></script>
    @endpush
@endsection
