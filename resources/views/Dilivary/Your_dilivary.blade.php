@extends('Dilivary.layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}
</head>
<body>
    <div class="product-list">
        @foreach ($data as $item)
        @if ($item->bill_condition == 0)
        <div class="product-item">
            <a href="{{url('dilivary/comform_dilivary/'.$item->id)}}" class="product-link">
                <img src="{{ url($item->pimage) }}" alt="{{ $item->pname }}" class="product-image">
                <h2 class="product-name">{{ $item->pname }}</h2>
                <p class="product-detail">Customer name: {{ $item->user_name }}</p>
                <p class="product-detail">Customer phone: {{ $item->mobile_number }}</p>
                <p class="product-detail">Product quantity: {{ $item->quantity }}</p>
                <p class="product-detail">Customer address: {{ $item->uaddress }}</p>
                <p class="product-detail">Pin Code: {{ $item->uzip }}</p>
            </a>
        </div>
        @endif

        @endforeach
    </div>
</body>
</html>
@endsection
<link rel="stylesheet" href="{{ asset('storage/css/Dilivary/dilivary.css') }}">
