<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Qr;
use App\Models\Node;
use Auth;

class NodeController extends Controller
{
    public function addNode(Request $request) {
        $qr = Qr::find($request->id);
        $product = Product::find($qr->product_id);
        if(!Auth::check()){
            return redirect()->back()->with('error', 'Debes estar logueado para modificar las paradas del producto.');
        }
        else if ($product->user_id != Auth::user()->id){
            return redirect()->back()->with('error', 'No puedes modificar este recorrido, no es tuyo.');
        }

        
        if ($qr->end == 0)
        {
            $node = new Node();
            $node->lugar = $request->city;
            $node->coord_x = $request->coordx;
            $node->coord_y = $request->coordy;
            $node->qr_id = $request->id;
            $node->save();
            
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
        if(!Auth::check()){
            return redirect()->back()->with('error', 'Debes estar logueado para modificar las paradas del producto.');
        }

        $id = $request->input('id');
        $qr = Qr::find($id);
        $qr->end = 1;
        $qr->save();
        $message="Has terminado el recorrido ";
        return view('node/addedNode', compact("qr",'message'));
    }
}
