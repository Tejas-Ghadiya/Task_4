@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <div class="product-list">
            @foreach ($product as $row)
                @if ($row->is_liked == 1)
                    <form action="{{url('show_product')}}" method="POST" class="product-form">
                        @csrf
                        <input type="hidden" name="pid" value="{{ $row->id }}">

                        @auth
                            <input type="hidden" name="uid" value="{{ auth()->user()->id }}">
                        @endauth

                        <button type="submit" class="product-button">
                            <img src="{{url($row->image)}}" alt="{{ $row->name }}" class="product-image">
                            <div class="product-details">
                                <div class="product-name">{{ $row->name }}</div>
                                <div class="product-description">{{ $row->description }}</div>
                            </div>
                        </button>
                    </form>
                @endif
            @endforeach

    </div>
</body>
</html>
@endsection

<link rel="stylesheet" href="{{ asset('storage/css/search.css') }}">

