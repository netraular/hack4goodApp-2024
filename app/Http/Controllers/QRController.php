<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRController extends Controller
{
    public function showProduct(Request $request) {
        // dd($request->id);
        $id = $request->id;        
        return view('product', compact("id"));
    }
}
