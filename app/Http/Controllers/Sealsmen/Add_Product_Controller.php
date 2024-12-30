<?php

namespace App\Http\Controllers\Sealsmen;

use App\Http\Controllers\Controller;
use App\Models\product;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\Request;

class Add_Product_Controller extends Controller
{
    public function index()
    {
        return view('sealsmen.add_products');
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
            $add->sid = $request->input('sid');
            $add->address = $request->input('address');
            $add->ditels = $request->input('ditels');
            $add->price = $request->input('price');
            $add->description = $request->input('description');
            $add->brand = $request->input('brand');
            $add->category = $request->input('category');
            if ($add->save()) {

                return view('Sealsmen.Add_products');
            }
            // return $save_url;
        }
    }
}
