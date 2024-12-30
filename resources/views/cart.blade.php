@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill Details</title>
</head>
<body>
    {{-- <center> --}}
        <div class="bill-details">
            <h2>Bill Details</h2>
            <img src="{{ url($bill->pimage) }}" alt="{{ $bill->pname }}" class="product-image">
            <p><span>Product Name:</span><br> {{ $bill->pname }}</p>
            <p><span>Total Amount:</span><br> ₹{{ number_format($bill->totel, 2) }}</p>
            <p><span>Product Information:</span><br> {{ $bill->description }}</p>
            <p><span>Quantity:</span> {{ $bill->quantity }}</p>
            <p><span>Security Code:</span> <span class="highlight">{{ $bill->cdon }}</span></p>
            <p><span>Purchase Date:</span> <span class="highlight">{{ $bill->created_at->format('d M Y') }}</span></p>
            <h3>🎊 <span style="color: green;">Success</span> 🎊</h3>
            <form action="{{ url('cancelled_orders') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $bill->id }}">
                <button type="submit" class="cancel-button">Cancel Order</button>
            </form>
        </div>
{{-- </center> --}}
</body>
</html>

@endsection
<link rel="stylesheet" href="{{ asset('storage/css/cart_a.css') }}">
