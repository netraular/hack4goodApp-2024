<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Qr;
use App\Models\Node;

class NodeController extends Controller
{
    public function addNode(Request $request) {
        $qr = Qr::find($request->id);
        if ($qr->end == 0)
        {
            $node = new Node();
            $node->lugar = $request->city;
            $node->coord_x = $request->coordx;
            $node->coord_y = $request->coordy;
            $node->qr_id = $request->id;
            $node->save();
            $product = Product::find($qr->product_id);
            $nodos = Node::where("qr_id", "=", $qr->id)->get();
            $message="Nodo añadido";
            return view('node/addedNode', compact("qr", "product", "nodos",'message'));
        }
        $product = Product::find($qr->product_id);
        $nodos = Node::where("qr_id", "=", $qr->id)->get();
        $message="No puedes añadir una parada a un recorrido finalizado!";
        return view('node/addedNode', compact("qr", "product", "nodos",'message'));
    }

    public function endNode(Request $request)
    {
        $id = $request->input('id');
        $qr = Qr::find($id);
        $qr->end = 1;
        $qr->save();
        $message="Has terminado el recorrido ";
        return view('node/addedNode', compact("qr",'message'));
    }
}
