<?php

namespace App\Http\Controllers;

use App\Models\Tome;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    function add_item($id, Request $request) {
        $data = $request->all();
        $tomo = Tome::find($id);
        $tomo['cantidad'] = intval($data['item_quantity']);
        $carrito = [];
        if ($request->session()->has('car')){
            $carrito = $request->session()->get('car');
        }
        array_push($carrito, $tomo);
        $request->session()->put('car', $carrito);
        $request->session()->put('success', 'Agregado correctamente');
        return back();
    }

    function list(Request $request) {
        if ($request->session()->get('car') == null ||
            count($request->session()->get('car')) == 0){
                $request->session()->put('success', 'Carrito vacío, añada items');
                return redirect()->route('home');
        }
        $valor_productos = 0.0;
        $valor_envio = 0;
        $carrito = $request->session()->get('car');
        foreach ($carrito as $posicion => $item) {
            $valor_productos += ($item->price * $item->cantidad);
        }
        return view("car_checkout", [
            "valor_productos"=>$valor_productos,
            "valor_envio"=>$valor_envio
        ]);
    }

    function edit_item($id, Request $request) {
        $data = $request->all();
        $carrito = $request->session()->get('car');
        foreach ($carrito as $posicion => $item) {
            if($item->id == $id) {
                $carrito[$posicion]->cantidad = $data['item_quantity'];
            }
        }
        $request->session()->put('car', $carrito);
        $request->session()->put('success', 'Cantidad actualizada correctamente');
        return back();
    }

    function remove_item($id, Request $request) {
        $carrito = $request->session()->get('car');
        foreach ($carrito as $posicion => $item) {
            if($item->id == $id) {
                unset($carrito[$posicion]);
            }
        }
        $request->session()->put('car', $carrito);
        $request->session()->put('success', 'Eliminado correctamente');
        return back();
    }

    function delete_car(Request $request) {
        $request->session()->forget('car');
        return back();
    }
}
