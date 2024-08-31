<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use File;

class ProductController extends Controller
{
    
    public function showProduct(Request $request) {
        $product = Product::find($request->id);      
        return view('product/product', compact("product"));
    }
    public function createProduct(Request $request) {
        $product = new Product;
        $product->save();
        $path = "products/$product->id.jpg";
        $img = $request->picture;
        // dd($request->all());
        File::copy($img->getPathname(), $path);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->marca = $request->brand;
        $product->pic = $path;
        $product->category = $request->inputCategory;
        $product->company_id = $request->companyid;
        $product->update();
        return redirect()->route('product', ['id' => $product->id]);
    }

    public function createProductView(Request $request, $barcode = null) {
        if(isset($request->barcode)){$barcode=$request->barcode;}
        return view('product.createproduct', ['barcode' => $barcode]);
    }
}
