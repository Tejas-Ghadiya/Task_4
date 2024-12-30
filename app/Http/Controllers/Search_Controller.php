<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class Search_Controller extends Controller
{
    function search(Request $request)
    {
        $stud = product::where('name', 'like', "%$request->search%")->paginate(3);
        return view('search', ["users" => $stud, 'search' => $request->search]);
    }
}
