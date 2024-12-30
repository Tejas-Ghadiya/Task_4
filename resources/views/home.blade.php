@extends('layouts.app')

@section('content')
<div class="product-list">
    @if ($product->isEmpty())
        <p class="no-products">No products available at the moment.</p>
    @else
        @foreach ($product as $row)
            <form action="show_product" method="POST" class="product-form">
                @csrf
                <input type="hidden" name="pid" value="{{ $row->id }}">

                @auth
                    <input type="hidden" name="uid" value="{{ auth()->user()->id }}">
                @endauth

                <button type="submit" class="product-button">
                    <img
                        src="{{ $row->image }}"
                        alt="{{ $row->name }}"
                        class="product-image">
                    <div class="product-details">
                        <div class="product-name" title="{{ $row->name }}">{{ $row->name }}</div>
                        <div class="product-price">₹{{ $row->price }}</div>
                        <div class="product-description">
                            {{ Str::limit($row->description, 100) }}
                        </div>
                    </div>
                </button>
            </form>
        @endforeach
    @endif
</div>
<div class="pagination">
    {{ $product->links() }}
</div>
@endsection
<link rel="stylesheet" href="{{ asset('storage/css/style.css') }}">
