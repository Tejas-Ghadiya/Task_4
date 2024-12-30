@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="items">

                        <div class="items">
                            <a href="user">
                                <div class="card">
                                    <h1>{{$user}}</h1>
                                    <h3>Users</h3>
                                </div>
                            </a>
                            <a href="dilivary_boy">
                                <div class="card">
                                    <h1>{{$dilivary_boy}}</h1>
                                    <h3>Delivery Boys</h3>
                                </div>
                            </a>
                            <a href="{{url('admin/Order')}}">
                                <div class="card">
                                    <h1>{{$salesman}}</h1>
                                    <h3>Sales Mans</h3>
                                </div>
                            </a>
                            <a href="view_product">
                                <div class="card">
                                    <h1>{{$product}}</h1>
                                    <h3>Products</h3>
                                </div>
                            </a>
                            <a href="{{url('admin/Order')}}">
                                <div class="card">
                                    <h1>{{$cansel_order}}</h1>
                                    <h3>Orders</h3>
                                </div>
                            </a>
                        </div>

                    </div>


                    <div class="content mt-4">
                        <h2>Welcome to the Admin Panel</h2>
                        <p>Here you can manage users, products, and delivery operations efficiently.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<link rel="stylesheet" href="{{ asset('storage/css/Admin/home.css') }}">

