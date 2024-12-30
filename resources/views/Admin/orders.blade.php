@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin Home') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Bill ID</th>
                                    <th>Status</th>
                                    <th>Product Name</th>
                                    <th>Total Amount</th>
                                    <th>Quantity</th>
                                    <th>Mobile Number</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            @if ($item->bill_condition == 1)
                                                <p style="color: rgb(0, 128, 255)">Pending Order</p>
                                            @elseif ($item->bill_condition == 0)
                                                <p style="color: rgb(255, 0, 0)">Cancelled Order</p>
                                            @else
                                                <p style="color: rgb(0, 255, 4)">Complete Order</p>
                                            @endif
                                        </td>
                                        <td>{{ $item->pname }}</td>
                                        <td>{{ $item->totel }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->mobile_number }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pagination-wrapper">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<link rel="stylesheet" href="{{ asset('storage/css/Admin/order.css') }}">
