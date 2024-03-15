<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Product;
use App\Models\Qr;



class QRController extends Controller
{
    public function showProduct(Request $request) {
        // dd($request->id);
        $id = $request->id;        
        return view('product', compact("id"));
    }

    public function createProduct(Request $request) {
        $product = new Product;
        $product->save();
    }

    public function createQr(Request $request) {
        if (isset($request->id))
        {
            $id = $request->id;
            $qr = new Qr;
            $qr->product_id = $id;
            $qr->save();
            $process = new Process(['python3', app_path(). "/Scripts/QRGenerator.py", $qr->id]);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }
            $output_data = $process->getOutput();
            $ret = $qr->id;
            dump($ret);
            return view('createqr', compact('ret'));
        }
        else {
            dump("get");
            return view('createqr');
        }
    }
}
