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
        if (count($request->session()->get('car')) > 0) {
            return view("car_checkout");
        }
        $request->session()->put('success', 'Carrito vacío, añada items');
        return redirect()->route('home');
    }

    function edit_item($id, Request $request) {

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
        foreach ($carrito as $posicion => $item) {
            var_dump($item->id);
        }
        return back();
    }

    function delete_car(Request $request) {
        $request->session()->forget('car');
        return back();
    }
}
