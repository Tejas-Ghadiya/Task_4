<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use function Laravel\Prompts\alert;

class Admin_Product_Controller extends Controller
{
    //

    public function index1()
    {
        $find = new product();
        $find = product::all();
        return view('Admin/view_product', ['find' => $find]);
    }
    public function index()
    {
        return view('Admin.Admin_Add_Product');
    }
    public function add_product(Request $request)
    {
        $size = 5;

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);

        if ($image = $request->file('image')) {
            $manager = new ImageManager(new Driver(['gd']));
            $image = ImageManager::gd()->read($request->file('image'));
            $name_gen = hexdec(uniqid()) . '.' . $request->file('image')->getClientOriginalExtension();
            $image = $manager->read($request->file('image'));
            $image->resize(300, 200);
            $image->save(base_path('public/image/' . $name_gen), $size);
            $save_url = 'image/' . $name_gen;

            $add = new product();

            $add->image = $save_url;
            $add->name = $request->input('name');
            $add->price = $request->input('price');
            $add->description = $request->input('description');
            $add->brand = $request->input('brand');
            $add->category = $request->input('category');
            if ($add->save()) {

                return view('Admin.Admin_Add_Product');
            }
            // return $save_url;
        }
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

    public function index2(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        return view('Admin.Admin_Edit_Product', ['product' => $product]);
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
                $find = product::all();
                return view('Admin/view_product', ['find' => $find]);
            }
        } else {
            $product->name = $request->input('name');
            $product->price = $request->input('price');
            $product->description = $request->input('description');
            $product->brand = $request->input('brand');
            $product->category = $request->input('category');
            if ($product->save()) {
                $find = new product();
                $find = product::all();
                return redirect();
            }
        }
    }
}
