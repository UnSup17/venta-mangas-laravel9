<?php

namespace App\Http\Controllers;

use App\Models\Tome;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    function add_item($id, $manga, Request $request) {
        $data = $request->all();
        $carrito = $request->session()->get('car');
        $carrito[$data['item_id']] = intval($data['item_quantity']);
        $request->session()->put('car', $carrito);
        return back()->with('success', 'Agregado correctamente');
    }
}
