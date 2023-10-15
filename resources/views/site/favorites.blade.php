@extends('site.layouts.master')
@section('content')
    <h1>{{ __('site.favorite') }}</h1>

    @foreach ($products as $product)
        <div>
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>${{ $product->price }}</p>
        </div>
    @endforeach
@endsection
