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
        @foreach ($bill as $item)
        <div class="product-item">
            @if ($item->dilivary_boy_comformation == 0)
            <form action="{{url('dilivary/take_dilivary')}}" method="POST">
                @csrf
                <img src="{{ url($item->pimage) }}" alt="{{ $item->pname }}" class="product-image">
                <h2 class="product-name">{{ $item->pname }}</h2>

                <p class="product-detail">Customer name: {{ $item->name }}</p>
                <p class="product-detail">Customer phone: {{ $item->mobile_number }}</p>
                <p class="product-detail">Product quantity: {{ $item->quantity }}</p>
                <p class="product-detail">Customer address: {{ $item->address }}</p>
                <p class="product-detail">Pin Code: {{ $item->zip }}</p>
                <input type="hidden" name="Delivary_boy_id" value="{{session('id')}}">
                <input type="hidden" name="Delivary_boy_name" value="{{session('user')}}">
                <input type="hidden" name="Delivary_boy_number" value="{{session('mobile_number')}}">
                <input type="hidden" name="Delivary_boy_address" value="{{session('address')}}">
                <input type="hidden" name="bid" value="{{$item->id}}">
                <input type="hidden" name="pid" value="{{ $item->pid }}">
                <input type="hidden" name="uid" value="{{ $item->uid }}">
                <input type="hidden" name="user_name" value="{{ $item->name }}">
                <input type="hidden" name="mobile_number" value="{{ $item->mobile_number }}">
                <input type="hidden" name="pimage" value="{{ $item->pimage }}">
                <input type="hidden" name="pname" value="{{ $item->pname }}">
                <input type="hidden" name="totel" value="{{ $item->totel }}">
                <input type="hidden" name="quantity" value="{{ $item->quantity }}">
                <input type="hidden" name="city" value="{{ $item->city }}">
                <input type="hidden" name="address" value="{{ $item->address }}">
                <input type="hidden" name="Zip" value="{{ $item->zip }}">
                <input type="hidden" name="available_bill" value="0">
                <button type="submit" class="btn-submit">Take Delivary</button>
            </form>
            @endif

        </div>
        @endforeach
    </div>
</body>
</html>
@endsection
<link rel="stylesheet" href="{{ asset('storage/css/Dilivary/available.css') }}">

