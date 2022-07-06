<?php

namespace App\Http\Controllers;

use App\Models\Tome;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    function add_item($id, Request $request) {
        $data = $request->all();
        $carrito = $request->session()->get('car');
        $carrito[$data['item_id']] = intval($data['item_quantity']);
        $request->session()->put('car', $carrito);
        $request->session()->put('success', 'Agregado correctamente');
        return back();
    }

    function list() {
        $carrito = session()->get('car');
        return view("car_checkout", ["carrito" => $carrito]);
    }

    function remove_item($id, Request $request) {
        $carrito = $request->session()->get('car');
        unset($carrito[$id]);
        $request->session()->put('car', $carrito);
        $request->session()->put('success', 'Eliminado correctamente');
        return back();
    }
}
