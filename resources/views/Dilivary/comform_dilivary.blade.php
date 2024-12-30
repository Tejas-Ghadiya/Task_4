@extends('Dilivary.layouts.app')
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

    <div class="bill-details">
        <h2>Bill Details</h2>
        <img src="{{ url($find->pimage) }}" alt="{{ $find->pname }}">
        <p><span>Product Name:</span> {{ $find->pname }}</p>
        <p><span>Total Amount:</span> ₹{{ $find->totel }}</p>
        <p><span>Customer Phone:</span> {{ $find->mobile_number }}</p>
        <p><span>Customer City:</span> {{ $find->ucity }}</p>
        <p><span>Pin Code:</span> {{ $find->uzip }}</p>
        <p><span>Quantity:</span> {{ $find->quantity }}</p>
        <p><span>Purchase Date:</span> <span class="highlight">{{ $find->created_at->format('d M Y') }}</span></p>

        <form action="{{url('dilivary/comform')}}" method="POST">
            @csrf
            <label for="otp" class="form-label">Enter OTP:</label>
            <input type="hidden" name="id" value="{{$find->id}}">
            <input type="hidden" name="bid" value="{{$find->bid}}">
            <input type="text" name="codn" placeholder="Enter OTP" id="otp" class="form-input" required>
            <button type="submit" class="btn-submit">Submit</button>
        </form>
    </div>
</body>

</html>

@endsection

<link rel="stylesheet" href="{{ asset('storage/css/Dilivary/comform.css') }}">


