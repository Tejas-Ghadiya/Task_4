<?php

namespace App\Http\Controllers\Sealsmen;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use function Laravel\Prompts\alert;

class Your_Product_Controller extends Controller
{
    public function index()
    {
        // return session('id');
        $find = new product();
        $find = Product::where('sid', session('id'))->paginate(5);

        // Return the view with the products
        return view('sealsmen.your_products', ['products' => $find]);
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        $delete = Product::find($id);

        if ($delete) {
            $delete->delete();

            // Redirect back with a success message
            return redirect()->back()->with('success', 'Product deleted successfully.');
        } else {
            // If product is not found, return with an error message
            return redirect()->back()->with('error', 'Product not found.');
        }
    }

    public function index1(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        return view('sealsmen/update', ['product' => $product]);
    }

    public function update(Request $request)
    {
        $size = 5;

        $id = $request->input('id');
        $product = Product::find($id);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver(['gd']));
            $image = ImageManager::gd()->read($request->file('image'));
            $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image->resize(300, 200);
            $image->save(base_path('public/image/' . $name_gen), $size);
            $save_url = 'image/' . $name_gen;

            $product->image = $save_url;
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->brand = $request->input('brand');
            $product->category = $request->input('category');
            if ($product->save()) {
                $find = new product();

                $find = Product::where('sid', session('id'))->paginate(5);
                return view('sealsmen/your_products', ['products' => $find]);
            }
        } else {
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->brand = $request->input('brand');
            $product->category = $request->input('category');
            if ($product->save()) {
                $find = new product();
                $find = Product::where('sid', session('id'))->paginate(5);
                return redirect()->route('sealsmen.your_products');
            }
        }
    }
}
