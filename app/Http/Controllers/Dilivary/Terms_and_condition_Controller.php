<?php

namespace App\Http\Controllers\Dilivary;

use App\Http\Controllers\Controller;
use App\Models\dilivari_boy;
use Illuminate\Http\Request;

class Terms_and_condition_Controller extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('did');
        $terms_and_condition = $request->input('terms_and_condition');

        $add = new dilivari_boy();
        $add = dilivari_boy::find($id);
        $add->terms_and_condition = $terms_and_condition;
        if ($add->save()) {
            $request->session()->put('terms_and_condition', $add->terms_and_condition);
            return redirect(url('dilivary/home'));
        }
    }
}
