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
        $array = [];
        array_push($array, $tomo);
        $request->session()->put('car', $array);
        $request->session()->put('success', 'Agregado correctamente');
        return back();
    }

    function list() {
        $carrito = session()->get('car');
        $arrays = [];
        foreach ($carrito as $key => $value) {
            array_push(
                $arrays, ['id', '=', $key]
            );
        }
        $items_carrito = Tome::orWhere('id', $carrito)->get();
        return view("car_checkout", [
            "carrito" => $carrito,
            "items_carrito"=>$items_carrito
        ]);
    }

    function remove_item($id, Request $request) {
        $carrito = $request->session()->get('car');
        unset($carrito[$id]);
        $request->session()->put('car', $carrito);
        $request->session()->put('success', 'Eliminado correctamente');
        return back();
    }

    function delete_car(Request $request) {
        $request->session()->forget('car');
        var_dump($request->session()->get('car'));
        // return back();
    }
}
