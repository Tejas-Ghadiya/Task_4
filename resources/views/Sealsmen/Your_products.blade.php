@extends('Sealsmen.layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="flex: 0 0 auto;
        width: 100.666667%;">
            <div class="card">
               <center><div class="card-header" style="font-size: 20px; font-width:600;">{{ __('Your Products') }}</div></center>

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
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Description</th>
                                            <th>Brand</th>
                                            <th>Category</th>
                                            <th>Created At</th>
                                            <th>Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $item)
                                        <tr>
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
                                            <td style="width: 1%;">
                                                <form action="{{url('sealsmen/delete')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <button type="submit" class="delete">Delete</button>
                                                </form>
                                                <br>
                                                <form action="{{url('sealsmen/update')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <button type="submit" class="update">Update</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="pagination justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection
<style>
    .col-md-8 {

}
</style>
<link rel="stylesheet" href="{{ asset('storage/css/Admin/product.css') }}">
