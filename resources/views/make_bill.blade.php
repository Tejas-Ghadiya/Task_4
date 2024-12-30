@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div class="flex-container">
    <!-- Payment Form Section (Left) -->
    <div class="payment-form">
        <h2>Online Payment</h2>
        <form action="add_bill" method="POST">
            @csrf
            <input type="hidden" name="pid" value="{{ $product->id }}">
            <input type="hidden" name="uid" value="{{ Auth::user()->id }}">
            <input type="hidden" name="pname" value="{{ $product->name }}">
            <input type="hidden" name="pimage" value="{{ $product->image }}">
            <input type="hidden" name="totel" value="{{ $product->price }}">
            <input type="hidden" name="description" value="{{ $product->description }}">


            {{-- contaty --}}
            <label for="cardNumber">Quantity of product</label>
            <input type="number" name="quantity" value="1">
            <!-- Card details -->
            <h3>Card details  </h3>
            <label for="cardNumber">Card Number</label>
            <input type="text" id="cardNumber" name="cardNumber" placeholder="Enter your card number" required>

            <div class="input-group">
                <label for="expiryDate">Expiry Date</label>
                <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
            </div>

            <div class="input-group">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="Enter your CVV" required>
            </div>

            <!-- Billing information -->
            <h3>Billing Address</h3>
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>

            <label for="name">email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="name">Mobile Number</label>
            <input type="text" id="number" name="number" placeholder="Enter your mobile number" required>

            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" required>

            <label for="city">City</label>
            <input type="text" id="city" name="city" placeholder="Enter your city" required>

            <label for="zip">Pin Code</label>
            <input type="text" id="zip" name="zip" placeholder="Enter your zip code" required>

            <!-- Submit button -->
            <button type="submit">Proceed with Payment</button>
        </form>
    </div>

    <!-- Product Details Section (Right) -->
    <div class="product-details">
        <h2>Product Details</h2>
        <div class="product-info">
            <img src="{{ $product->image }}" alt="Product Image" class="product-image">
            <div class="product-text">
                <p><strong>Product Name:</strong> {{ $product->name }}</p>
                <p><strong>Product Price:</strong> ₹{{ number_format($product->price, 2) }} </p>
                <p><strong>Product Description:</strong> {{ $product->description }}</p>
                <!-- Optional Category and Brand -->
                <p><strong>Category:</strong> 2345 </p>
                <p><strong>Brand:</strong> 12</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>

@endsection
<link rel="stylesheet" href="{{ asset('storage/css/make_bill.css') }}">

