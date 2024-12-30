@extends('admin.layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <center><div class="card-header" style="font-size: 20px; font-width:600;">{{ __('Product Details') }}</div></center>

                <div class="card-body">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <h2 class="mb-4 text-center"></h2>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Shop id</th>
                                            <th>Shop Address</th>
                                            <th>Product Image</th>
                                            <th>Product Name</th>
                                            <th>Product Price</th>
                                            <th>Product Description</th>
                                            <th>Product Brand</th>
                                            <th>Product Category</th>
                                            <th>Product Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($find as $item)
                                        <tr>
                                            <td style="width: 1%">{{ $item->sid }}</td>
                                            <td style="width: 1%">{{ $item->address }}</td>
                                            <td style="width: 1%"><a href="{{ asset($item->image) }}" target="_blank">
                                                <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" class="product-image-table">
                                            </a>
                                            </td>
                                            <td style="width: 1%">{{ $item->name }}</td>
                                            <td style="width: 1%">₹{{ number_format($item->price, 2) }}</td>
                                            <td style="width: 5%">{{ $item->description }}</td>
                                            <td style="width: 1%">{{ $item->brand }}</td>
                                            <td style="width: 1%">{{ $item->category }}</td>
                                            <td style="width: 1%">{{ $item->created_at->format('d M Y') }}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection

<link rel="stylesheet" href="{{ asset('storage/css/Admin/product.css') }}">
