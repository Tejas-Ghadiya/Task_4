@extends('layouts.app')

@section('content')

    <form action="search" method="get" class="search-form">
        @csrf
        <input type="search" value="{{ @$search }}" name="search" id="search" class="search-input">
        <button type="submit" class="search-button">Search</button>
    </form>
    <br>
    <div class="product-list">
    @if ($users->isEmpty())
        <p class="no-products">No products available at the moment.</p>
    @else
        @foreach ($users as $row)
            <form action="show_product" method="POST" class="product-form">
                @csrf
                <input type="hidden" name="pid" value="{{ $row->id }}">

                @auth
                    <input type="hidden" name="uid" value="{{ auth()->user()->id }}">
                @endauth

                <button type="submit" class="product-button">
                    <img src="{{ $row->image }}" alt="{{ $row->name }}" class="product-image">
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
    {{ $users->links() }}
</div>
@endsection


<link rel="stylesheet" href="{{ asset('storage/css/save.css') }}">
