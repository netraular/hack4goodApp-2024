<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use App\Models\Product;
use App\Models\Qr;
use App\Models\Node;
use Illuminate\Support\Facades\Validator;
use Zxing\QrReader;
use Zxing\QrCode\Exception\ReaderException;


class QRController extends Controller
{
    public function viewQrs(Request $request) {
        $products = Product::all();
        $qrs = Qr::all(); // Obtener todos los registros de Qr
        $qrImage = $request->query('qrImage'); // Obtener el ID del QR desde la consulta
        
        return view('qr/createqr', compact('products', 'qrs', 'qrImage'));
    }

    public function createQr(Request $request) {
        $products = Product::all();
        $qrs = Qr::all(); // Obtener todos los registros de Qr

        if ($request->has('id')) {
            $id = $request->id;
            $qr = new Qr;
            $qr->product_id = $id;
            $qr->end = FALSE;
            $qr->save();

            $process = new Process(['python3', app_path() . "/Scripts/QRGenerator.py", $qr->id]);
            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            // Redirige a /viewqrs con el ID del QR como parámetro
            return redirect()->route('viewqrs', ['qrImage' => $qr->id]);
        } else {
            return redirect()->route('viewqrs');
        }
    }
    public function viewQr(Request $request) {
        $qr = Qr::find($request->id);
        $product = Product::find($qr->product_id);
        $nodos = Node::where("qr_id", "=", $qr->id)->get();
        return view('qr/viewqr', compact("qr", "product", "nodos"));
    }
    public function scanQR(Request $request)
    {
        // Validación del lado del servidor
        $validator = Validator::make($request->all(), [
            'qr_image' => 'required|image',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        // Check if the file was uploaded without errors
        if ($request->hasFile('qr_image') && $request->file('qr_image')->isValid()) {
            $image = $request->file('qr_image');
            $imagePath = $image->getPathname();

            try {
                // Read QR Code
                $qrcode = new QrReader($imagePath);
                $qrCodeResult = $qrcode->text(); //return decoded text from QR Code

                if ($qrCodeResult) {
                    // Verifica si el resultado es una URL válida y si coincide con el formato esperado
                    if (filter_var($qrCodeResult, FILTER_VALIDATE_URL) !== false && strpos($qrCodeResult, 'https://eco2.netshiba.com/') === 0) {
                        return redirect()->away($qrCodeResult);
                    } else {
                        return response()->json(['message' => 'El código qr no es un producto.', 'data' => $qrCodeResult]);
                    }
                }
            } catch (ReaderException $e) {
                // Handle QR Code reader exception
            }

            // QR code not found. Try finding a bar code
            $barcodeResult = shell_exec("zbarimg --quiet --raw " . escapeshellarg($imagePath));

            if ($barcodeResult) {
                return response()->json(['message' => 'Código de barras encontrado', 'data' => trim($barcodeResult)]);
            } else {
                return redirect()->back()->with('error_message', 'No se ha podido encontrar ningún QR o código de barras');
            }
        } else {
            // Handle the case where the file upload failed
            return redirect()->back()->withErrors(['qr_image' => 'Failed to upload image.']);
        }
    }
    public function buscar()
    {
        $qrs = Qr::where('end', 1)->get();

        $results = [];

        foreach ($qrs as $qr) {
            $node = Node::where('qr_id', $qr->id)
                        ->orderBy('id', 'desc')
                        ->first(['lugar']);

            $product = Product::find($qr->product_id, ['category', 'name', 'marca', 'description', 'pic']);

            $results[] = [
                'qr' => $qr,
                'node' => $node,
                'product' => $product
            ];
        }

        return view('qr/buscador', compact('results'));
    }
}
