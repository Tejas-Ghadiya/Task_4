@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               <center> <div class="card-header"><h2>Edit Product</h2></div> </center>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <body>
                        <div class="form-container">

                            <form action="edit_product" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{$product->id}}" name="id">
                                <div class="form-group">
                                    <label for="image">Product Image</label>
                                    <input type="file" name="image" id="image">
                                </div>
                                <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" name="name" id="name" value="{{$product->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Product Price</label>
                                    <input type="text" name="price" id="price" value="{{$product->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="brand">Product Brand</label>
                                    <input type="text" name="brand" id="brand" value="{{$product->name}}">
                                </div>
                                <div class="category-group">
                                    <label>Category</label>
                                    <div class="category-options">
                                        <label>
                                            <input type="radio" name="category" value="Mobile, Computer"  @if ($product->category == "Mobile, Computer")
                                            checked
                                            @endif> Mobile, Computer
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="TV, Appliances, Electronics" @if ($product->category == "TV, Appliances, Electronics")
                                            checked
                                            @endif> TV, Appliances, Electronics
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Men's Fashion" @if ($product->category == "Men's Fashion")
                                            checked
                                            @endif> Men's Fashion
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Women's Fashion" @if ($product->category == "Men's Fashion")
                                            checked
                                            @endif> Women's Fashion
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Kid's Fashion" @if ($product->category == "Kid's Fashion")
                                            checked
                                            @endif> Kid's Fashion
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Pet" @if ($product->category == "Pet")
                                            checked
                                            @endif> Pet
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Home, Kitchen" @if ($product->category == "Home, Kitchen")
                                            checked
                                            @endif> Home, Kitchen
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Beauty"  @if ($product->category == "Beauty")
                                            checked
                                            @endif> Beauty
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Sport, Fitness, Bag, Luggage" @if ($product->category == "Sport, Fitness, Bag, Luggage")
                                            checked
                                            @endif> Sport, Fitness, Bag, Luggage
                                        </label>
                                        <label>
                                            <input type="radio" name="category" value="Toys, Baby product" @if ($product->category == "Toys, Baby product")
                                            checked
                                            @endif> Toys, Baby product
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Product Description</label>

                                    <textarea name="description" id="description" value="{{$product->description}}" cols="30" rows="5"></textarea>
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
<link rel="stylesheet" href="{{ asset('storage/css/Admin/edit.css') }}">

