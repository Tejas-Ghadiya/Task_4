@extends('layouts.app')

@section('content')

{{-- <link rel="stylesheet" href="{{ asset('css/product.css') }}"> --}}

<div class="product-container">
    <img src="{{ url($product->image) }}" alt="{{ $product->name }}" class="product-image">
    <h2 class="product-title">{{ $product->name }}</h2>
    <p class="product-description">{{ $product->description }}</p>
    <p class="product-price"><strong>₹{{ $product->price }}</strong></p>
    <div class="product-details">
        <p class="product-brand">Brand: <span>{{ $product->brand }}</span></p>
        <p class="product-category">Category: <span>{{ $product->category }}</span></p>
    </div>


    @if (!$like || ($like->pid != $product->id || $like->uid != Auth::id()))
        <form action="{{ url('add_like') }}" method="post" class="like-form">
            @csrf
            <input type="hidden" name="uid" value="{{ Auth::id() }}">
            <input type="hidden" name="pid" value="{{ $product->id }}">
            <button type="submit" class="like-button like">Like</button>
        </form>
    @else
        <form action="{{ url('dislike') }}" method="post" class="like-form">
            @csrf
            <input type="hidden" name="pid" value="{{ $product->id }}">
            <input type="hidden" name="uid" value="{{ Auth::id() }}">
            <input type="hidden" name="like_id" value="{{ $like->id }}">
            <button type="submit" class="like-button dislike">Dislike</button>
        </form>
    @endif

    <form action="buy_nave" method="post" class="buy-now-form">
        @csrf
        <input type="hidden" name="pid" value="{{ $product->id }}">
        <input type="hidden" name="uid" value="{{ Auth::id() }}">
        <input type="hidden" name="price" value="{{ $product->price }}">
        <input type="hidden" name="name" value="{{ $product->name }}">
        <button type="submit" class="buy-now-button">Buy Now</button>
    </form>

</div>

@endsection
<link rel="stylesheet" href="{{ asset('storage/css/product.css') }}">
