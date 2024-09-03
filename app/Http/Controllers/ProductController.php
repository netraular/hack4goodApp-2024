<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    public function showProduct(Request $request) {
        $product = Product::find($request->id);      
        return view('product/product', compact("product"));
    }
    public function createProduct(Request $request) {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to create a product.');
        }
        // dd($request->all());
        $product = new Product;
        $product->save();
        $path = "$product->id.jpg";
        $img = $request->picture;
        $sourcePath = $img->getPathname();
        if (file_exists($sourcePath)) {
            if (File::copy($sourcePath, "products/$path")) {
                dump('File copied successfully!');
            } else {
                dump('File copy failed.');
            }
        } else {
            dump('Source file does not exist: ' . $sourcePath);
        }
        // File::copy($img->getPathname(), $path);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->marca = $request->brand;
        $product->pic = $path;
        $product->category = $request->inputCategory;
        $product->user_id = $request->companyid;
        $product->update();
        return redirect()->route('product', ['id' => $product->id]);
    }

    public function createProductView(Request $request, $barcode = null) {
        if(isset($request->barcode)){$barcode=$request->barcode;}
        return view('product.createproduct', ['barcode' => $barcode]);
    }
}
