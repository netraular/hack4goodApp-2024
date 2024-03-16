<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Product;
use App\Models\Qr;
use App\Models\Nodo;
use File;
use Illuminate\Support\Facades\Session;



class QRController extends Controller
{
    public function showProduct(Request $request) {
        $product = Product::find($request->id);
        // dd($product);
        // $id = $request->id;        
        return view('product', compact("product"));
    }

    public function createProduct(Request $request) {
        $product = new Product;
        $product->save();
        $path = "products/$product->id.gif";
        $img = $request->picture;
        // dd($request->all());
        File::copy($img->getPathname(), $path);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->marca = $request->brand;
        // dd($product);
        $product->pic = $path;
        $product->category = $request->inputCategory;
        $product->update();
        return redirect()->route('product', ['id' => $product->id]);
    }

    public function createProductView(Request $request) {
        // $product = new Product;
        // $product->save();
        return view('createproduct');
    }

    public function createQr(Request $request) {
        $products=Product::all();

        if (isset($request->id))
        {

            $id = $request->id;
            $qr = new Qr;
            $qr->product_id = $id;
            $qr->end = FALSE;
            // dd($qr);
            $qr->save();
            $process = new Process(['python3', app_path(). "/Scripts/QRGenerator.py", $qr->id]);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }
            $output_data = $process->getOutput();
            $ret = $qr->id;
            return view('createqr', compact('ret','products'));
        }
        else {
            return view('createqr',compact('products'));
        }
    }

    public function viewQr(Request $request) {
        $qr = Qr::find($request->id);
        $product = Product::find($qr->product_id);
        $nodos = Nodo::where("qr_id", "=", $qr->id)->get();
        return view('viewqr', compact("qr", "product", "nodos"));
    }

    public function addNode(Request $request) {
        $node = new Nodo();
        $node->lugar = $request->city;
        $node->coord_x = $request->coordx;
        $node->coord_y = $request->coordy;
        $node->qr_id = $request->id;
        $node->save();
        $qr = Qr::find($request->id);
        $product = Product::find($qr->product_id);
        $nodos = Nodo::where("qr_id", "=", $qr->id)->get();
        return view('nodecreated', compact("qr", "product", "nodos"));
    }
}
