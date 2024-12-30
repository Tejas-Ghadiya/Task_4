@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Details</title>
</head>
<body>
    <div class="container">
        <h2>Total Bills: {{ $bill->count() }}</h2> <!-- Display the total count of bills -->

        <div class="product-grid">
            @foreach ($bill as $index => $bill)
            <div class="product-card">
                <form action="cart" method="post">
                    @csrf
                    <a href="{{ url('cart/'. $bill->id) }}">
                        <img src="{{ url($bill->pimage) }}" alt="{{ $bill->pname }}" class="product-image">
                        <h3>Bill No: {{ $index + 1 }}</h3> <!-- Display the bill number -->
                    </a>
                </form>
            </div>

            @endforeach
        </div>
    </div>
</body>
</html>
@endsection

<link rel="stylesheet" href="{{ asset('storage/css/cart.css') }}">
