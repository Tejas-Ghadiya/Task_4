@extends('Sealsmen.layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <center> <div class="card-header"><h2>Add Product</h2></div> </center>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <body>
                        <div class="form-container">
                            <form action="{{url('sealsmen/product_add')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" value="{{session('address')}}" name="address">
                                <input type="hidden" value="{{session('id')}}" name="sid">
                                <input type="hidden" value="{{session('ditels')}}" name="ditels">
                                <div class="form-group">
                                    <label for="image">Product Image</label>
                                    <input type="file" name="image" id="image">
                                </div>
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" id="name" placeholder="Enter product name">
                                </div>
                                <div class="form-group">
                                    <label for="price">Product Price</label>
                                    <input type="text" name="price" id="price" placeholder="Enter product price">
                                </div>
                                <div class="form-group">
                                    <label for="brand">Product Brand</label>
                                    <input type="text" name="brand" id="brand" placeholder="Enter product brand">
                                </div>
                                <div class="category-group">
                                    <label>Category</label>
                                    <div class="category-options">
                                        <label>
                                            <input type="radio" name="category" value="Mobile, Computer" checked> Mobile, Computer
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="TV, Appliances, Electronics"> TV, Appliances, Electronics
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Men's Fashion"> Men's Fashion
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Women's Fashion"> Women's Fashion
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Kid's Fashion"> Kid's Fashion
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Pet"> Pet
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Home, Kitchen"> Home, Kitchen
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Beauty"> Beauty
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Sport, Fitness, Bag, Luggage"> Sport, Fitness, Bag, Luggage
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Toys, Baby product"> Toys, Baby product
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Product Description</label>
                                    <textarea name="description" id="description" placeholder="Enter product description" cols="30" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit">Add Product</button>
                                </div>
                            </form>
                        </div>
                    </body>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<link rel="stylesheet" href="{{ asset('storage/css/Admin/add_product.css') }}">

